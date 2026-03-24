<!DOCTYPE html>
<html lang="nl">

<?php
require_once "includes/db.php";

require_once "admin-check.php";

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM tools WHERE id = ?");
$stmt->execute([$id]);
$tool = $stmt->fetch();
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add-edit-tool.css">
</head>

<body>

    <div class="header">
        <h1>Gereedschap bewerken</h1>
    </div>



    <form action="update-tool.php?id=<?= $id ?>&admin=1" method="POST">

        <input type="text" name="naam" value="<?= $tool['naam'] ?>" required>
        <input type="text" name="category" value="<?= $tool['category'] ?>" required>
        <textarea name="omschrijving" required><?= $tool['omschrijving'] ?></textarea>
        <input type="text" name="conditie" value="<?= $tool['conditie'] ?>" required>
        <input type="text" name="locatie" value="<?= $tool['locatie'] ?>" required>
        <input type="number" name="borg" value="<?= $tool['borg'] ?>" min="0">

        <label>
            Beschikbaar:
            <input type="checkbox" name="beschikbaar" value="1"
                <?= $tool['beschikbaar'] ? 'checked' : '' ?>>
        </label>

        <textarea name="opmerkingen"><?= $tool['opmerkingen'] ?></textarea>

        <button type="submit">Opslaan</button>
    </form>
</body>

</html>