<?php
namespace App\Controllers;
use App\Models\user_model;

class Login extends BaseController{
    private $user_model;
    private $validacion;
   

    public function __construct()
    {
        $this->user_model = new user_model();
        $this->validacion = \config\Services::validation();
    }


    public function obtener() {
        // Verifica si el usuario ya ha iniciado sesión
        // if ($this->session->userdata('logged_in')) {
        //     redirect('dashboard');
        // }
    
        // Carga la vista de inicio de sesión
      
        return view('login');
    }
    
    public function login() {
        // Obtiene los datos ingresados por el usuario
        $username="";
        $password="";
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // var_dump( $this->request->getPost());
        $valida = $this->validacion->getRuleGroup('login');
       if(!$this->validate($valida)){
            // var_dump($this->validacion->getErrors());
            session()->setFlashdata(['errores'=>$this->validacion->getErrors()]);
            return redirect()->to('loginInicio')->withInput();

       }


    
        // Verifica si las credenciales son correctas
        $user = $this->user_model->where('usuario', $username)->where('contraseña', $password)
        ->findAll();
        var_dump($user);
        if (!!$user) {
            // Inicia sesión y redirige al usuario a la página de inicio
            session()->set(['tipo'=>$user[0]->tipo]);
            return redirect()->to('/');
        } else {
            // Muestra un mensaje de error y vuelve a cargar la página de inicio de sesión
            $data['error'] = 'Usuario o contraseña incorrecta';
            echo view('login', $data);
        }
    }
}