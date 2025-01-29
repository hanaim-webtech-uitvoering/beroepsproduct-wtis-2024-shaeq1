<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bekijk het menu van Pizzeria Sole Machina">
    <title>Menu - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
    <a class="skip-link" href="#main">Direct naar hoofdinhoud</a>
    
    <header role="banner">
        <img src="images/logo.svg" alt="Pizzeria Sole Machina" width="200" height="80">
        <nav aria-label="Hoofdnavigatie">
            <ul>
                <li><a href="index.html" aria-current="page">Menu</a></li>
                <li><a href="winkelmandje.html">Winkelmandje</a></li>
                <li><a href="profiel.html">Profiel</a></li>
                <li><a href="login.html">Inloggen</a></li>
            </ul>
        </nav>
    </header>

    <main id="main" role="main">
        <h1>Onze Pizzas</h1>
        <section class="product-grid" aria-labelledby="producten-heading">
            <h2 id="producten-heading" class="visually-hidden">Producten</h2>
            
            <!-- Voorbeeldproduct -->
            <article class="card" itemscope itemtype="https://schema.org/Product">
                <img src="images/pizza-margherita.jpg" alt="Pizza Margherita" width="300" height="200" loading="lazy">
                <div class="card-content">
                    <h3 itemprop="name">Pizza Margherita</h3>
                    <p class="prijs" itemprop="price">€9,99</p>
                    <button class="btn-toevoegen" aria-label="Voeg toe aan winkelmandje">+</button>
                </div>
            </article>

            <!-- Voeg meer producten toe -->
        </section>
    </main>

    <footer role="contentinfo">
        <p>&copy; 2023 Pizzeria Sole Machina</p>
        <a href="privacy.html">Privacyverklaring</a>
    </footer>
</body>
</html>