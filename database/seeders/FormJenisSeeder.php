<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\FormJenis;

class FormJenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $form_cctv = FormJenis::create([
            'kode' => env('FORM_CCTV'),
            'nama' => 'CCTV',
            'uuid' => generateUuid(),
        ]);

        $form_cleaning = FormJenis::create([
            'kode' => env('FORM_CLEANING'),
            'nama' => 'Cleaning',
            'uuid' => generateUuid(),
        ]);

        $form_facilities = FormJenis::create([
            'kode' => env('FORM_FACILITIES'),
            'nama' => 'Facilities',
            'uuid' => generateUuid(),
        ]);

    }
}
