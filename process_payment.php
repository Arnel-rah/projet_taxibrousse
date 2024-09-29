<?php
// Récupération des données du formulaire
$operator = $_POST['operator'];
$phone = $_POST['phone'];
$amount = $_POST['amount'];

// Configuration des URL API en fonction de l'opérateur
switch ($operator) {
    case 'orange_money':
        $api_url = "https://api.orange.com/orange-money/payment";
        break;
    case 'airtel_money':
        $api_url = "https://api.airtel.com/airtel-money/payment";
        break;
    case 'mvola':
        $api_url = "https://api.mvola.mg/v1/payment";
        break;
    default:
        die("Opérateur non supporté.");
}

// Initialisation de la requête API (exemple avec Orange Money)
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Bearer YOUR_API_KEY',  // Remplacer par la clé API
    'Content-Type: application/json'
]);

// Données à envoyer à l'API
$data = json_encode([
    'phone' => $phone,
    'amount' => $amount,
    'currency' => 'MGA'
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Exécution de la requête et récupération de la réponse
$response = curl_exec($ch);

if(curl_errno($ch)) {
    echo 'Erreur Curl : ' . curl_error($ch);
} else {
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if ($http_code == 200) {
        echo "Paiement réussi!";
    } else {
        echo "Erreur de paiement : " . $response;
    }
}

curl_close($ch);
?>
