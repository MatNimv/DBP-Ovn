INSTRUKTIONER
=============

I denna övningen ska ni skapa ert första bibliotek av funktioner. Ni kommer att
återanvända dessa i den andra övningen. Ni ska skapa 3 stycken funktioner och
dessa ska placeras i filen "utilities.php". Så att ni sedan kan inkludera dessa
vid behov (t.ex. till den andra övningen).

Följande funktioner ska skapas:

1. `sendJson($data, $statusCode = 200)`:
    - Funktionen ska skicka ut JSON till en klient
    - $data, en associativ array (ni behöver inte kontrollera detta)
    - $statusCode, en HTTP statuskod mellan 100 och 599 (ni behöver inte kontrollera detta)
    
    Funktionen steg för steg:
        - Skicka ut HTTP headern "Content-Type: application/json"
        - Sätta HTTP statuskoden till vad som angavs i $statusCode
        - Konvertera $data till JSON och skicka (echo) det till användaren
        - Avsluta resten av programmet med hjälp av funktionen exit

2. `loadJson($filename)`:
    - Funktionen ska läsa in en JSON-fil och konvertera innehållet
      till en associativ array
    - $filename, sökvägen till filen

    Funktionen steg för steg:
        - Kontrollera att filen finns (tips: sök up `file_exists`), om inte
          ska den returnera `false`
        - Läsa in filens innehåll
        - Konvertera innehållet från JSON till en associativ array och sedan
          returnera denna till användaren

3. `saveJson($filename, $data)`:
    - Funktionen ska spara en associativ array som JSON i en fil
    - $filename, sökvägen till filen
    - $data, den associativa arrayen som ska sparas

    Funktionen steg för steg:
        - Konvertera innehållet från en associativ array till JSON
        - Spara JSON-innehållet i filen (med Pretty-print)
        - Skicka tillbaka `true` 

4. (EXTRA) `inspect($variable)`:
    - Funktionen kör en var_dump omsluten av <pre> på $variable
    
    Denna kan ni nyttja i exemplen nedan.

TESTA ERAN KOD
==============

För att testa eran kod kan ni ta kodsnuttarna nedan och placera dom i någon fil.
Eller göra egna tester - oavsett, säkerhetsställ att dom fungerar som dom ska.

# sendJson

<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Glöm inte kontrollera i nätverksfliken i firefox att statuskoden också stämmer
    sendJson(["message" => "Funktionen fungerar!"], 201);
}
?>

# loadJson

Ni hittar filen "dogs.json" i denna mappen som ni kan utgå från.

<?php
$data = loadJson("dogs.json");

echo "<pre>";
var_dump($data);
echo "</pre>";

// Eller (om ni gjorde extra funktionen - Just Do It)
inspect($data);
?>

# saveJson

Även denna utgår från "dogs.json" i denna mappen.

<?php
// Nya hunden
$newDog = ["name" => "Johannes", "breed" => "Pudel"];
// Ladda befintliga
$data = loadJson("dogs.json");
// Lägg till
array_push($data["dogs"], $newDog);
// Spara
saveJson("dogs.json", $data);
?>
