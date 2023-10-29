<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'admin',
            'email'=>'admin@gmail.com',
            'password'=>bcrypt('12345678')

        ]);
        $admin->assignRole('admin');

        $aset = User::create([
            'name' => 'aset',
            'email'=>'aset@gmail.com',
            'password'=>bcrypt('12345678')

        ]);
        $aset->assignRole('aset');

        $diklat = User::create([
            'name' => 'diklat',
            'email'=>'diklat@gmail.com',
            'password'=>bcrypt('12345678')

        ]);
        $diklat->assignRole('diklat');

        $api = User::create([
            'name' => 'api',
            'email'=>'api@gmail.com',
            'password'=>bcrypt('12345678')

        ]);
        $api->assignRole('api');

        $bppl = User::create([
            'name' => 'bppl',
            'email'=>'bppl@gmail.com',
            'password'=>bcrypt('12345678')

        ]);
        $bppl->assignRole('bppl');
    }
}
