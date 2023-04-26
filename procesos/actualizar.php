<?php

require_once "../clases/Connection.php";
require_once "../clases/Crud.php";

$crud = new Crud();
$id = $_POST['id'];

$datos = [
    "paterno" => $_POST['paterno'],
    "materno" => $_POST['materno'],
    "nombre" => $_POST['nombre'],
    "fecha_nacimiento" => $_POST['fechaNacimiento'],
];

$respuesta = $crud->actualizar($id,$datos);

if($respuesta->getModifiedCount() > 0 || $respuesta->getmatchedCount() > 0){
    header(("location:../index.php"));
}else{
    print_r($respuesta);
}