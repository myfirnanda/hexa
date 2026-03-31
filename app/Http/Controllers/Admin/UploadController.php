<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function image(Request $request)
    {
        $request->validate(['upload' => 'required|image|max:4096']);

        $file = $request->file('upload');
        $filename = 'ck-' . time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('content', $filename, 'public');

        return response()->json([
            'url' => Storage::url('content/' . $filename),
        ]);
    }
}
