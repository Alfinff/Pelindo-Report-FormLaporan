<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\FormJenis;
use App\Models\FormIsian;
use App\Models\FormIsianKategori;
use App\Models\FormPilihan;

class FormIsianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jumlahIsian = 10;
        $jenisForm = FormJenis::all();
        $isianKategori = FormIsianKategori::all();
        $kategori = [];
        foreach($isianKategori as $item) {
            array_push($kategori, $item->kode);
        }

        $pilihanCCTV = ['OK', 'NOT OK', 'NOT APPUCABLE'];
        $pilihanCLEANING = ['OK', 'NOT OK', 'NOT APPUCABLE'];
        $pilihanFCT = ['OK', 'NOT OK', 'NOT APPUCABLE', 'SMOKE PHOTOELECTRIC', 'SMOKE IONIZATION'];

        foreach ($jenisForm as $item) {

            for ($i = 1; $i <= $jumlahIsian; $i++) {
                $randomKategori = array_rand($kategori);
                
                $isian = FormIsian::create([
                    'uuid'       => generateUuid(),
                    'judul'      => 'Form Isian '.ucwords($item->kode).' Ke '.$i,
                    'form_jenis' => $item->kode,
                    'kategori'   => $kategori[$randomKategori],
                    'status'     => 1,
                ]);

                if($item->kode == env('FORM_CCTV')) {
                    foreach ($pilihanCCTV as $id => $val) {
                        FormPilihan::create([
                            'uuid'    => generateUuid(),
                            'pilihan' => $val,
                            'isian_id' => $isian->uuid,
                        ]);
                    }
                }

                if($item->kode == env('FORM_CLEANING')) {
                    foreach ($pilihanCLEANING as $id => $val) {
                        FormPilihan::create([
                            'uuid'    => generateUuid(),
                            'pilihan' => $val,
                            'isian_id' => $isian->uuid,
                        ]);
                    }
                }

                if($item->kode == env('FORM_FACILITIES')) {
                    foreach ($pilihanFCT as $id => $val) {
                        FormPilihan::create([
                            'uuid'    => generateUuid(),
                            'pilihan' => $val,
                            'isian_id' => $isian->uuid,
                        ]);
                    }
                }

            }
            
        }

    }
}
