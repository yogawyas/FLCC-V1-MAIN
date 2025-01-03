<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->paginate(10);
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean'
        ]);

        $data = [
            'title' => $validated['title'],
            'content' => $validated['content'],
            'is_featured' => $request->has('is_featured'),
            'user_id' => Auth::user()->id
        ];

        if ($request->hasFile('image')) {
            $data['image_url'] = $request->file('image')->store('news', 'public');
        }

        News::create($data);

        return redirect('/admin/news')->with('success', 'News created successfully');
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_featured' => 'boolean'
        ]);

        $data = [
            'title' => $validated['title'],
            'content' => $validated['content'],
            'is_featured' => $request->has('is_featured')
        ];

        if ($request->hasFile('image')) {
            if ($news->image_url) {
                Storage::disk('public')->delete($news->image_url);
            }
            $data['image_url'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);
        return redirect('/admin/news')->with('success', 'News updated successfully');
    }

    public function destroy(News $news)
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }
        $news->delete();
        return redirect()->route('news.index')->with('success', 'News deleted successfully');
    }
}
