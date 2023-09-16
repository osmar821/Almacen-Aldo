<?php
namespace App\Models;

use CodeIgniter\Model;

class categoriaModel extends model{
    protected $primarykey = 'id';
    protected $table = 'categorias';
    protected $returnType = 'object'; //objet array
    protected $allowedfields = ['nombre_c']; //los campos de la BD exepto las llaves primarias



}