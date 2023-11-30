<?php

namespace Database\Seeders;

use App\Models\Aset\Golongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class golongan_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gol =
        [
            [
                'id' =>1,
                'nama'=>'TANAH'
            ],
            [
                'id' =>2,
                'nama'=>'PERALATAN DAN MESIN'
            ],
            [
                'id' =>3,
                'nama'=>'GEDUNG DAN BANGUNAN'
            ],
            [
                'id' =>4,
                'nama'=>'JALAN,IRIGASI DAN JARINGAN'
            ],
            [
                'id' =>5,
                'nama'=>'ASET TETAP LAINNYA'
            ],
            [
                'id' =>6,
                'nama'=>'KONSTRUKSI'
            ],
            [
                'id' =>7,
                'nama'=>'KIR'
            ]
        ];
        foreach ($gol as $item) {
            Golongan::create($item);
        }
    }
}
