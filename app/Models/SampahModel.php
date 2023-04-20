<?php

namespace App\Models;

use CodeIgniter\Model;

class SampahModel extends Model
{
    protected $SampahModel;
    protected $table = 'datasampah';
    protected $primaryKey = 'id_sampah';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'harga', 'jenis_sampah'];

    public function jumlahSampah()
    {
       return $this->db->table('datasampah')    
        ->countAllResults();
    }
}
