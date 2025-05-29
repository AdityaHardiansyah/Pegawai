<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPegawai extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_pegawai')
        ->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja=tbl_pegawai.id_unit_kerja')
        ->join('tbl_posisi', 'tbl_posisi.id_posisi=tbl_pegawai.id_posisi')
        ->orderBy('id_pegawai', 'ASC')
        ->get()
        ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_pegawai')->insert($data);
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_pegawai')
        ->where('id_pegawai', $data['id_pegawai'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_pegawai')
        ->where('id_pegawai', $data['id_pegawai'])
        ->delete($data);
    }
}
