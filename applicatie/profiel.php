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
            <?php if (isset($_SESSION['bestellingen'])): ?>
                <?php foreach ($_SESSION['bestellingen'] as $bestelling): ?>
                    <div class="bestelling-card">
                        <h3>Bestelling #<?= $bestelling['id'] ?></h3>
                        <p class="status <?= strtolower(str_replace(' ', '-', $bestelling['status'])) ?>"><?= $bestelling['status'] ?></p>
                        <p><?= $bestelling['aantal'] ?>x <?= $bestelling['naam'] ?></p>
                        <p class="totaal">Totaal: €<?= number_format($bestelling['prijs'] * $bestelling['aantal'], 2) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Je hebt nog geen bestellingen geplaatst.</p>
            <?php endif; ?>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>