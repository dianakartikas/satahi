<?php

namespace App\Controllers;

use App\Models\SampahModel;

class Sampah extends BaseController
{

    protected $SampahModel;

    function __construct()
    {


        $this->SampahModel = new SampahModel();
    }

    public function index()
    {
        $data = [
            'sampah'    => $this->SampahModel->findAll()
        ];
        return view('sampah', $data);
    }
    public function tambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('tsampah')
            ];
            echo json_encode($msg);
        }
    }
    public function simpan()
    {
        if ($this->request->isAJAX()) {
            $jenis = $this->request->getVar('jenis_sampah');
            $nama = $this->request->getVar('nama');
            $harga = preg_replace('/[Rp. ]/', '', $this->request->getVar('harga'));
            $valid = $this->validate([

                'nama' => [
                    'rules' => 'required|min_length[5]|max_length[50]|is_unique[datasampah.nama,id_sampah,{id_sampah}]',
                    'label' => 'Nama Sampah',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'jenis_sampah' => [
                    'label' => 'Jenis Sampah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'harga' => [
                    'label' => 'Harga Sampah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            if (!$valid) {
                $validation = $this->validator;
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama'),
                        'jenis_sampah' => $validation->getError('jenis_sampah'),
                        'harga' => $validation->getError('harga'),
                    ]
                ];
            } else {
                $this->SampahModel->insert([
                    'jenis_sampah' => $jenis,
                    'nama' => $nama,
                    'harga' => $harga,
                ]);

                $msg = [
                    'success' => 'Data OPD terbaru berhasil ditambahkan'
                ];
            }

            echo json_encode($msg);
        }
    }
    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id_sampah = $this->request->getVar('id_sampah');

            $this->SampahModel->delete($id_sampah);

            $msg = [
                'success' => "Data OPD berhasil dihapus"
            ];
            echo json_encode($msg);
        }
    }
    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id_sampah');

            $ambilid = $this->SampahModel->find($id);

            $data = [
                'id_sampah' => $id,
                'nama' => $ambilid['nama'],
                'harga' => $ambilid['harga'],
                'jenis_sampah' => $ambilid['jenis_sampah']
            ];
            $msg = [
                'data' => view('esampah', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function update()
    {
        if ($this->request->isAJAX()) {
            $id_sampah = $this->request->getVar('id_sampah');
            $jenis = $this->request->getVar('jenis_sampah');
            $nama = $this->request->getVar('nama');
            $harga =   preg_replace('/[Rp. ]/', '', $this->request->getVar('harga'));
            $valid = $this->validate([
                'nama' => [
                    'rules' => 'required|min_length[5]|max_length[50]|is_unique[datasampah.nama,id_sampah,{id_sampah}]',
                    'label' => 'Nama Sampah',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'jenis_sampah' => [
                    'label' => 'Jenis Sampah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'harga' => [
                    'label' => 'Harga Sampah',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
            ]);
            if (!$valid) {
                $validation = $this->validator;
                $msg = [
                    'error' => [
                        'nama' => $validation->getError('nama'),
                        'jenis_sampah' => $validation->getError('jenis_sampah'),
                        'harga' => $validation->getError('harga'),
                    ]
                ];
            } else {
                $this->SampahModel->update($id_sampah, [
                    'jenis_sampah' => $jenis,
                    'nama' => $nama,
                    'harga' => $harga,
                ]);

                $msg = [
                    'success' => 'Data sampah berhasil diubah'
                ];
            }

            echo json_encode($msg);
        }
    }
}
