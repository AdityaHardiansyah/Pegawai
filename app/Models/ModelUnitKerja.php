<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUnitKerja extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_unit_kerja')
        ->get()
        ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_unit_kerja')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_unit_kerja')
        ->where('id_unit_kerja', $data['id_unit_kerja'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_unit_kerja')
        ->where('id_unit_kerja', $data['id_unit_kerja'])
        ->delete($data);
    }
}
