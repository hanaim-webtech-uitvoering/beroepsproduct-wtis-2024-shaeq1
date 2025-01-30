<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['winkelmandje']) || empty($_SESSION['winkelmandje'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['afleveradres'])) {
    $_SESSION['afleveradres'] = $_POST['afleveradres'];
    header("Location: bestelling-plaatsen.php");
    exit();
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
                    <h3><?= $item['naam'] ?> (<?= $item['aantal'] ?>x)</h3>
                    <p>€<?= number_format($item['prijs'] * $item['aantal'], 2) ?></p>
                    <a href="winkelmandje.php?verwijder=<?= $index ?>" class="btn btn-verwijderen">Verwijderen</a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="totaal-section">
            <p class="totaal">Totaal: <span>€<?= number_format($totaal, 2) ?></span></p>
            <form method="post">
                <div class="form-group">
                    <label for="afleveradres">Afleveradres:</label>
                    <input type="text" id="afleveradres" name="afleveradres" required>
                </div>
                <button type="submit" class="btn btn-rood">Afrekenen</button>
            </form>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>