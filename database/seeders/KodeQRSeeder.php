<?php

namespace Database\Seeders;

use App\Models\FormIsian;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\KodeQR;

class KodeQRSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sumber Data
        $kode_qr = [
            ['cc3b6234-4b4f-4ca4-85fb-3c2843e99e84','cctv','CCTV'],
            ['5aa5e353-865b-42b0-8024-d2dac6eb40fd','cln_fire_system','KEBERSIHAN R. FIRE SYSTEM'],
            ['70eb1a3c-45ac-40b9-8e1e-1aa4055c8755','cln_genset','KEBERSIHAN R. GENSET'],
            ['70b5145b-b2d6-4643-baf4-ca2362756fbd','cln_koridor','KEBERSIHAN KORIDOR DC'],
            ['740f251d-9044-49d5-8344-f935f86585cb','cln_meet_me','KEBERSIHAN R. MEET ME'],
            ['9eea2220-7457-4362-8276-ceb9cb06f97e','cln_network','KEBERSIHAN R. NETWORK'],
            ['33123eb8-21bb-4453-be89-a0acf1266a08','cln_noc','KEBERSIHAN R. NOC'],
            ['ae3f9e53-52ce-40b1-bf7b-bfb74b7d1b5a','cln_panel_gf','KEBERSIHAN R. PANEL-GF'],
            ['9b8beb60-8129-4c46-bce8-fec10e65dbca','cln_power','KEBERSIHAN R. POWER'],
            ['673cc100-13a9-496f-bb02-7ec2d0c14d1b','cln_server','KEBERSIHAN R. SERVER'],
            ['1901c3ec-d0ec-4c9e-b234-e78769e27022','fct_fire_system','INPUTAN FIRE SYSTEM'],
            ['e12968da-9cfb-4288-a4d5-5f955e1c156e','fct_genset','INPUTAN GENSET'],
            ['419285e1-ca18-4b54-aba2-ed14f5c1c01c','fct_koridor_dc','INPUTAN KORIDOR DC'],
            ['d29db5f5-4045-4cd7-98d3-0246324cadf7','fct_meet_me','INPUTAN MEET ME'],
            ['35bf8968-42ef-459c-8732-172559fed03b','fct_network','INPUTAN NETWORK'],
            ['a8fc83e5-1715-40d1-9fe3-9621dda87ebf','fct_noc','INPUTAN NOC'],
            ['39ea3bba-5d0a-4761-8ffb-25b419c047dc','fct_pac_1','INPUTAN PAC 1'],
            ['daec111a-2100-4a18-95d6-fbf40db2dc3e','fct_pac_2','INPUTAN PAC 2'],
            ['0846c50f-aa92-4614-b023-003be161e7b3','fct_pac_3','INPUTAN PAC 3'],
            ['f2fc6c8d-6453-4b32-bce6-89605a49f92e','fct_pac_4','INPUTAN PAC 4'],
            ['a35ac7c3-ae63-4046-8a3d-64327c9acc3a','fct_pac_5','INPUTAN PAC 5'],
            ['8cbac88f-f963-4455-89cd-7ca9652f686c','fct_power_room','INPUTAN POWER ROOM'],
            ['677a56c2-0200-47fd-b02f-91c9f75e80f4','fct_server','INPUTAN SERVER ROOM'],
            ['1714950d-5cdb-4e7b-8d0e-b9ec6b7caaf1','fct_ups_1','INPUTAN UPS 1'],
            ['c54772f9-67a2-40e1-b9ac-34c38ee34473','fct_ups_2','INPUTAN UPS 2'],
            ['211c69e7-9d12-40a0-a604-51b120d0a1eb','fct_ups_apc','INPUTAN UPS APC'],
        ];

        $inputan = [
            ['CCTV','SAMSUNG-SND-5083R','Pintu Keluar DC Tangga Darurat','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','Pintu Masuk DC','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','Pintu Masuk R. Lt.2','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. Box Panel Ground','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. Genset Ground','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. Genset Pintu Masuk','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. Network 1','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. Network 2','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','Roof Top Gedung C 1','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. Server Caging 1 Depan','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. Server Caging 1 Pojok','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. Server Caging 2 Depan','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. Server Caging 2 Pojok','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. Staging','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. Tabung Gas FM','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','Ruang Meet Me','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','Ruang NOC','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','Ruang Staf Lt.2','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. UPS 1','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CCTV','SAMSUNG-SND-5083R','R. UPS 2','cc3b6234-4b4f-4ca4-85fb-3c2843e99e84'],
            ['CLN','KORIDOR-DC','KEBERSIHAN LANTAI','70b5145b-b2d6-4643-baf4-ca2362756fbd'],
            ['CLN','KORIDOR-DC','KEBERSIHAN PANEL','70b5145b-b2d6-4643-baf4-ca2362756fbd'],
            ['CLN','KORIDOR-DC','PAC 01','70b5145b-b2d6-4643-baf4-ca2362756fbd'],
            ['CLN','KORIDOR-DC','PAC 02','70b5145b-b2d6-4643-baf4-ca2362756fbd'],
            ['CLN','KORIDOR-DC','PAC 03','70b5145b-b2d6-4643-baf4-ca2362756fbd'],
            ['CLN','RUANG-FIRE-SYSTEM','KEBERSIHAN LANTAI','5aa5e353-865b-42b0-8024-d2dac6eb40fd'],
            ['CLN','RUANG-FIRE-SYSTEM','TABUNG FSS','5aa5e353-865b-42b0-8024-d2dac6eb40fd'],
            ['CLN','RUANG-GENSET','KEBERSIHAN LANTAI','70eb1a3c-45ac-40b9-8e1e-1aa4055c8755'],
            ['CLN','RUANG-MEET-ME','KEBERSIHAN CAGE','740f251d-9044-49d5-8344-f935f86585cb'],
            ['CLN','RUANG-MEET-ME','KEBERSIHAN LANTAI','740f251d-9044-49d5-8344-f935f86585cb'],
            ['CLN','RUANG-MEET-ME','RACK Y1','740f251d-9044-49d5-8344-f935f86585cb'],
            ['CLN','RUANG-MEET-ME','RACK Y2','740f251d-9044-49d5-8344-f935f86585cb'],
            ['CLN','RUANG-MEET-ME','RACK Z1','740f251d-9044-49d5-8344-f935f86585cb'],
            ['CLN','RUANG-MEET-ME','RACK Z2','740f251d-9044-49d5-8344-f935f86585cb'],
            ['CLN','RUANG-NETWORK','KEBERSIHAN CAGE','9eea2220-7457-4362-8276-ceb9cb06f97e'],
            ['CLN','RUANG-NETWORK','KEBERSIHAN LANTAI','9eea2220-7457-4362-8276-ceb9cb06f97e'],
            ['CLN','RUANG-NETWORK','RACK A','9eea2220-7457-4362-8276-ceb9cb06f97e'],
            ['CLN','RUANG-NETWORK','RACK B','9eea2220-7457-4362-8276-ceb9cb06f97e'],
            ['CLN','RUANG-NETWORK','RACK C1','9eea2220-7457-4362-8276-ceb9cb06f97e'],
            ['CLN','RUANG-NETWORK','RACK C2','9eea2220-7457-4362-8276-ceb9cb06f97e'],
            ['CLN','RUANG-NETWORK','RACK C3','9eea2220-7457-4362-8276-ceb9cb06f97e'],
            ['CLN','RUANG-NETWORK','RACK D1','9eea2220-7457-4362-8276-ceb9cb06f97e'],
            ['CLN','RUANG-NETWORK','RACK D2','9eea2220-7457-4362-8276-ceb9cb06f97e'],
            ['CLN','RUANG-NETWORK','RACK D3','9eea2220-7457-4362-8276-ceb9cb06f97e'],
            ['CLN','RUANG-NOC','KEBERSIHAN LANTAI','33123eb8-21bb-4453-be89-a0acf1266a08'],
            ['CLN','RUANG-NOC','KEBERSIHAN MEJA','33123eb8-21bb-4453-be89-a0acf1266a08'],
            ['CLN','RUANG-NOC','KEBERSIHAN MONITOR TV','33123eb8-21bb-4453-be89-a0acf1266a08'],
            ['CLN','RUANG-NOC','KEBERSIHAN PC','33123eb8-21bb-4453-be89-a0acf1266a08'],
            ['CLN','RUANG-PANEL-GF','KEBERSIHAN LANTAI','ae3f9e53-52ce-40b1-bf7b-bfb74b7d1b5a'],
            ['CLN','RUANG-PANEL-GF','KEBERSIHAN PANEL','ae3f9e53-52ce-40b1-bf7b-bfb74b7d1b5a'],
            ['CLN','RUANG-POWER','KEBERSIHAN LANTAI','9b8beb60-8129-4c46-bce8-fec10e65dbca'],
            ['CLN','RUANG-POWER','KEBERSIHAN PANEL','9b8beb60-8129-4c46-bce8-fec10e65dbca'],
            ['CLN','RUANG-POWER','KEBERSIHAN TRANSFORMER','9b8beb60-8129-4c46-bce8-fec10e65dbca'],
            ['CLN','RUANG-POWER','PAC 04','9b8beb60-8129-4c46-bce8-fec10e65dbca'],
            ['CLN','RUANG-POWER','PAC 05','9b8beb60-8129-4c46-bce8-fec10e65dbca'],
            ['CLN','RUANG-POWER','RACK UPS 01','9b8beb60-8129-4c46-bce8-fec10e65dbca'],
            ['CLN','RUANG-POWER','RACK UPS 02','9b8beb60-8129-4c46-bce8-fec10e65dbca'],
            ['CLN','RUANG-POWER','RACK UPS APC','9b8beb60-8129-4c46-bce8-fec10e65dbca'],
            ['CLN','RUANG-SERVER','KEBERSIHAN CAGE','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','KEBERSIHAN LANTAI','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK E1','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK E2','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK E3','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK E4','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK E5','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK E6','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK E7','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK F1','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK F2','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK F3','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK F4','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK F5','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK F6','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK F7','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK G1','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK G2','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK G3','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK G4','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK G5','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK G6','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK G7','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK H1','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK H2','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK H3','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK H4','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK H5','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK H6','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['CLN','RUANG-SERVER','RACK H7','673cc100-13a9-496f-bb02-7ec2d0c14d1b'],
            ['FCT','KORIDOR-DC','ACCESS DOOR KELUAR 2','419285e1-ca18-4b54-aba2-ed14f5c1c01c'],
            ['FCT','KORIDOR-DC','ACCESS DOOR KELUAR DC1','419285e1-ca18-4b54-aba2-ed14f5c1c01c'],
            ['FCT','KORIDOR-DC','PAC 1 HUM (RH%)','39ea3bba-5d0a-4761-8ffb-25b419c047dc'],
            ['FCT','KORIDOR-DC','PAC 1 TEMP (°C)','39ea3bba-5d0a-4761-8ffb-25b419c047dc'],
            ['FCT','KORIDOR-DC','PAC 2 HUM (RH%)','daec111a-2100-4a18-95d6-fbf40db2dc3e'],
            ['FCT','KORIDOR-DC','PAC 2 TEMP (°C)','daec111a-2100-4a18-95d6-fbf40db2dc3e'],
            ['FCT','KORIDOR-DC','PAC 3 HUM (RH%)','0846c50f-aa92-4614-b023-003be161e7b3'],
            ['FCT','KORIDOR-DC','PAC 3 TEMP (°C)','0846c50f-aa92-4614-b023-003be161e7b3'],
            ['FCT','KORIDOR-DC','SIRINE & SENSOR PINTU KELUAR DC 1','419285e1-ca18-4b54-aba2-ed14f5c1c01c'],
            ['FCT','KORIDOR-DC','SMOKE IONIZATION (SI) 007 UP','419285e1-ca18-4b54-aba2-ed14f5c1c01c'],
            ['FCT','KORIDOR-DC','SMOKE IONIZATION (SI) 009 UP','419285e1-ca18-4b54-aba2-ed14f5c1c01c'],
            ['FCT','KORIDOR-DC','SMOKE IONIZATION (SI) 019 DOWN','419285e1-ca18-4b54-aba2-ed14f5c1c01c'],
            ['FCT','KORIDOR-DC','SMOKE PHOTOELECTRIC (SP) 008 UP','419285e1-ca18-4b54-aba2-ed14f5c1c01c'],
            ['FCT','KORIDOR-DC','SMOKE PHOTOELECTRIC (SP) 018 DOWN','419285e1-ca18-4b54-aba2-ed14f5c1c01c'],
            ['FCT','KORIDOR-DC','SMOKE PHOTOELECTRIC (SP) 020 DOWN','419285e1-ca18-4b54-aba2-ed14f5c1c01c'],
            ['FCT','R.FIRE-SYSTEM','SIRINE & SENSOR PINTU EMERGENCY 1','1901c3ec-d0ec-4c9e-b234-e78769e27022'],
            ['FCT','R.FIRE-SYSTEM','TABUNG 1 FSS','1901c3ec-d0ec-4c9e-b234-e78769e27022'],
            ['FCT','R.FIRE-SYSTEM','TABUNG 2 FSS','1901c3ec-d0ec-4c9e-b234-e78769e27022'],
            ['FCT','R.FIRE-SYSTEM','TABUNG 3 FSS','1901c3ec-d0ec-4c9e-b234-e78769e27022'],
            ['FCT','R.GENSET-GEDUNG-C','GENSET','e12968da-9cfb-4288-a4d5-5f955e1c156e'],
            ['FCT','R.MEET-ME','ACCESS DOOR MEET ME','d29db5f5-4045-4cd7-98d3-0246324cadf7'],
            ['FCT','R.MEET-ME','SMOKE IONIZATION (SI) 017 DOWN','d29db5f5-4045-4cd7-98d3-0246324cadf7'],
            ['FCT','R.MEET-ME','SMOKE PHOTOELECTRIC (SP) 006 UP','d29db5f5-4045-4cd7-98d3-0246324cadf7'],
            ['FCT','R.MEET-ME','WATER DETECTOR 5','d29db5f5-4045-4cd7-98d3-0246324cadf7'],
            ['FCT','R.MEET-ME','WATER DETECTOR 6','d29db5f5-4045-4cd7-98d3-0246324cadf7'],
            ['FCT','R.NETWORK','ACCESS DOOR NETWORK','35bf8968-42ef-459c-8732-172559fed03b'],
            ['FCT','R.NETWORK','SMOKE IONIZATION (SI) 003 UP','35bf8968-42ef-459c-8732-172559fed03b'],
            ['FCT','R.NETWORK','SMOKE PHOTOELECTRIC (SP) 014 DOWN','35bf8968-42ef-459c-8732-172559fed03b'],
            ['FCT','R.NETWORK','WATER DETECTOR 7','35bf8968-42ef-459c-8732-172559fed03b'],
            ['FCT','R.NOC','ACCESS DOOR NOC1','a8fc83e5-1715-40d1-9fe3-9621dda87ebf'],
            ['FCT','R.NOC','ACCESS DOOR NOC2','a8fc83e5-1715-40d1-9fe3-9621dda87ebf'],
            ['FCT','R.NOC','PC ACCESS DOOR','a8fc83e5-1715-40d1-9fe3-9621dda87ebf'],
            ['FCT','R.NOC','PC EMS','a8fc83e5-1715-40d1-9fe3-9621dda87ebf'],
            ['FCT','R.NOC','PC SERVER CCTV','a8fc83e5-1715-40d1-9fe3-9621dda87ebf'],
            ['FCT','R.NOC','SIRINE & SENSOR PINTU NOC 1','a8fc83e5-1715-40d1-9fe3-9621dda87ebf'],
            ['FCT','R.NOC','SMOKE IONIZATION (SI) 010 UP','a8fc83e5-1715-40d1-9fe3-9621dda87ebf'],
            ['FCT','R.NOC','SMOKE IONIZATION (SI) 022 DOWN','a8fc83e5-1715-40d1-9fe3-9621dda87ebf'],
            ['FCT','R.NOC','SMOKE PHOTOELECTRIC (SP) 011 UP','a8fc83e5-1715-40d1-9fe3-9621dda87ebf'],
            ['FCT','R.NOC','SMOKE PHOTOELECTRIC (SP) 021 DOWN','a8fc83e5-1715-40d1-9fe3-9621dda87ebf'],
            ['FCT','R.POWER','ACCESS DOOR POWER ROOM','8cbac88f-f963-4455-89cd-7ca9652f686c'],
            ['FCT','R.POWER','PAC 4 HUM (RH%)','f2fc6c8d-6453-4b32-bce6-89605a49f92e'],
            ['FCT','R.POWER','PAC 4 TEMP (°C)','f2fc6c8d-6453-4b32-bce6-89605a49f92e'],
            ['FCT','R.POWER','PAC 5 HUM (RH%)','a35ac7c3-ae63-4046-8a3d-64327c9acc3a'],
            ['FCT','R.POWER','PAC 5 TEMP (°C)','a35ac7c3-ae63-4046-8a3d-64327c9acc3a'],
            ['FCT','R.POWER','SIRINE & SENSOR POWER ROOM','8cbac88f-f963-4455-89cd-7ca9652f686c'],
            ['FCT','R.POWER','SMOKE IONIZATION (SI) 038 UP','8cbac88f-f963-4455-89cd-7ca9652f686c'],
            ['FCT','R.POWER','SMOKE IONIZATION (SI) 041 DOWN','8cbac88f-f963-4455-89cd-7ca9652f686c'],
            ['FCT','R.POWER','SMOKE PHOTOELECTRIC (SP) 039 UP','8cbac88f-f963-4455-89cd-7ca9652f686c'],
            ['FCT','R.POWER','SMOKE PHOTOELECTRIC (SP) 040 DOWN','8cbac88f-f963-4455-89cd-7ca9652f686c'],
            ['FCT','R.POWER','UPS 1 AMPERE (A) (R)','1714950d-5cdb-4e7b-8d0e-b9ec6b7caaf1'],
            ['FCT','R.POWER','UPS 1 AMPERE (A) (S)','1714950d-5cdb-4e7b-8d0e-b9ec6b7caaf1'],
            ['FCT','R.POWER','UPS 1 AMPERE (A) (T)','1714950d-5cdb-4e7b-8d0e-b9ec6b7caaf1'],
            ['FCT','R.POWER','UPS 1 LOAD LEVEL (%) (R)','1714950d-5cdb-4e7b-8d0e-b9ec6b7caaf1'],
            ['FCT','R.POWER','UPS 1 LOAD LEVEL (%) (S)','1714950d-5cdb-4e7b-8d0e-b9ec6b7caaf1'],
            ['FCT','R.POWER','UPS 1 LOAD LEVEL (%) (T)','1714950d-5cdb-4e7b-8d0e-b9ec6b7caaf1'],
            ['FCT','R.POWER','UPS 1 VOLTAGE (VAC) (R)','1714950d-5cdb-4e7b-8d0e-b9ec6b7caaf1'],
            ['FCT','R.POWER','UPS 1 VOLTAGE (VAC) (S)','1714950d-5cdb-4e7b-8d0e-b9ec6b7caaf1'],
            ['FCT','R.POWER','UPS 1 VOLTAGE (VAC) (T)','1714950d-5cdb-4e7b-8d0e-b9ec6b7caaf1'],
            ['FCT','R.POWER','UPS 2 AMPERE (A) (R)','c54772f9-67a2-40e1-b9ac-34c38ee34473'],
            ['FCT','R.POWER','UPS 2 AMPERE (A) (S)','c54772f9-67a2-40e1-b9ac-34c38ee34473'],
            ['FCT','R.POWER','UPS 2 AMPERE (A) (T)','c54772f9-67a2-40e1-b9ac-34c38ee34473'],
            ['FCT','R.POWER','UPS 2 LOAD LEVEL (%) (R)','c54772f9-67a2-40e1-b9ac-34c38ee34473'],
            ['FCT','R.POWER','UPS 2 LOAD LEVEL (%) (S)','c54772f9-67a2-40e1-b9ac-34c38ee34473'],
            ['FCT','R.POWER','UPS 2 LOAD LEVEL (%) (T)','c54772f9-67a2-40e1-b9ac-34c38ee34473'],
            ['FCT','R.POWER','UPS 2 VOLTAGE (VAC) (R)','c54772f9-67a2-40e1-b9ac-34c38ee34473'],
            ['FCT','R.POWER','UPS 2 VOLTAGE (VAC) (S)','c54772f9-67a2-40e1-b9ac-34c38ee34473'],
            ['FCT','R.POWER','UPS 2 VOLTAGE (VAC) (T)','c54772f9-67a2-40e1-b9ac-34c38ee34473'],
            ['FCT','R.POWER','UPS APC IOUT (A) (R)','211c69e7-9d12-40a0-a604-51b120d0a1eb'],
            ['FCT','R.POWER','UPS APC IOUT (A) (S)','211c69e7-9d12-40a0-a604-51b120d0a1eb'],
            ['FCT','R.POWER','UPS APC IOUT (A) (T)','211c69e7-9d12-40a0-a604-51b120d0a1eb'],
            ['FCT','R.POWER','UPS APC RUNTIME (MIN)','211c69e7-9d12-40a0-a604-51b120d0a1eb'],
            ['FCT','R.POWER','UPS APC VOUT (VAC) (R)','211c69e7-9d12-40a0-a604-51b120d0a1eb'],
            ['FCT','R.POWER','UPS APC VOUT (VAC) (S)','211c69e7-9d12-40a0-a604-51b120d0a1eb'],
            ['FCT','R.POWER','UPS APC VOUT (VAC) (T)','211c69e7-9d12-40a0-a604-51b120d0a1eb'],
            ['FCT','R.SERVER','ACCESS DOOR SERVER 01','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','ACCESS DOOR SERVER 02','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','SMOKE IONIZATION (SI) 001 UP','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','SMOKE IONIZATION (SI) 005 UP','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','SMOKE IONIZATION (SI) 013 DOWN','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','SMOKE IONIZATION (SI) 015 DOWN','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','SMOKE PHOTOELECTRIC (SP) 002 UP','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','SMOKE PHOTOELECTRIC (SP) 004 UP','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','SMOKE PHOTOELECTRIC (SP) 012 DOWN','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','SMOKE PHOTOELECTRIC (SP) 016 DOWN','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','WATER DETECTOR 1','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','WATER DETECTOR 2','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','WATER DETECTOR 3','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
            ['FCT','R.SERVER','WATER DETECTOR 4','677a56c2-0200-47fd-b02f-91c9f75e80f4'],
        ];

        // Insert Kode QR
        foreach($kode_qr as $item) {
            $insert = KodeQR::create([
                'uuid' => $item[0],
                'kode_unik' => $item[1],
                'qr_nama' => $item[2]
            ]);
        }

        // Update Form isian
        foreach($inputan as $item) {    
            $cek = FormIsian::where('form_jenis',$item[0])->where('kategori',$item[1])->where('judul',$item[2])->first();
            if($cek){
                $cek->update([
                    'qr_code' => $item[3],
                ]);
            }
        }
    }
}
