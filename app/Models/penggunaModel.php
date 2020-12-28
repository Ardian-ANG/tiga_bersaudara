<?php

namespace App\Models;

use CodeIgniter\Model;

class penggunaModel extends Model
{
    protected $table      = "pengguna";
    protected $primaryKey = "id_user";
    protected $allowedFields = ["id_user", "nama_lengkap", "email", "password", "no_hp", "no_wa", "tgl", "hak_akses", ];
}
