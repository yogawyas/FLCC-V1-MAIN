<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class AdminEventController extends Controller
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
        $events = Event::all();  // Mengambil semua data event dari database
        return view('admin.events.index', compact('events'));  // Mengirim data event ke view admin
    }

    // Menampilkan form untuk membuat event baru
    public function create()
    {
        return view('admin.events.create');
    }

    // Menyimpan event baru
    public function store(Request $request)
    {
        // Validasi inputan dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string|in:upcoming,ongoing,completed',
            'max_participants' => 'required|integer|min:1',
        ]);

        // Handle upload image (jika ada)
        $imagePath = $request->file('image') ? $request->file('image')->store('events') : null;

        // Menyimpan data event baru ke database
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'image' => $imagePath,
            'status' => $request->status,
            'max_participants' => $request->max_participants,
        ]);

        // Redirect ke halaman daftar event dengan pesan sukses
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    // Menampilkan form untuk mengedit event
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    // Mengupdate data event
    public function update(Request $request, Event $event)
    {
        // Validasi inputan dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|string|in:upcoming,ongoing,completed',
            'max_participants' => 'required|integer|min:1',
        ]);

        // Handle upload image (jika ada)
        $imagePath = $request->file('image') ? $request->file('image')->store('events') : $event->image;

        // Update data event
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'location' => $request->location,
            'image' => $imagePath,
            'status' => $request->status,
            'max_participants' => $request->max_participants,
        ]);

        // Redirect ke halaman daftar event dengan pesan sukses
        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    // Menghapus event
    public function destroy(Event $event)
    {
        // Hapus event dari database
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully!');
    }
}
