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

        $pilihanCCTV = ['OK', 'NOT OK', 'NOT APPLICABLE'];
        $pilihanCLEANING = ['OK', 'NOT OK', 'NOT APPLICABLE'];
        $pilihanFCT = ['OK', 'NOT OK', 'NOT APPLICABLE', 'SMOKE PHOTOELECTRIC', 'SMOKE IONIZATION'];
        $pilihanDROPDOWN_WARNA = ['HIJAU (penuh)', 'MERAH (kosong)'];
        $pilihanDROPDOWN_KONDISI = ['NORMAL', 'CRITICAL'];

        $FormCCTV = [
            'CCTV-DATA-CENTER' => [
                'tipe' => 'DROPDOWN',
                'data' => [
                    'CCTV DC R. Server Caging 1 Depan (SAMSUNG SND-5083R)', 'CCTV DC R. Server Caging 1 Pojok (SAMSUNG SND-5083R)', 'CCTV DC R. Server Caging 2 Depan (SAMSUNG SND-5083R)', 'CCTV DC R. Server Caging 2 Pojok (SAMSUNG SND-5083R)', 'CCTV DC R. Network 1 (SAMSUNG SND-5083R)', 'CCTV DC R. Network 2 (SAMSUNG SND-5083R)', 'CCTV DC Ruang Meet Me (SAMSUNG SND-5083R)', 'CCTV DC Pintu Masuk DC (SAMSUNG SND-5083R)', 'CCTV DC Pintu Keluar DC Tangga Darurat (SAMSUNG SND-5083R)', 'CCTV DC R. UPS 1 (SAMSUNG SND-5083R)', 'CCTV DC R. UPS 2 (SAMSUNG SND-5083R)', 'CCTV DC R. Tabung Gas FM (SAMSUNG SND-5083R)', 'CCTV DC Ruang NOC (SAMSUNG SND-5083R)', 'CCTV DC Ruang NOC (SAMSUNG SND-5083R)', 'CCTV DC R. Staging (SAMSUNG SND-5083R)', 'CCTV DC Pintu Masuk R. Lt.2 (SAMSUNG SND-5083R)', 'CCTV DC Ruang Staf Lt.2 (SAMSUNG SND-5083R)', 'CCTV DC R. Genset Ground (SAMSUNG SND-5083R)', 'CCTV DC R. Genset Pintu Masuk (SAMSUNG SND-5083R)', 'CCTV DC R. Box Panel Ground (SAMSUNG SND-5083R)', 'CCTV DC Roof Top Gedung C 1 (SAMSUNG SND-5083R)'
                ]
            ]
        ];
        $formCLEANING = [
            'RUANG-NOC' => [
                'tipe' => 'DROPDOWN',
                'data' => ['KEBERSIHAN LANTAI', 'KEBERSIHAN MEJA', 'KEBERSIHAN PC']
            ],
            'RUANG-MEET-ME' => [
                'tipe' => 'DROPDOWN',
                'data' => ['RACK Y1', 'RACK Y2', 'RACK Z1', 'RACK Z2', 'KEBERSIHAN LANTAI', 'KEBERSIHAN CAGE']
            ], 
            'RUANG-NETWORK' => [
                'tipe' => 'DROPDOWN',
                'data' => ['RACK A', 'RACK C1', 'RACK C2', 'RACK C3', 'RACK B', 'RACK D1', 'RACK D2', 'RACK D3', 'KEBERSIHAN LANTAI', 'KEBERSIHAN CAGE']
            ], 
            'RUANG-SERVER' => [
                'tipe' => 'DROPDOWN',
                'data' => ['RACK E1', 'RACK E2', 'RACK E3', 'RACK E4', 'RACK E5', 'RACK E6', 'RACK E7', 'RACK F1', 'RACK F2', 'RACK F3', 'RACK F4', 'RACK F5', 'RACK F6', 'RACK F7', 'RACK G1', 'RACK G2', 'RACK G3', 'RACK G4', 'RACK G5', 'RACK G6', 'RACK H1', 'RACK H2', 'RACK H3', 'RACK H4', 'KEBERSIHAN LANTAI', 'KEBERSIHAN CAGE']
            ], 
            'RUANG-POWER' => [
                'tipe' => 'DROPDOWN',
                'data' => ['RACK UPS 01', 'RACK UPS 02', 'RACK UPS APC', 'TRANSFORMER + PANEL', 'PAC 04', 'PAC 05', 'KEBERSIHAN LANTAI']
            ], 
            'RUANG-FIRE-SYSTEM' => [
                'tipe' => 'DROPDOWN',
                'data' => ['TABUNG FSS', 'KEBERSIHAN LANTAI']
            ], 
            'KORIDOR-DC' => [
                'tipe' => 'DROPDOWN',
                'data' => ['PAC 01', 'PAC 02', 'KEBERSIHAN LANTAI + PANEL']
            ], 
            'RUANG-PANEL-GF' => [
                'tipe' => 'DROPDOWN',
                'data' => ['KEBERSIHAN LANTAI + PANEL']
            ], 
            'RUANG-GENSET' => [
                'tipe' => 'DROPDOWN',
                'data' => ['KEBERSIHAN LANTAI']
            ]
        ];
        $formFACILITIES = [
            'ACCESS-DOOR' => [
                'tipe' => 'DROPDOWN',
                'data' => ['NOC1', 'NOC2', 'KELUAR DC1', 'MEET ME', 'NETWORK', 'SERVER 01', 'SERVER 02', 'POWER ROOM', 'KELUAR 2']
            ], 
            'FSS' => [
                'tipe' => 'DROPDOWN_WARNA',
                'data' => ['TABUNG 1', 'TABUNG 2', 'TABUNG 3']
            ], 
            'PC-NOC' => [
                'tipe' => 'DROPDOWN',
                'data' => ['PC SERVER CCTV', 'PC EMS', 'PC ACCESS DOOR']
            ], 
            'GENSET' => [
                'tipe' => 'DROPDOWN',
                'data' => ['GENSET GEDUNG C']
            ], 
            'PAC' => [
                'tipe' => 'ISIAN',
                'data' => ['Pac 1 Temperature (℃)', 'Pac 1 humidity (RH%)', 'Pac 2 Temperature (℃)', 'Pac 2 humidity (RH%)', 'Pac 3 Temperature (℃)', 'Pac 3 humidity (RH%)', 'Pac 4 Temperature (℃)', 'Pac 4 humidity (RH%)', 'Pac 5 Temperature (℃)', 'Pac 5 humidity (RH%)']
            ], 
            'UPS' => [
                'tipe' => 'ISIAN',
                'data' => ['UPS 1 Voltage (Vac)', 'UPS 1 Ampere (A)', 'Load Level (%)', 'UPS 2 Voltage (Vac)', 'UPS 2 Ampere (A)', 'Load Level (%)']
            ], 
            'UPS-APC' => [
                'tipe' => 'DROPDOWN',
                'data' => ['Vout (Vac)', 'Iout (A)', 'Runtime (min)']
            ], 
            'SIRINE-&-SENSOR' => [
                'tipe' => 'DROPDOWN_KONDISI',
                'data' => ['SIRINE Pintu NOC 1', 'SIRINE Pintu Keluar DC 1', 'SIRINE Pintu Emergency 1', 'SIRINE Power Room']
            ],
            'NOC' => [
                'tipe' => 'DROPDOWN_KONDISI',
                'data' => ['SMOKE PHOTOELECTRIC (SP) 011 UP', 'SMOKE IONIZATION (SI)  010 UP', 'SMOKE PHOTOELECTRIC (SP) 021 Down', 'SMOKE IONIZATION (SI) 022 Down']
            ], 
            'SERVICE-KORIDOR' => [
                'tipe' => 'DROPDOWN_KONDISI',
                'data' => ['SMOKE IONIZATION (SI) 009 UP', 'SMOKE PHOTOELECTRIC (SP) 008 UP', 'SMOKE IONIZATION (SI) 007 UP', 'SMOKE PHOTOELECTRIC (SP) 020 Down', 'SMOKE IONIZATION (SI) 019  Down', 'SMOKE PHOTOELECTRIC SP) 018 Down']
            ],
            'POWER-ROOM' => [
                'tipe' => 'DROPDOWN_KONDISI',
                'data' => ['SMOKE PHOTOELECTRIC SP) 039 UP', 'SMOKE IONIZATION (SI)  038 UP', 'SMOKE PHOTOELECTRIC (SP) 040 Down', 'SMOKE IONIZATION (SI) 041  Down']
            ],
            'SERVER-ROOM' => [
                'tipe' => 'DROPDOWN_KONDISI',
                'data' => ['SMOKE PHOTOELECTRIC (SP) 004 UP', 'SMOKE IONIZATION (SI) 001  UP', 'SMOKE PHOTOELECTRIC SP) 002 UP', 'SMOKE IONIZATION (SI) 005  UP', 'SMOKE PHOTOELECTRIC (SP) 012 Down', 'SMOKE IONIZATION (SI) 015  Down', 'SMOKE PHOTOELECTRIC (SP) 016 Down', 'SMOKE IONIZATION (SI) 013  Down', 'WATER DETECTOR 1', 'WATER DETECTOR 2', 'WATER DETECTOR 3', 'WATER DETECTOR 4']
            ],
            'NETWORK-ROOM' => [
                'tipe' => 'DROPDOWN_KONDISI',
                'data' => ['SMOKE IONIZATION (SI) 003 UP', 'SMOKE PHOTOELECTRIC SP) 014 Down', 'WATER DETECTOR 7']
            ],
            'MEET-ME-ROOM' => [
                'tipe' => 'DROPDOWN_KONDISI',
                'data' => ['SMOKE PHOTOELECTRIC (SP) 006 UP', 'SMOKE IONIZATION (SI) 017 Down', 'WATER DETECTOR 5', 'WATER DETECTOR 6']
            ]
        ];

        foreach ($jenisForm as $item) {

            if($item->kode == env('FORM_CCTV')) {
                foreach ($FormCCTV as $dd => $valForm) {
                    foreach ($valForm['data'] as $aa => $judul) {
                        $isian = FormIsian::create([
                            'uuid'       => generateUuid(),
                            'judul'      => $judul,
                            'form_jenis' => $item->kode,
                            'kategori'   => $dd,
                            'tipe'       => $valForm['tipe'],
                            'status'     => 1,
                        ]);

                        foreach ($pilihanCCTV as $id => $val) {
                            FormPilihan::create([
                                'uuid'    => generateUuid(),
                                'pilihan' => $val,
                                'isian_id' => $isian->uuid,
                            ]);
                        }
                    }
                }
            }

            if($item->kode == env('FORM_CLEANING')) {
                foreach ($formCLEANING as $dd => $valForm) {
                    foreach ($valForm['data'] as $aa => $judul) {
                        $isian = FormIsian::create([
                            'uuid'       => generateUuid(),
                            'judul'      => $judul,
                            'form_jenis' => $item->kode,
                            'kategori'   => $dd,
                            'tipe'       => $valForm['tipe'],
                            'status'     => 1,
                        ]);

                        foreach ($pilihanCLEANING as $id => $val) {
                            FormPilihan::create([
                                'uuid'    => generateUuid(),
                                'pilihan' => $val,
                                'isian_id' => $isian->uuid,
                            ]);
                        }
                    }
                }
            }

            if($item->kode == env('FORM_FACILITIES')) {
                foreach ($formFACILITIES as $dd => $valForm) {
                    foreach ($valForm['data'] as $aa => $judul) {
                        $isian = FormIsian::create([
                            'uuid'       => generateUuid(),
                            'judul'      => $judul,
                            'form_jenis' => $item->kode,
                            'kategori'   => $dd,
                            'tipe'       => $valForm['tipe'],
                            'status'     => 1,
                        ]);

                        if($valForm['tipe'] == 'DROPDOWN') {
                            foreach ($pilihanFCT as $id => $val) {
                                FormPilihan::create([
                                    'uuid'    => generateUuid(),
                                    'pilihan' => $val,
                                    'isian_id' => $isian->uuid,
                                ]);
                            }
                        } else if($valForm['tipe'] == 'DROPDOWN_WARNA') {
                            foreach ($pilihanDROPDOWN_WARNA as $id => $val) {
                                FormPilihan::create([
                                    'uuid'    => generateUuid(),
                                    'pilihan' => $val,
                                    'isian_id' => $isian->uuid,
                                ]);
                            }
                        } else  if($valForm['tipe'] == 'DROPDOWN_KONDISI') {
                            foreach ($pilihanDROPDOWN_KONDISI as $id => $val) {
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

    }
}
