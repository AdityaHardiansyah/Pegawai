<?php

namespace App\Controllers;


use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPosisi;

class Posisi extends BaseController
{
    public function __construct() 
    {
        $this->ModelPosisi = new ModelPosisi();
    }

    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Posisi',
            'menu' => 'masterdata',
            'submenu' => 'Posisi',
            'page' => 'v_posisi',
            'posisi' => $this->ModelPosisi->AllData(),

        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = ['nama_posisi' => $this->request->getPost('nama_posisi')];
        $this->ModelPosisi->InsertData($data);
        session()->setFlashdata('pesan','Data Berhasil Ditambahkan !!');
        return redirect()->to('Posisi');
    }

    public function UpdateData($id_posisi)
    {
        $data = [
            'id_posisi' => $id_posisi,
            'nama_posisi' => $this->request->getPost('nama_posisi')
        ];
        $this->ModelPosisi->UpdateData($data);
        session()->setFlashdata('pesan','Data Berhasil diubah !!');
        return redirect()->to('Posisi');
    }

    public function DeleteData($id_posisi)
    {
        $data = [
            'id_posisi' => $id_posisi,
        ];
        $this->ModelPosisi->DeleteData($data);
        session()->setFlashdata('pesan','Data Berhasil dihapus !!');
        return redirect()->to('Posisi');
    }
}
