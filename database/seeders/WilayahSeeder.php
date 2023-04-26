<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Wilayah;

class WilayahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $wilayah = [
            [
                'kdPropinsi' => 31,
                'kdWilayah' => 31,
                'nmWilayah' => "Palembang",
            ],
            [
                'kdPropinsi' => 33,
                'kdWilayah' => 33,
                'nmWilayah' => "Pekanbaru",
            ],
            [
                'kdPropinsi' => 34,
                'kdWilayah' => 34,
                'nmWilayah' => "Ambon",
            ],
            [
                'kdPropinsi' => 35,
                'kdWilayah' => 35,
                'nmWilayah' => "Denpasar",
            ],
        ];

        foreach ($wilayah as $key => $value) {
            Wilayah::create($value);
        }
    }
}
