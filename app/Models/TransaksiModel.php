<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $TransaksiModel;
    protected $table = 'datatransaksi';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['id_nasabah', 'id_sampah', 'satuan', 'total', 'gambar', 'saldot', 'saldos'];
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    public function tabelTransaksi()
    {
        $this->builder =  $this->db->table('datatransaksi');
        $this->builder->select('id_transaksi, datanasabah.nama as namanasabah, datasampah.nama as namasampah, jenis_sampah, saldo, satuan, harga, total, gambar, user_image, datatransaksi.created_at as tglbuat, saldos, datatransaksi.updated_at as tglubah, saldot');
        $this->builder->join('datanasabah', 'datanasabah.id_nasabah = datatransaksi.id_nasabah', 'left');
        $this->builder->join('datasampah', 'datasampah.id_sampah = datatransaksi.id_sampah', 'left');
        return $this->builder->get()->getResultArray();
    }
    public function tabelTransaksiEdit($id)
    {
        $this->builder =  $this->db->table('datatransaksi');
        $this->builder->select('id_transaksi, datanasabah.nama as namanasabah, datasampah.nama as namasampah, jenis_sampah, saldo, satuan, harga, total, gambar, user_image, alamat, no_hp, datatransaksi.created_at as tglbuat, saldos, datatransaksi.updated_at as tglubah, saldot');
        $this->builder->join('datanasabah', 'datanasabah.id_nasabah = datatransaksi.id_nasabah');
        $this->builder->join('datasampah', 'datasampah.id_sampah = datatransaksi.id_sampah');
        $this->builder->where('id_transaksi', $id);
        return $this->builder->get()->getRow();
    }
    public function joinNasabah($id_nasabah)
    {
        $this->builder =  $this->db->table('datatransaksi');
        $this->builder->select('id_transaksi, datanasabah.nama as namanasabah, datasampah.nama as namasampah, jenis_sampah, saldo, satuan, harga, total, gambar, user_image, datatransaksi.created_at as tglbuat, saldos, datatransaksi.updated_at as tglubah, saldot');
        $this->builder->join('datanasabah', 'datanasabah.id_nasabah = datatransaksi.id_nasabah', 'left');
        $this->builder->join('datasampah', 'datasampah.id_sampah = datatransaksi.id_sampah', 'left');
        $this->builder->where('datatransaksi.id_nasabah', $id_nasabah);
        return $this->builder->get()->getResultArray();
    }
    public function kartuTransaksi()
    {
        $this->builder =  $this->db->table('datatransaksi');
        $this->builder->select('id_transaksi, datanasabah.nama as namanasabah, datasampah.nama as namasampah, jenis_sampah, saldo, satuan, harga, total, gambar, user_image, datatransaksi.created_at as tglbuat, saldos, datatransaksi.updated_at as tglubah, saldot');
        $this->builder->join('datanasabah', 'datanasabah.id_nasabah = datatransaksi.id_nasabah', 'left');
        $this->builder->join('datasampah', 'datasampah.id_sampah = datatransaksi.id_sampah', 'left');
        $uri = service('uri');
        $kode = $uri->getSegment(3);
        $this->builder->where('datanasabah.kode', $kode);
        return $this->builder->get()->getResultArray();
    }
    public function countJenis()
    {
        return $this->db->table('datatransaksi')   
        ->groupBy('id_sampah')
        ->countAllResults();     
    }

    public function persenTransaksi()
    {
        return $this->db->table('datatransaksi')

        ->groupBy('id_nasabah')
        ->countAllResults();     
    }
    public function countTransaksi()
    {
        return $this->db->table('datatransaksi')   
        ->countAllResults();     
    }
    public function hitungDebit()
        {
            return $this->db->table('datatransaksi')
           ->selectSUM('total')
           ->get()->getResultArray();
           
        }
        public function chart_transaksi()
        {
            $query = $this->db->query("SELECT datatransaksi.created_at, datatransaksi.id_transaksi, SUM(datatransaksi.satuan) as totaljual FROM datatransaksi GROUP BY datatransaksi.created_at");
            $hasil1 = [];
            if (!empty($query)) {
                foreach ($query->getResultArray() as $data) {
                    $hasil1[] = $data;
                }
            }
            return $hasil1;
        }
}
