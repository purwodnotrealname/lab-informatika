<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        if (!$user) {
            return redirect('/')->with('error', 'Not Authorized.');
        }


        $tags = Tag::all();
        return view('projectcreation/projectadd', compact('tags'));
    }
    public function index()
    {
        $projects = Work::with(['user', 'tag'])->get(); 
        return view('showcase.showcase', compact('projects')); 
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'credit' => 'nullable|string|max:255',
            'price' => 'required|numeric|min:0',
            'video_link' => 'nullable|url',
            'demo_link' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:8192',
            'source' => [
                'nullable',
                'file',
                'max:20480',
                function ($attribute, $value, $fail) {
                    $allowedMimes = [
                        'application/zip',
                        'application/x-zip-compressed',
                        'application/x-rar-compressed',
                        'application/x-tar',
                        'application/gzip',
                        'application/x-7z-compressed',
                    ];

                    if (!in_array($value->getMimeType(), $allowedMimes)) {
                        $fail('The ' . $attribute . ' must be a valid archive file (ZIP, RAR, etc.).');
                    }
                },
            ],
            'tag_id' => 'nullable|exists:tags,id'
        ]);
    
        $work = new Work();
        $work->title = $request->title;
        $work->description = $request->description;
        $work->credit = $request->credit;
        $work->video_link = $request->video_link;
        $work->demo_link = $request->demo_link;
        $work->price = $request->price;
        $work->user_id = Auth::id();
        $work->tag_id = $request->tag_id;
    
        // Handle Image Upload
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->hashName();
            $file->storeAs('showcase/images', $filename, 'public');
            $work->image = $filename;
        }
    
        // Handle Source Code Upload (.zip, .rar etc.)
        if ($request->hasFile('source')) {
            if ($request->file('source')->isValid()) {
            $file = $request->file('source');
            $filename = time() . '_' . $file->hashName();
            $file->storeAs('showcase/source_code', $filename, 'public');
            $work->source_code = $filename;
        } else {
                // Log or display the specific error
                $error = $request->file('source')->getErrorMessage();
                return back()->with('error', 'File upload failed: ' . $error);
            }
        }
    
        $work->save();
    
        return redirect('/showcase')->with('success', 'Project added successfully.');
    }
    public function destroy($id)
    {
        $work = Work::findOrFail($id);

        $work->delete();

        return redirect()->back();
    }
}
