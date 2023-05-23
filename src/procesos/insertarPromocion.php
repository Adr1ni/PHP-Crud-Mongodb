<?php

require_once "../clases/Connection.php";
require_once "../clases/PromocionesCrud.php";

$crud = new PromocionesCrud();

$promociones = [
    "promocion"=>$_POST['promocion'],
    "vencimiento"=>$_POST['vencimiento'],
    "_id_cli" => new MongoDB\BSON\ObjectId($_POST['id'])
];

$respuesta = $crud->agregarPromociones($promociones);

if($respuesta){
    header(("location:../index.php"));
}else{
    print_r($respuesta);
}

