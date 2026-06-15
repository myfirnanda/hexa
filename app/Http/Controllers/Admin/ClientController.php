<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search', '');
        $clients = Client::query()
            ->when($search, fn($q) => $q->where('name', 'like', "%{$search}%")
                ->orWhere('category', 'like', "%{$search}%"))
            ->orderBy('sort_order')
            ->orderBy('id')
            ->paginate(15)
            ->withQueryString();
        return view('admin.clients.index', compact('clients', 'search'));
    }

    public function updateSort(Request $request)
    {
        $order = $request->input('order', []);
        foreach ($order as $index => $id) {
            Client::where('id', (int) $id)->update(['sort_order' => $index]);
        }
        return response()->json(['ok' => true]);
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'logo' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = Str::slug($validated['name']) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('clients', $filename, 'public');
            $validated['logo'] = 'clients/' . $filename;
        }

        Client::create($validated);

        return redirect()->route('manager.clients.index')->with('success', 'Client berhasil ditambahkan.');
    }

    public function update(Request $request, Client $client)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'logo' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('logo')) {
            if ($client->logo) {
                Storage::disk('public')->delete($client->logo);
            }
            $file = $request->file('logo');
            $filename = Str::slug($validated['name']) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('clients', $filename, 'public');
            $validated['logo'] = 'clients/' . $filename;
        }

        $client->update($validated);

        return redirect()->route('manager.clients.index')->with('success', 'Client berhasil diperbarui.');
    }

    public function destroy(Client $client)
    {
        if ($client->logo) {
            Storage::disk('public')->delete($client->logo);
        }
        $client->delete();
        return redirect()->route('manager.clients.index')->with('success', 'Client berhasil dihapus.');
    }
}
