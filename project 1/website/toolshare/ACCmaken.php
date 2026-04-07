<?php
require_once "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];


    $forbidden = ["admin", "administrator", "root", "owner"];

    if ($username === "") {
        exit("Gebruikersnaam mag niet leeg zijn.");
    }


    if (in_array(strtolower($username), $forbidden)) {
        exit("Deze gebruikersnaam is niet toegestaan.");
    }


    if (ctype_digit($username)) {
        exit("Gebruikersnaam mag niet alleen uit cijfers bestaan.");
    }


    if (strlen($username) < 3) {
        exit("Gebruikersnaam moet minstens 3 tekens lang zijn.");
    }


    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, wachtwoord, is_admin) VALUES (?, ?, 0)");
    $stmt->execute([$username, $passwordHash]);

    echo "Account aangemaakt!";
}
