<?php
session_start();
?>
<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a class="skip-link" href="#main">Direct naar hoofdinhoud</a>
    
    <header role="banner">
        <img src="images/logo.png" alt="Pizzeria Sole Machina" class="logo">
        <nav aria-label="Hoofdnavigatie">
            <ul>
                <li><a href="index.php" aria-current="page">Menu</a></li>
                <li><a href="winkelmandje.php">Winkelmandje</a></li>
                <li><a href="profiel.php">Profiel</a></li>
                <li><a href="login.php">Inloggen</a></li>
            </ul>
        </nav>
    </header>

    <main id="main" role="main">
        <h1>Onze Pizzas</h1>
        <section class="product-grid">
            <?php
            // Voorbeeld data (vervang met database query)
            $pizzas = [
                ["naam" => "Margherita", "prijs" => 9.99, "afbeelding" => "images/margherita.jpg"],
                ["naam" => "Pepperoni", "prijs" => 11.99, "afbeelding" => "images/pepperoni.jpg"]
            ];
            
            foreach ($pizzas as $pizza) {
                echo '
                <article class="product">
                    <img src="' . $pizza['afbeelding'] . '" alt="' . $pizza['naam'] . '">
                    <h2>' . $pizza['naam'] . '</h2>
                    <p class="prijs">€' . number_format($pizza['prijs'], 2) . '</p>
                    <form method="post" action="winkelmandje.php">
                        <input type="hidden" name="pizza_naam" value="' . $pizza['naam'] . '">
                        <button type="submit" name="toevoegen">Toevoegen</button>
                    </form>
                </article>';
            }
            ?>
        </section>
    </main>

    <footer role="contentinfo">
        <p>&copy; <?php echo date("Y"); ?> Pizzeria Sole Machina</p>
        <a href="privacy.php">Privacyverklaring</a>
    </footer>
</body>
</html>