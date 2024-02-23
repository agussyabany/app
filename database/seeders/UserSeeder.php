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
        // $admin = User::create([
        //     'name' => 'admin',
        //     'email'=>'admin@gmail.com',
        //     'password'=>bcrypt('12345678')

        // ]);
        // $admin->assignRole('admin');

        $aset = User::create(
            // [
            //     'name' => 'AAM ROBIDIN NOOR, S.E.',
            //     'email'=>'robi@aset.smd',
            //     'nip' =>'1978.2002.1.370',
            //     'jabat'=>2,
            //     'divisi'=>27,
            //     'img'=>'robi.jpg',
            //     'password'=>bcrypt('robi2024')
            // ]
            [
                'name' => 'MUHAMMAD AGUS SYABANY',
                'email'=>'agus@aset.smd',
                'nip' =>'1982.2008.1.444',
                'jabat'=>3,
                'divisi'=>22,
                'img'=>'agus.jpg',
                'password'=>bcrypt('a')
            ],
            // [
            //     'name' => 'DEA INRUM RISTYA',
            //     'email'=>'dea@aset.smd',
            //     'nip' =>'1991.2020.2.694',
            //     'jabat'=>3,
            //     'divisi'=>27,
            //     'img'=>'dea.jpg',
            //     'password'=>bcrypt('dea2024')
            // ]
        );
        $aset->assignRole('aset');

        // $diklat = User::create([
        //     'name' => 'Muhammad Agus Syabany',
        //     'email'=>'agus@diklat.smd',
        //     'password'=>bcrypt('a')

        // ]);
        // $diklat->assignRole('diklat');

        // $soc = User::create([
        //     'name' => 'Muhammad Agus Syabany',
        //     'email'=>'agus@soc.smd',
        //     'password'=>bcrypt('a')

        // ]);
        // $soc->assignRole('soc');

        // $api = User::create([
        //     'name' => 'api',
        //     'email'=>'api@gmail.com',
        //     'password'=>bcrypt('12345678')

        // ]);
        // $api->assignRole('api');

        // $bppl = User::create([
        //     'name' => 'bppl',
        //     'email'=>'bppl@gmail.com',
        //     'password'=>bcrypt('12345678')

        // ]);
        // $bppl->assignRole('bppl');
    }
}
