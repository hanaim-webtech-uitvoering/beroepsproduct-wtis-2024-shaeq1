<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Privacy - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="index.php">Menu</a></li>
                <li><a href="privacy.php" class="active">Privacy</a></li>
            </ul>
        </nav>
    </header>

    <main class="privacy-container">
        <h1>🔒 Onze Privacybelofte</h1>
        <article class="privacy-content">
            <h2>Jouw gegevens zijn veilig</h2>
            <p>Wij gebruiken alleen wat nodig is om jouw bestelling perfect te laten verlopen. Geen spam, geen gedoe!</p>
            
            <h3>Wat we verzamelen</h3>
            <ul>
                <li>Naam en adres voor bezorging</li>
                <li>Telefoonnummer voor updates</li>
                <li>Betaalgegevens (veilig via Mollie)</li>
            </ul>
        </article>
    </main>

    <footer>
        <p>© 2023 Pizzeria Sole Machina - Jouw Vertrouwen, Onze Prioriteit</p>
    </footer>
</body>
</html>