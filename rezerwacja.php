<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezerwacja</title>
    <!-- /*
    Pliki css, js i php powinno się rozdzielać
    */ -->
    <link rel="stylesheet" href="style.css">
    
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
        <br>
        <input type="text" name="nazwisko" required>
        <br><br>

        <label for="data">Wpisz datę rezerwacji</label>
        <br>
        <input type="date" name="data" required>
        <br><br>

        <button type="submit">Zarezerwuj</button>
    </form>

    <script src="scripts.js"></script>
</body>
</html>
