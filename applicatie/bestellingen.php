<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellingen - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <a class="skip-link" href="#main">Direct naar hoofdinhoud</a>
    
    <header role="banner">
        <!-- Zelfde header als index.html -->
    </header>

    <main id="main" role="main">
        <h1>Actieve Bestellingen</h1>
        <table class="bestellingen-tabel" aria-labelledby="tabel-heading">
            <caption id="tabel-heading" class="visually-hidden">Overzicht van bestellingen</caption>
            <thead>
                <tr>
                    <th scope="col">Order-ID</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actie</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#101</td>
                    <td>In de oven</td>
                    <td>
                        <select class="status-dropdown" aria-label="Status wijzigen">
                            <option>In behandeling</option>
                            <option>In de oven</option>
                            <option>Onderweg</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <footer role="contentinfo">
        <!-- Zelfde footer als index.html -->
    </footer>
</body>
</html>