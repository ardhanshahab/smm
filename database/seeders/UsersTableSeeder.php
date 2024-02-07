<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan satu user admin
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@smm.com',
            'role' => 'admin',
            'alamat' => 'Bandung',
            'nik' => '12345678900000',
            'tanggal_lahir' => '2000-12-29',
            'jenis_kelamin' => 'Laki-Laki',
            'nohp' => '08123456789',
            'email_verified_at' => now(),
            'password' => Hash::make('admin123'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => 'ardan',
            'email' => 'ardan@smm.com',
            'role' => 'superadmin',
            'alamat' => 'Bandung',
            'nik' => '12345678900000',
            'tanggal_lahir' => '2000-12-29',
            'jenis_kelamin' => 'Laki-Laki',
            'nohp' => '08123456789',
            'email_verified_at' => now(),
            'password' => Hash::make('1234567890'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Menambahkan sembilan user customer
        for ($i = 1; $i <= 9; $i++) {
            DB::table('users')->insert([
                'name' => 'Customer ' . $i,
                'email' => 'customer' . $i . '@smm.com',
                'role' => 'customer',
                'alamat' => 'Alamat Customer ' . $i,
                'nik' => '1234567890000' . $i,
                'tanggal_lahir' => '2000-01-0' . $i,
                'jenis_kelamin' => $i % 2 == 0 ? 'Laki-Laki' : 'Perempuan',
                'nohp' => '0812345678' . $i,
                'email_verified_at' => now(),
                'password' => Hash::make('customer123'),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
