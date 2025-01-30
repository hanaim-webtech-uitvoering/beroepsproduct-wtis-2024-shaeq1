<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['winkelmandje'])) {
    $_SESSION['winkelmandje'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pizza_id'])) {
    $aantal = (int)$_POST['aantal'];
    if ($aantal > 0) {
        $_SESSION['winkelmandje'][] = [
            'id' => $_POST['pizza_id'],
            'naam' => $_POST['pizza_naam'],
            'prijs' => $_POST['pizza_prijs'],
            'aantal' => $aantal
        ];
    }
}

include 'header.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main>
        <h1>🍕 Onze Pizza's</h1>
        
        <div class="product-grid">
            <!-- Pizza Margherita -->
            <article class="product">
                <img src="images/margherita.jpg" alt="Pizza Margherita">
                <h2>Margherita</h2>
                <p class="prijs">€9,99</p>
                <form method="post">
                    <input type="hidden" name="pizza_id" value="1">
                    <input type="hidden" name="pizza_naam" value="Margherita">
                    <input type="hidden" name="pizza_prijs" value="9.99">
                    <label for="aantal-margherita">Aantal:</label>
                    <input type="number" id="aantal-margherita" name="aantal" min="1" value="1" required>
                    <button type="submit" class="btn-toevoegen">+ Toevoegen</button>
                </form>
            </article>

            <!-- Pizza Pepperoni -->
            <article class="product">
                <img src="images/pepperoni.jpg" alt="Pizza Pepperoni">
                <h2>Pepperoni</h2>
                <p class="prijs">€11,99</p>
                <form method="post">
                    <input type="hidden" name="pizza_id" value="2">
                    <input type="hidden" name="pizza_naam" value="Pepperoni">
                    <input type="hidden" name="pizza_prijs" value="11.99">
                    <label for="aantal-pepperoni">Aantal:</label>
                    <input type="number" id="aantal-pepperoni" name="aantal" min="1" value="1" required>
                    <button type="submit" class="btn-toevoegen">+ Toevoegen</button>
                </form>
            </article>
        </div>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>