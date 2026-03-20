<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'project_description' => 'nullable|string|max:5000',
            'categories' => 'nullable|array',
            'budget' => 'nullable|string|max:100',
            'file' => 'nullable|file|max:5120|mimes:svg,png,jpg,jpeg,doc,docx,pdf,ppt,pptx',
        ]);

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('order-files', 'public');
        }

        Order::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'company' => $validated['company'] ?? null,
            'project_description' => $validated['project_description'] ?? null,
            'categories' => $validated['categories'] ?? null,
            'budget' => $validated['budget'] ?? null,
            'file_path' => $filePath,
        ]);

        return response()->json(['success' => true]);
    }
}
