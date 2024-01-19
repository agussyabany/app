<?php

namespace Database\Seeders;

use App\Models\Aset\Jabatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class jabatan_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = 
        [
            ['jabat' =>'Manajer' ],
            ['jabat' =>'Asisten Manajer' ],
            ['jabat' =>'Staf' ],
        ];

        foreach ($jabatan as $item) {
            Jabatan::Create($item);
        }
    }
}
