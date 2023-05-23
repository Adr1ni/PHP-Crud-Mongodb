<?php 
include('./header.php'); 
include "./clases/Connection.php";
include "./clases/Crud.php";

$crud = new Crud();
$id = $_POST['id'];
$datos = $crud->obtenerDocumento($id);

?>

<div class="card mt-4 fondoDelete">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card mt-4 ">
                        <div class="card-body">
                            <a href="index.php" class="btn btn-outline-info">
                            <i class="fa-solid fa-angles-left"></i> Regresar
                            </a>
                            <h2>Eliminar registro</h2>

                            <table class="table table-sm">
                                <thead>
                                    <th>Apellido paterno</th>
                                    <th>Apellido materno</th>
                                    <th>Nombre</th>
                                    <th>Fecha de nacimiento</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?=$datos->paterno; ?></td>
                                        <td><?=$datos->materno; ?></td>
                                        <td><?=$datos->nombre; ?></td>
                                        <td><?=$datos->fecha_nacimiento; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <hr>
                            <div class="alert alert-danger" role="alert">
                                <p>Estas seguro de eliminar este registro?</p> 
                            </div>
                            <form action="./procesos/eliminar.php" method="post">
                                <input type="text" hidden value="<?= $datos->_id; ?>" name="id">
                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-user-xmark"></i> Eliminar
                                </button>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./scripts.php') ?>