<?php include('./header.php'); 

include "./clases/Connection.php";
include "./clases/PromocionesCrud.php";

$crud = new PromocionesCrud();
$id = $_POST['id'];
$datosPromociones = $crud->promocionesDelCliente($id);

?>

<div class="card mt-4">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col">
                    <a href="index.php" class="btn btn-outline-info">
                        <i class="fa-solid fa-angles-left"></i> Regresar
                    </a>
                    <h2>Promociones</h2>
                    <table class="table table-sm">
                        <thead>
                            <th>Promocion</th>
                            <th>Vencimiento</th>
                        </thead>
                        <tbody>
                            <?php foreach($datosPromociones as $datop): ?>
                                <tr>
                                    <td><?=$datop->promocion; ?></td>
                                    <td><?=$datop->vencimiento; ?></td>
                                    <td class="text-center">
                                    <form action="./procesos/enviarMensaje.php" method="post">
                                        <input type="text" hidden value="<?= $datop->_id; ?>" name="id">
                                        <button class="btn btn-success"><i class="fa-solid fa-phone"></i> Mandar Promocion</button>
                                    </form>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <form action="./procesos/insertarPromocion.php" method="post">
                        <input type="text" hidden value="<?= $id; ?>" name="id">
                        <label for="promocion">Promocion</label>
                        <input type="text" class="form-control" id="promocion" name="promocion" require>
                        <label for="vencimiento">Fecha de Vencimiento</label>
                        <input type="date" name="vencimiento" id="vencimiento" class="form-control">
                        <button class="btn btn-primary mt-3"><i class="fa-solid fa-phone"></i> Agregar promocion</button>   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('./scripts.php') ?>