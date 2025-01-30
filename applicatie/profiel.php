<?php
// Sessie starten vóór header.php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Uitloggen verwerken
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['uitloggen'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

// Redirect als niet ingelogd
if (!isset($_SESSION['ingelogd']) || $_SESSION['ingelogd'] !== true) {
    header("Location: login.php");
    exit();
}

include 'header.php';
?>

<!DOCTYPE html>
<html lang="nl" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Profiel - Pizzeria Sole Machina</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Nunito+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- VERWIJDER DE HANDMATIGE HEADER HIER -->

    <main class="profiel-container">
        <h1>👋 Hallo <?php echo htmlspecialchars($_SESSION['gebruikersnaam'] ?? 'Gast'); ?>!</h1>
        
        <section class="bestellingen-grid">
            <h2>Jouw Recente Bestellingen</h2>
            <div class="bestelling-card">
                <h3>Bestelling #001</h3>
                <p class="status in-oven">In de Oven</p>
                <p>2x Pizza Margherita</p>
                <p class="totaal">Totaal: €19,98</p>
            </div>
        </section>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>