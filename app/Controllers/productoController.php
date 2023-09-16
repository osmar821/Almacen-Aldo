<?php
namespace App\Controllers;
use App\Models\productoModel;
use App\Models\marcaModel;
use App\Models\categoriaModel;

class productoController extends BaseController{
    private $productoModel;
    private $marcaModel;
    private $categoriaModel;
    private $validacion;
   

    public function __construct()
    {
        $this->productoModel = new productoModel();
        $this->marcaModel = new marcaModel();
        $this->categoriaModel = new categoriaModel();
        $this->validacion = \config\Services::validation();
    }
    public function index(){
        $productos = $this->productoModel->findAll();
        $producto = $this->productoModel->select('productos.id, c.nombre_c, m.nombre_m, productos.nombre, productos.existencias')
        ->join('marcas m', 'productos.marca = m.id')
        ->join('categorias c', 'productos.categoria = c.id')->findAll();

        // var_dump($producto);
        

        return view('index',['productos'=>$producto]);
    }
    public function agregar(){
        
        $marcas = $this->marcaModel->findAll();
        $categorias = $this->categoriaModel->findAll();
        return view('agregar',['marcas'=>$marcas, 'categorias'=>$categorias]);
    }
    public function add(){
       $valida = $this->validacion->getRuleGroup('productos');
       if(!$this->validate($valida)){
            //var_dump($this->validacion->getErrors());
            session()->setFlashdata(['errores'=>$this->validacion->getErrors()]);
            return redirect()->back()->withInput();

       }
       $producto=[
            'nombre'=> $this->request->getPost('nombre'),
            'existencias'=> $this->request->getPost('existencias'),
            'marca'=> $this->request->getPost('marca'),
            'categoria'=>$this->request->getPost('categoria')
       ];
       $this->productoModel->insert($producto);
       return redirect('/');
    }
    public function eliminar($id) {
        $producto = $this->productoModel->find($id);
        if(!!$producto){
            $producto = $this->productoModel->delete($id);
        }
        return redirect()->to('/');
    
        
    }
    public function edit($id){
        $producto = $this->productoModel->find($id);
        if (!$producto) {
            session()->setFlashdata(['errores'=> 'El producto que intenta editar no existe']);
            return redirect()->back();
        }
    
        $valida = $this->validacion->getRuleGroup('productos');
        if(!$this->validate($valida)){
            session()->setFlashdata(['errores'=>$this->validacion->getErrors()]);
            return redirect()->back()->withInput();
        }
    
        $productoActualizado = [        'nombre'=> $this->request->getPost('nombre'),        'existencias'=> $this->request->getPost('existencias'),        'marca'=> $this->request->getPost('marca'),        'categoria'=>$this->request->getPost('categoria')    ];
    
        $this->productoModel->update($id, $productoActualizado);
    
        return redirect('/');
    }
    
    
    /*public function login(){
        $valida = $this->validacion->getRuleGroup('login');
        if (!$this->validate($valida)) {
            session()->setFlashdata(['errores'=>$this->validacion->getErrors()]);
            return redirect()->to('/login');
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');


            //checar si jala 
            
        // Aquí iría la lógica para verificar las credenciales del usuario en la base de datos
        // Recibir los datos del formulario
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Buscar en la base de datos si existe un usuario con ese nombre de usuario o correo electrónico
        $user = $this->userModel->where('username', $username)->orWhere('email', $username)->first();

        if ($user !== null) {
            // Comparar la contraseña proporcionada con la contraseña almacenada en la base de datos
            if (password_verify($password, $user->password)) {
                // Iniciar sesión
                session()->set([
                    'user_id' => $user->id,
                    'logged_in' => true,
                ]);

                // Redirigir al usuario a la página de inicio o a la página que estaba intentando acceder
                return redirect()->to('/home');
            }
        }

        // Mostrar un mensaje de error indicando que las credenciales son incorrectas
        session()->setFlashdata('error', 'Credenciales incorrectas');
        return redirect()->back();


            // Si las credenciales son correctas, redirigir al usuario a la vista de index
            return redirect()->to('/');
        }*/

        public function unir(){
        //     $producto = $this->productoModel->select('productos.id, categorias.categoria, marcas.marca, productos.nombre, productos.existencias')
        // ->join('marcas m', 'categorias.nombre = marcas.nombre')
        // ->join('categorias c', 'productos.nombre = marcas.nombre');

        
        

        }
        

}