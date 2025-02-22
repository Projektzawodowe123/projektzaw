<?php
// Wyświetlanie wysyłanych danych z formularza
echo "<pre>";
print_r($_POST);
echo "</pre>";

// Połączenie z bazą danych
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'restauracja2f';

$conn = new mysqli($host, $username, $password, $dbname); // POPRAWKA: Dodano wybór bazy danych

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
} 
echo "Połączenie udane! 🎉<br>";

// Pobranie danych z formularza (sprawdzenie, czy zmienne istnieją)
$numer_stolu = isset($_POST['stol']) ? intval($_POST['stol']) : 0;
$Nazwisko_rezerwujacego = isset($_POST['nazwisko']) ? trim($_POST['nazwisko']) : "";
$data_rezerwacji = isset($_POST['data']) ? trim($_POST['data']) : "";

// Sprawdzenie, czy dane nie są puste
if (empty($numer_stolu) || empty($Nazwisko_rezerwujacego) || empty($data_rezerwacji)) {
    die("Błąd: Nie wszystkie pola zostały wypełnione!");
}

// Przygotowanie zapytania SQL (BEZPIECZNA METODA)
$sql = "INSERT INTO `rezerwacja` (numer_stolu, Nazwisko_rezerwujacego, data_rezerwacji) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Błąd przygotowania zapytania: " . $conn->error);
}

// Przypisanie parametrów i wykonanie zapytania
$stmt->bind_param("iss", $numer_stolu, $Nazwisko_rezerwujacego, $data_rezerwacji);

if ($stmt->execute()) {
    echo "Rezerwacja zapisana! ✅";
} else {
    echo "Błąd zapisu: " . $stmt->error;
}

// Zamknięcie połączenia
$stmt->close();
$conn->close();
?>
