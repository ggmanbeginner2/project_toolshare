<?php
session_start();
require_once "includes/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["u"];
    $password = $_POST["p"];

    // LET OP: kolomnaam is 'username'
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user["wachtwoord"])) {

        session_regenerate_id(true);

        // LET OP: kolomnaam is 'users_id', niet 'id'
        $_SESSION["user_id"] = $user["users_id"];

        // fingerprint
        $_SESSION["fp"] = hash('sha256', $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT']);

        header("Location: index.php");
        exit;
    } else {
        echo "Verkeerde gebruikersnaam of wachtwoord.";
    }
}
