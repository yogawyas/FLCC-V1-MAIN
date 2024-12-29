<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MigrateAdminsToUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run()
    {
        // Ambil data dari tabel admins menggunakan query builder
        $admins = DB::table('admins')->get();  // Mengambil data dari tabel admins

        foreach ($admins as $admin) {
            User::create([
                'name' => $admin->name,
                'email' => $admin->email,
                'password' => Hash::make($admin->password),  // Jangan lupa di-hash password
                'is_admin' => true,  // Tandai sebagai admin
            ]);
        }
    }
}
