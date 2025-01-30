<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['winkelmandje']) || empty($_SESSION['winkelmandje'])) {
    header("Location: index.php");
    exit();
}

// Verwijder een item uit het winkelmandje
if (isset($_GET['verwijder'])) {
    $itemIndex = $_GET['verwijder'];
    if (isset($_SESSION['winkelmandje'][$itemIndex])) {
        unset($_SESSION['winkelmandje'][$itemIndex]); 
        $_SESSION['winkelmandje'] = array_values($_SESSION['winkelmandje']); // Herindexeer de array
        header("Location: winkelmandje.php"); 
        exit();
    }
}

$totaal = array_sum(array_column($_SESSION['winkelmandje'], 'prijs'));

include 'header.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelmandje - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="winkelmandje-container">
        <h1>🛒 Jouw Winkelmandje</h1>
        
        <div class="winkelmandje-items">
            <?php foreach ($_SESSION['winkelmandje'] as $index => $item): ?>
                <div class="mandje-item">
                    <h3><?= $item['naam'] ?></h3>
                    <p>€<?= number_format($item['prijs'], 2) ?></p>
                    <!-- Verwijderknop met een link naar de huidige pagina en een queryparameter -->
                    <a href="winkelmandje.php?verwijder=<?= $index ?>" class="btn btn-verwijderen">Verwijderen</a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="totaal-section">
            <p class="totaal">Totaal: <span>€<?= number_format($totaal, 2) ?></span></p>
            <button class="btn btn-rood">Afrekenen</button>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>