<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\FormIsianKategori;

class FormIsianKategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $kategoriCCTV = ['SAMSUNG-SND-5083R'];
        $kategoriCLEANING = ['RUANG-NOC', 'RUANG-MEET-ME', 'RUANG-NETWORK', 'RUANG-SERVER', 'RUANG-POWER', 'RUANG-FIRE-SYSTEM', 'KORIDOR-DC', 'RUANG-PANEL-GF', 'RUANG-GENSET'];
        // $kategoriFCT = ['ACCESS-DOOR', 'FSS', 'PC-NOC', 'GENSET', 'PAC', 'UPS', 'UPS-APC', 'SIRINE-&-SENSOR', 'NOC', 'SERVICE-KORIDOR', 'POWER-ROOM', 'SERVER-ROOM', 'NETWORK-ROOM', 'MEET-ME-ROOM'];
        $kategoriFCT = ['KORIDOR-DC', 'R.FIRE-SYSTEM', 'R.GENSET-GEDUNG-C', 'R.MEET-ME', 'R.NETWORK', 'R.NOC', 'R.POWER', 'R.SERVER'];

        foreach($kategoriCCTV as $item => $val) {
            $insert = FormIsianKategori::create([
                'uuid' => generateUuid(),
                'kode' => $val,
                'form_jenis' => env('FORM_CCTV')
            ]);
        }

        foreach($kategoriCLEANING as $item => $val) {
            $insert = FormIsianKategori::create([
                'uuid' => generateUuid(),
                'kode' => $val,
                'form_jenis' => env('FORM_CLEANING')
            ]);
        }
        
        foreach($kategoriFCT as $item => $val) {
            $insert = FormIsianKategori::create([
                'uuid' => generateUuid(),
                'kode' => $val,
                'form_jenis' => env('FORM_FACILITIES')
            ]);
        }

    }
}
