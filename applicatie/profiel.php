<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['ingelogd']) || $_SESSION['ingelogd'] !== true) {
    header("Location: login.php");
    exit();
}

// Voorbeelddata voor bestellingen
if (!isset($_SESSION['bestellingen']) || empty($_SESSION['bestellingen'])) {
    $_SESSION['bestellingen'] = [
        [
            'id' => 1,
            'items' => [
                ['naam' => 'Margherita', 'prijs' => 9.99, 'aantal' => 2],
                ['naam' => 'Pepperoni', 'prijs' => 11.99, 'aantal' => 1]
            ],
            'afleveradres' => 'Voorbeeldstraat 123, 1234 AB Amsterdam',
            'status' => 'In de Oven'
        ],
        [
            'id' => 2,
            'items' => [
                ['naam' => 'Hawaii', 'prijs' => 12.99, 'aantal' => 3]
            ],
            'afleveradres' => 'Teststraat 456, 5678 CD Rotterdam',
            'status' => 'Onderweg'
        ]
    ];
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
            <?php if (!empty($_SESSION['bestellingen'])): ?>
                <?php foreach ($_SESSION['bestellingen'] as $bestelling): ?>
                    <div class="bestelling-card">
                        <h3>Bestelling #<?= $bestelling['id'] ?></h3>
                        <p class="status <?= strtolower(str_replace(' ', '-', $bestelling['status'])) ?>">
                            <?= $bestelling['status'] ?>
                        </p>
                        <p>Afleveradres: <?= htmlspecialchars($bestelling['afleveradres']) ?></p>
                        
                        <!-- Toon alle items in de bestelling -->
                        <?php foreach ($bestelling['items'] as $item): ?>
                            <p><?= $item['aantal'] ?>x <?= $item['naam'] ?> (€<?= number_format($item['prijs'], 2) ?>/stuk)</p>
                        <?php endforeach; ?>

                        <!-- Bereken het totaalbedrag -->
                        <?php 
                            $totaal = 0;
                            foreach ($bestelling['items'] as $item) {
                                $totaal += $item['prijs'] * $item['aantal'];
                            }
                        ?>
                        <p class="totaal">Totaal: €<?= number_format($totaal, 2) ?></p>
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