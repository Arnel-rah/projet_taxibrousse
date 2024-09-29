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
$sender_name = $_POST['sender_name'];
$receiver_name = $_POST['receiver_name'];
$receiver_address = $_POST['receiver_address'];
$package_weight = $_POST['package_weight'];
$departure_city = $_POST['departure_city'];
$arrival_city = $_POST['arrival_city'];

// Insertion dans la base de données
$sql = "INSERT INTO colis (sender_name, receiver_name, receiver_address, package_weight, departure_city, arrival_city) 
        VALUES ('$sender_name', '$receiver_name', '$receiver_address', '$package_weight', '$departure_city', '$arrival_city')";

if ($conn->query($sql) === TRUE) {
    echo "Colis enregistré avec succès!";
} else {
    echo "Erreur: " . $conn->error;
}

$conn->close();
?>
