<?php

$url = 'https://api.green-api.com/waInstance1101817099/SendMessage/41a047f8909f470e992aee930076756f172813ed45be444ca8';

$data = [
    "chatId" => "51" . '917236965'. "@c.us",
    "message" => "Estimado(a) " . 'zuleika' . ' ' . 'juarez' .
        ". No se pierda de la siguiente oferta " .'2x1 en zapatillas'. " solo tiene hasta el " . '2023-05-31',
];

$options = [
    'http' => [
        'method' => 'POST',
        'content' => json_encode($data),
        'header' => 'Content-Type: application/json\r\n' . "Accept: application/json\r\n",
    ],
];

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$response = json_decode($result);
if ($result === false) {
    echo "Error al enviar el mensaje de WhatsApp.";
} else {
    echo "Mensaje de WhatsApp enviado correctamente.";
}
