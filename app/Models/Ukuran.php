<?php

namespace App\Models;

use Codeigniter\Model;

class Ukuran extends Model
{
    protected $table      = 'ukuran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['produk_id', 'ukuran', 'harga'];
    protected $returnType = 'array';
}
