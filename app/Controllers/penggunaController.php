<?php

namespace App\Controllers;

use App\Models\penggunaModel;

class penggunaController extends BaseController
{
    protected $pengguna;
    protected $session;


    public function __construct()
    {
        $this->pengguna = new penggunaModel();
        $this->session = session();
    }

    public function index()
    {
        $data = [
            'pengguna' => $this->pengguna->findAll(),
            'title' => "Halaman pengguna",
            'session' => $this->session->get('role')
        ];

        return view('pengguna/index', $data);
    }

    public function add()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('pengguna/add', $data);
    }

    public function save()
    {
        if ($this->request->getVar('password') != $this->request->getVar('re_pass')) {
            session()->setflashdata("pesan", "password tidak sama");
            return redirect()->to('/pages/register');
        }
        if (!$this->validate([
            'nama_lengkap' => [
                'rules' => 'required|is_unique[pengguna.nama_lengkap]',
                'errors' => [
                    'required' => 'nama harus diisi.',
                    'is_unique' => 'nama sudah ada'
                ]
            ],
            'email' => [
                'rules' => 'required[pengguna.email]',
                'errors' => [
                    'required' => 'email harus diisi.'
                ]
            ],
            'password' => [
                'rules' => 'required|min_length[5]',
                'errors' => [
                    'required' => 'password kurang dari 5'
                ]

            ],
            'no_hp' => [
                'rules' => 'required[pengguna.no_hp]',
                'errors' => [
                    'required' => 'nomor harus diisi.'
                ]
            ],
            'no_wa' => [
                'rules' => 'required[pengguna.no_wa]',
                'errors' => [
                    'required' => 'nomor harus diisi.'
                ]
            ],
        ])) {
            return redirect()->to('/pages/register')->withInput();
        }

        $this->pengguna->save([
            "nama_lengkap" => $this->request->getVar("nama_lengkap"),
            "email" => $this->request->getVar("email"),
            "password" => password_hash($this->request->getVar("password"), PASSWORD_DEFAULT),
            "no_hp" => $this->request->getVar("no_hp"),
            "no_wa" => $this->request->getVar("no_wa"),
            "tgl" => date('Y/m/d'),
            "hak_akses" => 'user'

        ]);
        session()->setflashdata("pesan", "pengguna berhasil ditambahkan.");
        return redirect()->to("/pages/login");
    }

    public function update($id)
    {
        $data = [
            'pengguna' => $this->pengguna->find($id),
            'validation' => \Config\Services::validation()
        ];
        return view('pengguna/update', $data);
    }

    public function saveUpdate()
    {
        // dd($this->request->getVar());
        $this->pengguna->save([
            "id_user" => $this->request->getVar("id_user"),
            "nama_lengkap" => $this->request->getVar("nama_lengkap"),
            "email" => $this->request->getVar("email"),
            "password" => password_hash($this->request->getVar("password"), PASSWORD_DEFAULT),
            "no_hp" => $this->request->getVar("no_hp"),
            "no_wa" => $this->request->getVar("no_wa"),
            "tgl" => $this->request->getVar("tgl"),
            "hak_akses" => $this->request->getVar("hak_akses"),

        ]);
        session()->setflashdata("pesan", "pengguna berhasil ditambahkan.");
        return redirect()->to("/index.php/penggunaController");
    }

    public function delete($id)
    {
        $this->pengguna->delete($id);
        return redirect()->to("/index.php/penggunaController");
    }

    public function detail($id)
    {
        $data = [
            'pengguna' => $this->pengguna->find($id)
        ];

        return view('pengguna/detail', $data);
    }
}
