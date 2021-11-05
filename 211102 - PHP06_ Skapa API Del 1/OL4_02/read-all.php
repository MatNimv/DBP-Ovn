<?php
require_once "utilities.php";
//Ett anrop till denna filen ska returnera alla användare i "users.json" som
//en array till användaren.
//Endast metoden GET är tillåten, annars svarar ni med felmeddelandet
//"Method not allowed" och statuskoden 405.
//Endast JSON (Content-Type) är tillåtet, annars svarar ni med
//felmeddelandet "Bad Request" och statuskoden 400.

$contentType = $_SERVER["CONTENT_TYPE"];

if($_SERVER["REQUEST_METHOD"] === "GET"){
    if ($contentType === "application/json"){
        $data = loadJSON("users.json");
        sendJson($data, 200);
    } else{ //om content-type INTE är JSON
        sendJson(["message" => "Bad Request"], 400);
    }
//om det INTE är GET.
} else {
    sendJson(["message" => "Method not allowed"], 405);
}
?>