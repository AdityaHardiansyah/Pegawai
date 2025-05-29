<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct() 
    {
        $this->ModelUser = new ModelUser();
    }
    
    public function index()
    {
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'User',
            'menu' => 'masterdata',
            'submenu' => 'user',
            'page' => 'v_user',
            'user' => $this->ModelUser->AllData(),

        ];
        return view('v_template', $data);
    }

public function InsertData()
{
    $validation = \Config\Services::validation();

    $rules = [
        'nama_user' => 'required',
        'email'     => 'required|valid_email|is_unique[tbl_user.email]',
        'password'  => [
            'label' => 'Password',
            'rules' => 'required|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/]',
            'errors' => [
                'required' => '{field} harus diisi.',
                'min_length' => '{field} minimal 8 karakter.',
                'regex_match' => '{field} harus mengandung huruf besar, huruf kecil, angka, dan simbol.',
            ]
        ],
        'pass_confirm' => [
            'label' => 'Konfirmasi Password',
            'rules' => 'required|matches[password]',
            'errors' => [
                'required' => '{field} harus diisi.',
                'matches' => 'Konfirmasi Password tidak sama dengan Password.',
            ]
        ],
        'level' => 'required|integer'
    ];

    if (!$this->validate($rules)) {
        session()->setFlashdata('error', $validation->getErrors());
        return redirect()->back()->withInput();
    }

    $data = [
        'nama_user' => $this->request->getPost('nama_user'),
        'email'     => $this->request->getPost('email'),
        'password'  => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        'level'     => $this->request->getPost('level'),
    ];

    $this->ModelUser->InsertData($data);

    session()->setFlashdata('pesan', 'User Berhasil Ditambahkan !!');
    return redirect()->to('User');

        }

public function UpdateData($id_user)
{
    $validation = \Config\Services::validation();

    // Rules validasi password hanya jika password diisi (opsional)
    $rules = [
        'nama_user' => 'required',
        'email' => 'required|valid_email',
        'level' => 'required|integer',
    ];

    $password = $this->request->getPost('password');
    $pass_confirm = $this->request->getPost('pass_confirm');

    if (!empty($password)) {
        $rules['password'] = [
            'label' => 'Password',
            'rules' => 'min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).+$/]',
            'errors' => [
                'min_length' => '{field} minimal 8 karakter.',
                'regex_match' => '{field} harus mengandung huruf besar, huruf kecil, angka, dan simbol.',
            ],
        ];
        $rules['pass_confirm'] = [
            'label' => 'Konfirmasi Password',
            'rules' => 'matches[password]',
            'errors' => [
                'matches' => 'Konfirmasi Password tidak sama dengan Password.',
            ],
        ];
    }

    if (!$this->validate($rules)) {
        session()->setFlashdata('error', $validation->getErrors());
        return redirect()->back()->withInput();
    }

    $data = [
        'id_user' => $id_user,
        'nama_user' => $this->request->getPost('nama_user'),
        'email' => $this->request->getPost('email'),
        'level' => $this->request->getPost('level'),
    ];

    if (!empty($password)) {
        // Hash password baru
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    $this->ModelUser->UpdateData($data);

    session()->setFlashdata('pesan', 'User Berhasil Diubah !!');
    return redirect()->to('User');
}


    public function DeleteData($id_user)
    {
        $data = [
            'id_user' => $id_user,
        ];
        $this->ModelUser->DeleteData($data);
        session()->setFlashdata('pesan','Data Berhasil dihapus !!');
        return redirect()->to('User');
    }
}
