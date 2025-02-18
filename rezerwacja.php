<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezerwacja</title>
    <style>
        #body {
            background-image: url("tlorezerwacji.jpg");
            background-size: cover;
        }
        #naglowek {
            font-size: 80px;
            color: red;
        }
        #tabela {
            color: black;
            width: 700px;
            height: 500px;
            margin-left: 600px;
            background-color: white;
        }
        #th, td {
            font-size: 100px;
            padding: 15px;
        }
        #N {
            font-size: 50px;
            color: black;
        }
        .wolny {
            color: rgb(0, 250, 0);
        }
        .zajety {
            color: red;
        }
        #form {
            background-color: white;
            margin-left: 600px;
            margin-right: 600px;
            font-size: 18px;
        }
    </style>
</head>
<body id="body">
    <center><h1 id="naglowek">REZERWACJA STOŁU</h1></center>
    <br><br><br><br><br><br><br><br><br><br><br><br>
    <table border="5" id="tabela">
        <tr>
            <th id="N">Numer Stołu</th>
            <th id="N">Stan Stołu</th>
        </tr>
        <tr>
            <td>1</td>
            <td id="stan1" class="wolny">Wolny</td>
        </tr>
        <tr>
            <td>2</td>
            <td id="stan2" class="wolny">Wolny</td>
        </tr>
        <tr>
            <td>3</td>
            <td id="stan3" class="wolny">Wolny</td>
        </tr>
        <tr>
            <td>4</td>
            <td id="stan4" class="wolny">Wolny</td>
        </tr>
        <tr>
            <td>5</td>
            <td id="stan5" class="wolny">Wolny</td>
        </tr>
        <tr>
            <td>6</td>
            <td id="stan6" class="wolny">Wolny</td>
        </tr>
    </table>
    <br><br><br><br>

    <form action="C:\xampp\htdocs\Projekt na 2 półrocze\insert.php" method="post" id="form">
        <label for="numer_stolu">Wybierz numer stołu</label>
        <br>
        <input type="radio" name="stol" value="1" id="stol1" onclick="rezerwujStolik(1)"> Stół 1
        <input type="radio" name="stol" value="2" id="stol2" onclick="rezerwujStolik(2)"> Stół 2
        <input type="radio" name="stol" value="3" id="stol3" onclick="rezerwujStolik(3)"> Stół 3
        <input type="radio" name="stol" value="4" id="stol4" onclick="rezerwujStolik(4)"> Stół 4
        <input type="radio" name="stol" value="5" id="stol5" onclick="rezerwujStolik(5)"> Stół 5
        <input type="radio" name="stol" value="6" id="stol6" onclick="rezerwujStolik(6)"> Stół 6
        <br><br>

        <label for="nazwisko">Podaj nazwisko rezerwującego</label>
        <br>
        <input type="text" name="nazwisko" required>
        <br><br>

        <label for="data">Wpisz datę rezerwacji</label>
        <br>
        <input type="date" name="data" required>
        <br><br>

        <button type="submit">Zarezerwuj</button>
    </form>

    <script>
        // Funkcja rezerwująca stół
        function rezerwujStolik(stol) {
            // Zmiana koloru tekstu na czerwony (zajęty) w tabeli
            var stan = document.getElementById("stan" + stol);
            stan.classList.remove("wolny");
            stan.classList.add("zajety");
            stan.innerText = "Zajęty";

            // Usunięcie opcji wyboru dla tego stolika
            var radio = document.getElementById("stol" + stol);
            radio.disabled = true;
        }

        // Funkcja do resetowania formularza, jeśli chcesz to dodać (możesz pominąć)
        document.getElementById('form').onsubmit = function () {
            alert("Twoja rezerwacja została przyjęta!");
        }
    </script>
</body>
</html>
