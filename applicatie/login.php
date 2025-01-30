<?php
// Sessie starten vóór header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Inloglogica
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['gebruikersnaam'] === 'personeel' && $_POST['wachtwoord'] === 'geheim') {
        $_SESSION['ingelogd'] = true;
        $_SESSION['role'] = 'personeel';
        header("Location: index.php");
        exit();
    } elseif ($_POST['gebruikersnaam'] === 'klant' && $_POST['wachtwoord'] === 'wachtwoord') {
        $_SESSION['ingelogd'] = true;
        $_SESSION['role'] = 'klant';
        header("Location: index.php");
        exit();
    } else {
        $foutmelding = "Ongeldige inloggegevens!";
    }
}

include 'header.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Inloggen - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- VERWIJDER DE HANDMATIGE HEADER HIER -->

    <main class="form-container">
        <h1>🔑 Inloggen</h1>
        
        <?php if (isset($foutmelding)): ?>
            <p class="foutmelding"><?= $foutmelding ?></p>
        <?php endif; ?>

        <form method="post">
            <div class="form-group">
                <label for="gebruikersnaam">Gebruikersnaam:</label>
                <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>
            </div>

            <div class="form-group">
                <label for="wachtwoord">Wachtwoord:</label>
                <input type="password" id="wachtwoord" name="wachtwoord" required>
            </div>

            <button type="submit" class="btn">Inloggen</button>
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>