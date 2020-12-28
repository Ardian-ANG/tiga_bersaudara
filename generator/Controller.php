<?php
namespace App\Controllers;

use App\Models\GeneratorModel;

class GeneratorController extends BaseController
{
    protected $Generator;

    public function __construct()
    {
        $this->Generator = new GeneratorModel();
    }

    public function index()
    {
        $data = [
            'Generator' => $this->Generator->findAll()
        ];

        return view('Generator/index', $data);
    }

    public function add()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('Generator/add', $data);
    }

    public function save()
    {
        $this->Generator->save([
            SAVE
        ]);
        session()->setflashdata("pesan", "Generator berhasil ditambahkan.");
        return redirect()->to("/index.php/GeneratorController");
    }

    public function update($id)
    {
        $data = [
            'Generator' => $this->Generator->find($id),
            'validation' => \Config\Services::validation()
        ];
        return view('Generator/update', $data);
    }

    public function saveUpdate()
    {
        $this->Generator->save([
            STORE
        ]);
        session()->setflashdata("pesan", "Generator berhasil ditambahkan.");
        return redirect()->to("/index.php/GeneratorController");
    }
    
    public function delete($id)
    {
        $this->Generator->delete($id);
        return redirect()->to("/index.php/GeneratorController");
    }

    public function detail($id)
    {
        $data = [
            'Generator' => $this->Generator->find($id)
        ];
        
        return view('Generator/detail', $data);
    }
}