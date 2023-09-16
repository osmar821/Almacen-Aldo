<?php $this->extend('plantilla');
$this->section('titulo');?>
Añadir productos
<?php $this->endSection();
    $this->section('main');
    if(session('id')){
        $id= session('id');
    }
    ?>
    <div class="container">
        <h1 class="text-center text-dark bg-warning">Editar Producto</h1>
        <?php 
        // var_dump($producto);
        if(session('errores')):
            $errores = session('errores')?>
             
        <?php endif;?>
        <form action="
        <?=(isset($producto))?base_url('productoseditar/edit/').$producto->id:base_url('productoseditar/edit/').$id?>
        " method="POST">
            <div class="row mb-5">
                <label for="nombre" class="col-4 form.label"->Nombre</label>
                <div class="col-8">
                    <input type="text" name="nombre" id="nombre" value="<?php
                            if(isset($producto)){
                                echo $producto->nombre;
                            }
                            if(old('nombre')):
                                echo old('nombre');
                            endif;?>"
                    class="form-control">
                </div>
                <span class="fw-bold text-danger"><?=(isset($errores['nombre']))?$errores['nombre']:''?></span>

            </div>
            <input type="number" name="existencias" name="existencias" value="<?php
                            if(isset($producto)){
                                echo $producto->existencias;
                            }
                            if(old('existencias')):
                                echo old('existencias');
                            endif;?>"class="form-control mb-5"
             placeholder="existencias">
             <div class="row mb-5">
                <label for="categoria" class="col-4 form.label"->Categoria</label>
                <div class="col-8">
                    <select name="categoria" id="categoria" class="form-control">

                    <?php foreach($categorias as $c) {
                                $selected = "";
                                if (isset($producto) && $c->id == $producto->categoria) {
                                    $selected = "selected";
                                } else if (old('categoria') == $c->id) {
                                    $selected = "selected";
                                }
                                echo '<option value="' . $c->id. '"' . $selected . '>' . $c->nombre_c . '</option>';
                            } ?>
                    </select>
                </div>
                    </div>
                <div class="row mb-5">
                    <label for="marca" class="col-4 form.label"->Marca</label>
                    <div class="col-8">
                        <select name="marca" id="marca"
                        class="form-control">

                        <?php foreach($marcas as $m) {
                                $selected = "";
                                if (isset($producto) && $m->id == $producto->marca) {
                                    $selected = "selected";
                                } else if (old('marca') == $m->id) {
                                    $selected = "selected";     
                                }
                                echo '<option value="' . $m->id. '"' . $selected . '>' . $m->nombre_m . '</option>';
                            } ?>

                        </select>
                    </div>
                </div>
                <button type"submit" class="btn btn-success">Editar</button>
                <a href="<?=base_url()?>" class="btn btn-danger">Atras</a>
        </form>

    </div>
<?php $this->endSection()?>