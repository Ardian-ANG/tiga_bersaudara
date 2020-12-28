<?php

namespace App\Models;

use CodeIgniter\Model;

class TableModel extends Model
{
    protected $table      = "Table";
    protected $primaryKey = "Primary";
    protected $allowedFields = ['fields'];
}
