<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Propinsi;

class PropinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $propinsi = [
            [
                'kdPropinsi' => 31,
                'nmPropinsi' => "Sumatera Selatan"
            ],
            [
                'kdPropinsi' => 33,
                'nmPropinsi' => "Riau"
            ],
            [
                'kdPropinsi' => 34,
                'nmPropinsi' => "Maluku"
            ],
            [
                'kdPropinsi' => 35,
                'nmPropinsi' => "Bali"
            ],
        ];
        foreach ($propinsi as $key => $value) {
            Propinsi::create($value);
        }
    }
}
