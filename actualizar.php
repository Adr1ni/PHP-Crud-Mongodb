<?php 
include('./header.php'); 
include "./clases/Connection.php";
include "./clases/Crud.php";

$crud = new Crud();
$id = $_POST['id'];
$datos = $crud->obtenerDocumento($id);

?>


<div class="card mt-4">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="index.php" class="btn btn-outline-info">
                        <i class="fa-solid fa-angles-left"></i> Regresar
                    </a>
                    <h2>Actualizar registro</h2>
                    
                    <form action="./procesos/actualizar.php" method="post">
                        <input type="text" hidden value="<?= $datos->_id; ?>" name="id">
                        <label for="paterno">Apellido Paterno</label>
                        <input type="text" class="form-control" id="paterno" name="paterno" value="<?= $datos->paterno; ?>">
                        <label for="materno">Apellido materno</label>
                        <input type="text" class="form-control" id="materno" name="materno" value="<?= $datos->materno; ?>">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $datos->nombre; ?>">
                        <label for="fechaNacimiento">Fecha de nacimiento</label>
                        <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="<?= $datos->fecha_nacimiento; ?>">
                        <label for="DNI">DNI</label>
                        <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="form-control" value="<?=$datos->DNI;?>">
                        <button class="btn btn-warning mt-3">
                            <i class="fa-solid fa-floppy-disk"></i> Actualizar
                        </button>
                    
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./scripts.php') ?>