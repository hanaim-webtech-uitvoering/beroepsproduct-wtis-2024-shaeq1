<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['ingelogd']) || $_SESSION['ingelogd'] !== true) {
    header("Location: login.php");
    exit();
}

include 'header.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profiel - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="profiel-container">
        <h1>👋 Hallo <?= htmlspecialchars($_SESSION['gebruikersnaam'] ?? 'Gast'); ?>!</h1>
        
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

    <?php include 'footer.php'; ?>
</body>
</html>