<?php
session_start();

// Alleen toegang voor personeel
if (!isset($_SESSION['ingelogd']) || $_SESSION['role'] !== 'personeel') {
    header("Location: login.php");
    exit();
}

// Voorbeeldbestellingen (vervang met database)
$bestellingen = [
    [
        'id' => 1,
        'klant' => 'Jan Jansen',
        'status' => 'in_behandeling',
        'producten' => ['Pizza Margherita x2']
    ],
    [
        'id' => 2,
        'klant' => 'Piet Pieters',
        'status' => 'in_de_oven',
        'producten' => ['Pizza Pepperoni x1']
    ]
];

// Verwerk statuswijziging
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'], $_POST['bestelling_id'])) {
    foreach ($bestellingen as &$bestelling) {
        if ($bestelling['id'] == $_POST['bestelling_id']) {
            $bestelling['status'] = $_POST['status'];
            break;
        }
    }
    // Hier zou je normaal de database updaten
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <?php include 'header.php'; ?>
    <title>Bestellingen - Personeel</title>
</head>
<body>
    <?php include 'header.php'; ?>

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
                <?php foreach ($bestellingen as $bestelling): ?>
                <tr>
                    <td>#<?= $bestelling['id'] ?></td>
                    <td><?= $bestelling['klant'] ?></td>
                    <td><?= implode(', ', $bestelling['producten']) ?></td>
                    <td class="status <?= $bestelling['status'] ?>">
                        <?php
                            $status_labels = [
                                'in_behandeling' => 'In behandeling',
                                'in_de_oven' => 'In de oven',
                                'onderweg' => 'Onderweg',
                                'afgeleverd' => 'Afgeleverd'
                            ];
                            echo $status_labels[$bestelling['status']];
                        ?>
                    </td>
                    <td>
                        <form method="post">
                            <input type="hidden" name="bestelling_id" value="<?= $bestelling['id'] ?>">
                            <select name="status" class="status-dropdown">
                                <option value="in_behandeling" <?= $bestelling['status'] === 'in_behandeling' ? 'selected' : '' ?>>In behandeling</option>
                                <option value="in_de_oven" <?= $bestelling['status'] === 'in_de_oven' ? 'selected' : '' ?>>In de oven</option>
                                <option value="onderweg" <?= $bestelling['status'] === 'onderweg' ? 'selected' : '' ?>>Onderweg</option>
                                <option value="afgeleverd" <?= $bestelling['status'] === 'afgeleverd' ? 'selected' : '' ?>>Afgeleverd</option>
                            </select>
                            <button type="submit" class="btn-klein">Bijwerken</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>