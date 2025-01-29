<?php
session_start();
include 'header.php';
?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Menu - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <img src="images/logo.png" alt="Logo" class="logo">
        <nav>
            <ul>
                <li><a href="index.php">Menu</a></li>
                <li><a href="winkelmandje.php">Winkelmandje</a></li>
                <li><a href="profiel.php">Profiel</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>🍕 Onze Vers Gebakken Pizza's</h1>
        <div class="product-grid">
            <article class="product">
                <img src="images/margherita.jpg" alt="Pizza Margherita">
                <h2>Margherita</h2>
                <p>Tomatensaus, mozzarella, basilicum</p>
                <p class="prijs">€9,99</p>
                <button class="btn-toevoegen">+ Toevoegen</button>
            </article>
            <!-- Meer pizza's -->
        </div>
    </main>

    <footer>
        <p> 2023 Pizzeria Sole Machina - Bel ons: <a href="tel:+31123456789">+31 123 456 789</a></p>
    </footer>
</body>
</html>