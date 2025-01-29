<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a class="skip-link" href="#main">Direct naar hoofdinhoud</a>
    
    <header role="banner">
        <!-- Zelfde header als index.html -->
    </header>

    <main id="main" role="main">
        <h1>Inloggen</h1>
        <form class="login-form" aria-labelledby="inloggen-heading" novalidate>
            <h2 id="inloggen-heading" class="visually-hidden">Inlogformulier</h2>
            
            <label for="gebruikersnaam">Gebruikersnaam:</label>
            <input type="text" id="gebruikersnaam" required>
            
            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" id="wachtwoord" required>
            
            <button type="submit" class="btn-login">Inloggen</button>
        </form>
        <p>Nog geen account? <a href="registratie.html">Registreer hier</a>.</p>
    </main>

    <footer role="contentinfo">
        <!-- Zelfde footer als index.html -->
    </footer>
</body>
</html>