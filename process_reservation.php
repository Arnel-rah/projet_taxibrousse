<?php
// Connexion à la base de données
$host = "localhost";
$user = "root";
$pass = "";
$db = "taxibrousse";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

// Récupérer les données du formulaire
$name = $_POST['name'];
$email = $_POST['email'];
$departure_city = $_POST['departure_city'];
$arrival_city = $_POST['arrival_city'];
$departure_date = $_POST['departure_date'];

// Insertion dans la base de données
$sql = "INSERT INTO reservations (name, email, departure_city, arrival_city, departure_date) 
        VALUES ('$name', '$email', '$departure_city', '$arrival_city', '$departure_date')";

if ($conn->query($sql) === TRUE) {
    echo "Réservation réussie!";
} else {
    echo "Erreur: " . $conn->error;
}

$conn->close();
?>
