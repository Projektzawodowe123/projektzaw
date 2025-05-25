<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potwierdzenie</title>
    <style>
    body {
        background-color: #1a1a1a;
        color: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
        padding: 20px;
    }

    .dih {
        background-color: #2a2a2a;
        border: 2px solid rgb(194, 56, 236);
        border-radius: 10px;
        padding: 40px 30px;
        max-width: 500px;
        width: 100%;
        box-shadow: 0 0 15px rgba(160, 4, 152, 0.4);
        text-align: center;
        animation: fadeIn 1s ease-in-out;
    }

    h1 {
        font-size: 2em;
        margin-bottom: 20px;
        color:rgb(245, 95, 212);
    }

    h2 {
        font-size: 1.2em;
        margin-bottom: 25px;
        color:rgb(221, 67, 208);
    }

    h3 {
        font-size: 1.1em;
        background-color: #003322;
        padding: 12px 20px;
        border-radius: 6px;
        border: 1px solid #00cc66;
        color:rgb(238, 61, 229);
        margin-top: 20px;
        display: inline-block;
    }

    @keyframes fadeIn {
        from { opacity: 0.1; transform: translateY(-15px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 600px) {
        .dih {
            padding: 30px 20px;
        }

        h1 {
            font-size: 1.5em;
        }

        h2 {
            font-size: 1em;
        }

        h3 {
            font-size: 1em;
        }
    }
</style>


</head>
<body>
<div class="dih">
<h1>Dziękujemy za rezerwację stołu!</h1>
<h2>Za 5 sekund zostaniesz przeniesiony na główną stronę</h2>

<?php
$komunikat = "";

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'restauracja2f';

$conn = new mysqli($host, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("<p style='color: red;'>Błąd połączenia: " . $conn->connect_error . "</p>");
}

$numer_stolu = isset($_POST['stol']) ? intval($_POST['stol']) : 0;
$Nazwisko_rezerwujacego = isset($_POST['nazwisko']) ? trim($_POST['nazwisko']) : "";
$data_rezerwacji = isset($_POST['data']) ? trim($_POST['data']) : "";

if (empty($numer_stolu) || empty($Nazwisko_rezerwujacego) || empty($data_rezerwacji)) {
    die("<p style='color: red;'>Błąd: Nie wszystkie pola zostały wypełnione!</p>");
}

$sql = "INSERT INTO rezerwacja (numer_stolu, Nazwisko_rezerwujacego, data_rezerwacji) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("iss", $numer_stolu, $Nazwisko_rezerwujacego, $data_rezerwacji);
    if ($stmt->execute()) {
        $komunikat = "Rezerwacja zapisana! ✅";
    } else {
        $komunikat = "Błąd zapisu: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();

header("Refresh: 5; url=GŁÓWNA_STRONA.html");
?>

<h3><?php echo $komunikat; ?></h3>

<script>
setTimeout(function(){
    window.location.href = "GŁÓWNA_STRONA.html"; 
}, 5000);
</script>
</div> 
</body>
</html>
