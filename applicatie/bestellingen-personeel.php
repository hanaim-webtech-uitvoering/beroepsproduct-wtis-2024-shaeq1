<?php
include 'header.php';

if (!isset($_SESSION['ingelogd']) || $_SESSION['role'] !== 'personeel') {
    header("Location: login.php");
    exit();
}
?>

<main class="personeel-container">
    <h1>📋 Actieve Bestellingen</h1>
    
    <table class="bestellingen-tabel">
        <thead>
            <tr>
                <th>Ordernummer</th>
                <th>Klant</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#001</td>
                <td>Jan Jansen</td>
                <td class="status in-oven">In behandeling</td>
            </tr>
            <tr>
                <td>#002</td>
                <td>Piet Pieters</td>
                <td class="status onderweg">Onderweg</td>
            </tr>
        </tbody>
    </table>
</main>

<?php include 'footer.php'; ?>