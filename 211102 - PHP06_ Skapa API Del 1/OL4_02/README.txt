INSTRUKTIONER
=============

I denna övningen ska ni skapa ett mini-API. Detta ska bestå av 3 separata filer
- istället för en stor som innehåller massa if-satser. Ni ska använda
funktionerna från övning 1 i denna där ni känner att det behövs (vilket det
kommer göras). Nedan finner ni en lista över vilka filer, och vad dom innebär,
som behöver skapas. Jag har även inkluderat en exempelfil "users.json" som ni
kan utgå från.

Följande filer ska skapas:

1. `read-all.php`:
    - Ett anrop till denna filen ska returnera alla användare i "users.json" som
      en array till användaren.
    - Endast metoden GET är tillåten, annars svarar ni med felmeddelandet
      "Method not allowed" och statuskoden 405.
    - Endast JSON (Content-Type) är tillåtet, annars svarar ni med
      felmeddelandet "Bad Request" och statuskoden 400.

2. `read-one.php`:
    - Ett anrop till denna filen _måste_ innehålla URL-parametern "id=X", där X
      ska representera en av våra användares ID.
        - Om ID:et finns i "users.json" skickar ni tillbaka den användaren som
          ett objekt.
        - Om ID:et inte finns i "users.json" skickar ni tillbaka ett
          felmeddelande "Not found" och statuskoden 404.
    - Endast metoden GET är tillåten, annars svarar ni med felmeddelandet
      "Method not allowed" och statuskoden 405.
    - Endast JSON (Content-Type) är tillåtet, annars svarar ni med
      felmeddelandet "Bad Request" och statuskoden 400.

3. `create.php`:
    - Ett anrop till denna filen _måste_ innehålla samma nycklar som för
      användarna i "users.json". Alltså ni kan utgå från den filen för att se vad
      som behöver tas emot. DOCK - ska ni själva räkna ut nästa "id".
        - Om någon nyckel saknas skickar ni tillbaka felmeddelandet "Bad
          Request" och statuskoden 400.
        - Om allting gick bra skickar ni tillbaka ett objekt som bara innehåller
          nyckeln "id", med värdet från den nyskapade användaren (t.ex. "{ id: 31
          }") och statuskoden 201.
    - Endast metoden POST är tillåten, annars svarar ni med felmeddelandet
      "Method not allowed" och statuskoden 405.
    - Endast JSON (Content-Type) är tillåtet, annars svarar ni med
      felmeddelandet "Bad Request" och statuskoden 400.

TIPS
====

Tänk nu på att ni kan nyttja sendJson en hel del och även load/saveJson för att
hämta/spara till "users.json". Gör lämpligen en backup på "users.json" ifall
något går fel så ni snabbt kan återgå till att fortsätta testa ert API. Jag
skulle även rekommendera att använda t.ex. Insomnia/Postman-programmen för att
göra testningen lite smidigare.