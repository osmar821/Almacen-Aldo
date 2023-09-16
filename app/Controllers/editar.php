<?php
namespace App\Controllers;
use App\Models\productoModel;
use App\Models\categoriaModel;

use App\Models\marcaModel;

class editar extends BaseController{
    private $productoModel;
    private $validaciones;
    private $marcaModel;
    private $categoriaModel;
   

    public function __construct()
    {$this->marcaModel = new marcaModel();
      $this->categoriaModel = new categoriaModel();
        $this->productoModel = new productoModel();
        $this->validaciones = \config\Services::validation();
    }


public function edit($id) {
  // Cargar el modelo de productos
        $producto = $this->productoModel->find($id);
        $marcas = $this->marcaModel->findAll();
        $categorias = $this->categoriaModel->findAll();
  
  // Cargar la vista para editar el producto
  return  view('editar_producto', ["producto"=>$producto,'marcas'=>$marcas, 'categorias'=>$categorias]);
}

public function editar2($id){
  session()->setFlashdata(['id'=>$id]);
  $marcas = $this->marcaModel->findAll();
        $categorias = $this->categoriaModel->findAll();
  
  // Cargar la vista para editar el producto
  return  view('editar_producto', ['marcas'=>$marcas, 'categorias'=>$categorias]);
}

public function editar($id) {
  
  $valida = $this->validaciones->getRuleGroup('productos');
  if(!$this->validate($valida)){
      session()->setFlashdata(['errores'=>$this->validaciones->getErrors()]);
      return redirect()->to('/productosedit2/edit/'.$id)->withInput();
  }
   
 
  $this->productoModel->update($id,$this->request->getPost());
  return redirect()->to('/');
}




}