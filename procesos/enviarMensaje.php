<?php

require_once "../clases/Connection.php";
require_once "../clases/PromocionesCrud.php";

$crud = new PromocionesCrud();
$datos = $crud->promocionesDelClienteConJoin($_POST['id']);
echo $datos->per->_id;

/*$url = 'https://api.green-api.com/waInstance1101817451/SendMessage/7415c47e941c430ea96090a72c1a334be78a2d1038d24e9186';


$data = [
    "chatId" => "51" . '935875743'. "@c.us",
    "message" => "Estimado(a) " . 'Adriano' . ' ' . 'juarez' .
        ". No se pierda de la siguiente oferta " .'2x1 en zapatillas'. " solo tiene hasta el " . '2023-05-31',
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
$response = json_decode($result);*/

