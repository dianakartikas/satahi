<?php

namespace App\Models;

use CodeIgniter\Model;

class PenarikanModel extends Model
{
    protected $PenarikanModel;
    protected $table = 'saldokeluar';
    protected $primaryKey = 'id_keluar';
    protected $allowedFields = ['id_nasabah', 'saldos', 'saldot', 'jumlah_keluar'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function tabelPenarikan()
    {
        $this->builder =  $this->db->table('saldokeluar');
        $this->builder->select('id_keluar, nama, saldos, saldot, saldo, jumlah_keluar, user_image, saldokeluar.created_at as tglbuat, saldos, saldokeluar.updated_at as tglubah');
        $this->builder->join('datanasabah', 'datanasabah.id_nasabah = saldokeluar.id_nasabah', 'left');
        return $this->builder->get()->getResultArray();
    }
    // public function tabelTransaksiEdit($id)
    // {
    //     $this->builder =  $this->db->table('datatransaksi');
    //     $this->builder->select('id_transaksi, saldot, datanasabah.nama as namanasabah, datasampah.nama as namasampah, jenis_sampah, saldo, satuan, harga, total, gambar, user_image, alamat, no_hp, datatransaksi.created_at as tglbuat, saldos, datatransaksi.updated_at as tglubah, saldot');
    //     $this->builder->join('datanasabah', 'datanasabah.id_nasabah = datatransaksi.id_nasabah');
    //     $this->builder->join('datasampah', 'datasampah.id_sampah = datatransaksi.id_sampah');
    //     $this->builder->where('id_transaksi', $id);
    //     return $this->builder->get()->getRow();
    // }
    public function joinNasabah($id_nasabah)
    {
        $this->builder =  $this->db->table('saldokeluar');
        $this->builder->select('id_keluar, nama, saldos, saldot, saldo, jumlah_keluar, user_image, saldokeluar.created_at as tglbuat, saldos, saldokeluar.updated_at as tglubah');
        $this->builder->join('datanasabah', 'datanasabah.id_nasabah = saldokeluar.id_nasabah', 'left');

        $this->builder->where('saldokeluar.id_nasabah', $id_nasabah);
        return $this->builder->get()->getResultArray();
    }
    public function kartuPenarikan()
    {
        $this->builder =  $this->db->table('saldokeluar');
        $this->builder->select('id_keluar, nama, saldos, saldot, saldo, jumlah_keluar, user_image, saldokeluar.created_at as tglbuat, saldos, saldokeluar.updated_at as tglubah');
        $this->builder->join('datanasabah', 'datanasabah.id_nasabah = saldokeluar.id_nasabah', 'left');
        $uri = service('uri');
        $kode = $uri->getSegment(3);
        $this->builder->where('datanasabah.kode', $kode);
        return $this->builder->get()->getResultArray();
    }
    public function tabelPenarikanEdit($id)
    {
        $this->builder =  $this->db->table('saldokeluar');
        $this->builder->select('id_keluar, nama, saldos, saldot, alamat, saldo, jumlah_keluar, user_image, saldokeluar.created_at as tglbuat, saldos, saldokeluar.updated_at as tglubah');
        $this->builder->join('datanasabah', 'datanasabah.id_nasabah = saldokeluar.id_nasabah', 'left');
        $this->builder->where('id_keluar', $id);
        return $this->builder->get()->getRow();
    }
    public function hitungKredit()
    {
        return $this->db->table('saldokeluar')
            ->selectSUM('jumlah_keluar')
            ->get()->getResultArray();
    }
    public function hitungPenarikan()
    {
        return $this->db->table('saldokeluar')
            ->selectSUM('jumlah_keluar')
            ->countAllResults();
    }

    // public function countTransaksi()
    // {
    //     return $this->db->table('datatransaksi')
    //         ->countAllResults();
    // }
}
