<?php
namespace App\Models;

use CodeIgniter\Model;

class productoModel extends Model{
    protected $primarykey = 'id';
    protected $table = 'productos';
    protected $returnType = 'object'; //objet array
    protected $allowedFields = ['categoria','marca','nombre','existencias'];



}