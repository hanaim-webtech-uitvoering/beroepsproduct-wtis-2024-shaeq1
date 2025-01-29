<?php
session_start();

// Uitlogfunctionaliteit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['uitloggen'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['ingelogd']) || $_SESSION['ingelogd'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Profiel - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="index.php">Menu</a></li>
                <li><a href="profiel.php" class="active">Profiel</a></li>
                <li>
                    <form method="post" class="uitlog-form">
                        <button type="submit" name="uitloggen" class="uitlog-knop">Uitloggen</button>
                    </form>
                </li>
            </ul>
        </nav>
    </header>

    <main class="profiel-container">
        <h1>👋 Hallo <?php echo htmlspecialchars($_SESSION['gebruikersnaam'] ?? 'Gast'); ?>!</h1>
        
        <section class="bestellingen-grid">
            <h2>Jouw Recente Bestellingen</h2>
            <div class="bestelling-card">
                <h3>Bestelling #001</h3>
                <p class="status in-oven">In de Oven</p>
                <p>2x Pizza Margherita</p>
                <p class="totaal">Totaal: €19,98</p>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Pizzeria Sole Machina - Alleen de Beste voor Jou</p>
    </footer>
</body>
</html>