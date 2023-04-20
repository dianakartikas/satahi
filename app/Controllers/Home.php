<?php

namespace App\Controllers;

use App\Models\NasabahModel;
use App\Models\SampahModel;
use App\Models\TransaksiModel;
use App\Models\PenarikanModel;



class Home extends BaseController
{
    protected $NasabahModel;
    protected $SampahModel;
    protected $TransaksiModel;
    protected $PenarikanModel;




    function __construct()
    {
        $this->NasabahModel = new NasabahModel();
        $this->SampahModel = new SampahModel();
        $this->TransaksiModel = new TransaksiModel();
        $this->PenarikanModel = new PenarikanModel();
    }

    public function index()
    {
        return view('welcome_message');
    }
    public function masuk()
    {
        $data = [

            'config' => config('Auth'),
        ];
        return view('masuk', $data);
    }
    public function beranda()
    {
        $data = [
            'nasabah'    => $this->NasabahModel->jumlahNasabah(),
            'nonnasabah'    => $this->NasabahModel->jumlahNonNasabah(),
            'jumlahsampah' => $this->SampahModel->jumlahSampah(),
            'countjenis' => $this->TransaksiModel->countJenis(),
            'persenTransaksi' => $this->TransaksiModel->persenTransaksi(),
            'countTransaksi' => $this->TransaksiModel->countTransaksi(),
            'hitungDebit' => $this->TransaksiModel->hitungDebit(),
            'hitungKredit' => $this->PenarikanModel->hitungKredit(),
            'chart' => $this->TransaksiModel->chart_transaksi(),
            'hitungPenarikan' => $this->PenarikanModel->hitungPenarikan(),





        ];
        return view('beranda', $data);
    }
    public function cekSaldo()
    {
        $data = [

            'nasabah' => $this->NasabahModel->cekSaldo(),
            'penarikan' => $this->PenarikanModel->kartuPenarikan(),
            'transaksi' => $this->TransaksiModel->kartuTransaksi(),


        ];
        return view('ceksaldo', $data);
    }
}
