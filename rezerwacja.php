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
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            padding: 0;
            font-family: 'Pacifico', cursive;
        }
        #naglowek {
            font-size: 80px;
            color: #f1e0d6;
            text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.3);
            margin-top: 50px;
        }
        #tabela {
            color: #2f2f2f;
            width: 700px;
            height: 500px;
            margin: 50px auto;
            background-color: rgba(245, 245, 245, 0.8);
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        #th, td {
            font-size: 24px;
            padding: 15px;
            text-align: center;
        }
        #N {
            font-size: 30px;
            color: #2f2f2f;
        }
        .wolny {
            color: #4caf50;
        }
        .zajety {
            color: #f44336;
        }
        #form {
            background-color: rgba(255, 255, 255, 0.9);
            margin: 50px auto;
            padding: 30px;
            border-radius: 15px;
            width: 600px;
            font-size: 18px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        input[type="text"], input[type="date"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #e63946;
            border-radius: 10px;
            font-size: 18px;
        }
        input[type="radio"] {
            margin: 10px 5px;
        }
        button {
            background-color: #e63946;
            color: white;
            font-size: 18px;
            padding: 12px 30px;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #d43f3a;
        }
    </style>
</head>
<body id="body">
    <center><h1 id="naglowek">REZERWACJA STOŁU</h1></center>
    <br><br><br><br><br><br>
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

    </table>
    <br><br><br><br>
    <form action="insert.php" method="POST" id="form">
        <label for="numer_stolu">Wybierz numer stołu</label>
        <br>
        <!-- funkcja rezerwujStolik() blokowała wysyłanie danych o stoliku bo był on zajęty wykonaniem kodu JavaScript -->
        <input type="radio" name="stol" value="1" id="stol1" > Stół 1
        <input type="radio" name="stol" value="2" id="stol2" > Stół 2
        <input type="radio" name="stol" value="3" id="stol3" > Stół 3
        <input type="radio" name="stol" value="4" id="stol4" > Stół 4
        <input type="radio" name="stol" value="5" id="stol5" > Stół 5
        <input type="radio" name="stol" value="6" id="stol6" > Stół 6
        <br><br>
        <label for="nazwisko">Podaj nazwisko rezerwującego</label>
        <input type="text" name="nazwisko" id="nazwisko" >
        <label for="data">Podaj datę rezerwacji</label>
        <input type="date" name="data" id="data">
        <button type="submit">Zarezerwuj</button>
        <button type="reset">Resetuj</button>
        <br><br><br><br><br><br><br>

        <center><img id="przyciskP" src="przyciskdopowrotu.jpg" alt="przycisk2" usemap="#przyciskM"></center>
    <map name="przyciskM">
        <area shape="rect" coords="0,0,9999,9999" href="GŁÓWNA_STRONA.html">
    </map>

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
            if (stan.classList.contains("zajety")) 
            {
            document.getElementById("stol" + stol).disabled = true;
            stan.style.color = "rgb(255, 0, 0)";
            }
        }
        // Funkcja do resetowania formularza, jeśli chcesz to dodać (możesz pominąć)
        document.getElementById('form').onsubmit = function () {
            alert("Twoja rezerwacja została przyjęta!");
        }
        document.getElementById("form").onreset = function (){
            alert("Formularz został zresetowany")
        }
    </script>
</body>
</html>
