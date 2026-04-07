<?php
require_once "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, wachtwoord, is_admin) VALUES (?, ?, 0)");
    $stmt->execute([$username, $password]);

    echo "Account aangemaakt!";
}
