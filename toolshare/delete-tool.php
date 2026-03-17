<?php
require_once "includes/db.php";

require_once "admin-check.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM tools WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php?admin=1");
exit;
