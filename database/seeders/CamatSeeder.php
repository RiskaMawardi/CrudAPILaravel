<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Camat;

class CamatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $camat = [
            [
                'kdPropinsi' => 31,
                'kdWilayah' => 31,
                'kdCamat' => 31,
                'nmCamat' => "Kemuning",
            ],
            [
                'kdPropinsi' => 33,
                'kdWilayah' => 33,
                'kdCamat' => 33,
                'nmCamat' => "Bukit Raya",
            ],
            [
                'kdPropinsi' => 34,
                'kdWilayah' => 34,
                'kdCamat' => 34,
                'nmCamat' => "Nusaniwe",
            ],
            [
                'kdPropinsi' => 35,
                'kdWilayah' => 35,
                'kdCamat' => 35,
                'nmCamat' => "Denpasar Barat",
            ],
        ];
        foreach ($camat as $key => $value) {
            Camat::create($value);
        }
    }
}
