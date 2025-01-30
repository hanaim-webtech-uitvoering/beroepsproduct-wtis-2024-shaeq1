<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isPersoneel = isset($_SESSION['role']) && $_SESSION['role'] === 'personeel';
$currentPage = basename($_SERVER['PHP_SELF']);
?>

<header>
    <nav>
        <ul>
            <li class="logo-item">
                <img src="images/logo.png" alt="Logo" class="logo">
            </li>
            <li><a href="index.php" <?= $currentPage === 'index.php' ? 'class="active"' : '' ?>>Menu</a></li>
            
            <?php if ($isPersoneel): ?>
                <li><a href="bestellingen-personeel.php" <?= $currentPage === 'bestellingen-personeel.php' ? 'class="active"' : '' ?>>Bestellingen</a></li>
            <?php endif; ?>

            <?php if (isset($_SESSION['ingelogd'])): ?>
                <li><a href="profiel.php" <?= $currentPage === 'profiel.php' ? 'class="active"' : '' ?>>Profiel</a></li>
            <?php else: ?>
                <li><a href="login.php" <?= $currentPage === 'login.php' ? 'class="active"' : '' ?>>Inloggen</a></li>
            <?php endif; ?>

            <!-- Winkelmandje rechtsboven -->
            <li class="winkelmandje-item">
                <a href="winkelmandje.php">
                    <img src="images/winkelmandje.png" alt="Winkelmandje" class="winkelmandje-logo">
                    <?php if (!empty($_SESSION['winkelmandje'])): ?>
                        <span class="winkelmandje-aantal"><?= count($_SESSION['winkelmandje']) ?></span>
                    <?php endif; ?>
                </a>
            </li>
        </ul>
    </nav>
</header>