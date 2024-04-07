<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
            ['name' => 'admin', 'guard_name' => 'web'],
            ['name' => 'karyawan', 'guard_name' => 'web'],
        ]);

        $admin = new User();
        $admin->name = "Dumila";
        $admin->role = "admin";
        $admin->password = bcrypt("123");
        $admin->email = "admin@gmail.com";
        $admin->save();
        $admin->assignRole('admin');

        $karyawan = new User();
        $karyawan->name = "Karyawan";
        $karyawan->role = "karyawan";
        $karyawan->password = bcrypt("123");
        $karyawan->email = "karyawan@gmail.com";
        $karyawan->save();
        $karyawan->assignRole('karyawan');
    }
}
