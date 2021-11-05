<?php
require_once "utilities.php";
//Ett anrop till denna filen _måste_ innehålla URL-parametern "id=X", där X
//ska representera en av våra användares ID.
//Om ID:et finns i "users.json" skickar ni tillbaka den användaren som ett objekt.
//Om ID:et inte finns i "users.json" skickar ni tillbaka ett
//felmeddelande "Not found" och statuskoden 404.
//Endast metoden GET är tillåten, annars svarar ni med felmeddelandet "Method not allowed" och statuskoden 405.
//Endast JSON (Content-Type) är tillåtet, annars svarar ni med
//felmeddelandet "Bad Request" och statuskoden 400.

$contentType = $_SERVER["CONTENT_TYPE"];

if ($_SERVER["REQUEST_METHOD"] === "GET"){
    //är contenttype json?
    if ($contentType === "application/json"){
        //laddar in alla users via loadJson
        $allUsers = loadJSON("users.json");
        //förenklar GET till variabel och om den finns
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            foreach($allUsers as $user){
                if ($user["id"] == $id){
                    sendJson([$user], 200);
                    break;
                }
            }foreach($allUsers as $user){
                if ($user["id"] !== $id){
                    sendJson(["message" => "Not Found"], 404);
                    break;
                }
            }
        } else {//ID finns inte i GET
            sendJson(["message" => "Unauthorized"], 401);
        }
    } else {//content type inte är json
        sendJson(["message" => "content type inte är json"], 400);
    }
} else {//ingen annan metod än GET är tillåten
    sendJson(["message" => "Method not allowed"], 405);
}
?>