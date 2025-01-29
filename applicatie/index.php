<?php
include 'header.php';

// Winkelwagen initialiseren
if (!isset($_SESSION['winkelmandje'])) {
    $_SESSION['winkelmandje'] = [];
}

// Pizza toevoegen
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['pizza_id'])) {
    $_SESSION['winkelmandje'][] = [
        'id' => $_POST['pizza_id'],
        'naam' => $_POST['pizza_naam'],
        'prijs' => $_POST['pizza_prijs']
    ];
}
?>

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
                <button type="submit" class="btn-toevoegen">+ Toevoegen</button>
            </form>
        </article>
    </div>
</main>

<?php include 'footer.php'; ?>