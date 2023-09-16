<?php
namespace App\Models;

use CodeIgniter\Model;

class user_model extends model{

    protected $primarykey = 'ID';
    protected $table = 'usuarios';
    protected $returnType = 'object'; //objet array
    protected $allowedFields = ['usuario','contraseña'];

    public function login($username, $password) {
        $this->db->where('usuario', $username);
        $this->db->where('contraseña', md5($password));
        $query = $this->db->get('usuarios');
    
        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
}