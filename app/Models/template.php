<?php

namespace App\Models;

use Codeigniter\Model;

class TemplateModel extends Model
{
    protected $table      = 'template_produk';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_produk', 'img', 'title_template'];
    // protected $returnType = 'array';
}
