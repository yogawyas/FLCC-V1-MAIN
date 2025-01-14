<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ministry;
use Illuminate\Http\Request;
use App\Models\User;

class MinistryController extends Controller
{


    
// Menampilkan daftar ministry
public function index()
{
    // $ministries = Ministry::all();  // Mengambil semua data ministry dari database
    // return view('ministry.index', compact('ministries'));  // Mengirim data ministry ke view admin

    $ministries = Ministry::paginate(6);
    return view('ministry.index', compact('ministries'));
}

// Menampilkan form untuk membuat ministry baru
public function create()
{
    return view('ministry.createministry');
}

// Menyimpan ministry baru
public function store(Request $request)
{
    // Validasi inputan dari form
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'meeting_time' => 'required|date',
        'location' => 'required|string|max:255',
        'status' => 'required|string|in:open,closed',
        'total_slots' => 'required|integer|min:1',
    ]);

    // Handle upload image (jika ada)
    $imagePath = $request->file('image') ? $request->file('image')->store('ministry') : null;

    // Menyimpan data ministry baru ke database
    Ministry::create([
        'name' => $request->name ,
        'description' => $request->description,
        'image' => $imagePath,
        'meeting_time' => $request->meeting_time,
        'location' => $request->location,
        'status' => $request->status,
        'total_slots' => $request->total_slots,
    ]);

    // Redirect ke halaman daftar ministry dengan pesan sukses
    return redirect()->route('ministry')->with('success', 'Ministry created successfully!');
}

// Menampilkan form untuk mengedit ministry
public function edit(Ministry $ministry)
{
    return view('ministry.ministriesedit', compact('ministry'));
}

// Mengupdate data ministry
public function update(Request $request, Ministry $ministry)
{
    // Validasi inputan dari form
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'status' => 'required|string|in:open,closed',
    ]);

    // Handle upload image (jika ada)
    $imagePath = $request->file('image') ? $request->file('image')->store('ministry') : $ministry->image;

    // Update data ministry
    $ministry->update([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $request->image,
        'status' => $request->status,
    ]);

    // Redirect ke halaman daftar ministry dengan pesan sukses
    return redirect()->route('ministry')->with('success', 'Ministry updated successfully!');
}

// Menghapus ministry
public function destroy(Ministry $ministry)
{
    // Hapus ministry dari database
    $ministry->delete();
    return redirect()->route('ministry.index')->with('success', 'Ministry deleted successfully!');
}

//untuk manage user
public function users(ministry $ministry)
    {
        // Ambil semua data pengguna dari database
        $users = User::all();

        // Kembalikan view manageuser.blade.php dengan data pengguna
        return view('ministry.manageuserminis', compact('users', 'ministry'));
    }


    public function join(Ministry $ministry, Request $request)
{
    // Validasi input
    
    $data = auth('web')->user();
    if(!$data) return redirect()->route('login');
    
    $user = $data->id;
    $datas = [
        'ministry_id' => $ministry->id,
        'user_id' => $user
    ];
    $ministry->users()->attach($user);

    // Redirect atau kembalikan respon
    return redirect()->back()->with('success', 'Berhasil mendaftar ke ministry!');
}

}