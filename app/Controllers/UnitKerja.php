<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelUnitKerja;

class UnitKerja extends BaseController
{
   
    public function __construct() 
    {
        $this->ModelUnitKerja = new ModelUnitKerja();
    }
   
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Unit Kerja',
            'menu' => 'masterdata',
            'submenu' => 'unitkerja',
            'page' => 'v_unitkerja',
            'unitkerja' => $this->ModelUnitKerja->AllData(),

        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = ['nama_unit_kerja' => $this->request->getPost('nama_unit_kerja')];
        $this->ModelUnitKerja->InsertData($data);
        session()->setFlashdata('pesan','Data Berhasil Ditambahkan !!');
        return redirect()->to('unitkerja');
    }

    public function UpdateData($id_unit_kerja)
    {
        $data = [
            'id_unit_kerja' => $id_unit_kerja,
            'nama_unit_kerja' => $this->request->getPost('nama_unit_kerja')
        ];
        $this->ModelUnitKerja->UpdateData($data);
        session()->setFlashdata('pesan','Data Berhasil diubah !!');
        return redirect()->to('unitkerja');
    }

    public function DeleteData($id_unit_kerja)
    {
        $data = [
            'id_unit_kerja' => $id_unit_kerja,
        ];
        $this->ModelUnitKerja->DeleteData($data);
        session()->setFlashdata('pesan','Data Berhasil dihapus !!');
        return redirect()->to('unitkerja');
    }
}
