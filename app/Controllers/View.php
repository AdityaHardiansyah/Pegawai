<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelView;
use App\Models\ModelUnitKerja;
use App\Models\ModelPosisi;

class View extends BaseController
{

    public function __construct() 
    {
        $this->ModelView = new ModelView();
        $this->ModelUnitKerja = new ModelUnitKerja();
        $this->ModelPosisi = new ModelPosisi();
    }

    public function index($id_pegawai)
{    
    $encrypter = \Config\Services::encrypter();
    $pegawai = $this->ModelView->DetailData($id_pegawai);

    $decoded = base64_decode($pegawai['NIK']);
    if ($decoded === false) {
        $pegawai['NIK'] = 'Error: base64 decode gagal';
    } else {
        try {
            $pegawai['NIK'] = $encrypter->decrypt($decoded);
        } catch (\Exception $e) {
            $pegawai['NIK'] = 'Error decrypt: ' . $e->getMessage();
        }
    }

    $data = [
        'judul' => 'Master Data',
        'subjudul' => 'View',
        'menu' => 'masterdata',
        'submenu' => 'view',
        'page' => 'v_view',
        'pegawai' => $pegawai,
        'unitkerja' => $this->ModelUnitKerja->AllData(),
        'posisi' => $this->ModelPosisi->AllData(),
    ];

    return view('v_template', $data);
} 
}
