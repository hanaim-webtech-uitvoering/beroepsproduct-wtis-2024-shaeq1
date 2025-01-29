<?php
session_start();

// Winkelmandje functionaliteit
if (!isset($_SESSION['winkelmandje'])) {
    $_SESSION['winkelmandje'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['toevoegen'])) {
    $pizza = [
        'naam' => $_POST['pizza_naam'],
        'aantal' => 1
    ];
    array_push($_SESSION['winkelmandje'], $pizza);
}
?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Winkelmandje</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a class="skip-link" href="#main">Direct naar hoofdinhoud</a>
    
    <header role="banner">
        <nav aria-label="Hoofdnavigatie">
            <ul>
                <li><a href="index.php">Menu</a></li>
                <li><a href="winkelmandje.php" aria-current="page">Winkelmandje</a></li>
            </ul>
        </nav>
    </header>

    <main id="main" role="main">
        <h1>Jouw Winkelmandje</h1>
        <section class="winkelmandje-items">
            <?php
            if (empty($_SESSION['winkelmandje'])) {
                echo "<p>Je winkelmandje is leeg.</p>";
            } else {
                foreach ($_SESSION['winkelmandje'] as $item) {
                    echo '
                    <div class="item">
                        <h3>' . $item['naam'] . '</h3>
                        <p>Aantal: ' . $item['aantal'] . '</p>
                    </div>';
                }
            }
            ?>
        </section>
    </main>
</body>
</html>