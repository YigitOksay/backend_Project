<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = Hash::make('123456');
        $adminRecords = [
            [
                'id'=>1,
                'name' => 'Super Admin',
                'type' => 'super',
                'email' => 'admin@test.com',
                'mobile' => '05367186376',
                'password' => $password,
                'image' => 'defaults/profile.png',
                'status' => 1
            ],
        ];
        Admin::insert($adminRecords);
    }
}
