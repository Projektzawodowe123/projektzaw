<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'restauracja2f';

// Tworzymy połączenie z bazą danych
$conn = new mysqli($host, $username, $password, $dbname);

// Sprawdzamy połączenie
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
} 

// Pobieramy dane z formularza
$numer_stolu = $_POST['stol']; // Numer stołu z formularza
$nazwisko = $_POST['nazwisko']; // Nazwisko rezerwującego
$data = $_POST['data']; // Data rezerwacji

// Przygotowanie zapytania SQL (upewnij się, że używasz odpowiednich nazw kolumn)
$sql = "INSERT INTO `rezerwacja` (numer_stolu, Nazwisko_rezerwujacego, data_rezerwacji) VALUES (?, ?, ?)";

// Przygotowujemy zapytanie z użyciem prepared statements
$stmt = $conn->prepare($sql);

// Sprawdzamy, czy przygotowanie zakończyło się sukcesem
if ($stmt === false) {
    die("Błąd w przygotowaniu zapytania: " . $conn->error);
}

// Powiązanie parametrów z zapytaniem
$stmt->bind_param("iss", $numer_stolu, $nazwisko, $data); // "iss" oznacza: integer, string, string

// Wykonanie zapytania
if ($stmt->execute()) {
    echo "Dane zostały zapisane pomyślnie";
} else {
    echo "Błąd zapisu: " . $stmt->error;
}

// Zamknięcie zapytania i połączenia
$stmt->close();
$conn->close();

?>
