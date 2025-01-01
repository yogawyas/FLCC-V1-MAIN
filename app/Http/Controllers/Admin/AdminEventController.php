<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class AdminEventController extends BaseController
{
    // Konstruktor untuk menambahkan middleware
    public function __construct()
    {
        // Pastikan middleware ini digunakan untuk otentikasi admin
        $this->middleware('auth:admin'); // Middleware 'auth:admin' memastikan hanya admin yang bisa mengakses controller ini
    }

    // Menampilkan daftar event
    public function index()
    {
        $events = Event::all(); // Mengambil semua data event dari database
        return view('admin-events.index', compact('events')); // Pastikan view sesuai
    }

    // Menampilkan form untuk membuat event baru
    public function create()
    {
        return view('admin-events.create'); // Pastikan view sesuai
    }

    // Menyimpan event baru
    public function store(Request $request)
    {
        // Validasi inputan dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string|in:upcoming,ongoing,completed',
            'max_participants' => 'required|integer|min:1',
        ]);

        // Handle upload image (jika ada)
        $validated['image'] = $request->file('image') ? $request->file('image')->store('events', 'public') : null;

        // Menyimpan data event baru ke database
        Event::create($validated);

        // Redirect ke halaman daftar event dengan pesan sukses
        return redirect()->route('admin-events.index')->with('success', 'Event created successfully!');
    }

    // Menampilkan form untuk mengedit event
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event')); // Pastikan view sesuai
    }

    // Mengupdate data event
    public function update(Request $request, Event $event)
    {
        // Validasi inputan dari form
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string|in:upcoming,ongoing,completed',
            'max_participants' => 'required|integer|min:1',
        ]);

        // Handle upload image (jika ada)
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('events', 'public');
        } else {
            unset($validated['image']);
        }

        // Update data event
        $event->update($validated);

        // Redirect ke halaman daftar event dengan pesan sukses
        return redirect()->route('admin-events.index')->with('success', 'Event updated successfully!');
    }

    // Menghapus event
    public function destroy(Event $event)
    {
        // Hapus image jika ada
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }

        // Hapus event dari database
        $event->delete();

        // Redirect ke halaman daftar event dengan pesan sukses
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }
}
