<?php

namespace App\Models;

use CodeIgniter\Model;

class NasabahModel extends Model
{
    protected $NasabahModel;
    protected $table = 'datanasabah';
    protected $primaryKey = 'id_nasabah';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama', 'alamat', 'no_hp', 'no_rekening', 'saldo', 'user_image', 'aktif', 'kode', 'gambar_kartu', 'depan'];
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    public function NasabahId($id_nasabah)
    {
        $this->builder =  $this->db->table('datanasabah');
        $this->builder->where('id_nasabah', $id_nasabah);
        $masuk = 1;
        $this->builder->where('aktif', $masuk);

        return $this->builder->get()->getRow();
    }

    public function NasabahAktif()
    {
        $this->builder =  $this->db->table('datanasabah');
        $masuk = 1;
        $this->builder->where('aktif', $masuk);
        return $this->builder->get()->getResultArray();
    }
    public function NasabahTidakAktif()
    {
        $this->builder =  $this->db->table('datanasabah');
        $masuk = 0;
        $this->builder->where('aktif', $masuk);
        return $this->builder->get()->getResultArray();
    }
    public function jumlahNasabah()
    {
        return $this->db->table('datanasabah')
            ->where('aktif', '1')
            ->countAllResults();
    }
    public function jumlahNonNasabah()
    {
        return $this->db->table('datanasabah')
            ->where('aktif', '0')
            ->countAllResults();
    }
    // public function kartuNasabah($id_nasabah)
    // {

    //     $this->builder =  $this->db->table('datanasabah');
    //     $this->builder->select('id_nasabah, nama,  no_rekening, alamat, no_hp, kode');

    //     $this->builder->where('id_nasabah', $id_nasabah);
    //     return $this->builder->get()->getRow();
    // }

    public function cekSaldo()
    {
        $uri = service('uri');
        $kode = $uri->getSegment(3);
        $this->builder =  $this->db->table('datanasabah');

        $this->builder->where('kode', $kode);

        return $this->builder->get()->getRow();
    }
}
