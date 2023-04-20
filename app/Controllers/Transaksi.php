<?php

namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\SampahModel;
use App\Models\NasabahModel;
use App\Models\PenarikanModel;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;
use TCPDF;



class Transaksi extends BaseController
{

    protected $TransaksiModel;
    protected $SampahModel;
    protected $NasabahModel;
    protected $PenarikanModel;




    function __construct()
    {
        $this->TransaksiModel = new TransaksiModel();
        $this->SampahModel = new SampahModel();
        $this->NasabahModel = new NasabahModel();
        $this->PenarikanModel = new PenarikanModel();
    }

    public function index()
    {
        $data = [
            'sampah' => $this->SampahModel->findAll(),
            'nasabah' => $this->NasabahModel->findAll(),
            'transaksi' => $this->TransaksiModel->tabelTransaksi()
        ];
        return view('pembelian', $data);
    }
    public function tambahpembelian()
    {


        if ($this->request->isAJAX()) {
            $data = [
                'sampah' => $this->SampahModel->findAll(),
                'nasabah' => $this->NasabahModel->findAll(),

            ];
            $msg = [
                'data' => view('tpembelian', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function simpanpembelian()
    {
        if ($this->request->isAJAX()) {
            $id_nasabah = $this->request->getVar('id_nasabah');
            $id_sampah = $this->request->getVar('id_sampah');
            $satuan = $this->request->getVar('satuan');
            $total = $this->request->getVar('total');
            $saldot = $this->request->getVar('saldot');

            $saldosekarang = $this->request->getVar('saldosekarang');

            $valid = $this->validate([
                'id_nasabah' => [
                    'label' => 'Nasabah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'id_sampah' => [
                    'label' => 'Sampah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'satuan' => [
                    'label' => 'satuan',
                    'rules' => 'required|is_natural_no_zero',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_natural_no_zero' => '{field} tidak diperbolehkan',
                    ]
                ],
            ]);

            if (!$valid) {
                $validation = $this->validator;
                $msg = [
                    'error' => [
                        'id_nasabah' => $validation->getError('id_nasabah'),
                        'id_sampah' => $validation->getError('id_sampah'),
                        'satuan' => $validation->getError('satuan'),
                    ]
                ];
            } else {
                $this->TransaksiModel->insert([
                    'id_nasabah' => $id_nasabah,
                    'id_sampah' => $id_sampah,
                    'satuan' => $satuan,
                    'total' => $total,
                    'saldot' => $saldot,
                    'saldos' => $saldosekarang,
                ]);

                $this->NasabahModel->update($id_nasabah, [
                    'saldo' => $saldosekarang,

                ]);


                $msg = [
                    'success' => 'Data Kredit terbaru berhasil ditambahkan'
                ];
            }

            echo json_encode($msg);
        }
    }
    public function hapuspembelian()
    {
        if ($this->request->isAJAX()) {
            $id_transaksi = $this->request->getVar('id_transaksi');
            $ambilid = $this->TransaksiModel->find($id_transaksi);
            $id_nasabah = $ambilid['id_nasabah'];
            $ambilsaldo = $this->NasabahModel->find($id_nasabah);

            $this->NasabahModel->update($ambilid['id_nasabah'], [
                'saldo' => $ambilsaldo['saldo'] - $ambilid['total'],

            ]);
            $this->TransaksiModel->delete($id_transaksi);

            $msg = [
                'success' => "Data Transaksi berhasil dihapus"
            ];
            echo json_encode($msg);
        }
    }
    public function editpembelian()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id_transaksi');
            $id2 = $this->request->getVar('id_nasabah');

            $ambilid = $this->TransaksiModel->find($id);
            $id_nasabah = $ambilid['id_nasabah'];
            $ambilnasabah = $this->NasabahModel->find($id_nasabah);
            $id_sampah = $ambilid['id_sampah'];
            $ambilsampah = $this->SampahModel->find($id_sampah);
            $data = [
                'id_transaksi' => $id,
                'id_nasabah' => $id2,
                'namanasabah' => $ambilnasabah['nama'],
                'namasampah' => $ambilsampah['nama'],
                'harga' => $ambilsampah['harga'],
                'saldo' => $ambilnasabah['saldo'],
                'saldot' => $ambilid['saldot'],

                'satuan' => $ambilid['satuan'],
                'total' => $ambilid['total'],
                'sampah' => $this->SampahModel->findAll(),
            ];
            $msg = [
                'data' => view('epembelian', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function updatepembelian()
    {
        if ($this->request->isAJAX()) {
            $id_transaksi = $this->request->getVar('id_transaksi');
            $ambilid = $this->TransaksiModel->find($id_transaksi);
            $id_nasabah = $ambilid['id_nasabah'];

            $id_sampah = $this->request->getVar('id_sampah');
            $satuan = $this->request->getVar('satuan');
            $total = $this->request->getVar('total');
            $saldosekarang = $this->request->getVar('saldosekarang1');


            $valid = $this->validate([
                'id_sampah' => [
                    'rules' => 'required',
                    'label' => 'Nama Sampah',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                    ]
                ],
                'satuan' => [
                    'label' => 'Berat',
                    'rules' => 'required|is_natural_no_zero',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'is_natural_no_zero' => '{field} tidak diperbolehkan',
                    ]
                ],

            ]);
            if (!$valid) {
                $validation = $this->validator;
                $msg = [
                    'error' => [
                        'id_sampah' => $validation->getError('id_sampah'),
                        'satuan' => $validation->getError('satuan'),

                    ]
                ];
            } else {
                $this->TransaksiModel->update($id_transaksi, [
                    'id_sampah' => $id_sampah,
                    'satuan' => $satuan,
                    'total' => $total,
                    'saldos' => $saldosekarang,
                ]);
                $this->NasabahModel->update($id_nasabah, [
                    'saldo' => $saldosekarang,

                ]);

                $msg = [
                    'success' => 'Data Transaksi berhasil diubah'
                ];
            }

            echo json_encode($msg);
        }
    }
    public function penarikan()
    {
        $data = [
            'sampah' => $this->SampahModel->findAll(),
            'nasabah' => $this->NasabahModel->findAll(),
            'penarikan' => $this->PenarikanModel->tabelPenarikan(),
        ];
        return view('penarikan', $data);
    }
    public function invoice($id = 0)
    {
      
            $id = $this->request->uri->getSegment(2);
            $invoice = $this->TransaksiModel->tabelTransaksiEdit($id);
           
    
            $html = view('minvoice',[
                'invoice'=> $invoice,
            ]);
    
            $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);
    
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('');
            $pdf->SetTitle('Invoice'. $invoice->namanasabah);
            $pdf->SetSubject('Invoice'.$invoice->namanasabah);
    
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->setDefaultTableColumns(true);
            $pdf->addPage();
    
            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');
            //line ini penting
            $this->response->setContentType('application/pdf');
            //Close and output PDF document
            $pdf->Output('invoice'.'_'.$invoice->namanasabah.'_'.date('d-m-Y', strtotime($invoice->tglbuat)).'.pdf', 'I');
            
    

        $data = [

            'invoice' => $this->TransaksiModel->tabelTransaksiEdit($id)

        ];
        return view('minvoice', $data);
    }
    public function simpanpenarikan()
    {
        if ($this->request->isAJAX()) {
            $id_nasabah = $this->request->getVar('id_nasabah');
            $saldo = $this->request->getVar('saldo');
            $jumlah_penarikan = $this->request->getVar('jumlah_penarikan');
            $saldosekarang = $this->request->getVar('saldosekarang');
            $minimal = 1000;

            $valid = $this->validate([
                'id_nasabah' => [
                    'label' => 'Nasabah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'jumlah_penarikan' => [
                    'label' => 'Jumlah Penarikan',
                    'rules' => 'required|less_than_equal_to[' . $saldo . ']|greater_than_equal_to[' . $minimal . ']',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'less_than_equal_to' => 'saldo tidak cukup',
                        'greater_than_equal_to' => 'Penarikan minimal Rp. 1000',

                    ]
                ],

            ]);

            if (!$valid) {
                $validation = $this->validator;
                $msg = [
                    'error' => [
                        'id_nasabah' => $validation->getError('id_nasabah'),
                        'jumlah_penarikan' => $validation->getError('jumlah_penarikan'),

                    ]
                ];
            } else {
                $this->PenarikanModel->insert([
                    'id_nasabah' => $id_nasabah,
                    'jumlah_keluar' => $jumlah_penarikan,
                    'saldos' => $saldo-$jumlah_penarikan,
                    'saldot' => $saldo,

                ]);

                $this->NasabahModel->update($id_nasabah, [
                    'saldo' => $saldosekarang,

                ]);


                $msg = [
                    'success' => 'Data Debit terbaru berhasil ditambahkan'
                ];
            }

            echo json_encode($msg);
        }
    }
    public function tambahpenarikan()
    {


        if ($this->request->isAJAX()) {
            $data = [

                'nasabah' => $this->NasabahModel->findAll(),

            ];
            $msg = [
                'data' => view('tpenarikan', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function editpenarikan()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id_keluar');
            $id2 = $this->request->getVar('id_nasabah');

            $ambilid = $this->PenarikanModel->find($id);
            $id_nasabah = $ambilid['id_nasabah'];
            $ambilnasabah = $this->NasabahModel->find($id_nasabah);

            $data = [
                'id_keluar' => $id,
                'id_nasabah' => $id2,
                'nama' => $ambilnasabah['nama'],
                'saldo' => $ambilnasabah['saldo'],
                'jumlah_keluar' => $ambilid['jumlah_keluar'],

            ];
            $msg = [
                'data' => view('epenarikan', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function updatepenarikan()
    {
        if ($this->request->isAJAX()) {
            $id_keluar = $this->request->getVar('id_keluar');
            $ambilid = $this->PenarikanModel->find($id_keluar);
            $id_nasabah = $ambilid['id_nasabah'];
            $ambilnasabah = $this->NasabahModel->find($id_nasabah);
            $jumlah_penarikan1 = $this->request->getVar('jumlah_keluar1');

            $saldosekarang = $this->request->getVar('saldosekarang1');
            $jumlah_penarikan = $this->request->getVar('jumlah_penarikan');
            $minimal = 1000;
            $saldo = $this->request->getVar('saldo');

            $valid = $this->validate([
                'jumlah_penarikan' => [
                    'label' => 'Jumlah Penarikan',
                    'rules' => 'required|less_than_equal_to[' . $saldo . ']|greater_than_equal_to[' . $minimal . ']',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'less_than_equal_to' => 'saldo tidak cukup',
                        'greater_than_equal_to' => 'Penarikan minimal Rp. 1000',

                    ]
                ],

            ]);
            if (!$valid) {
                $validation = $this->validator;
                $msg = [
                    'error' => [
                        'jumlah_penarikan' => $validation->getError('jumlah_penarikan'),


                    ]
                ];
            } else {
                $this->PenarikanModel->update($id_keluar, [
                    // 'saldot' => $ambilnasabah['saldo'],
                    'jumlah_keluar' => $jumlah_penarikan,

                    'saldos' => ($saldo+$jumlah_penarikan1)-$jumlah_penarikan,


                ]);
                $this->NasabahModel->update($id_nasabah, [
                    'saldo' => $saldosekarang,

                ]);

                $msg = [
                    'success' => 'Data Debit berhasil diubah'
                ];
            }

            echo json_encode($msg);
        }
    }
    public function hapuspenarikan()
    {
        if ($this->request->isAJAX()) {
            $id_keluar = $this->request->getVar('id_keluar');
            $ambilid = $this->PenarikanModel->find($id_keluar);
            $id_nasabah = $ambilid['id_nasabah'];
            $ambilsaldo = $this->NasabahModel->find($id_nasabah);

            $this->NasabahModel->update($ambilid['id_nasabah'], [
                'saldo' => $ambilsaldo['saldo'] + $ambilid['jumlah_keluar'],

            ]);
            $this->PenarikanModel->delete($id_keluar);

            $msg = [
                'success' => "Data Debit berhasil dihapus"
            ];
            echo json_encode($msg);
        }
    }
    
    public function invoicepenarikan($id = 0)
    {
    
            $id = $this->request->uri->getSegment(2);
            $invoice = $this->PenarikanModel->tabelPenarikanEdit($id);
           
    
            $html = view('kinvoice',[
                'invoice'=> $invoice,
            ]);
    
            $pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);
    
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('');
            $pdf->SetTitle('Invoice'. $invoice->nama);
            $pdf->SetSubject('Invoice'.$invoice->nama);
    
            $pdf->setPrintHeader(false);
            $pdf->setPrintFooter(false);
            $pdf->setDefaultTableColumns(true);
            $pdf->addPage();
    
            // output the HTML content
            $pdf->writeHTML($html, true, false, true, false, '');
            //line ini penting
            $this->response->setContentType('application/pdf');
            //Close and output PDF document
            $pdf->Output('invoice'.'_'.$invoice->nama.'_'.date('d-m-Y', strtotime($invoice->tglbuat)).'.pdf', 'I');
            
    

        $data = [

            'invoice' => $this->PenarikanModel->tabelPenarikanEdit($id)

        ];
        return view('kinvoice', $data);
    }
}
