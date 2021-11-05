<?php
require_once "utilities.php";
//testar de nya funktionerna

//skickar med ett meddelande samt HTTPstatuskod.
//if ($_SERVER["REQUEST_METHOD"] === "GET"){
//    sendJson(["message" => "Funktionen fungerar"], 201);
//}

//visar datan från filen
$data = loadJSON("users.json");
inspect($data);

//lägga till ny hund samt spara den i JSON.
//$newDog = [
//            "name" => "Johannes",
//            "breed" => "Pudel"
//        ];

//array_push($data["dogs"], $newDog);

//saveJson("dogs.json", $data);
?>

<?php
?>

<?php
?>