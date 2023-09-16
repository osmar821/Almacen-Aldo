<?php $this->extend('plantilla');
$this->section('titulo');?>
Añadir productos
<?php $this->endSection();
    $this->section('main');?>
    <div class="container">
        <h1 class="text-center text-dark bg-warning">Añadir Producto</h1>
        <?php if(session('errores')):
            $errores = session('errores')?>
            <div class="card mb-5">
                <?php foreach($errores as $e):?>
                    <div class="text-danger"><?=$e?></div>
                    <?php endforeach;?>
            </div>
        <?php endif;?>
        <form action="<?=base_url()?>/productos/add" method="POST">
            <div class="row mb-5">
                <label for="nombre" class="col-4 form.label"->Nombre</label>
                <div class="col-8">
                    <input type="text" name="nombre" id="nombre"
                    class="form-control">
                </div>
            </div>
            <input type="number" name="existencias" name="existencias" class="form-control mb-5"
             placeholder="existencias">
             <div class="row mb-5">
                <label for="categoria" class="col-4 form.label"->Categoria</label>
                <div class="col-8">
                    <select name="categoria" id="categoria" class="form-control">
                    <?php foreach($categorias as $c):?> 
                        <option value="<?=$c->id?>"><?=$c->nombre_c?></option>
                    <?php endforeach?>
                    </select>
                </div>
                    </div>
                <div class="row mb-5">
                    <label for="marca" class="col-4 form.label"->Marca</label>
                    <div class="col-8">
                        <select name="marca" id="marca"
                        class="form-control">
                        <?php foreach($marcas as $m):?>
                            <option value="<?=$m->id?>"><?=$m->nombre_m?></option>
                        <?php endforeach?>
                        </select>
                    </div>
                </div>
                <button type"submit" class="btn btn-success">Guardar</button>
                <a href="<?=base_url()?>" class="btn btn-danger">Atras</a>
        </form>

    </div>
<?php $this->endSection()?>