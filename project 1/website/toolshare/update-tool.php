<?php
require_once "includes/db.php";

require_once "admin-check.php";

$id = $_GET['id'];
$beschikbaar = isset($_POST['beschikbaar']) ? 1 : 0;

$sql = "UPDATE tools SET
naam=?, category=?, omschrijving=?, conditie=?, locatie=?, beschikbaar=?, borg=?, opmerkingen=?
WHERE id=?";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    $_POST['naam'],
    $_POST['category'],
    $_POST['omschrijving'],
    $_POST['conditie'],
    $_POST['locatie'],
    $beschikbaar,
    $_POST['borg'],
    $_POST['opmerkingen'],
    $id
]);

header("Location: index.php?admin=1");
exit;
