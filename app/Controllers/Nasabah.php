<?php

namespace App\Controllers;

use App\Models\NasabahModel;
use App\Models\TransaksiModel;
use App\Models\PenarikanModel;
use PHPUnit\TextUI\XmlConfiguration\Php;
use App\libraries\MYPDF;

use Dompdf\Dompdf;
use Dompdf\Options;
use PharIo\Manifest\Library;

class Nasabah extends BaseController
{

    protected $NasabahModel;
    protected $TransaksiModel;
    protected $PenarikanModel;


    function __construct()
    {


        $this->NasabahModel = new NasabahModel();
        $this->TransaksiModel = new TransaksiModel();
        $this->PenarikanModel = new PenarikanModel();
    }

    public function index()
    {
        $data = [
            'nasabah'    => $this->NasabahModel->NasabahAktif(),
        ];
        return view('nasabah', $data);
    }
    public function tambah()
    {
        if ($this->request->isAJAX()) {
            $msg = [
                'data' => view('tnasabah')
            ];
            echo json_encode($msg);
        }
    }
    public function simpan()
    {

        if ($this->request->isAJAX()) {
            $nama = $this->request->getVar('nama');
            $no_rekening = $this->request->getVar('no_rekening');
            $saldo = preg_replace('/[Rp. ]/', '', $this->request->getVar('saldo'));
            $no_hp = $this->request->getVar('no_hp');
            $alamat = $this->request->getVar('alamat');

            $valid = $this->validate([

                'nama' => [
                    'rules' => 'required|min_length[5]|max_length[50]|is_unique[datanasabah.nama,id_nasabah,{id_nasabah}]',
                    'label' => 'Nama Nasabah',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'kode' => [
                    'rules' => 'required|is_unique[datanasabah.kode,id_nasabah,{id_nasabah}]',
                    'label' => 'Kode sudah ada ulangi lagi',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',

                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'no_rekening' => [
                    'label' => 'Nomor Rekening',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'no_hp' => [
                    'label' => 'Nomor HP',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong'
                    ]
                ],
            ]);

            $namaGambar = 'default.png';



            if (!$valid) {
                $validation = $this->validator;
                $msg = [
                    'error' => [

                        'nama' => $validation->getError('nama'),
                        'no_rekening' => $validation->getError('no_rekening'),
                        'saldo' => $validation->getError('saldo'),
                        'no_hp' => $validation->getError('no_hp'),
                        'alamat' => $validation->getError('alamat'),
                        'kode' => $validation->getError('kode'),


                    ]
                ];
            } else {
                $this->NasabahModel->insert([
                    'nama' => $nama,
                    'no_rekening' => $no_rekening,
                    'saldo' => $saldo,
                    'no_hp' => $no_hp,
                    'alamat' => $alamat,
                    'user_image' => $namaGambar,
                    'aktif' => '1',
                    'kode' => $this->request->getVar('kode'),


                ]);

                $msg = [
                    'success' => 'Data Nasabah terbaru berhasil ditambahkan'
                ];
            }

            echo json_encode($msg);
        }
    }
    public function edit()
    {
        if ($this->request->isAJAX()) {
            $id = $this->request->getVar('id_nasabah');
            $ambilid = $this->NasabahModel->find($id);
            $data = [
                'id_nasabah' => $id,
                'nama' => $ambilid['nama'],
                'no_rekening' => $ambilid['no_rekening'],
                'saldo' => $ambilid['saldo'],
                'no_hp' => $ambilid['no_hp'],
                'alamat' => $ambilid['alamat'],
            ];
            $msg = [
                'data' => view('enasabah', $data)
            ];
            echo json_encode($msg);
        }
    }
    public function update()
    {
        if ($this->request->isAJAX()) {
            $id_nasabah = $this->request->getVar('id_nasabah');
            $nama = $this->request->getVar('nama');
            $no_rekening = $this->request->getVar('no_rekening');
            $saldo = preg_replace('/[Rp. ]/', '', $this->request->getVar('saldo'));
            $no_hp = $this->request->getVar('no_hp');
            $alamat = $this->request->getVar('alamat');
            $valid = $this->validate([
                'nama' => [
                    'rules' => 'required|min_length[5]|max_length[50]|is_unique[datanasabah.nama,id_nasabah,{id_nasabah}]',
                    'label' => 'Nama Nasabah',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'min_length' => '{field} terlalu singkat',
                        'max_length' => '{field} terlalu panjang',
                        'is_unique' => '{field} sudah terdaftar',
                    ]
                ],
                'no_rekening' => [
                    'label' => 'Nomor Rekening',
                    'rules' => 'required|numeric',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',

                    ]
                ],
                'saldo' => [
                    'label' => 'Saldo',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',

                    ]
                ],
                'no_hp' => [
                    'label' => 'Nomor HP',
                    'rules' => 'required|min_length[11]|max_length[15]|regex_match[(08\\d{1,4}(\\s*[\\-]\\s*)\\d{0,4}(\\s*[\\-]\\s*)\\d{3,5}|08\\d{9,11}$)|(^\\+(?:[0-9] ?){6,13}[0-9]$)|(^(?:(?:\\+|0{0,2})62) ?\\d{0,3}(\\s*[\\-]\\s*)\\d{0,4}(\\s*[\\-]\\s*)\\d{0,5})]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong',
                        'min_length' => '{field} kurang',
                        'max_length' => '{field} berlebih',
                        'regex_match' => '{field} tidak berlaku',
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
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
                        'no_rekening' => $validation->getError('no_rekening'),
                        'saldo' => $validation->getError('saldo'),
                        'no_hp' => $validation->getError('no_hp'),
                        'alamat' => $validation->getError('alamat'),
                    ]
                ];
            } else {
                $this->NasabahModel->update($id_nasabah, [
                    'nama' => $nama,
                    'no_rekening' => $no_rekening,
                    'saldo' => $saldo,
                    'no_hp' => $no_hp,
                    'alamat' => $alamat,
                ]);

                $msg = [
                    'success' => 'Data sampah berhasil diubah'
                ];
            }

            echo json_encode($msg);
        }
    }

    public function kartuNasabah($id_nasabah)
    {
        $data = [
            'kode' => $this->NasabahModel->kartuNasabah($id_nasabah),

        ];
        return view('kartunasabah', $data);
    }

    public function detailNasabah($id_nasabah)
    {
        $data = [
            'title' => 'Data Detail Nasabah',
            'validation' => \Config\Services::validation(),
            'nasabah' => $this->NasabahModel->NasabahId($id_nasabah),
            'transaksi' => $this->TransaksiModel->joinNasabah($id_nasabah),
            'penarikan' => $this->PenarikanModel->joinNasabah($id_nasabah),


        ];
        return view('dnasabah', $data);
    }
    public function permintaan()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'nasabah'    => $this->NasabahModel->NasabahTidakAktif()
        ];
        return view('permintaan', $data);
    }
    public function tpermintaan()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('tpermintaan', $data);
    }
    public function updateper($id)
    {

        // $namaLama = $this->AnakModel->getAnakById($this->request->getVar('id_anak'));
        // if ($namaLama['nama'] == $this->request->getVar('nama')) {
        //     $rule_nama = 'required';
        // } else {
        //     $rule_nama = 'required|is_unique[anak.nama]';
        // }

        if (!$this->validate([
            'nama' => [
                'label' => 'Nama Nasabah',
                'rules' => 'required|is_unique[datanasabah.id_nasabah!=' . $id . ' AND ' . 'nama=]',
                'errors' => [
                    'required' => '{field} harus di isi.',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'no_rekening' => [
                'label' => 'Nomor Rekening',
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',

                ]
            ],

            'no_hp' => [
                'label' => 'Nomor HP',
                'rules' => 'required|min_length[11]|max_length[15]|regex_match[(08\\d{1,4}(\\s*[\\-]\\s*)\\d{0,4}(\\s*[\\-]\\s*)\\d{3,5}|08\\d{9,11}$)|(^\\+(?:[0-9] ?){6,13}[0-9]$)|(^(?:(?:\\+|0{0,2})62) ?\\d{0,3}(\\s*[\\-]\\s*)\\d{0,4}(\\s*[\\-]\\s*)\\d{0,5})]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} kurang',
                    'max_length' => '{field} berlebih',
                    'regex_match' => '{field} tidak berlaku',
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'user_image' => [
                // jangan pake spasi 
                'rules' => 'max_size[user_image,1024]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png,image/svg]',
                'errors' => [
                    // 'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gmbar'
                ]
            ]

        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $fileGambar = $this->request->getFile('user_image');
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // generate nama foto
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan ke folder
            $fileGambar->move('images/nasabah', $namaGambar);
            // hapus foto

            if ($fileGambar != "") {
                if (file_exists('images/nasabah/' .  $this->request->getVar('gambarLama') != 'default.svg')) {
                    unlink('images/nasabah/' . $this->request->getVar('gambarLama'));
                }
            }
        }

        $this->NasabahModel->save([
            'id_nasabah' => $id,

            'nama' => $this->request->getVar('nama'),
            'no_rekening' => $this->request->getVar('no_rekening'),
            'no_hp' => $this->request->getVar('no_hp'),

            'alamat' => $this->request->getVar('alamat'),
            'user_image' => $namaGambar,
        ]);
        session()->setFlashdata('success', 'data nasabah telah diubah.');
        return redirect()->back();
    }


    public function save()
    {
        helper(['form', 'url']);
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|min_length[5]|max_length[50]|is_unique[datanasabah.nama,id_nasabah,{id_nasabah}]',
                'label' => 'Nama Nasabah',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'min_length' => '{field} terlalu singkat',
                    'max_length' => '{field} terlalu panjang',
                    'is_unique' => '{field} sudah terdaftar',
                ]
            ],
            'no_rekening' => [
                'label' => 'Nomor Rekening',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'no_hp' => [
                'label' => 'Nomor HP',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],

            'user_image' => [
                // jangan pake spasi 
                'rules' => 'max_size[user_image,1024]|is_image[user_image]|mime_in[user_image,image/jpg,image/jpeg,image/png,image/svg]',
                'errors' => [
                    // 'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gmbar'
                ]
            ]
        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $fileGambar = $this->request->getFile('user_image');
        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default.png';
        } else {
            $namaGambar = $fileGambar->getRandomName();
            // pindahkan file ke folder img fungsi move untuk langsung ke folder publik
            $fileGambar->move('images/nasabah', $namaGambar);
        }




        $save = [

            'nama' => $this->request->getVar('nama'),
            'no_rekening' => $this->request->getVar('no_rekening'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'user_image' => $namaGambar,
            'aktif' => '0',


        ];
        $nasabah = new NasabahModel;
        $nasabah->insert($save);
        session()->setFlashdata('success', 'Data Nasabah Berhasil Ditambahkan.');
        return redirect()->back();
    }
    public function hapus()
    {
        if ($this->request->isAJAX()) {
            $id_nasabah = $this->request->getVar('id_nasabah');

            $this->NasabahModel->delete($id_nasabah);

            $msg = [
                'success' => "Data Nasabah berhasil dihapus"
            ];
            echo json_encode($msg);
        }
    }
    public function print($id_nasabah = 0)
    {


        $id = $this->request->uri->getSegment(3);
        $kode = $this->NasabahModel->NasabahId($id_nasabah);


        $options = new Options();

        $options->setChroot(FCPATH . '/images/kartu/');

        $dompdf = new Dompdf($options);
        $contxt = stream_context_create([
            'ssl' => [
                'verify_peer' => FALSE,
                'verify_peer_name' => FALSE,
                'allow_self_signed' => TRUE
            ]
        ]);
        $dompdf->setHttpContext($contxt);


        $dompdf->loadHtml(view('kartunasabah', ["kode" => $kode]));
        $dompdf->setPaper('A4', 'portrait'); //ukuran kertas dan orientasi
        $dompdf->render();

        $dompdf->stream('ekartu-satahi.pdf', array('Attachment' => 0));


        return redirect()->back(); //arahkan ke list
    }

    public function updateaktif($id)
    {
        if (!$this->validate([
            'kode' => [
                'label' => 'Kode',
                'rules' => 'required|is_unique[datanasabah.kode,id_nasabah,{id_nasabah}]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'is_unique' => '{field} sudah tersedia',
                ]
            ],

        ])) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        $this->NasabahModel->save([
            'id_nasabah' => $id,
            'aktif' => '1',
            'kode' => $this->request->getVar('kode'),

        ]);
        session()->setFlashdata('success', 'data nasabah telah diaktifkan.');
        return redirect()->back();
    }
    public function cekSaldo($kode)
    {


        $data = [
            'title' => 'Data Detail Nasabah',
            'validation' => \Config\Services::validation(),
            'nasabah' => $this->NasabahModel->cekSaldo($kode),
        ];
        return view('ceksaldo', $data);
    }
}
