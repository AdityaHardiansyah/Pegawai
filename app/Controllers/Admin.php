<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPegawai;
use App\Models\ModelUnitKerja;
use App\Models\ModelPosisi;
use App\Models\ModelUser;

class Admin extends BaseController
{

        public function __construct() 
    {
        $this->ModelPegawai = new ModelPegawai();
        $this->ModelUnitKerja = new ModelUnitKerja();
        $this->ModelPosisi = new ModelPosisi();
        $this->ModelUser = new ModelUser();
    }

public function index()
{    
    $encrypter = \Config\Services::encrypter();
$pegawai = $this->ModelPegawai->AllData();

foreach ($pegawai as &$value) {
    $decoded = base64_decode($value['NIK']);
    if ($decoded === false) {
        $value['NIK'] = 'Error: base64 decode gagal';
        continue;
    }
    try {
        $value['NIK'] = $encrypter->decrypt($decoded);
    } catch (\Exception $e) {
        $value['NIK'] = 'Error decrypt: ' . $e->getMessage();
    }
}

    $data = [
        'judul' => 'Dashboard',
        'subjudul' => '',
        'menu' => 'dashboard',
        'submenu' => '',
        'page' => 'v_admin',
        'pegawai' => $pegawai, // ✅ gunakan yang sudah dimask
        'unitkerja' => $this->ModelUnitKerja->AllData(),
        'posisi' => $this->ModelPosisi->AllData(),
        'user' => $this->ModelUser->AllData(),
    ];

    return view('v_template', $data);
}
    public function setting()
    {
        $data = [
            'judul' => 'Setting',
            'subjudul' => '',
            'menu' => 'setting',
            'submenu' => '',
            'page' => 'v_setting',

        ];
        return view('v_template', $data);
        
    }
}