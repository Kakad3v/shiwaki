<?php

namespace App\Http\Controllers\Translations;

use App\Http\Controllers\Controller;
use App\TranslateRequest;
use Illuminate\Http\Request;

class TranslateRequestFilesController extends Controller
{
    public function update(Request $request, TranslateRequest $translateRequest)
    {
        request()->validate([
            'project_file' => 'required'
        ]);


        $file = request()->file('project_file');

        $name = $file->getClientOriginalName();

        $path = $request->file('project_file')->store('project-files' . '/' . $translateRequest->sub_url . '/' . $name, 'public');

        $file_size = $file->getSize() / 1000000;

        auth()->user()->requestfiles()->create([
            'file_path' => $path,
            'translate_request_id' => $translateRequest->id,
            'name' => $name,
            'file_size' => $file_size
        ]);

        return back()->with('Goof news', 'The file have been added');
    }
}
