<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPegawai;
use App\Models\ModelUnitKerja;
use App\Models\ModelPosisi;

class Pegawai extends BaseController
{

    public function __construct() 
    {
        $this->ModelPegawai = new ModelPegawai();
        $this->ModelUnitKerja = new ModelUnitKerja();
        $this->ModelPosisi = new ModelPosisi();
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
        'judul' => 'Master Data',
        'subjudul' => 'Pegawai',
        'menu' => 'masterdata',
        'submenu' => 'pegawai',
        'page' => 'v_pegawai',
        'pegawai' => $pegawai, // ✅ gunakan yang sudah dimask
        'unitkerja' => $this->ModelUnitKerja->AllData(),
        'posisi' => $this->ModelPosisi->AllData(),
    ];

    return view('v_template', $data);
}

    public function InsertData()
    {
         $encrypter = \Config\Services::encrypter(); // Inisialisasi enkripsi

        if ($this->validate([
            'NIP' => [
                'label' => 'NIP Pegawai',
                'rules' => 'is_unique[tbl_pegawai.NIP]',
                'errors' => [
                    'is_unique' => '{field} Sudah Ada. Masukan Kode Lain',
                    ]
                ],
             'id_unit_kerja' => [
                'label' => 'Unit Kerja',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih',
                    ]
                ],   
             'id_posisi' => [
                'label' => 'Posisi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih',
                        ]
             ]

             
        ])){

        // ✅ Proses upload file setelah validasi
        $namaPegawai = $this->request->getPost('nama_pegawai');

        $file = $this->request->getFile('berkas');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $slugNama = url_title($namaPegawai, '-', true); // Contoh: "Budi Santoso" → "budi-santoso"
            $newName = $slugNama . '-' . time() . '.pdf';
            $file->move('uploads/pdf', $newName);
            $pdfPath = 'uploads/pdf/' . $newName;
        } else {
            session()->setFlashdata('error', 'Upload file gagal.');
            return redirect()->to(base_url('Pegawai'))->withInput();
        }

            $data = [
                'NIP' => $this->request->getPost('NIP'),
                'NIK' => base64_encode($encrypter->encrypt($this->request->getPost('NIK'))), // Enkripsi NIK
                'nama_pegawai' => $this->request->getPost('nama_pegawai'),
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'berkas' => $pdfPath,
                'gaji' => $this->request->getPost('gaji'),
                'tunjangan' => $this->request->getPost('tunjangan'),
                'id_unit_kerja' => $this->request->getPost('id_unit_kerja'),
                'id_posisi' => $this->request->getPost('id_posisi'),
            
            ];
            $this->ModelPegawai->InsertData($data);
            session()->setFlashdata('pesan','Pegawai Berhasil Ditambahkan !!');
            return redirect()->to('Pegawai');
        }else{
         session()->setFlashdata('error', \Config\Services::validation()->getErrors());
         return redirect()->to(base_url('Pegawai'))->withInput('validation', \Config\Services::validation());
        } 
       
    }

    public function UpdateData($id_pegawai)
    {
        $encrypter = \Config\Services::encrypter();
        if ($this->validate([
            
             'id_unit_kerja' => [
                'label' => 'Unit Kerja',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih',
                    ]
                ],   
             'id_posisi' => [
                'label' => 'Posisi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih',
                        ]
             ]
        ])){
        $data = [
            'id_pegawai' => $id_pegawai,
                'NIP' => $this->request->getPost('NIP'),
                'NIK' => base64_encode($encrypter->encrypt($this->request->getPost('NIK'))),
                'nama_pegawai' => $this->request->getPost('nama_pegawai'),
                'alamat' => $this->request->getPost('alamat'),
                'no_hp' => $this->request->getPost('no_hp'),
                'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
                'gaji' => $this->request->getPost('gaji'),
                'tunjangan' => $this->request->getPost('tunjangan'),
                'id_unit_kerja' => $this->request->getPost('id_unit_kerja'),
                'id_posisi' => $this->request->getPost('id_posisi'),
        
        ];
        $this->ModelPegawai->UpdateData($data);
        session()->setFlashdata('pesan','Pegawai Berhasil Diubah !!');
        return redirect()->to('Pegawai');
    }else{
        session()->setFlashdata('error', \Config\Services::validation()->getErrors());
        return redirect()->to(base_url('Pegawai'))->withInput('validation', \Config\Services::validation());
       } 
    }
    
    

    public function DeleteData($id_pegawai)
    {
        $data = [
            'id_pegawai' => $id_pegawai,
        ];
        $this->ModelPegawai->DeleteData($data);
        session()->setFlashdata('pesan','Pegawai Berhasil dihapus !!');
        return redirect()->to('Pegawai');
    }

    public function excel()
    {
        $encrypter = \Config\Services::encrypter();
        $pegawai = $this->ModelPegawai->AllData();

       foreach ($pegawai as &$value) {
    try {
        $decoded = base64_decode($value['NIK'], true);
        if ($decoded === false) {
            $value['NIK'] = 'Format base64 tidak valid';
        } else {
            $decrypted = $encrypter->decrypt($decoded);
            $value['NIK'] = $decrypted !== false ? $decrypted : 'Gagal dekripsi';
        }
    } catch (\Exception $e) {
        $value['NIK'] = 'Error dekripsi: ' . $e->getMessage();
    }
}

        $data = [
            'pegawai' => $pegawai,
        ];
        return view('v_export', $data);
    }
    
}
