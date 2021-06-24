<?php

namespace App\Models;

use CodeIgniter\Model;

class m_pasien extends Model
{
    protected $table = 'pasien';
    public function __construct()
    {

        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function getAllData()
    {
        return $this->db->table('pasien')->get()->getResultArray();
    }
    public function tambah($data)
    {
       return $this->db->table('pasien')->insert($data);
    }
    public function hapus($id)
    {
        return $this->db->table('pasien')->delete(['id'=> $id]);   
    }
    public function ubah($data, $id)
    {
        return $this->builder->update($data, ['id' => $id]);
    }
}
