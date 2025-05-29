<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table = 'tbl_user'; // ⬅️ WAJIB!
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['nama_user', 'email', 'password', 'level'];

    public function AllData()
    {
        return $this->db->table('tbl_user')->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_user')
                 ->where('id_user', $data['id_user'])
                 ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_user')
                 ->where('id_user', $data['id_user'])
                 ->delete($data);
    }

    public function LoginUser($email)
    {
        return $this->where('email', $email)->first();
    }

}
