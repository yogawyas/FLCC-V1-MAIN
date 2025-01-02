<?php

namespace App\Http\Controllers;

use App\Models\Ministry;
use Illuminate\Http\Request;
use Database\Seeders\MinistrySeeder;

class MinistryController extends Controller
{
    public function index()
    {
        $ministries = Ministry::all();
        return view('ministry.index', compact('ministries'));
    }

    public function join(Request $request, Ministry $ministry)
    {
        // Add ministry registration logic here
        return back()->with('success', 'Successfully joined the ministry!');
    }

    public function edit($id)
    {
        // Mencari data ministry berdasarkan ID
        $ministry = Ministry::findOrFail($id);

        // Mengirim data ministry ke view edit
        return view('ministry.ministriesedit', compact('ministry'));
    }

//manage user di ministry
public function manageUsers($id)
{
    // Mencari ministry berdasarkan ID
    $ministry = Ministry::findOrFail($id);

    // Mengirim data ministry beserta pengguna yang terkait ke view
    return view('ministry.manageuserminis', compact('ministry'));
}


//hapus user dari ministry
public function removeUser($ministryId, $userId)
{
    // Mencari ministry dan user berdasarkan ID
    $ministry = Ministry::findOrFail($ministryId);
    $user = $ministry->users()->findOrFail($userId);

    // Menghapus user dari ministry (relationship many-to-many)
    $ministry->users()->detach($user);

    // Redirect ke halaman manage users dengan pesan sukses
    return redirect()->route('ministries.users.manage', $ministry->id)
     ->with('success', 'User has been removed successfully.');
}

}



