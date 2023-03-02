<?php
$token = "6036921940:AAFUd6AdC6BcukHdfZ15rMdI1ziHP-P_5ns";
$website = "https://api.telegram.org/bot".$token;
// recogemos la informacion mandada por el usuario y la codificamos
$input= file_get_contents("php://input");
$update= json_decode($input, TRUE);
//guardamos en variables el identificador del chat que nos envia el mensaje 
$chatId=$update['message']['chat']['id'];
$message= $update['message']['text'];

//opciones de nuestro bot
switch($message){
    //si escribes /start nos devolverá un mensaje
    case '/start':
        $response='Evelyn esta practica da asco';
        sendMessage($chatId, $response);
        break;
        //si escribes /info nos devolverá un mensaje
    case '/info':
        $response='Esto es un bot que nos han obligado a hacer en contra de nuestra voluntad @RoboMedac';
        sendMessage($chatId, $response);
        break;
        //si no seleccionas ninguna opcion devolverá un mensaje
    default:
        $response='Esto no funciona';
        sendMessage($chatId, $response);
        break;
}
//Esta función se encarga de mandar los mensajes seleccionando la URL y el chat
function sendMessage($chatId, $response){
    $url = $GLOBALS['website'].'/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='.urlencode($response);
    file_get_contents($url);
}
?>