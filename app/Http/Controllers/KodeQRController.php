<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormIsian;
use App\Models\FormIsianKategori;
use App\Models\KodeQR;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;

class KodeQRController extends Controller
{
   
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        try {
            $decodeToken = parseJwt($this->request->header('Authorization'));
            $uuid = $decodeToken->user->uuid;
            $user = User::where('uuid', $uuid)->first();
        
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengguna tidak ditemukan',
                    'code'    => 404,
                ]);
            }

            $kodeqr = KodeQR::orderBy('kode_unik', 'asc');
            $search = $this->request->search;
            if($search){
                $kodeqr = $kodeqr->whereHas('formisian', function($query) use ($search){
                    $query->where('judul','ilike','%'.$search.'%')
                    ->orWhere('kategori','ilike','%'.$search.'%');
                });
            }
            $kodeqr = $kodeqr->paginate(10);
            $kodeqr = $kodeqr->setPath(env('APP_URL', 'https://centro.pelindo.co.id/api/formlaporan/').'superadmin/kodeqr?search='.$search);
            // $kodeqr = $kodeqr->get();

            if (empty($kodeqr)) {
                return response()->json([
                    'success' => false,
                    'message' => 'KodeQR tidak ditemukan',
                    'code'    => 404,
                ]);
            }

            foreach($kodeqr as $item){
                $devices = FormIsian::with(['jenis_form'])->where('qr_code',$item->uuid)->orderByRaw(
                    "CASE 
                    WHEN judul like 'PAC 1 T%' THEN 2
                    WHEN judul like 'PAC 1 H%' THEN 3
                    WHEN judul like 'PAC 2 T%' THEN 4
                    WHEN judul like 'PAC 2 H%' THEN 5
                    WHEN judul like 'PAC 3 T%' THEN 6
                    WHEN judul like 'PAC 3 H%' THEN 7
                    WHEN judul like 'PAC 4 T%' THEN 8
                    WHEN judul like 'PAC 4 H%' THEN 9
                    WHEN judul like 'PAC 5 T%' THEN 10
                    WHEN judul like 'PAC 5 H%' THEN 11
                    WHEN judul like 'UPS 1 V%' THEN 12
                    WHEN judul like 'UPS 1 A%' THEN 13
                    WHEN judul like 'UPS 1 L%' THEN 14
                    WHEN judul like 'UPS 2 V%' THEN 15
                    WHEN judul like 'UPS 2 A%' THEN 16
                    WHEN judul like 'UPS 2 L%' THEN 17
                    WHEN judul like 'UPS APC V%' THEN 18
                    WHEN judul like 'UPS APC I%' THEN 19
                    WHEN judul like 'UPS APC R%' THEN 20
                    ELSE 1
                    END ASC"
                )->orderBy('judul', 'asc')->get();
                if($devices->isEmpty()){
                    $devices = null;
                }
                $item->devices = $devices;
            }

            return response()->json([
                'success' => true,
                'message' => 'Data KodeQR',
                'code'    => 200,
                'data'    => $kodeqr,
            ]);
        } catch (\Throwable $th) {
            return writeLog($th->getMessage());
        }
    }

    public function show($id)
    {
        try
        {
            $decodeToken = parseJwt($this->request->header('Authorization'));
            $uuid = $decodeToken->user->uuid;
            $user = User::where('uuid', $uuid)->first();
        
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengguna tidak ditemukan',
                    'code'    => 404,
                ]);
            }
            // $id = $this->request->id;
            $kodeqr = KodeQR::where('uuid', $id)->first();
            
            if (!$kodeqr) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Tidak Ditemukan',
                    'code'    => 404,
                ]);
            }
            
            $devices = FormIsian::with(['jenis_form'])->where('qr_code',$kodeqr->uuid)->orderByRaw(
                "CASE 
                WHEN judul like 'PAC 1 T%' THEN 2
                WHEN judul like 'PAC 1 H%' THEN 3
                WHEN judul like 'PAC 2 T%' THEN 4
                WHEN judul like 'PAC 2 H%' THEN 5
                WHEN judul like 'PAC 3 T%' THEN 6
                WHEN judul like 'PAC 3 H%' THEN 7
                WHEN judul like 'PAC 4 T%' THEN 8
                WHEN judul like 'PAC 4 H%' THEN 9
                WHEN judul like 'PAC 5 T%' THEN 10
                WHEN judul like 'PAC 5 H%' THEN 11
                WHEN judul like 'UPS 1 V%' THEN 12
                WHEN judul like 'UPS 1 A%' THEN 13
                WHEN judul like 'UPS 1 L%' THEN 14
                WHEN judul like 'UPS 2 V%' THEN 15
                WHEN judul like 'UPS 2 A%' THEN 16
                WHEN judul like 'UPS 2 L%' THEN 17
                WHEN judul like 'UPS APC V%' THEN 18
                WHEN judul like 'UPS APC I%' THEN 19
                WHEN judul like 'UPS APC R%' THEN 20
                ELSE 1
                END ASC"
            )->orderBy('judul', 'asc')->pluck('uuid')->toArray();
            if(empty($devices)){
                $devices = null;
            }
            $kodeqr->devices = $devices;

            return response()->json([
                'success' => true,
                'message' => 'OK',
                'code'    => 200,
                'data'  => $kodeqr
            ]); 
        } catch (\Throwable $th) {
            return writeLog($th->getMessage());
        }
    }

    public function store() 
    {   
        // cek validasi
        $validator = Validator::make($this->request->all(), [
            'qr_nama' => 'required',
            'devices' => 'required|array',
        ]);

        if ($validator->fails()) {
            return writeLogValidation($validator->errors());
        }
        
        DB::beginTransaction();   
        try 
        {
            $decodeToken = parseJwt($this->request->header('Authorization'));
            $uuid = $decodeToken->user->uuid;
            $user = User::where('uuid', $uuid)->first();
        
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengguna tidak ditemukan',
                    'code'    => 404,
                ]);
            }
            
            $qr_nama = $this->request->qr_nama;
            $devices = $this->request->devices;
            $kode_unik = $this->request->kode_unik;
            $cek = KodeQR::where('qr_nama',$qr_nama)->first();
            if ($cek) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kode QR dengan nama tersebut sudah ada',
                    'code'    => 404,
                ]);
            }
            if($this->request->has('kode_unik')){
                $cek = KodeQR::where('kode_unik',$kode_unik)->first();
                if ($cek) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Kode QR dengan kode tersebut sudah ada',
                        'code'    => 404,
                    ]);
                }
            }
            $kodeqr = KodeQR::create([
                'qr_nama' => $qr_nama,
                'kode_unik' => $kode_unik ?? null,
                'uuid'     => generateUuid()
            ]);
            $kodeqr = KodeQR::where('uuid',$kodeqr->uuid)->first();
            $id_qr = $kodeqr->uuid;

            //Update Kode QR
            if($devices){
                foreach($devices as $item){
                    //validasi
                    $form = FormIsian::where('uuid',$item)->first();
                    if(!$form){
                        return response()->json([
                            'success' => false,
                            'message' => 'Form Isian tidak ditemukan!',
                            'code'    => 404,
                        ]);
                    }
                    //update device
                    $device = $form->update([
                        'qr_code' => $id_qr
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil tambah Kode QR',
                'code'    => 201
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return writeLog($th->getMessage());
        }
    }

    public function update($id)
    {
        // cek validasi
        $validator = Validator::make($this->request->all(), [
            'qr_nama' => 'required',
            'devices_tambah' => 'array',
            'devices_kurang' => 'array',
        ]);

        if ($validator->fails()) {
            return writeLogValidation($validator->errors());
        }
        $qr_nama = $this->request->qr_nama;
        $kode_unik = $this->request->kode_unik;
        $devices_tambah = $this->request->devices_tambah;
        $devices_kurang = $this->request->devices_kurang;
        DB::beginTransaction();
        try 
        {
            $decodeToken = parseJwt($this->request->header('Authorization'));
            $uuid = $decodeToken->user->uuid;
            $user = User::where('uuid', $uuid)->first();
        
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengguna tidak ditemukan',
                    'code'    => 404,
                ]);
            }

            $kodeqr_updt = KodeQR::where('uuid', $id)->first();
            if (!$kodeqr_updt) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Tidak Ditemukan',
                    'code'    => 404,
                ]);
            }
            $id_qr = $id;
            //validasi nama sama
            $cek = KodeQR::where('qr_nama',$qr_nama)->where('uuid','!=',$id)->first();
            if ($cek) {
                return response()->json([
                    'success' => false,
                    'message' => 'Kode QR dengan nama tersebut sudah ada',
                    'code'    => 404,
                ]);
            }
            if($this->request->has('kode_unik')){
                $cek = KodeQR::where('kode_unik',$kode_unik)->where('uuid','!=',$id)->first();
                if ($cek) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Kode QR dengan kode tersebut sudah ada',
                        'code'    => 404,
                    ]);
                }
            }
            //update
            $kodeqr_updt->update([
                'qr_nama' => $qr_nama,
                'kode_unik' => $kode_unik ?? null,
            ]);
            if($devices_tambah){
                foreach($devices_tambah as $item){
                   //validasi
                   $form = FormIsian::where('uuid',$item)->first();
                   if(!$form){
                       return response()->json([
                           'success' => false,
                           'message' => 'Form Isian tidak ditemukan!',
                           'code'    => 404,
                       ]);
                   }
                   //update device
                   $device = $form->update([
                       'qr_code' => $id_qr
                   ]);
                }
            }
            if($devices_kurang){
                foreach($devices_kurang as $item){
                    //validasi
                    $form = FormIsian::where('uuid',$item)->first();
                    if(!$form){
                        return response()->json([
                            'success' => false,
                            'message' => 'Form Isian tidak ditemukan!',
                            'code'    => 404,
                        ]);
                    }
                    //update device
                    $device = $form->update([
                        'qr_code' => null
                    ]);
                }
            }

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Kode QR diubah!',
                'code'    => 200
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return writeLog($th->getMessage());
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();
        try 
        {
            $decodeToken = parseJwt($this->request->header('Authorization'));
            $uuid = $decodeToken->user->uuid;
            $user = User::where('uuid', $uuid)->first();
        
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengguna tidak ditemukan',
                    'code'    => 404,
                ]);
            }

            $sel_kodeqr = KodeQR::where('uuid', $id)->first();
            
            if (!$sel_kodeqr) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Tidak Ditemukan',
                    'code'    => 404,
                ]);
            }
            //kosongi kode qr devices
            $devices = FormIsian::where('qr_code', $id)->update([
                'qr_code' => null
            ]);
            //delete
            $sel_kodeqr->delete();

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Kode QR Dihapus!',
                'code'    => 200
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return writeLog($th->getMessage());
        }
    }

    public function dataBulan()
    {
        $decodeToken = parseJwt($this->request->header('Authorization'));
        $uuid = $decodeToken->user->uuid;
        $user = User::where('uuid', $uuid)->first();
        
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Pengguna tidak ditemukan',
                'code'    => 404,
            ]);
        }
        else {
            DB::beginTransaction();
            try
            {
                $jenis = FormIsian::select('form_jenis')->has('kodeqr')->distinct()->get();

                if (!count($jenis)) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Data Tidak Ditemukan',
                        'code'    => 404,
                    ]);
                }
                
                return response()->json([
                    'success' => true,
                    'message' => 'Data Jenis Form',
                    'code'    => 200,
                    'data'    => $jenis
                ]);
            } catch (\Throwable $th) {
                DB::rollback();
                return writeLog($th->getMessage());
            }
        }
    }

    public function cetak()
    {
        DB::beginTransaction(); 
        try 
        {
            $decodeToken = parseJwt($this->request->header('Authorization'));
            $uuid        = $decodeToken->user->uuid;
            $user        = User::where('uuid', $uuid)->first();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengguna tidak ditemukan',
                    'code'    => 404,
                ]);
            }

            $kodeqr = KodeQR::has('formisian')->orderBy('kode_unik', 'asc')->get();
            if($kodeqr->isEmpty()){
                return response()->json([
                    'success' => false,
                    'message' => 'Data Kode QR tidak ditemukan',
                    'code'    => 404,
                ]);
            }

            foreach($kodeqr as $item){
                $devices = FormIsian::with(['jenis_form'])->where('qr_code',$item->uuid)->orderByRaw(
                    "CASE 
                    WHEN judul like 'PAC 1 T%' THEN 2
                    WHEN judul like 'PAC 1 H%' THEN 3
                    WHEN judul like 'PAC 2 T%' THEN 4
                    WHEN judul like 'PAC 2 H%' THEN 5
                    WHEN judul like 'PAC 3 T%' THEN 6
                    WHEN judul like 'PAC 3 H%' THEN 7
                    WHEN judul like 'PAC 4 T%' THEN 8
                    WHEN judul like 'PAC 4 H%' THEN 9
                    WHEN judul like 'PAC 5 T%' THEN 10
                    WHEN judul like 'PAC 5 H%' THEN 11
                    WHEN judul like 'UPS 1 V%' THEN 12
                    WHEN judul like 'UPS 1 A%' THEN 13
                    WHEN judul like 'UPS 1 L%' THEN 14
                    WHEN judul like 'UPS 2 V%' THEN 15
                    WHEN judul like 'UPS 2 A%' THEN 16
                    WHEN judul like 'UPS 2 L%' THEN 17
                    WHEN judul like 'UPS APC V%' THEN 18
                    WHEN judul like 'UPS APC I%' THEN 19
                    WHEN judul like 'UPS APC R%' THEN 20
                    ELSE 1
                    END ASC"
                )->orderBy('judul', 'asc')->get();
                if($devices->isEmpty()){
                    $devices = null;
                }
                $item->devices = $devices;
            }
            
            return response()->json([
                'success' => true,
                'message' => 'Berhasil proses data cetak laporan',
                'data'  => $kodeqr,
                'code'    => 200,
            ]);
        } catch (\Throwable $th) {
            DB::rollback();
            return writeLog($th->getMessage().' on '.$th->getLine());
        }
    }
   
    public function getKodeQR()
    {
        try 
        {
            $decodeToken = parseJwt($this->request->header('Authorization'));
            $uuid = $decodeToken->user->uuid;
            $user = User::where('uuid', $uuid)->first();
            if (!$user) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengguna tidak ditemukan',
                    'code'    => 404,
                ]);
            }
            $kodeqr = $this->request->kodeqr;
            $dataAll = FormIsian::select('uuid')->where('qr_code',$kodeqr)->orderByRaw(
                "CASE 
                WHEN judul like 'PAC 1 T%' THEN 2
                WHEN judul like 'PAC 1 H%' THEN 3
                WHEN judul like 'PAC 2 T%' THEN 4
                WHEN judul like 'PAC 2 H%' THEN 5
                WHEN judul like 'PAC 3 T%' THEN 6
                WHEN judul like 'PAC 3 H%' THEN 7
                WHEN judul like 'PAC 4 T%' THEN 8
                WHEN judul like 'PAC 4 H%' THEN 9
                WHEN judul like 'PAC 5 T%' THEN 10
                WHEN judul like 'PAC 5 H%' THEN 11
                WHEN judul like 'UPS 1 V%' THEN 12
                WHEN judul like 'UPS 1 A%' THEN 13
                WHEN judul like 'UPS 1 L%' THEN 14
                WHEN judul like 'UPS 2 V%' THEN 15
                WHEN judul like 'UPS 2 A%' THEN 16
                WHEN judul like 'UPS 2 L%' THEN 17
                WHEN judul like 'UPS APC V%' THEN 18
                WHEN judul like 'UPS APC I%' THEN 19
                WHEN judul like 'UPS APC R%' THEN 20
                ELSE 1
                END ASC"
            )->orderBy('judul', 'asc')->get();
            if ($dataAll->isEmpty()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data Tidak Ditemukan',
                    'code'    => 404,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'OK',
                'code'    => 200,
                'data'  => $dataAll
            ]);
        } catch (\Throwable $th) {
            return writeLog($th->getMessage());
        }
    }

    private function uploadS3($attachment)
    {
        $file = null;
        // Upload file
        $url = env('S3_ENDPOINT').'/upload';
        $client = Http::withOptions(['verify' => false]);
        $response = $client->attach('file',file_get_contents($attachment->getPathname()),$attachment->getClientOriginalName())->post($url,[
            ['name' => 'folder','contents' => 'kodeqr'],
            ['name' => 'api_key','contents' => env('S3_API_KEY')]
        ]);
        
        if ($response->getStatusCode() == '200') {
            $result = json_decode($response->getBody()->getContents() , true);
            if($result['success']){
                $file = $result['message']['filename'];}
            else{
                throw new Exception($result['message']);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Upload file ke storage gagal',
                'code'    => 404,
            ]);
        }
        return $file;
    }

    private function cekS3($file)
    {
        $cek = false;
        // Cek file
        $url = env('S3_ENDPOINT').'/check';
        $client = Http::withOptions(['verify' => false]);
        $response = $client->post($url,[
            'filename' => $file,
            'folder' => 'kodeqr',
            'api_key' => env('S3_API_KEY')
        ]);
        
        if ($response->getStatusCode() == '200') {
            $result = json_decode($response->getBody()->getContents() , true);
            if($result['success']){
                $cek = true;
            }
        }
        return $cek;
    }

    private function deleteS3($file)
    {
        // Delete file
        $url = env('S3_ENDPOINT').'/delete';
        $client = Http::withOptions(['verify' => false]);
        $response = $client->post($url,[
            'filename' => $file,
            'folder' => 'kodeqr',
            'api_key' => env('S3_API_KEY')
        ]);
        
        if (!$response->getStatusCode() == '200') {
            return response()->json([
                'success' => false,
                'message' => 'Delete file di storage gagal',
                'code'    => 404,
            ]);
        }else{
            $result = json_decode($response->getBody()->getContents() , true);
            if(!$result['success']){
                throw new Exception($result['message']);
            }
        }
        return true;
    }
    
}
