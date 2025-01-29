<?php
session_start();

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
    <title>Inloggen</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a class="skip-link" href="#main">Direct naar hoofdinhoud</a>
    
    <header role="banner">
        <nav aria-label="Hoofdnavigatie">
            <ul>
                <li><a href="index.php">Menu</a></li>
                <li><a href="login.php" aria-current="page">Inloggen</a></li>
            </ul>
        </nav>
    </header>

    <main id="main" role="main">
        <h1>Inloggen</h1>
        <form method="post" aria-labelledby="inloggen-heading">
            <?php if (isset($foutmelding)) echo "<p class='fout'>$foutmelding</p>"; ?>
            <label for="gebruikersnaam">Gebruikersnaam:</label>
            <input type="text" id="gebruikersnaam" name="gebruikersnaam" required>
            
            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" id="wachtwoord" name="wachtwoord" required>
            
            <button type="submit" class="btn-login">Inloggen</button>
        </form>
    </main>
</body>
</html>