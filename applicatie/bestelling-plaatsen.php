<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['winkelmandje']) || empty($_SESSION['winkelmandje'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Bestelling opslaan met alle items
    $bestellingId = uniqid();
    $_SESSION['bestellingen'][] = [
        'id' => $bestellingId,
        'items' => $_SESSION['winkelmandje'], // Sla alle items op
        'afleveradres' => $_SESSION['afleveradres'],
        'status' => 'In de Oven'
    ];
    unset($_SESSION['winkelmandje']); // Leeg het winkelmandje
    header("Location: profiel.php");
    exit();
}

include 'header.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestelling Plaatsen - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="bestelling-plaatsen-container">
        <h1>✅ Bestelling Plaatsen</h1>
        <p>Je bestelling wordt voorbereid en geleverd aan: <?= htmlspecialchars($_SESSION['afleveradres']) ?></p>
        <form method="post">
            <button type="submit" class="btn">Bevestig Bestelling</button>
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>