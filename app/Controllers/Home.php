<?php

namespace App\Controllers;
use App\Models\ModelUser;

class Home extends BaseController
{
    public function __construct() 
    {
        $this->ModelUser = new ModelUser();
    }

    
    public function index(): string
    {
        $data = [
            'judul' => 'Login',

        ];
        return view('v_login', $data);
    }

public function CekLogin()
{
    $validation = \Config\Services::validation();

    if ($this->validate([
        'email' => [
            'label' => 'E-Mail',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} Masih Kosong',
            ]
        ],
        'password' => [
            'label' => 'Kata Sandi',
            'rules' => 'required|min_length[8]|regex_match[/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/]',
            'errors' => [
                'required' => 'Kata sandi wajib diisi.',
                'min_length' => 'Kata sandi minimal 8 karakter.',
                'regex_match' => 'Kata sandi harus mengandung huruf besar, angka, dan simbol.'
            ]
        ],
    ])) {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->ModelUser->LoginUser($email); // Harusnya cari berdasarkan email saja

        if ($user && password_verify($password, $user['password'])) {
            session()->set('id_user', $user['id_user']);
            session()->set('nama_user', $user['nama_user']);
            session()->set('level', $user['level']);

            return redirect()->to(base_url($user['level'] == 1 ? 'Admin' : 'Penjualan'));
        } else {
            session()->setFlashdata('gagal', 'Login gagal. Periksa kembali email dan password Anda.');
            return redirect()->to(base_url('Home'));
        }
    } else {
        session()->setFlashdata('error', $validation->getErrors());
        return redirect()->to(base_url('Home'))->withInput();
    }
}
        public function Logout()
        {
            $session = session();
            $session->setFlashdata('pesan', 'Anda Berhasil Logout.');
            $session->destroy();
            return redirect()->to(base_url('Home'));
        }
}
