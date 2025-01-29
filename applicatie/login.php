<?php
session_start();
include 'header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Voorbeeld inloglogica (vervang met database check)
    $gebruikersnaam = "test";
    $wachtwoord = "test123";

    if ($_POST['gebruikersnaam'] === $gebruikersnaam && $_POST['wachtwoord'] === $wachtwoord) {
        $_SESSION['ingelogd'] = true;
        header("Location: profiel.php");
        exit();
    } else {
        $foutmelding = "Ongeldige inloggegevens!";
    }
}

?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Inloggen - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="index.php">Menu</a></li>
                <li><a href="login.php" class="active">Inloggen</a></li>
            </ul>
        </nav>
    </header>

    <main class="form-container">
        <h1>🍕 Welkom Terug!</h1>
        <form method="post" class="login-form">
            <?php if (isset($foutmelding)) echo "<p class='foutmelding'>$foutmelding</p>"; ?>
            
            <div class="form-group">
                <label for="gebruikersnaam">Gebruikersnaam</label>
                <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>
            </div>

            <div class="form-group">
                <label for="wachtwoord">Wachtwoord</label>
                <input type="password" id="wachtwoord" name="wachtwoord" required>
            </div>

            <button type="submit" class="btn btn-geel">Inloggen</button>
        </form>
        <p class="registratie-link">Geen account? <a href="registratie.php">Registreer hier</a></p>
    </main>

    <footer>
        <p>2023 Pizzeria Sole Machina - Snel, Vers & Gezellig</p>
    </footer>
</body>
</html>