<?php

require_once "../clases/Connection.php";
require_once "../clases/Crud.php";

$crud = new Crud();

$datos = [
    "paterno" => $_POST['paterno'],
    "materno" => $_POST['materno'],
    "nombre" => $_POST['nombre'],
    "fecha_nacimiento" => $_POST['fechaNacimiento'],
    "DNI"=> $_POST['DNI'],
];

$respuesta = $crud->insertarDatos($datos);

if($respuesta->getInsertedId() > 0){
    header(("location:../index.php"));
}else{
    print_r($respuesta);
}
