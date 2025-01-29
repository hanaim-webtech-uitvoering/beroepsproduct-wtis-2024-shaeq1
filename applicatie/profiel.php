<?php
session_start();

if (!isset($_SESSION['ingelogd']) || $_SESSION['ingelogd'] !== true) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Profiel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a class="skip-link" href="#main">Direct naar hoofdinhoud</a>
    
    <header role="banner">
        <nav aria-label="Hoofdnavigatie">
            <ul>
                <li><a href="index.php">Menu</a></li>
                <li><a href="profiel.php" aria-current="page">Profiel</a></li>
            </ul>
        </nav>
    </header>

    <main id="main" role="main">
        <h1>Welkom, <?php echo $_SESSION['gebruikersnaam'] ?? 'Gast'; ?></h1>
        <section class="bestellingen">
            <h2>Jouw bestellingen</h2>
            <?php
            // Voorbeeld bestellingen (vervang met database data)
            $bestellingen = ["#001 - In behandeling", "#002 - Onderweg"];
            
            foreach ($bestellingen as $bestelling) {
                echo "<p>$bestelling</p>";
            }
            ?>
        </section>
    </main>
</body>
</html>