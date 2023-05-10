<?php

require_once "../clases/Connection.php";
require_once "../clases/PromocionesCrud.php";
require_once "../clases/Crud.php";

$crud = new PromocionesCrud();
$crud2 = new Crud();
$datos = $crud->obtenerPromocion($_POST['id']);
$datosCliente = $crud2->obtenerDocumento($datos->_id_cli);


$url = "https://api.green-api.com/waInstance1101817584/SendMessage/62ffea14a44341d3a8d370675305284d27faad50766f49048f";
//$url = 'https://api.green-api.com/waInstance1101817099/SendMessage/41a047f8909f470e992aee930076756f172813ed45be444ca8';


$data = [
    "chatId" => "51" . $datosCliente->numero. "@c.us",
    "message" => "Estimado(a) " . strtoupper($datosCliente->nombre) . ' ' . strtoupper($datosCliente->paterno) .
        ". No se pierda de la siguiente oferta " . $datos->promocion . " solo tiene hasta el " . $datos->vencimiento,
];

$options = [
    'http' => array(
        'method' => 'POST',
        'content' => json_encode($data),
        'header' => "Content-Type: application/json\r\n" . "Accept: application/json\r\n",
    ),
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context); 


