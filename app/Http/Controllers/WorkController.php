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
        $tags = Tag::all();
        return view('projectcreation/projectadd', compact('tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|max:255',
            'title' => 'required|max:255',
            'description' => 'nullable',
            'credit' => 'nullable|max:255',
            'source' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'tags' => 'nullable|array'
        ]);

        $work = new Work();
        $work->title = $request->title;
        $work->description = $request->description;
        $work->credit = $request->credit;
        $work->source = $request->source;
        $work->user_id =$request->user_id; //belum ada auth
        //$work->user_id = Auth::id();

        // Image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $work->image = basename($path);
        }

        $work->save();

        // Sync tags (many-to-many)
        if ($request->tags) {
            $work->tags()->sync($request->tags);
        }

       return redirect('showcase/showcase')->with('success', 'Project added successfully.');
    }
}
