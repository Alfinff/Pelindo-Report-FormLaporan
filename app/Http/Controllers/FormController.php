<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FormIsian;
use App\Models\FormIsianKategori;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use GrahamCampbell\Flysystem\Facades\Flysystem;
use Illuminate\Support\Facades\Hash;

class FormController extends Controller
{
   
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(Request $request)
    {
        try {
            $form = FormIsian::with(['jenis_form', 'kategori_isian', 'pilihan'])->orderBy('kategori', 'asc')->orderBy('judul', 'asc')->get()->groupBy('form_jenis');

            if (!$form) {
                return response()->json([
                    'success' => false,
                    'message' => 'Pengguna tidak ditemukan',
                    'code'    => 404,
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Data Form',
                'code'    => 200,
                'data'    => $form,
            ]);
        } catch (\Throwable $th) {
            return writeLog($th->getMessage());
        }
    }

    public function formCCTV(Request $request)
    {
        try {
            $formKategoriIsian = FormIsianKategori::where('form_jenis', env('FORM_CCTV'))->get();

            if (!$formKategoriIsian) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan',
                    'code'    => 404,
                    'tipe'    => env('FORM_CCTV'),
                ]);
            }

            $data = $formKategoriIsian->map(function ($dataKategori) {
                $data = [];
                $form = FormIsian::with(['jenis_form', 'kategori_isian', 'pilihan' => function($query) {
                    $query->orderByRaw("CASE pilihan
                    WHEN 'OK' THEN 1
                    WHEN 'NOT OK' THEN 2
                    ELSE 3
                    END ASC
                    ");
                }])->where('status', 1)->where('kategori', $dataKategori->kode)->where('form_jenis', env('FORM_CCTV'))->orderBy('kategori', 'asc')->orderBy('judul', 'asc')->get();

                $form = $form->map(function ($dataForm) {
                    $form = [];
                    $form['uuid'] = $dataForm->uuid;
                    $form['judul'] = $dataForm->judul;
                    $form['status'] = $dataForm->status;
                    $form['created_at'] = $dataForm->created_at;
                    $form['updated_at'] = $dataForm->updated_at;
                    $form['tipe'] = $dataForm->tipe;
                    $form['kategori'] = '';
                    if($dataForm->kategori_isian) {
                        $form['kategori'] = str_replace('-', ' ', $dataForm->kategori_isian->kode) ?? '';
                    }
                    $form['jenis'] = '';
                    if($dataForm->jenis_form) {
                        $form['jenis'] = $dataForm->jenis_form->nama  ?? '';
                    }
                    $form['pilihan'] = [];
                    if($dataForm->pilihan) {
                        $pilihan = $dataForm->pilihan->map(function ($dataPilihan) {
                            $pilihan = [];
                            $pilihan['uuid'] = $dataPilihan->uuid ?? '';
                            $pilihan['pilihan'] = $dataPilihan->pilihan ?? '';
                            $pilihan['laporan_id'] = $dataPilihan->isian_id;

                            return $pilihan;
                        });

                        $form['pilihan'] = $pilihan;
                    }

                    return $form;
                });

                $data['kategori'] = $dataKategori->kode;
                $data['data'] = $form;
                
                return $data;
            });

            return response()->json([
                'success' => true,
                'message' => 'Data Form CCTV',
                'code'    => 200,
                'tipe'    => env('FORM_CCTV'),
                'data'    => $data,
            ]);
        } catch (\Throwable $th) {
            return writeLog($th->getMessage());
        }
    }

    public function formCLEANING(Request $request)
    {
        try {
            $formKategoriIsian = FormIsianKategori::where('form_jenis', env('FORM_CLEANING'))->get();

            if (!$formKategoriIsian) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan',
                    'code'    => 404,
                    'tipe'    => env('FORM_CLEANING')
                ]);
            }

            $data = $formKategoriIsian->map(function ($dataKategori) {
                $data = [];
                $form = FormIsian::with(['jenis_form', 'kategori_isian', 'pilihan' => function($query) {
                    $query->orderByRaw("CASE pilihan
                    WHEN 'OK' THEN 1
                    WHEN 'NOT OK' THEN 2
                    ELSE 3
                    END ASC
                    ");
                }])->where('status', 1)->where('kategori', $dataKategori->kode)->where('form_jenis', env('FORM_CLEANING'))->orderBy('kategori', 'asc')->orderBy('judul', 'asc')->get();

                $form = $form->map(function ($dataForm) {
                    $form = [];
                    $form['uuid'] = $dataForm->uuid;
                    $form['judul'] = $dataForm->judul;
                    $form['status'] = $dataForm->status;
                    $form['created_at'] = $dataForm->created_at;
                    $form['updated_at'] = $dataForm->updated_at;
                    $form['tipe'] = $dataForm->tipe;
                    $form['kategori'] = '';
                    if($dataForm->kategori_isian) {
                        $form['kategori'] = str_replace('-', ' ', $dataForm->kategori_isian->kode) ?? '';
                    }
                    $form['jenis'] = '';
                    if($dataForm->jenis_form) {
                        $form['jenis'] = $dataForm->jenis_form->nama  ?? '';
                    }
                    $form['pilihan'] = [];
                    if($dataForm->pilihan) {
                        $pilihan = $dataForm->pilihan->map(function ($dataPilihan) {
                            $pilihan = [];
                            $pilihan['uuid'] = $dataPilihan->uuid ?? '';
                            $pilihan['pilihan'] = $dataPilihan->pilihan ?? '';
                            $pilihan['laporan_id'] = $dataPilihan->isian_id;

                            return $pilihan;
                        });

                        $form['pilihan'] = $pilihan;
                    }

                    return $form;
                });

                $data['kategori'] = $dataKategori->kode;
                $data['data'] = $form;

                return $data;
            });

            return response()->json([
                'success' => true,
                'message' => 'Data Form Cleaning',
                'code'    => 200,
                'tipe'    => env('FORM_CLEANING'),
                'data'    => $data,
            ]);
        } catch (\Throwable $th) {
            return writeLog($th->getMessage());
        }
    }

    public function formFACILITIES(Request $request)
    {
        try {
            $formKategoriIsian = FormIsianKategori::where('form_jenis', env('FORM_FACILITIES'))->get();

            if (!$formKategoriIsian) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan',
                    'code'    => 404,
                    'tipe'    => env('FORM_FACILITIES')
                ]);
            }

            $data = $formKategoriIsian->map(function ($dataKategori) {
                $data = [];
                $form = FormIsian::with(['jenis_form', 'kategori_isian', 'pilihan' => function($query) {
                    $query->orderByRaw("
                    CASE pilihan
                    WHEN 'OK' THEN 1
                    WHEN 'NORMAL' THEN 2
                    WHEN 'RUNNING' THEN 3
                    WHEN 'HIJAU (penuh)' THEN 4
                    WHEN 'STANDBY' THEN 5
                    WHEN 'NOT OK' THEN 6
                    ELSE 7
                    END ASC
                    ");
                }])->where('status', 1)->where('kategori', $dataKategori->kode)->where('form_jenis', env('FORM_FACILITIES'))->orderBy('kategori', 'asc')->orderBy('judul', 'asc')->get();

                $form = $form->map(function ($dataForm) {
                    $form = [];
                    $form['uuid'] = $dataForm->uuid;
                    $form['judul'] = $dataForm->judul;
                    $form['status'] = $dataForm->status;
                    $form['created_at'] = $dataForm->created_at;
                    $form['updated_at'] = $dataForm->updated_at;
                    $form['tipe'] = $dataForm->tipe;
                    $form['kategori'] = '';
                    if($dataForm->kategori_isian) {
                        $form['kategori'] = str_replace('-', ' ', $dataForm->kategori_isian->kode) ?? '';
                    }
                    $form['jenis'] = '';
                    if($dataForm->jenis_form) {
                        $form['jenis'] = $dataForm->jenis_form->nama  ?? '';
                    }
                    $form['pilihan'] = [];
                    if($dataForm->pilihan) {
                        $pilihan = $dataForm->pilihan->map(function ($dataPilihan) {
                            $pilihan = [];
                            $pilihan['uuid'] = $dataPilihan->uuid ?? '';
                            $pilihan['pilihan'] = $dataPilihan->pilihan ?? '';
                            $pilihan['laporan_id'] = $dataPilihan->isian_id;

                            return $pilihan;
                        });

                        $form['pilihan'] = $pilihan;
                    }

                    return $form;
                });

                $data['kategori'] = $dataKategori->kode;
                $data['data'] = $form;

                return $data;
            });

            return response()->json([
                'success' => true,
                'message' => 'Data Form Facilities',
                'code'    => 200,
                'tipe'    => env('FORM_FACILITIES'),
                'data'    => $data,
            ]);
        } catch (\Throwable $th) {
            return writeLog($th->getMessage());
        }
    }

    public function show(Request $request, $id)
    {
        try {
            $form = FormIsian::with(['jenis_form', 'kategori_isian', 'pilihan' => function($query) {
                $query->orderBy('pilihan', 'asc');
            }])->where('uuid', $id)->first();

            if (!$form) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan',
                    'code'    => 404,
                ]);
            }

            $data = [];
            $data['uuid'] = $form->uuid;
            $data['judul'] = $form->judul;
            $data['status'] = $form->status;
            $data['created_at'] = $form->created_at;
            $data['updated_at'] = $form->updated_at;
            $data['tipe'] = $form->tipe;

            $data['kategori'] = '';
            if($form->kategori_isian) {
                $data['kategori'] = str_replace('-', ' ', $form->kategori_isian->kode) ?? '';
            }
            $data['jenis'] = '';
            if($form->jenis_form) {
                $data['jenis'] = $form->jenis_form->nama  ?? '';
            }
            $data['pilihan'] = [];
            if($form->pilihan) {
                foreach($form->pilihan as $id => $item) {
                    $data['pilihan'][$id]['uuid'] = $item->uuid ?? '';
                    $data['pilihan'][$id]['pilihan'] = $item->pilihan ?? '';
                }
            }

            return response()->json([
                'success' => true,
                'message' => 'Data Form',
                'code'    => 200,
                'data'    => $data,
            ]);
        } catch (\Throwable $th) {
            return writeLog($th->getMessage());
        }
    }

    // public function update()
    // {
    //     $this->validate($this->request, [
    //         'tgllahir' => 'required',
    //         'jenis_kelamin' => 'required',
    //         'alamat' => 'required',
    //         // 'foto'   => 'required',
    //     ]);

    //     DB::beginTransaction();
    //     try {
    //         $decodeToken = parseJwt($this->request->header('Authorization'));
    //         $uuid        = $decodeToken->user->uuid;
    //         $user   = Profile::where('user_id', $uuid)->first();

    //         if (!$user) {
    //             return response()->json([
    //                 'success' => false,
    //                 'message' => 'Pengguna tidak ditemukan',
    //                 'code'    => 404,
    //             ]);
    //         }

            
    //         $pathfoto = $user->foto;
    //         if ($this->request->foto) {
    //             $foto     = base64_decode($this->request->foto);
    //             $pathfoto = 'profile/foto/'. $uuid.'.png';
    //             $upload   = Flysystem::connection('awss3')->put($pathfoto, $foto);
    //         } 

    //         $user->update([
    //             'tgllahir' => date('Y-m-d', strtotime($this->request->tgllahir)),
    //             'jenis_kelamin' => $this->request->jenis_kelamin,
    //             'alamat' => $this->request->alamat,
    //             'foto'   => $pathfoto,
    //         ]);

    //         $user = User::with('profile')->where('uuid', $uuid)->first();
    //         $aksesToken = generateJwt($user);

    //         DB::commit();
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Berhasil ubah profil',
    //             'code'    => 200,
    //             'data'    => [
    //                 'akses_token' => $aksesToken,
    //             ]
    //         ]);
    //     } catch (\Throwable $th) {
    //         DB::rollback();
    //         return writeLog($th->getMessage());
    //     }
    // }

}
