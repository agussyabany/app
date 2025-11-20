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

        //$aset = User::create(
            // [
            //     'name' => 'AAM ROBIDIN NOOR, S.E.',
            //     'email'=>'robi@aset.smd',
            //     'nip' =>'1978.2002.1.370',
            //     'jabat'=>2,
            //     'divisi'=>27,
            //     'img'=>'robi.jpg',
            //     'password'=>bcrypt('robi2024')
            // ]
            // [
            //     'name' => 'MUHAMMAD AGUS SYABANY',
            //     'email'=>'agus@aset.smd',
            //     'nip' =>'1982.2008.1.444',
            //     'jabat'=>3,
            //     'divisi'=>22,
            //     'img'=>'agus.jpg',
            //     'password'=>bcrypt('a')
            // ],
            // [
            //     'name' => 'DEA INRUM RISTYA',
            //     'email'=>'dea@aset.smd',
            //     'nip' =>'1991.2020.2.694',
            //     'jabat'=>3,
            //     'divisi'=>27,
            //     'img'=>'dea.jpg',
            //     'password'=>bcrypt('dea2024')
            // ]
            // [
            //     'name' => 'HELVIRA NUR HIDAYATi ',
            //     'email'=>'ira@aset.smd',
            //     'nip' =>'1993.2020.2.681',
            //     'jabat'=>3,
            //     'divisi'=>27,
            //     'img'=>'ira.jpg',
            //     'password'=>bcrypt('ira2024')
            // ]

            // [
            //     'name' => 'HILAL',
            //     'email' => 'hilal@aset.smd',
            //     'nip' => '1986.2008.1.461',
            //     'jabat' => '3',
            //     'divisi' => 27,
            //     'img' => '-',
            //     'password' => bcrypt('hilal2024')
            // ],
            // [
            //     'name' => 'HJ DAHLIANA',
            //     'email' => 'dahlia@aset.smd',
            //     'nip' => '1972.1996.2.258',
            //     'jabat' => '3',
            //     'divisi' => 27,
            //     'img' => '-',
            //     'password' => bcrypt('dahlia2024')
            // ],
            // [
            //     'name' => 'MUHAMMAD RIDHO AZZINDANI AZHAR',
            //     'email' => 'rido@aset.smd',
            //     'nip' => '-',
            //     'jabat' => '3',
            //     'divisi' => 27,
            //     'img' => '-',
            //     'password' => bcrypt('rido2024')
            // ],
            // [
            //     'name' => 'ANDI ERWIN',
            //     'email' => 'erwin@aset.smd',
            //     'nip' => '-',
            //     'jabat' => '3',
            //     'divisi' => 27,
            //     'img' => '-',
            //     'password' => bcrypt('erwin2024')
            // ]
            // [
            //     'name' => 'ARYO ARIADI',
            //     'email' => 'aryo@aset.smd',
            //     'nip' => '1994.2020.1.660',
            //     'jabat' => '3',
            //     'divisi' => 27,
            //     'img' => '-',
            //     'password' => bcrypt('aryo2024')
            // ]
        //);
        //$aset->assignRole('aset');

        $diklat = User::create(
             [
                'name' => 'KIKI',
                'email' => 'kiki@diklat.smd',
                'nip' => '-',
                'jabat' => '3',
                'divisi' => 0,
                'img' => '-',
                'password' => bcrypt('654321')
            ],
        );
        $diklat->assignRole('diklat');

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

        $liveLine = User::create([
            'name' => 'Service & Opertion Center',
            'email'=>'soc@liveline.smd',
            'password'=>bcrypt('soc2024')

        ]);
        $liveLine->assignRole('LiveLine');
    }
}
