<?php $this->extend('plantilla');
$this->section('titulo');?>
Lista de productos
<?php $this->endSection();
$this->section('main');?>
    <div class="container">
        <!-- <h1 class="text-center text-dark bg-warning">ALMACENES ALDO</h1>    -->
        <h1 class="text-center text-dark bg-warning">lista de productos</h1>
        <div>
            <?php if(session('tipo')==0):?>
            <a href="<?=base_url()?>productos/add" class="btn btn-success">Añadir</a>
            <?php endif;?>
            <a href="<?=base_url('loginInicio ')?>" class="btn btn-danger">Salir</a>  
        </div>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <!-- agregamos el nombre que va a llevar la columna -->
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Existencias</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <?php if(session('tipo')==0):?>
                    <th>Editar / Eliminar</th>
                    <?php endif;?>
                                                          
                </tr>
            </thead>  
            <tbody>
                <!-- agregamos valores a la tabla de cada una de ellas -->
                <?php foreach($productos as $p):?>      
                    <tr>
                        <td><?=$p->id?></td>
                        <td><?=$p->nombre?></td>
                        <td><?=$p->existencias?></td>
                        <td><?=$p->nombre_m?></td> 
                        <td><?=$p->nombre_c?></td> 
                        <td>
                        <?php if(session('tipo')==0):?>
                            <a href="<?php echo base_url('productos/edit/'.$p->id); ?>" class="btn btn-primary">Editar</a>
                
                            <a href="<?php echo base_url('productos/eliminar/'.$p->id); ?>" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este registro?')">Eliminar</a>
                        <?php endif;?>
                        </td>
                                                                            
                                               
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>  
    </div>

<?php $this->endSection()?>