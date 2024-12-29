<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ministry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MinistryController extends Controller
{
    public function index()
    {
        $ministries = Ministry::latest()->paginate(10);
        return view('admin.ministries.index', compact('ministries'));
    }

    public function create()
    {
        return view('admin.ministries.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'meeting_time' => 'required|string',
            'location' => 'required|string',
            'status' => 'required|in:open,closed',
            'total_slots' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('ministries', 'public');
        }

        Ministry::create($validated);

        return redirect()->route('admin.ministries.index')
            ->with('success', 'Ministry created successfully.');
    }

    public function edit(Ministry $ministry)
    {
        return view('admin.ministries.edit', compact('ministry'));
    }

    public function update(Request $request, Ministry $ministry)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'meeting_time' => 'required|string',
            'location' => 'required|string',
            'status' => 'required|in:open,closed',
            'total_slots' => 'required|integer|min:0',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($ministry->image) {
                Storage::disk('public')->delete($ministry->image);
            }
            $validated['image'] = $request->file('image')->store('ministries', 'public');
        }

        $ministry->update($validated);

        return redirect()->route('admin.ministries.index')
            ->with('success', 'Ministry updated successfully.');
    }

    public function destroy(Ministry $ministry)
    {
        if ($ministry->image) {
            Storage::disk('public')->delete($ministry->image);
        }
        
        $ministry->delete();

        return redirect()->route('admin.ministries.index')
            ->with('success', 'Ministry deleted successfully.');
    }
}