<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function image(Request $request)
    {
        $request->validate(['upload' => 'required|image|max:4096']);

        $file = $request->file('upload');
        $filename = 'ck-' . time() . '-' . Str::random(8) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/img/content'), $filename);

        return response()->json([
            'url' => asset('assets/img/content/' . $filename),
        ]);
    }
}
