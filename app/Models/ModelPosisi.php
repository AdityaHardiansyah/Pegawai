<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPosisi extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_posisi')
        ->get()
        ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_posisi')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_posisi')
        ->where('id_posisi', $data['id_posisi'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_posisi')
        ->where('id_posisi', $data['id_posisi'])
        ->delete($data);
    }
}
