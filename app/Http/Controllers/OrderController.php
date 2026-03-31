<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:50',
                'company' => 'nullable|string|max:255',
                'project_description' => 'required|string|max:5000',
                'category' => 'required|string|max:255',
                'budget' => 'required|string|max:100',
                'file' => 'nullable|file|max:5120|mimes:svg,png,jpg,jpeg,doc,docx,pdf,ppt,pptx',
            ],
            [
                'name.required' => 'Name is required.',
                'email.required' => 'Email is required.',
                'email.email' => 'Please enter a valid email address.',
                'phone.required' => 'Phone number is required.',
                'project_description.required' => 'Project description is required.',
                'category.required' => 'Please choose a category.',
                'budget.required' => 'Please choose a budget range.',
                'file.max' => 'The project brief must not be larger than 5 MB.',
                'file.mimes' => 'The project brief must be a SVG, PNG, JPG, DOC, DOCX, PDF, PPT, or PPTX file.',
            ]
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'The given data was invalid.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('order-files', 'public');
        }

        Order::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['company'] ?? null,
            'project_description' => $validated['project_description'],
            'categories' => [$validated['category']],
            'budget' => $validated['budget'],
            'file_path' => $filePath,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Project request sent successfully.',
        ]);
    }
}
