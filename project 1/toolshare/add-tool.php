<!DOCTYPE html>
<html lang="nl">

<?php
require_once "admin-check.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add-edit-tool.css">
</head>

<body>

    <div class="header">
        <h1>Nieuw gereedschap toevoegen</h1>
    </div>

    <form action="insert-tool.php?admin=1" method="POST">

        <input type="text" name="naam" placeholder="Naam" required>
        <input type="text" name="category" placeholder="Categorie" required>
        <textarea name="omschrijving" placeholder="Omschrijving" required></textarea>
        <input type="text" name="conditie" placeholder="Conditie" required>
        <input type="text" name="locatie" placeholder="Locatie" required>
        <input type="number" name="borg" placeholder="Borg" min="0">

        <label>
            Beschikbaar:
            <input type="checkbox" name="beschikbaar" value="1" checked>
        </label>

        <textarea name="opmerkingen" placeholder="Opmerkingen"></textarea>

        <button type="submit">Opslaan</button>

    </form>

</body>

</html>