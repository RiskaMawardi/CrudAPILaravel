<?php

namespace Database\Seeders;

use App\Models\Penduduk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PendudukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $penduduk = [
            [
                'nik' => 3201348703020004 ,
                'nama' => "Rose",
                'tmplahir' => "Korea",
                'tgllahir' => Carbon::create(2001,3,17),
                'jeniskel' => "P",
                'darah' =>"C",
                'alamat' =>"Kp.Cibandawa Rt.04 Rw.07 Ds.Ciburuy Kec.Cigombong Kab.Bogor",
                'rt' =>4,
                'rw' =>7,
                'desa' =>"Ciburuy",
                'camat' =>"Cigombong",
                'propinsi' =>"Jawa Barat",
                'agama'=>"Islam",
                'stanikah' =>"O",
                'pekerjaan' =>"Penyanyi",
                'wrgnegara' =>"WNI",
                'tglBerlaku'=>Carbon::tomorrow()

            ],
        ];

        foreach ($penduduk as $key => $value) {
            Penduduk::create($value);
        }
    }
}
