<?php
session_start();
$isPersoneel = isset($_SESSION['role']) && $_SESSION['role'] === 'personeel';
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<header>
    <img src="images/logo.png" alt="Logo" class="logo">
    <nav>
        <ul>
            <li><a href="index.php" <?= $currentPage === 'index.php' ? 'class="active"' : '' ?>>Menu</a></li>
            
            <?php if ($isPersoneel): ?>
                <li><a href="bestellingen-personeel.php" <?= $currentPage === 'bestellingen-personeel.php' ? 'class="active"' : '' ?>>Bestellingen</a></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['ingelogd'])): ?>
                <li><a href="profiel.php" <?= $currentPage === 'profiel.php' ? 'class="active"' : '' ?>>Profiel</a></li>
                <li>
                    <form method="post" action="logout.php">
                        <button type="submit" class="uitlog-knop">Uitloggen</button>
                    </form>
                </li>
            <?php else: ?>
                <li><a href="login.php" <?= $currentPage === 'login.php' ? 'class="active"' : '' ?>>Inloggen</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>