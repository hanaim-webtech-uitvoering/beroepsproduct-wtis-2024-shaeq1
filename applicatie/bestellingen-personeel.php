<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['ingelogd']) || $_SESSION['role'] !== 'personeel') {
    header("Location: login.php");
    exit();
}

include 'header.php';
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestellingen - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="personeel-container">
        <h1>📋 Actieve Bestellingen</h1>
        
        <table class="bestellingen-tabel">
            <thead>
                <tr>
                    <th>Ordernummer</th>
                    <th>Klant</th>
                    <th>Producten</th>
                    <th>Status</th>
                    <th>Actie</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#001</td>
                    <td>Jan Jansen</td>
                    <td>Pizza Margherita x2</td>
                    <td class="status in-behandeling">In behandeling</td>
                    <td>
                        <form method="post">
                            <select name="status">
                                <option value="in_behandeling">In behandeling</option>
                                <option value="in_de_oven">In de oven</option>
                                <option value="onderweg">Onderweg</option>
                            </select>
                            <button type="submit" class="btn-klein">Bijwerken</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>