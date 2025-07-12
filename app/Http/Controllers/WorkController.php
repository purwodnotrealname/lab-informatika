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
            'user_id' => 'nullable|max:255',
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
        $work->user_id = Auth::id();
        $work->tag_id = $request->tag_id;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/images');
            $work->image = basename($path); // Save only filename
        }

        $work->save();

        // Sync tags (many-to-many)
        if ($request->tags) {
            $work->tag_id = $request->tag_id;
        }
        return redirect('/showcase')->with('success', 'Project added successfully.');
    }
    public function destroy($id)
    {
        $work = Work::findOrFail($id);

        $work->delete();

        return redirect()->back();
    }
}
