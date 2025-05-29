<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelView extends Model
{
    protected $table = 'tbl_pegawai'; // set nama tabel

    public function AllData()
    {
        return $this->db->table('tbl_pegawai')
            ->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja=tbl_pegawai.id_unit_kerja')
            ->join('tbl_posisi', 'tbl_posisi.id_posisi=tbl_pegawai.id_posisi')
            ->orderBy('id_pegawai', 'ASC')
            ->get()
            ->getResultArray();
    }

    public function DetailData($id_pegawai)
    {
        return $this->db->table('tbl_pegawai')
        ->join('tbl_unit_kerja', 'tbl_unit_kerja.id_unit_kerja = tbl_pegawai.id_unit_kerja')
        ->join('tbl_posisi', 'tbl_posisi.id_posisi = tbl_pegawai.id_posisi')
        ->where('tbl_pegawai.id_pegawai', $id_pegawai)
        ->get()
        ->getRowArray();
    }
}

