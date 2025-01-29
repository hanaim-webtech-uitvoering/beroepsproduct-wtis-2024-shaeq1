<?php
session_start();
include 'header.php';
if (!isset($_SESSION['winkelmandje'])) {
    $_SESSION['winkelmandje'] = [];
}
?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Winkelmandje - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="index.php">Menu</a></li>
                <li><a href="winkelmandje.php" class="active">Winkelmandje</a></li>
            </ul>
        </nav>
    </header>

    <main class="winkelmandje-container">
        <h1>🛒 Jouw Winkelmandje</h1>
        
        <?php if (empty($_SESSION['winkelmandje'])): ?>
            <p class="leeg-mandje">Je mandje is nog leeg. Tijd voor pizza! 🍕</p>
        <?php else: ?>
            <div class="winkelmandje-items">
                <?php foreach ($_SESSION['winkelmandje'] as $item): ?>
                    <div class="mandje-item">
                        <img src="images/<?php echo $item['afbeelding']; ?>" alt="<?php echo $item['naam']; ?>">
                        <div class="item-info">
                            <h3><?php echo $item['naam']; ?></h3>
                            <p>Aantal: <?php echo $item['aantal']; ?></p>
                            <p class="prijs">€<?php echo number_format($item['prijs'], 2); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="totaal-section">
                <p class="totaal">Totaal: <span>€<?php echo number_format(array_sum(array_column($_SESSION['winkelmandje'], 'prijs')), 2); ?></span></p>
                <button class="btn btn-rood">Afrekenen</button>
            </div>
        <?php endif; ?>
    </main>

    <footer>
        <p>© 2023 Pizzeria Sole Machina - Snel Bezorgd, Vers Gebakken</p>
    </footer>
</body>
</html>