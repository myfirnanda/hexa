<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(15);
        return view('admin.clients.index', compact('clients'));
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

        return redirect()->route('admin.clients.index')->with('success', 'Client berhasil ditambahkan.');
    }

    public function update(Request $request, Client $client)
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

        $client->update($validated);

        return redirect()->route('admin.clients.index')->with('success', 'Client berhasil diperbarui.');
    }

    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('admin.clients.index')->with('success', 'Client berhasil dihapus.');
    }
}
