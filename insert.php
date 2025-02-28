<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potwierdzenie</title>
    <style>
        body {
            background-color: black;
            color: lime;
            text-align: center;
            font-family: Arial, sans-serif;
            padding-top: 100px;
        }
    </style>
</head>
<body>

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

</body>
</html>
