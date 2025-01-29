<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelmandje - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a class="skip-link" href="#main">Direct naar hoofdinhoud</a>
    
    <header role="banner">
        <!-- Zelfde header als index.html -->
    </header>

    <main id="main" role="main">
        <h1>Jouw Winkelmandje</h1>
        <section class="winkelmandje" aria-labelledby="bestelling-heading">
            <h2 id="bestelling-heading" class="visually-hidden">Bestelling</h2>
            
            <div class="bestelling-items">
                <div class="item">
                    <p>Pizza Margherita</p>
                    <input type="number" value="1" min="1" class="aantal" aria-label="Aantal">
                    <p class="prijs">€9,99</p>
                </div>
            </div>

            <form class="afleveradres" aria-labelledby="adres-heading">
                <h2 id="adres-heading">Aflevergegevens</h2>
                <label for="adres">Adres:</label>
                <input type="text" id="adres" required>
                <button type="submit" class="btn-bestel">Bestelling Plaatsen</button>
            </form>
        </section>
    </main>

    <footer role="contentinfo">
        <!-- Zelfde footer als index.html -->
    </footer>
</body>
</html>