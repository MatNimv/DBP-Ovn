<?php
require_once "utilities.php";
//Ett anrop till denna filen _måste_ innehålla samma nycklar som för
//användarna i "users.json". Alltså ni kan utgå från den filen för att se vad
//som behöver tas emot. DOCK - ska ni själva räkna ut nästa "id".
//Om någon nyckel saknas skickar ni tillbaka felmeddelandet "Bad
//Request" och statuskoden 400.
//Om allting gick bra skickar ni tillbaka ett objekt som bara innehåller
//nyckeln "id", med värdet från den nyskapade användaren (t.ex. "{ id: 31
//}") och statuskoden 201.
//Endast metoden POST är tillåten, annars svarar ni med felmeddelandet
//"Method not allowed" och statuskoden 405.
//Endast JSON (Content-Type) är tillåtet, annars svarar ni med
//felmeddelandet "Bad Request" och statuskoden 400.
$contentType = $_SERVER["CONTENT_TYPE"];
$data = file_get_contents("php://input");
$requestData = json_decode($data, true);

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if ($contentType === "application/json"){
        if (isset($requestData["first_name"], $requestData["last_name"], $requestData["email"], $requestData["ip_address"])){
            $firstName = $requestData["first_name"];
            $lastName = $requestData["last_name"];
            $email = $requestData["email"];
            $ipAddress = $requestData["ip_address"];

            //grundskapningen av ny användare
            $newUser = [
                "first_name" => $firstName,
                "last_name" => $lastName,
                "email" => $email,
                "ip_address" => $ipAddress
            ];

            //läser in ALLA användare som finns just nu
            $allUsers = loadJSON("users.json");
            $highestID = 0;
            foreach($allUsers as $user){
                if ($user["id"] > $highestID){
                    $highestID = $user["id"];
                }
            }
            $newUser["id"] = $highestID + 1;
            array_push($allUsers, $newUser);
            saveJson("users.json", $allUsers);
            //meddelandet som skickas
            sendJson(["id" => "{$newUser['id']}"], 201);
        } else {//nyckel saknas i POST
            sendJson(["message" => "Nyckeln saknas i POST"], 400);
        }
    } else { //contenttype är inte json
    sendJson(["message" => "Contenttype är inte json"], 400);
    }
} else{//metoden är inte POST
    sendJson(["message" => "Method not allowed"], 405);
}
?>