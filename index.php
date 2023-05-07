<?php
require_once "./clases/Connection.php";
require_once "./clases/Crud.php";

$crud = new Crud();
$datos = $crud->mostrarDatos();

?>

<?php include('./header.php') ?>

<div class="card mt-4">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Registro de personas SUNAT(emulacion)</h2>
                    <a href="agregar.php" class="btn btn-primary">
                        <i class="fa-solid fa-user-plus"></i> Agregar registro
                    </a>
                    <hr>
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <th>Apellido paterno</th>
                            <th>Apellido materno</th>
                            <th>Nombre</th>
                            <th>Fecha de nacimiento</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                            <th>DNI</th>
                        </thead>
                        <tbody>
                            <?php foreach($datos as $item): ?>
                            <tr>
                                <td><?= $item->paterno; ?></td>
                                <td><?= $item->materno; ?></td>
                                <td><?= $item->nombre; ?></td>
                                <td><?= $item->fecha_nacimiento; ?></td>
                                <td><?= $item->DNI?></td>
                                <td class="text-center">
                                    <form action="actualizar.php" method="post">
                                        <input type="text" hidden value="<?= $item->_id; ?>" name="id">
                                        <button class="btn btn-warning"><i class="fa-solid fa-user-pen"></i></button>
                                    </form>
                                </td>
                                <td class="text-center">
                                    <form action="eliminar.php" method="post">
                                        <input type="text" hidden value="<?= $item->_id; ?>" name="id">
                                        <button class="btn btn-danger"><i class="fa-solid fa-user-xmark"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./scripts.php') ?>
