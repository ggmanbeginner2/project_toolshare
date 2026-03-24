<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToolShare</title>

    <link rel="stylesheet" href="admins.css">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">

    <?php
    require_once "includes/db.php";
    session_start();

    $isAdmin = false;

    if (isset($_SESSION["user_id"])) {
        $stmtAdmin = $pdo->prepare("SELECT is_admin FROM users WHERE users_id = ?");
        $stmtAdmin->execute([$_SESSION["user_id"]]);
        $user = $stmtAdmin->fetch(PDO::FETCH_ASSOC);

        if ($user && (int)$user["is_admin"] === 1) {
            $isAdmin = true;
        }
    }

    $stmt = $pdo->query("SELECT * FROM tools ORDER BY id DESC");
    $tools = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

</head>



<body>

    <!-- Header -->
    <header class="header">
        <div class="logo">ToolShare</div>

        <div class="header-controls">
            <input type="text" id="search" placeholder="Zoek gereedschap...">

            <button id="searchBtn" class="header-btn">Zoeken</button>
            <button id="filterBtn" class="header-btn">Filter</button>
            <button id="loginBtn" class="header-btn">Login</button>

            <?php if ($isAdmin): ?>
                <a href="logout.php" class="logout-btn">Uitloggen</a>
            <?php endif; ?>
        </div>
    </header>

    <div id="filterPopup" class="filter-popup">
        <h3>Filter opties</h3>

        <label for="filterCategory">Categorie:</label>
        <select id="filterCategory">
            <option value="">Alle</option>
            <option value="elektrisch">Elektrisch</option>
            <option value="bouw">Bouw</option>
            <option value="tuin">Tuin</option>
        </select>

        <label for="filterStatus">Beschikbaarheid:</label>
        <select id="filterStatus">
            <option value="">Alle</option>
            <option value="beschikbaar">Beschikbaar</option>
            <option value="uitgeleend">Uitgeleend</option>
        </select>

        <button id="applyFilter">Toepassen</button>
        <button id="closeFilter">Sluiten</button>
    </div>

    <!-- Main content -->
    <main class="main-container">
        <!-- Tool lijst -->


        <div class="tools-container">
            <h2>Gereedschap overzicht</h2>
            <div class="tool-list">

                <?php if ($isAdmin): ?>
                    <a href="add-tool.php?admin=1" class="add-btn">+ Gereedschap toevoegen</a>
                <?php endif; ?>
                <!-- hier komen de tool cards -->




                <?php foreach ($tools as $tool): ?>
                    <div class="tool-card"
                        data-category="<?= strtolower($tool['category']) ?>"
                        data-status="<?= $tool['beschikbaar'] ? 'beschikbaar' : 'uitgeleend' ?>"
                        data-naam="<?= htmlspecialchars($tool['naam']) ?>"
                        data-categorie="<?= htmlspecialchars($tool['category']) ?>"
                        data-conditie="<?= htmlspecialchars($tool['conditie']) ?>"
                        data-locatie="<?= htmlspecialchars($tool['locatie']) ?>"
                        data-omschrijving="<?= htmlspecialchars($tool['omschrijving']) ?>"
                        data-beschikbaar="<?= $tool['beschikbaar'] ? 'Beschikbaar' : 'Uitgeleend' ?>">


                        <?php if ($isAdmin): ?>
                            <div class="admin-buttons">
                                <a href="edit-tool.php?id=<?= $tool['id'] ?>&admin=1" class="add-btn">Bewerken</a>
                                <a href="delete-tool.php?id=<?= $tool['id'] ?>&admin=1"
                                    class="delete-btn"
                                    onclick="return confirm('Weet je zeker dat je dit gereedschap wilt verwijderen?')">
                                    Verwijderen
                                </a>
                            </div>
                        <?php endif; ?>


                        <h2><?= htmlspecialchars($tool['naam']) ?></h2>
                        <p><strong>Locatie:</strong> <?= htmlspecialchars($tool['locatie']) ?></p>

                        <button class="info-btn">Info</button>
                        <button class="leen-btn" data-tool-id="<?= $tool['id'] ?>">Bericht sturen</button>


                    </div>

                <?php endforeach; ?>


            </div>
        </div>



        <!-- Tool details paneel -->
        <aside class="tool-details">
            <h2>Tool informatie</h2>
            <p>Klik op een tool om details te zien.</p>
        </aside>

        <div id="loginPopup" class="login-popup">
            <div class="login-content">
                <h2>Inloggen</h2>

                <form action="login.php" method="POST" autocomplete="off">

                    <!-- Fake fields to block browser autofill -->
                    <input type="text" style="display:none" autocomplete="username">
                    <input type="password" style="display:none" autocomplete="current-password">

                    <label>Gebruikersnaam</label>
                    <input type="text" name="u" autocomplete="off" required>

                    <label>Wachtwoord</label>
                    <input type="password" name="p" autocomplete="new-password" required>

                    <button type="submit" class="login-submit">Inloggen</button>
                </form>

                <button id="closeLogin" class="close-btn">Sluiten</button>
            </div>
        </div>


    </main>
    <div id="leenPopup" class="leen-popup">
        <div class="leen-content">
            <h2>Bericht sturen</h2>

            <form action="plaats_bericht.php" method="POST">
                <input type="hidden" id="popupToolId" name="tool_id">

                <label>Naam</label>
                <input type="text" name="naam" required>

                <label>E-mail</label>
                <input type="email" name="email" required>

                <label>Bericht</label>
                <textarea name="bericht" required></textarea>

                <button type="submit">Versturen</button>
            </form>

            <button id="closeLeenPopup">Sluiten</button>
        </div>
    </div>

    <script src="script.js"></script>
    <script src="search.js"></script>
    <script src="info.js"></script>
    <script src="login.js"></script>
    <script src="leen.js"></script>
</body>

</html>