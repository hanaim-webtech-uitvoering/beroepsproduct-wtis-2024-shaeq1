<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Controleer of de gebruiker is ingelogd als personeel
if (!isset($_SESSION['ingelogd']) || $_SESSION['role'] !== 'personeel') {
    header("Location: login.php");
    exit();
}

// Voorbeelddata voor bestellingen
$voorbeeldBestellingen = [
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

// Toon details van een specifieke bestelling als er een ID is meegegeven
$bestellingDetails = null;
if (isset($_GET['bestelling_id'])) {
    $bestellingId = (int)$_GET['bestelling_id'];
    foreach ($voorbeeldBestellingen as &$bestelling) {
        if ($bestelling['id'] === $bestellingId) {
            $bestellingDetails = &$bestelling;
            break;
        }
    }
}

// Status van een bestelling aanpassen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    $nieuweStatus = $_POST['status'];
    if ($bestellingDetails) {
        $bestellingDetails['status'] = $nieuweStatus;
    }
}

include 'header.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellingen - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="bestellingen-container">
        <h1>📦 Bestellingen Beheren</h1>
        
        <?php if ($bestellingDetails): ?>
            <!-- Detailoverzicht van een bestelling -->
            <div class="bestelling-details">
                <h2>Details van Bestelling #<?= $bestellingDetails['id'] ?></h2>
                <p><strong>Status:</strong> <?= $bestellingDetails['status'] ?></p>
                <p><strong>Afleveradres:</strong> <?= htmlspecialchars($bestellingDetails['afleveradres']) ?></p>
                
                <h3>Items:</h3>
                <ul>
                    <?php foreach ($bestellingDetails['items'] as $item): ?>
                        <li>
                            <?= $item['aantal'] ?>x <?= $item['naam'] ?> 
                            (€<?= number_format($item['prijs'], 2) ?>/stuk)
                        </li>
                    <?php endforeach; ?>
                </ul>

                <!-- Totaalbedrag -->
                <?php
                    $totaal = 0;
                    foreach ($bestellingDetails['items'] as $item) {
                        $totaal += $item['prijs'] * $item['aantal'];
                    }
                ?>
                <p><strong>Totaal:</strong> €<?= number_format($totaal, 2) ?></p>

                <!-- Formulier om de status aan te passen -->
                <form method="post">
                    <label for="status">Status aanpassen:</label>
                    <select name="status" id="status">
                        <option value="In de Oven" <?= $bestellingDetails['status'] === 'In de Oven' ? 'selected' : '' ?>>In de Oven</option>
                        <option value="Onderweg" <?= $bestellingDetails['status'] === 'Onderweg' ? 'selected' : '' ?>>Onderweg</option>
                        <option value="Bezorgd" <?= $bestellingDetails['status'] === 'Bezorgd' ? 'selected' : '' ?>>Bezorgd</option>
                    </select>
                    <button type="submit" class="btn">Status Bijwerken</button>
                </form>

                <!-- Terugknop -->
                <a href="bestellingen-personeel.php" class="btn">Terug naar overzicht</a>
            </div>
        <?php else: ?>
            <!-- Overzicht van alle bestellingen -->
            <div class="bestellingen-grid">
                <?php foreach ($voorbeeldBestellingen as $bestelling): ?>
                    <div class="bestelling-card">
                        <h3>Bestelling #<?= $bestelling['id'] ?></h3>
                        <p class="status <?= strtolower(str_replace(' ', '-', $bestelling['status'])) ?>">
                            <?= $bestelling['status'] ?>
                        </p>
                        <p>Afleveradres: <?= htmlspecialchars($bestelling['afleveradres']) ?></p>
                        
                        <!-- Link naar detailoverzicht -->
                        <a href="bestellingen-personeel.php?bestelling_id=<?= $bestelling['id'] ?>" class="btn">
                            Bekijk Details
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>