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
        $pilihanFCTTanpaSMOKE = ['OK', 'NOT OK', 'NOT APPLICABLE'];
        $pilihanFCTDROPDOWN_WARNA = ['HIJAU (penuh)', 'MERAH (kosong)'];
        $pilihanFCTDROPDOWN_KONDISI = ['NORMAL', 'CRITICAL'];
        $pilihanFCTDROPDOWN_KONDISI_SMOKE = ['NORMAL', 'NOT OK'];
        $pilihanFCTDROPDOWN_SIRINE = ['STANDBY', 'ALARM'];
        $PAC = ['RUNNING', 'STANDBY'];
        $ISIAN = [];

        $FormCCTV = [
            'SAMSUNG-SND-5083R' => [
                'tipe' => 'DROPDOWN',
                'data' => [
                    [
                        'uuid' => '8a270f08-091c-44eb-a14d-35202005170b',
                        'keterangan' => 'R. Server Caging 1 Depan',
                    ],
                    [
                        'uuid' => 'e171dfea-66bf-4b88-9ba8-efdc9c8cea61',
                        'keterangan' => 'R. Server Caging 1 Pojok',
                    ],
                    [
                        'uuid' => '4686e801-cc33-4af5-ab1c-85e688c1f2df',
                        'keterangan' => 'R. Server Caging 2 Depan',
                    ],
                    [
                        'uuid' => '949b17fa-8ee2-459a-a8f7-8334b6d2528e',
                        'keterangan' => 'R. Server Caging 2 Pojok',
                    ],
                    [
                        'uuid' => '2bff7b39-47e6-40f5-9969-b142a2bd5c6e',
                        'keterangan' => 'R. Network 1',
                    ],
                    [
                        'uuid' => '372f4552-de0a-46c6-97e1-c55d2c9da42a',
                        'keterangan' => 'R. Network 2',
                    ],
                    [
                        'uuid' => '96727dd2-1be3-4cad-8d31-687e036e6fc9',
                        'keterangan' => 'Ruang Meet Me',
                    ],
                    [
                        'uuid' => '950e227d-5777-41e0-bf67-494f2dd27273',
                        'keterangan' => 'Pintu Masuk DC',
                    ],
                    [
                        'uuid' => '268b4085-9cb2-48b6-acb9-c3f50c814326',
                        'keterangan' => 'Pintu Keluar DC Tangga Darurat',
                    ],
                    [
                        'uuid' => 'bd8e61c8-57ed-4b3e-9c6a-262851627bbe',
                        'keterangan' => 'R. UPS 1',
                    ],
                    [
                        'uuid' => 'dd04d323-46e0-4f17-a6c9-c209f7566f20',
                        'keterangan' => 'R. UPS 2',
                    ],
                    [
                        'uuid' => '3e3280f7-3181-486e-9cbf-2dfaddb6f787',
                        'keterangan' => 'R. Tabung Gas FM',
                    ],
                    [
                        'uuid' => '77bb02cf-8358-4d88-a3ef-acd497e4ee80',
                        'keterangan' => 'Ruang NOC',
                    ],
                    [
                        'uuid' => 'cdcbdd9f-3b93-418e-8774-22319da8ad13',
                        'keterangan' => 'R. Staging',
                    ],
                    [
                        'uuid' => 'eabf2a04-8b49-4fc6-81ab-45187a18dc95',
                        'keterangan' => 'Pintu Masuk R. Lt.2',
                    ],
                    [
                        'uuid' => 'ac565b5a-32d7-4fee-af67-07eb10f2f893',
                        'keterangan' => 'Ruang Staf Lt.2',
                    ],
                    [
                        'uuid' => '8c71e831-2605-462c-98e4-85de9af2f337',
                        'keterangan' => 'R. Genset Ground',
                    ],
                    [
                        'uuid' => '4c2386c1-d747-47b1-9d11-13ee48abacd1',
                        'keterangan' => 'R. Genset Pintu Masuk',
                    ],
                    [
                        'uuid' => '55431522-08f7-4702-a776-15e8afee7cf2',
                        'keterangan' => 'R. Box Panel Ground',
                    ],
                    [
                        'uuid' => 'a2a36e98-ba61-420a-a240-b6387901228b',
                        'keterangan' => 'Roof Top Gedung C 1',
                    ],
                ]
            ]
        ];

        $formCLEANING = [
            'RUANG-NOC' => [
                'tipe' => 'DROPDOWN',
                'data' => [
                    [
                        'uuid' => '0575092a-bd7d-46ae-abcc-e9841ded227d',
                        'keterangan' => 'KEBERSIHAN LANTAI',
                    ],
                    [
                        'uuid' => '1bf6f2e0-0750-4fc0-9746-609e320305d5',
                        'keterangan' => 'KEBERSIHAN MEJA',
                    ],
                    [
                        'uuid' => '7ec04af0-9239-463e-a712-64ed0074b452',
                        'keterangan' => 'KEBERSIHAN PC',
                    ],
                    [
                        'uuid' => '2860d2fb-5b54-4414-8ca3-e9052b850f60',
                        'keterangan' => 'KEBERSIHAN MONITOR TV',
                    ],
                ]
            ],
            'RUANG-MEET-ME' => [
                'tipe' => 'DROPDOWN',
                'data' => [
                    [
                        'uuid' => '06811863-feef-462b-8887-c4880e8eda28',
                        'keterangan' => 'RACK Y1',
                    ],
                    [
                        'uuid' => '44ef2330-d3ff-4cb7-a550-1b6a0909e825',
                        'keterangan' => 'RACK Y2',
                    ],
                    [
                        'uuid' => 'c23df765-f292-49f6-b409-25eb01dc89c9',
                        'keterangan' => 'RACK Z1',
                    ],
                    [
                        'uuid' => '3089b6eb-af56-49d5-b634-3c7c0d9383e4',
                        'keterangan' => 'RACK Z2',
                    ],
                    [
                        'uuid' => '7def33a8-c825-440c-bea3-63815ee120bd',
                        'keterangan' => 'KEBERSIHAN LANTAI',
                    ],
                    [
                        'uuid' => '8fe48b98-9461-407a-9021-5805409a1e60',
                        'keterangan' => 'KEBERSIHAN CAGE',
                    ],
                ]
            ], 
            'RUANG-NETWORK' => [
                'tipe' => 'DROPDOWN',
                'data' => [
                    [
                        'uuid' => 'efc65d21-ec36-4632-be0a-ed3f378cb486',
                        'keterangan' => 'RACK A'
                    ],
                    [
                        'uuid' => 'c6eb7427-2dc2-4c4d-bc73-2782f6313afd',
                        'keterangan' => 'RACK C1'
                    ],
                    [
                        'uuid' => '585b1b4b-daec-47bc-a1a3-9ae2b3c5594e',
                        'keterangan' => 'RACK C2'
                    ],
                    [
                        'uuid' => 'a35e4250-2a7f-4505-aafe-178c606616cc',
                        'keterangan' => 'RACK C3'
                    ],
                    [
                        'uuid' => '1751e5cf-f2b4-4cdf-89aa-086ff8ec1ec4',
                        'keterangan' => 'RACK B'
                    ],
                    [
                        'uuid' => 'a826fa04-0b3c-40a0-82eb-4986d903556f',
                        'keterangan' => 'RACK D1'
                    ],
                    [
                        'uuid' => '20f36f79-306f-407f-bb56-5016ae343eae',
                        'keterangan' => 'RACK D2'
                    ],
                    [
                        'uuid' => '28dfb20f-74e2-42be-9e47-ef898975c0d2',
                        'keterangan' => 'RACK D3'
                    ],
                    [
                        'uuid' => 'b10a9b47-fcf7-4d48-bd6e-ac0d4c277911',
                        'keterangan' => 'KEBERSIHAN LANTAI'
                    ],
                    [
                        'uuid' => '9fa96d46-41bd-4f66-bad6-2f7c4fc330b4',
                        'keterangan' => 'KEBERSIHAN CAGE'
                    ],
                ]
            ], 
            'RUANG-SERVER' => [
                'tipe' => 'DROPDOWN',
                'data' => [
                    [
                        'uuid' => '5462526d-d9d2-41f4-8f3b-2c0f700868b0',
                        'keterangan' => 'RACK E1',
                    ],
                    [
                        'uuid' => 'c7f3191f-bb99-4957-851d-4a26ad79f8a8',
                        'keterangan' => 'RACK E2',
                    ],
                    [
                        'uuid' => 'd6bf46d7-8bc7-4ef9-b225-71945cc3674a',
                        'keterangan' => 'RACK E3',
                    ],
                    [
                        'uuid' => '1a10c1e4-426a-47de-a2b3-d237d01d2358',
                        'keterangan' => 'RACK E4',
                    ],
                    [
                        'uuid' => '13ab6012-29b1-4ae2-801a-5dc5ed66fd3b',
                        'keterangan' => 'RACK E5',
                    ],
                    [
                        'uuid' => 'ebeee8bf-f86e-4e76-b292-78d364e1891c',
                        'keterangan' => 'RACK E6',
                    ],
                    [
                        'uuid' => 'af53c4f5-752c-4f36-89a2-bd0c1c08aff5',
                        'keterangan' => 'RACK E7',
                    ],
                    [
                        'uuid' => '6ad9a4cb-0374-49e4-8618-e66ce2e370ba',
                        'keterangan' => 'RACK F1',
                    ],
                    [
                        'uuid' => '3d016c72-fec7-42c5-84cf-557124dcd4f4',
                        'keterangan' => 'RACK F2',
                    ],
                    [
                        'uuid' => '19ff4d90-ac4e-4353-9c21-391a42009c3a',
                        'keterangan' => 'RACK F3',
                    ],
                    [
                        'uuid' => '4c210bc2-b80c-43aa-996b-90060677e7ee',
                        'keterangan' => 'RACK F4',
                    ],
                    [
                        'uuid' => '0a150aaa-261f-4a19-8092-8dac390f9171',
                        'keterangan' => 'RACK F5',
                    ],
                    [
                        'uuid' => '1c4e9836-e7ac-4ad9-9360-460a7f17cafc',
                        'keterangan' => 'RACK F6',
                    ],
                    [
                        'uuid' => '63cafd00-74f3-4b4e-9989-c61a26bdbe27',
                        'keterangan' => 'RACK F7',
                    ],
                    [
                        'uuid' => 'fa64acf3-c660-4c9c-828b-3491cfc39180',
                        'keterangan' => 'RACK G1',
                    ],
                    [
                        'uuid' => 'b5b706aa-2e46-4e7f-9759-ac83b966d50f',
                        'keterangan' => 'RACK G2',
                    ],
                    [
                        'uuid' => '8ef8b856-93ea-42e9-80b9-934ce9df52a6',
                        'keterangan' => 'RACK G3',
                    ],
                    [
                        'uuid' => '3d717fe5-1d21-4b4b-b4d7-80b555faf1b1',
                        'keterangan' => 'RACK G4',
                    ],
                    [
                        'uuid' => 'b02a8454-7765-4a36-8fd0-9bb2a1f321f3',
                        'keterangan' => 'RACK G5',
                    ],
                    [
                        'uuid' => '67e2bb6a-4629-4863-b643-5a9d0242d924',
                        'keterangan' => 'RACK G6',
                    ],
                    [
                        'uuid' => '21774cec-ad3a-46df-99dd-86d246b7cdc5',
                        'keterangan' => 'RACK G7',
                    ],
                    [
                        'uuid' => 'f816b367-1e73-4082-874a-64ed14b33dfd',
                        'keterangan' => 'RACK H1',
                    ],
                    [
                        'uuid' => 'e31c9496-be98-4779-9820-a325ee012992',
                        'keterangan' => 'RACK H2',
                    ],
                    [
                        'uuid' => '2abdd9fd-dd64-4689-8fc8-5c8292ffc4b2',
                        'keterangan' => 'RACK H3',
                    ],
                    [
                        'uuid' => 'daff6e94-bd5e-4585-9a83-299fdfb6de7f',
                        'keterangan' => 'RACK H4',
                    ],
                    [
                        'uuid' => '1ec2691b-4ea7-478d-8254-225f28e50e35',
                        'keterangan' => 'RACK H5',
                    ],
                    [
                        'uuid' => '271424b6-f25a-4a9d-afc4-ca2949f986a3',
                        'keterangan' => 'RACK H6',
                    ],
                    [
                        'uuid' => '1cc5e890-da2d-43a0-a351-7c63cefb9a6b',
                        'keterangan' => 'RACK H7',
                    ],
                    [
                        'uuid' => 'fa843e4a-e812-4e13-8ece-88dd4ecde34b',
                        'keterangan' => 'KEBERSIHAN LANTAI',
                    ],
                    [
                        'uuid' => 'd3f425dd-ee00-4d5d-ae09-c7a21cdd9d2d',
                        'keterangan' => 'KEBERSIHAN CAGE',
                    ],
                ]
            ], 
            'RUANG-POWER' => [
                'tipe' => 'DROPDOWN',
                'data' => [
                    [
                        'uuid' => '0485fcd9-b882-4811-90c7-c5ba291cad81',
                        'keterangan' => 'RACK UPS 01',
                    ],
                    [
                        'uuid' => '8803b5d2-d5fe-423a-8d49-ec4e1e2cd7d1',
                        'keterangan' => 'RACK UPS 02',
                    ],
                    [
                        'uuid' => '2d8650d4-3a74-4475-8fb4-939ef9ee8dab',
                        'keterangan' => 'RACK UPS APC',
                    ],
                    [
                        'uuid' => '66b3d1f2-298f-4a3b-89e4-a4c5b6819cd5',
                        'keterangan' => 'PAC 04',
                    ],
                    [
                        'uuid' => 'cdb74364-3bf9-483a-933b-30f5fdede31b',
                        'keterangan' => 'PAC 05',
                    ],
                    [
                        'uuid' => 'a3e33bfe-f9bb-4be7-8a76-693c3c8ad735',
                        'keterangan' => 'KEBERSIHAN LANTAI',
                    ],
                    [
                        'uuid' => '32397b5b-c59c-4e12-b8e4-fa3bbd583b41',
                        'keterangan' => 'KEBERSIHAN TRANSFORMER',
                    ],
                    [
                        'uuid' => '61d5e973-3411-4f23-8044-7be6ca9572b4',
                        'keterangan' => 'KEBERSIHAN PANEL',
                    ],
                ]
            ], 
            'RUANG-FIRE-SYSTEM' => [
                'tipe' => 'DROPDOWN',
                'data' => [
                    [
                        'uuid' => '6c83b4ad-aeef-47fe-b751-cf5b4f58bbad',
                        'keterangan' => 'TABUNG FSS',
                    ],
                    [
                        'uuid' => '19e8a6b2-9a4e-4db9-a1b9-99e99861d4f7',
                        'keterangan' => 'KEBERSIHAN LANTAI',
                    ],
                ]
            ], 
            'KORIDOR-DC' => [
                'tipe' => 'DROPDOWN',
                'data' => [
                    [
                        'uuid' => '44fae097-cad4-4d99-93b7-bac27a45d0e3',
                        'keterangan' => 'PAC 01',
                    ],
                    [
                        'uuid' => '29f032c0-3efb-4861-9e23-7f5776f52585',
                        'keterangan' => 'PAC 02',
                    ],
                    [
                        'uuid' => '99574054-f3da-4218-97e3-397263ba2fdc',
                        'keterangan' => 'PAC 03',
                    ],
                    [
                        'uuid' => '86fbd4d5-0f41-4d02-9dc7-31f56cbb9698',
                        'keterangan' => 'KEBERSIHAN LANTAI',
                    ],
                    [
                        'uuid' => '75825a4b-f356-46dc-9940-673dd1907985',
                        'keterangan' => 'KEBERSIHAN PANEL',
                    ],
                ]
            ], 
            'RUANG-PANEL-GF' => [
                'tipe' => 'DROPDOWN',
                'data' => [
                    [
                        'uuid' => '35c6c903-3187-4443-a177-f3108eaddb12',
                        'keterangan' => 'KEBERSIHAN LANTAI',
                    ],
                    [
                        'uuid' => '6032a6d7-ad52-40c0-9ec5-e24d13e864ac',
                        'keterangan' => 'KEBERSIHAN PANEL',
                    ],
                ]
            ], 
            'RUANG-GENSET' => [
                'tipe' => 'DROPDOWN',
                'data' => [
                    [
                        'uuid' => '5c82c5a0-245b-4d70-95e9-664052ee59df',
                        'keterangan' => 'KEBERSIHAN LANTAI',
                    ],
                ]
            ]
        ];

        $formFACILITIES = [
            'KORIDOR-DC' => [
                'data' => [
                    [
                        'uuid' => '1d7b7d40-6a7b-4d5d-be64-acf28393a3a5',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'ACCESS DOOR KELUAR DC1',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                    [
                        'uuid' => '7dd11149-0ef6-4191-be66-7996d73699c3',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'ACCESS DOOR KELUAR 2',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                    [
                        'uuid' => '1731c162-9133-4787-bd63-8416165e9474',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PAC 1 HUM (RH%)',
                        'jawaban' => $PAC,
                    ],
                    [
                        'uuid' => '1cf26477-aaa2-4875-8c2f-5cb4dc48ca63',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PAC 1 TEMP (℃)',
                        'jawaban' => $PAC,
                    ],
                    [
                        'uuid' => '6935dc26-b764-45a5-922c-f0e046c4de06',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PAC 2 HUM (RH%)',
                        'jawaban' => $PAC,
                    ],
                    [
                        'uuid' => 'cde895fb-e637-41ce-a274-1418d03557f6',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PAC 2 TEMP (℃)',
                        'jawaban' => $PAC,
                    ],
                    [
                        'uuid' => 'ed6f3d80-2a8e-4ebf-bc4e-721176d7cb60',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PAC 3 HUM (RH%)',
                        'jawaban' => $PAC,
                    ],
                    [
                        'uuid' => '0bc7fb76-d070-46cc-a82f-a4a3fb32e34e',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PAC 3 TEMP (℃)',
                        'jawaban' => $PAC,
                    ],
                    [
                        'uuid' => '8d009721-cbd4-40c1-8900-d88dfcf7a22d',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'SIRINE & SENSOR PINTU KELUAR DC 1',
                        'jawaban' => $pilihanFCTDROPDOWN_SIRINE,
                    ],
                    [
                        'uuid' => '5866f772-901b-4265-8b1e-a26fa4f83596',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 007 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '8bcb190e-9617-4adf-8756-cb5aa5f735d6',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 009 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '03c24865-783a-48be-ae23-785c183605e4',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 019 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '204c267c-45ed-4db4-a88f-41d670eeccf4',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 008 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '27b88bea-2a7b-4718-8901-58b0bf2f7b03',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 018 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '8d90fdb0-1695-4ccf-9a51-8c8b2a254a0b',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 020 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                ],
            ],
            'R.FIRE-SYSTEM' => [
                'data' => [
                    [
                        'uuid' => 'fa3fd88d-f255-4f62-aa54-e056b5afc0d7',
                        'tipe' => 'DROPDOWN_WARNA', 
                        'keterangan' => 'TABUNG 1 FSS',
                        'jawaban' => $pilihanFCTDROPDOWN_WARNA,
                    ],
                    [
                        'uuid' => 'a8dc7674-74a5-4f16-ae2a-423caa90eccb',
                        'tipe' => 'DROPDOWN_WARNA', 
                        'keterangan' => 'TABUNG 2 FSS',
                        'jawaban' => $pilihanFCTDROPDOWN_WARNA,
                    ],
                    [
                        'uuid' => '0f89edd2-2864-45b9-b7fa-1862e9c307d9',
                        'tipe' => 'DROPDOWN_WARNA', 
                        'keterangan' => 'TABUNG 3 FSS',
                        'jawaban' => $pilihanFCTDROPDOWN_WARNA,
                    ],
                    [
                        'uuid' => 'e68f10a7-cdd5-49b3-ae14-fdbddae89839',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'SIRINE & SENSOR PINTU EMERGENCY 1',
                        'jawaban' => $pilihanFCTDROPDOWN_SIRINE,
                    ],
                ],
            ],
            'R.GENSET-GEDUNG-C' => [
                'data' => [
                    [
                        'uuid' => '1789ea3f-dcda-48e7-9b99-2e1b3b302b0a',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'GENSET',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                ],
            ],
            'R.MEET-ME' => [
                'data' => [
                    [
                        'uuid' => 'a1987e52-7e43-47e8-a8ee-9c030de52a84',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'ACCESS DOOR MEET ME',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                    [
                        'uuid' => '7e044461-8b65-4bac-90bf-77cd4244083f',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 017 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => 'bbfa3e8c-ddd4-4922-ba6c-353624ace317',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 006 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => 'ea06e1ed-987e-40ff-9ac6-db4168cc71b7',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'WATER DETECTOR 5',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI,
                    ],
                    [
                        'uuid' => 'd60d91f8-a2d7-4502-9f6b-2e46feeee11b',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'WATER DETECTOR 6',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI,
                    ],
                ],
            ],
            'R.NETWORK' => [
                'data' => [
                    [
                        'uuid' => '56acd964-a5c5-4395-b62f-5ca79219fcba',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'ACCESS DOOR NETWORK',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                    [
                        'uuid' => '4f94735f-64e3-4223-b0b6-5a9199472899',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 003 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '69906ce3-d4de-4a7a-9b93-ee55a84b40c2',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 014 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => 'cff86711-259c-42ba-a90f-e192886a5b58',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'WATER DETECTOR 7',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI,
                    ],
                ],
            ],
            'R.NOC' => [
                'data' => [
                    [
                        'uuid' => 'ab99f385-7e62-48c9-afa8-2fef31661597',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'ACCESS DOOR NOC1',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                    [
                        'uuid' => '95daa500-4b12-4bc3-8d4b-ae80994a8347',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'ACCESS DOOR NOC2',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                    [
                        'uuid' => '0ad9e9fd-c4c7-4fcc-a9e5-6bebb89b7e98',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PC ACCESS DOOR',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                    [
                        'uuid' => '68d47682-c7db-4b3f-92e2-045d0848543a',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PC EMS',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                    [
                        'uuid' => '981908d7-0ff7-48d7-969d-f6bd42523cf0',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PC SERVER CCTV',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                    [
                        'uuid' => '34986bfd-2ea5-4ea8-9a50-f3dd592b270c',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'SIRINE & SENSOR PINTU NOC 1',
                        'jawaban' => $pilihanFCTDROPDOWN_SIRINE,
                    ],
                    [
                        'uuid' => '1057626d-8119-4af8-93c9-72e29140f11b',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 010 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '569064d2-01e7-4c5d-a472-3c9f8949fae6',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 022 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '9019ecd7-fef7-4bb6-a22a-c541d9ea9ce8',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 011 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '6954e27f-839c-4ba2-b6a0-5c07170563e9',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 021 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                ],
            ],
            'R.POWER' => [
                'data' => [
                    [
                        'uuid' => '1cc0cc54-6f83-4ad7-85b2-ca41d52658c6',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'ACCESS DOOR POWER ROOM',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                    [
                        'uuid' => '19fd4dd7-e101-456b-a2e6-c6519e7f9aaa',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PAC 4 HUM (RH%)',
                        'jawaban' => $PAC,
                    ],
                    [
                        'uuid' => 'c5a27f58-2217-4432-8a79-2d0ef072126b',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PAC 4 TEMP (℃)',
                        'jawaban' => $PAC,
                    ],
                    [
                        'uuid' => '3f88e9fc-338c-4b56-a6e5-9c6d3ebdd118',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PAC 5 HUM (RH%)',
                        'jawaban' => $PAC,
                    ],
                    [
                        'uuid' => 'ddff61b7-173e-4c60-af74-60a132aaa262',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'PAC 5 TEMP (℃)',
                        'jawaban' => $PAC,
                    ],
                    [
                        'uuid' => 'abdedc27-3e03-4cf1-bd8f-2440a4acde79',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 1 AMPERE (A) (R)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => '9151af2d-bac6-43b9-a9bb-7faaee3cdf64',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 1 AMPERE (A) (S)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => '8af823b3-5645-4587-a360-587797b0621a',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 1 AMPERE (A) (T)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => '30f02637-8d39-48e5-8483-3b53ed96775e',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 1 LOAD LEVEL (%) (R)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'f5b0257e-cc26-4018-9d1d-843da48a6168',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 1 LOAD LEVEL (%) (S)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => '79ca83ae-7991-44a9-99c9-cc13ead7a52d',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 1 LOAD LEVEL (%) (T)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => '7202d125-2940-46f9-b1b3-343d1f111bb1',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 1 VOLTAGE (VAC) (R)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => '67a3b3bc-8d25-4b92-b62b-69c54421b1b9',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 1 VOLTAGE (VAC) (S)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'd3587eec-5ed6-4f04-b952-fc318e1f3655',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 1 VOLTAGE (VAC) (T)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => '73f79229-8d99-4ab5-a7c2-1afcf25c8ebf',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 2 AMPERE (A) (R)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'fcbe31fd-e2a3-471b-be61-2419104e5f41',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 2 AMPERE (A) (S)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'd0fd9c9f-e0cc-44dd-983e-386a03369ba6',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 2 AMPERE (A) (T)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'f6922698-523b-48e6-9bb2-a3b8b0263e6c',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 2 LOAD LEVEL (%) (R)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'e21ea28a-b721-4a40-95ec-f8769954b555',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 2 LOAD LEVEL (%) (S)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => '35e43b4e-d59a-46ca-a3ac-a08b84dd2341',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 2 LOAD LEVEL (%) (T)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => '246c90f4-7bf0-4e16-96bc-1cf4447f1dbd',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 2 VOLTAGE (VAC) (R)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'f7d1b604-9aff-4bbb-a547-3a0e15639ad5',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 2 VOLTAGE (VAC) (S)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'e35a2ab3-a85d-4582-af79-6c962ba229ac',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS 2 VOLTAGE (VAC) (T)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'ea2b83f1-e23b-4944-8460-3fb605853c5f',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS APC IOUT (A) (R)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'a02d9885-1d09-4ef2-8607-76fe9ed336de',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS APC IOUT (A) (S)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'ed4b7cbb-0a76-4491-af69-97f836aa8e8f',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS APC IOUT (A) (T)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => '0d6dcace-c841-44a7-98fc-1ac37dd73e2e',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS APC VOUT (VAC) (R)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'ce4af625-6a5a-4782-9223-c96d056e7a34',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS APC VOUT (VAC) (S)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'e2300004-1bd5-4e91-8143-c38fe37e7577',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS APC VOUT (VAC) (T)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => 'cde296e5-256e-4743-8078-9a6dbf0d444f',
                        'tipe' => 'ISIAN', 
                        'keterangan' => 'UPS APC RUNTIME (MIN)',
                        'jawaban' => $ISIAN,
                    ],
                    [
                        'uuid' => '19d319eb-dd7c-4822-b4f3-f2af8f67020a',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'SIRINE & SENSOR POWER ROOM',
                        'jawaban' => $pilihanFCTDROPDOWN_SIRINE,
                    ],
                    [
                        'uuid' => '6a271fe0-e876-4170-8172-cfb5691f2fba',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 038 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => 'b1fb01ae-08ac-4fab-8f7c-57c890591b21',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 041 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => 'f3b22115-236f-44cf-a28a-acd48575d489',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 039 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '2a2dd5f3-539d-4aa0-866d-b60b2cc5ae91',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 040 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                ],
            ],
            'R.SERVER' => [
                'data' => [
                    [
                        'uuid' => 'f38e20c5-0cae-4b34-939a-578e6a2d2346',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'ACCESS DOOR SERVER 01',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                    [
                        'uuid' => 'd7e1ee91-2217-46ae-8eb3-6e08fe2b3aa7',
                        'tipe' => 'DROPDOWN', 
                        'keterangan' => 'ACCESS DOOR SERVER 02',
                        'jawaban' => $pilihanFCTTanpaSMOKE,
                    ],
                    [
                        'uuid' => 'd96b3417-9834-4cef-937a-6218037d55b9',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 001 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '1646e449-cee8-4dd0-b756-db219eeab4f4',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 005 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '0bad090f-9a1f-4841-a744-560c92ddc488',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 013 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => 'd0290889-67f6-4fd9-9e2c-d77eb59275f9',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE IONIZATION (SI) 015 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => 'd1f77809-383d-4181-9917-af5d8969bbe1',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 002 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '8aa70e91-e457-47d7-af49-47e4503fd095',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 004 UP',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '39a8eb3d-5fa9-4563-a098-7d33a242cc7e',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 012 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => 'e3ffe27b-77bb-49b6-9562-98df50add2c5',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'SMOKE PHOTOELECTRIC (SP) 016 DOWN',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI_SMOKE,
                    ],
                    [
                        'uuid' => '68927462-e4dd-4648-9e30-8d39b8cd2788',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'WATER DETECTOR 1',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI,
                    ],
                    [
                        'uuid' => '5e4d314c-70e5-4fe9-8f16-4269269ab65e',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'WATER DETECTOR 2',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI,
                    ],
                    [
                        'uuid' => 'd736e359-5fee-48c6-9cfa-6a7351d3def4',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'WATER DETECTOR 3',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI,
                    ],
                    [
                        'uuid' => '928b72a7-5879-42ef-bbce-195b20037fc4',
                        'tipe' => 'DROPDOWN_KONDISI', 
                        'keterangan' => 'WATER DETECTOR 4',
                        'jawaban' => $pilihanFCTDROPDOWN_KONDISI,
                    ],
                ],
            ],
        ];

        foreach ($jenisForm as $item) {

            if($item->kode == env('FORM_CCTV')) {
                foreach ($FormCCTV as $dd => $valForm) {
                    foreach ($valForm['data'] as $aa => $data) {
                        $isian = FormIsian::create([
                            // 'uuid'       => generateUuid(),
                            'uuid'       => $data['uuid'],
                            'judul'      => $data['keterangan'],
                            'form_jenis' => $item->kode,
                            'kategori'   => $dd,
                            'tipe'       => $valForm['tipe'],
                            'status'     => 1,
                        ]);

                        // dikomen bila ada revisi keterangan form 
                        // foreach ($pilihanCCTV as $id => $val) {
                        //     FormPilihan::create([
                        //         'uuid'    => generateUuid(),
                        //         'pilihan' => $val,
                        //         'isian_id' => $isian->uuid,
                        //     ]);
                        // }
                    }
                }
            }

            if($item->kode == env('FORM_CLEANING')) {
                foreach ($formCLEANING as $dd => $valForm) {
                    foreach ($valForm['data'] as $aa => $data) {
                        $isian = FormIsian::create([
                            // 'uuid'       => generateUuid(),
                            'uuid'       => $data['uuid'],
                            'judul'      => $data['keterangan'],
                            'form_jenis' => $item->kode,
                            'kategori'   => $dd,
                            'tipe'       => $valForm['tipe'],
                            'status'     => 1,
                        ]);

                        // foreach ($pilihanCLEANING as $id => $val) {
                        //     FormPilihan::create([
                        //         'uuid'    => generateUuid(),
                        //         'pilihan' => $val,
                        //         'isian_id' => $isian->uuid,
                        //     ]);
                        // }
                    }
                }
            }

            if($item->kode == env('FORM_FACILITIES')) {
                foreach ($formFACILITIES as $dd => $valForm) {
                    foreach ($valForm['data'] as $id => $data) {
                        $isian = FormIsian::create([
                            // 'uuid'       => generateUuid(),
                            'uuid'       => $data['uuid'],
                            'judul'      => $data['keterangan'],
                            'form_jenis' => $item->kode,
                            'kategori'   => $dd,
                            'tipe'       => $data['tipe'],
                            'status'     => 1,
                        ]);

                        // if(($data['tipe'] == 'DROPDOWN') || ($data['tipe'] == 'DROPDOWN_WARNA') || ($data['tipe'] == 'DROPDOWN_KONDISI')) {
                        //     foreach ($data['jawaban'] as $id => $val) {
                        //         FormPilihan::create([
                        //             'uuid'    => generateUuid(),
                        //             'pilihan' => $val,
                        //             'isian_id' => $isian->uuid,
                        //         ]);
                        //     }
                        // }
                    }
                }
            }

            
        }

    }
}
