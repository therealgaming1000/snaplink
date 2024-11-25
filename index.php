<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ip_database";

// Verbindung zur Datenbank herstellen
$conn = new mysqli($servername, $username, $password, $dbname);

// Verbindung überprüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ip_address = $_SERVER['REMOTE_ADDR'];

    $sql = "INSERT INTO ip_addresses (ip_address) VALUES ('$ip_address')";

    if ($conn->query($sql) === TRUE) {
        echo "IP-Adresse erfolgreich gespeichert!";
    } else {
        echo "Fehler: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>IP-Adresse speichern</title>
</head>
<body>
    <h1>IP-Adresse speichern</h1>
    <form method="post" action="">
        <button type="submit">IP-Adresse speichern</button>
    </form>
</body>
</html>
