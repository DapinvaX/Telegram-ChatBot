<?php 

//Creamos una variable que contenga el token de nuestro bot
$token="7329041249:AAGjeMECwYh5iDx4tyOnpakPwL2aozZgRcs";

//Creamos una variable que contenga la URL de la API de Telegram
$website="https://api.telegram.org/bot".$token;

//Creamos variable que contenga el input que nos envía Telegram
$input=file_get_contents('php://input');

//Creamos una variable que contenga el input decodificado
$update=json_decode($input, TRUE);

//Creamos una variable que contenga el chat ID del chat donde se ha ejecutado el bot
$chatId=$update["message"]["chat"]["id"];

//Creamos una variable que contenga el mensaje que nos envía el usuario
$message=$update["message"]["text"];

//Creamos la función que nos permitirá enviar mensajes (sendMessage).
function sendMessage($chatId, $response){
    //Creamos una variable url que contenga el mensaje que queremos enviar junto con el chat ID y el parse_mode(para decirle como queremos que pase el texto).
    $url = $GLOBALS['website']."/sendMessage?chat_id=".$chatId."&parse_mode=HTML&text=".urlencode($response);
    
    //Ahora le pasamos la URL a file_get_contents para que envíe el mensaje.
    file_get_contents($url);
}

switch($message){

    case "/start":
        $response = "Bienvenido al bot DapinvaX!";
        sendMessage($chatId, $response);
    break;
    
    case "/hola":
        $response = "Hola! ¿Cómo estás? Soy el bot DapinvaX!";
        sendMessage($chatId, $response);
    break;

    case "/adios":
        $response = "Adiós! Espero verte pronto!";
        sendMessage($chatId, $response);
    break;

    default:
        $response = "Perdona, no he entendido lo que me quieres decir. Prueba con otro comando.";
        sendMessage($chatId, $response);
    break;
}

?>