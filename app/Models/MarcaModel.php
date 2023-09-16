<?php
namespace App\Models;

use CodeIgniter\Model;

class marcaModel extends model{
    protected $primarykey = 'id';
    protected $table = 'marcas';
    protected $returnType = 'object'; //objet array
    protected $allowedfields = ['nombre_m'];



}