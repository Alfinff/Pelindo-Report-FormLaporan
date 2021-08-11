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
        
        $kategoriCCTV = ['CCTV-DATA-CENTER'];
        $kategoriCLEANING = ['RUANG-NOC', 'RUANG-MEET-ME', 'RUANG-NETWORK', 'RUANG-POWER', 'RUANG-FIRE-SYSTEM', 'KORIDOR-DC', 'RUANG-PANEL-GF', 'RUANG-GENSET'];
        $kategoriFCT = ['ACCESS-DOOR', 'FSS', 'PC-NOC', 'GENSET', 'PAC', 'UPS', 'UPS-APC', 'SIRINE-&-SENSOR', 'NOC', 'SERVICE-KORIDOR', 'POWER-ROOM', 'SERVER-ROOM', 'NETWORK-ROOM', 'MEET-ME-ROOM'];

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
