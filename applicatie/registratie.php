<?php
session_start();
include 'header.php';
?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Registreren - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a class="skip-link" href="#main">Direct naar hoofdinhoud</a>
    
    <header>
        <img src="images/logo.svg" alt="Logo van de pizzeria" width="200" height="80">
        <nav>
            <ul>
                <li><a href="index.php">Menu</a></li>
                <li><a href="registratie.php" aria-current="page">Registreren</a></li>
            </ul>
        </nav>
    </header>

    <main id="main">
        <h1>Account aanmaken</h1>
        <form class="registratie-form" method="post" novalidate>
            <div class="form-group">
                <label for="email">E-mailadres:</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    required
                    placeholder="voorbeeld@domein.nl"
                >
            </div>

            <div class="form-group">
                <label for="wachtwoord">Wachtwoord:</label>
                <input 
                    type="password" 
                    id="wachtwoord" 
                    name="wachtwoord" 
                    minlength="8" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="role-type">Accounttype:</label>
                <select id="role-type" name="role" required>
                    <option value="" disabled selected>Maak een keuze</option>
                    <option value="klant">Klant</option>
                    <option value="medewerker">Medewerker</option>
                </select>
            </div>

            <button type="submit" class="btn">Account aanmaken</button>
        </form>
    </main>

    <footer>
        <p> <?php echo date("Y"); ?> Pizzeria Sole Machina</p>
        <a href="privacy.php">Privacybeleid</a>
    </footer>
</body>
</html>