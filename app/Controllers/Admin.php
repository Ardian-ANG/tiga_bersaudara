<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function cekLogin()
    {
        $session = session();
        if ($session->get('role') == 'user') {
            return redirect()->to('/pages');
        }
    }
    public function index()
    {
        $session = session();
        if ($session->get('role') == 'user') {
            return redirect()->to('/pages');
        }
        return view('admin/index');
    }

    //--------------------------------------------------------------------

}
