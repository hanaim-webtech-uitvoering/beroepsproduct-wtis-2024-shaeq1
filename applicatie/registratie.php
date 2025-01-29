<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a class="skip-link" href="#main">Direct naar hoofdinhoud</a>
    
    <header role="banner">
        <!-- Zelfde header als index.html -->
    </header>

    <main id="main" role="main">
        <h1>Registreren</h1>
        <form class="registratie-form" aria-labelledby="registratie-heading" novalidate>
            <h2 id="registratie-heading" class="visually-hidden">Registratieformulier</h2>
            
            <label for="email">E-mail:</label>
            <input type="email" id="email" required aria-describedby="email-hulp">
            <p id="email-hulp" class="hulp-text">Voorbeeld: naam@domein.nl</p>
            
            <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" id="wachtwoord" minlength="8" required>
            
            <label for="role">Rol:</label>
            <select id="role" required>
                <option value="klant">Klant</option>
                <option value="personeel">Personeel</option>
            </select>
            
            <button type="submit" class="btn-registreer">Registreer</button>
        </form>
    </main>

    <footer role="contentinfo">
        <!-- Zelfde footer als index.html -->
    </footer>
</body>
</html>