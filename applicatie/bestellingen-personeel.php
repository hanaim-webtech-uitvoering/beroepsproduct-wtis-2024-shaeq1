<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['ingelogd']) || $_SESSION['role'] !== 'personeel') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bestelling_id'])) {
    $bestellingId = $_POST['bestelling_id'];
    $nieuweStatus = $_POST['status'];
    foreach ($_SESSION['bestellingen'] as &$bestelling) {
        if ($bestelling['id'] == $bestellingId) {
            $bestelling['status'] = $nieuweStatus;
            break;
        }
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
        
        <div class="bestellingen-grid">
            <?php if (isset($_SESSION['bestellingen'])): ?>
                <?php foreach ($_SESSION['bestellingen'] as $bestelling): ?>
                    <div class="bestelling-card">
                        <h3>Bestelling #<?= $bestelling['id'] ?></h3>
                        <p class="status <?= strtolower(str_replace(' ', '-', $bestelling['status'])) ?>"><?= $bestelling['status'] ?></p>
                        <p><?= $bestelling['aantal'] ?>x <?= $bestelling['naam'] ?></p>
                        <p class="totaal">Totaal: €<?= number_format($bestelling['prijs'] * $bestelling['aantal'], 2) ?></p>
                        <form method="post">
                            <input type="hidden" name="bestelling_id" value="<?= $bestelling['id'] ?>">
                            <select name="status">
                                <option value="In de Oven">In de Oven</option>
                                <option value="Onderweg">Onderweg</option>
                                <option value="Bezorgd">Bezorgd</option>
                            </select>
                            <button type="submit" class="btn">Status Bijwerken</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Er zijn geen actieve bestellingen.</p>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>