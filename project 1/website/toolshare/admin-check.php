<?php
session_start();
require_once "includes/db.php";

// fingerprint check
if (
    !isset($_SESSION["fp"]) ||
    $_SESSION["fp"] !== hash('sha256', $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'])
) {
    session_destroy();
    die("Sessiefout");
}

// ingelogd?
if (!isset($_SESSION["user_id"])) {
    die("Geen toegang");
}

// admin check via database
$stmt = $pdo->prepare("SELECT is_admin FROM users WHERE users_id = ?");
$stmt->execute([$_SESSION["user_id"]]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || (int)$user["is_admin"] !== 1) {
    die("Geen toegang");
}
