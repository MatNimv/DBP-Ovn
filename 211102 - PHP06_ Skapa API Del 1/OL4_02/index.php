<?php
error_reporting(-1);
require_once "utilities.php";

$json = file_get_contents("users.json");
$data = json_decode($json, true);

//ALLA användare tho.
$allUsers = $data;

//förenklar GET till variabel och om den finns
if(isset($_GET["id"])){
    $id = $_GET["id"];
    foreach($allUsers as $user){
        if ($user["id"] == $id){
            echo '<pre>';
            echo var_dump($user);
            echo '</pre>';
            break;
        }
    }
} else { //ID finns inte i GET
    echo 'id finns inte i get';
}

//$data = loadJSON("users.json");
//inspect($data);
