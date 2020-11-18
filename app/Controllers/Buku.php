<?php

namespace App\Controllers;

use App\Models\BukuModel;
use CodeIgniter\CodeIgniter;
use Config\Services;

class Buku extends BaseController
{
    protected $bukuModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') :
            1;
        //dd($this->request->getVar('cari'));
        $cari = $this->request->getVar('cari');

        if ($cari) {
            $buku = $this->bukuModel->search($cari);
        } else {
            $buku = $this->bukuModel;
        }
        //$buku = $this->bukuModel->findAll();
        $data = [
            'judul' => 'Daftar Buku',
            'buku' => $buku->paginate(5, 'buku'),
            'pager' => $this->bukuModel->pager,
            'currentPage' => $currentPage
        ];

        // //cara konek db tanpa model
        // $db = \Config\Database::connect();
        // $buku = $db->query("SELECT * FROM buku");
        // foreach ($buku->getResultArray() as $row) {
        //     d($row);
        // }

        //$bukuModel = new \App\Models\BukuModel();

        //$bukuModel = new BukuModel();


        return view('buku/index', $data);
    }

    public function detail($slug)
    {

        // $cari = $this->request->getVar('cari');

        // if ($cari) {
        //     $buku = $this->bukuModel->search($cari);
        //     return view('buku/detail', $data);
        // } else {
        //     $buku = $this->bukuModel;
        // }

        $data = [
            'judul' => 'Detail Buku',
            'buku' => $this->bukuModel->getBuku($slug)
        ];

        //jika komik tidak ada

        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Buku dengan judul ' . $slug . ' 
            tidak ditemukan.');
        }

        return view('buku/detail', $data);
    }

    public function create()
    {
        //session();
        $data = [
            'judul' => 'Form Tambah Data Buku',
            'validation' => \Config\Services::validation()
        ];
        return view('/buku/create', $data);
    }

    public function save()
    {
        //validasi input

        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[buku.judul]',
                'errors' => [
                    'required' => '{field} buku harus diisi.',
                    'is_unique' => '{field} buku sudah terdaftar.'
                ]
            ],
            'penulis' => [
                'rules' => 'required[buku.penulis]',
                'errors' => [
                    'required' => '{field} penulis buku tidak boleh kosong.'
                ]
            ],
            'ringkasan' => [
                'rules' => 'required[buku.ringkasan]',
                'errors' => [
                    'required' => '{field} ringkasan buku tidak boleh kosong.'
                ]
            ],
            'tahun' => [
                'rules' => 'required[buku.tahun]',
                'errors' => [
                    'required' => '{field} tahun buku harus tertera.',
                ]
            ],

            'penerbit' => [
                'rules' => 'required[buku.penerbit]',
                'errors' => [
                    'required' => '{field} penerbit buku harus diisi.',
                ]
            ],
            'sampul' => [

                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar {field} buku terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar.',
                    'mime_in' => 'Yang anda pilih bukan gambar.'
                ]
            ]

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/buku/create')->withInput()->with('validatiton', '$validation');
        }

        //kelola gambar

        $fileSampul = $this->request->getFile('sampul');

        //apakah tidak ada gambar yang diupload

        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default.png';
        } else {
            //generate nama sampul random
            $namaSampul = $fileSampul->getRandomName();

            //pindahkan file ke folder img

            $fileSampul->move('img', $namaSampul);
        }

        $slug =   url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'ringkasan' => $this->request->getVar('ringkasan'),
            'tahun' => $this->request->getVar('tahun'),
            'sampul' => $namaSampul

        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/buku/create');
    }

    public function delete($id)
    {
        //cari gambar berdasarkan id 
        $buku = $this->bukuModel->find($id);
        //cek jika gambar==default
        if ($buku['sampul'] != 'default.png') {

            //hapus gambar
            unlink('img/' . $buku['sampul']);
        }

        $this->bukuModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil hapus.');
        return redirect()->to('/buku');
    }

    public function edit($slug)
    {
        $data = [
            'judul' => 'Form Ubah Data Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->bukuModel->getBuku($slug)
        ];
        return view('buku/edit', $data);
    }

    public function update($id)
    {
        $bukuLama = $this->bukuModel->getBuku($this->request->getVar('slug'));
        if ($bukuLama['judul'] == $this->request->getVar('judul')) {
            $rule_judul = 'required';
        } else {
            $rule_judul = 'required|is_unique[buku.judul]';
        }
        if (!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} buku harus diisi.',
                    'is_unique' => '{field} buku sudah terdaftar.'
                ]
            ],
            'penulis' => [
                'rules' => 'required[buku.penulis]',
                'errors' => [
                    'required' => '{field} penulis buku tidak boleh kosong.'
                ]
            ],
            'ringkasan' => [
                'rules' => 'required[buku.ringkasan]',
                'errors' => [
                    'required' => '{field} ringkasan buku tidak boleh kosong.'
                ]
            ],
            'tahun' => [
                'rules' => 'required[buku.tahun]',
                'errors' => [
                    'required' => '{field} tahun buku harus tertera.',
                ]
            ],

            'penerbit' => [
                'rules' => 'required[buku.penerbit]',
                'errors' => [
                    'required' => '{field} penerbit buku harus diisi.',
                ]
            ],
            'sampul' => [

                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'ukuran gambar {field} buku terlalu besar.',
                    'is_image' => 'Yang anda pilih bukan gambar.',
                    'mime_in' => 'Yang anda pilih bukan gambar.'
                ]
            ]

        ])) {

            return redirect()->to('/buku/edit/' . $this->request->getVar('slug'))->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');

        //cek gambar, apakah tetap gambar lama?

        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            //generate nama random gambar
            $namaSampul = $fileSampul->getRandomName();
            //pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            //hapus file yang lama
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $slug =   url_title($this->request->getVar('judul'), '-', true);
        $this->bukuModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'ringkasan' => $this->request->getVar('ringkasan'),
            'tahun' => $this->request->getVar('tahun'),
            'sampul' => $namaSampul

        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/buku');
    }

    public function print()
    {
        $currentPage = $this->request->getVar('page_buku') ? $this->request->getVar('page_buku') :
            1;
        $buku = $this->bukuModel->findAll();
        $data = [
            'currentPage' => $currentPage,
            'buku' => $buku
        ];

        return view('buku/print', $data);
    }
}
