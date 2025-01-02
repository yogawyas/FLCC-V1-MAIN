<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ministry;
use Illuminate\Http\Request;

class AdminMinistryController extends Controller
{
    // Konstruktor untuk menambahkan middleware
    public function __construct()
    {
        // Pastikan middleware ini digunakan untuk otentikasi admin
        $this->middleware('auth:admin'); // Middleware 'auth:admin' memastikan hanya admin yang bisa mengakses controller ini
    }

    
// Menampilkan daftar ministry
public function index()
{
    $ministries = Ministry::all();  // Mengambil semua data ministry dari database
    return view('ministry.index', compact('ministries'));  // Mengirim data ministry ke view admin
}

// Menampilkan form untuk membuat ministry baru
public function create()
{
    return view('ministry.create');
}

// Menyimpan ministry baru
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
    $imagePath = $request->file('image') ? $request->file('image')->store('ministry') : null;

    // Menyimpan data ministry baru ke database
    Ministry::create([
        'title' => $request->title,
        'description' => $request->description,
        'date' => $request->date,
        'location' => $request->location,
        'image' => $imagePath,
        'status' => $request->status,
        'max_participants' => $request->max_participants,
    ]);

    // Redirect ke halaman daftar ministry dengan pesan sukses
    return redirect()->route('ministry.index')->with('success', 'Ministry created successfully!');
}

// Menampilkan form untuk mengedit ministry
public function edit(Ministry $ministry)
{
    return view('ministry.edit', compact('ministry'));
}

// Mengupdate data ministry
public function update(Request $request, Ministry $ministry)
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
    $imagePath = $request->file('image') ? $request->file('image')->store('ministry') : $ministry->image;

    // Update data ministry
    $ministry->update([
        'title' => $request->title,
        'description' => $request->description,
        'date' => $request->date,
        'location' => $request->location,
        'image' => $imagePath,
        'status' => $request->status,
        'max_participants' => $request->max_participants,
    ]);

    // Redirect ke halaman daftar ministry dengan pesan sukses
    return redirect()->route('ministry.index')->with('success', 'Ministry updated successfully!');
}

// Menghapus ministry
public function destroy(Ministry $ministry)
{
    // Hapus ministry dari database
    $ministry->delete();
    return redirect()->route('ministry.index')->with('success', 'Ministry deleted successfully!');
}

}