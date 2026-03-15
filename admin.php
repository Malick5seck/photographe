<?php
session_start();
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header("Location: login.php");
    exit();
}

$host = 'localhost'; $dbname = 'photo_portfolio'; $username = 'root'; $password = ''; 

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $stmt = $pdo->query("SELECT * FROM reservations ORDER BY date_creation DESC");
    $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) { die("Erreur : " . $e->getMessage()); }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes Réservations</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { padding: 50px; }
        .header-admin { display: flex; justify-content: space-between; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; background: #111; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #333; }
        th { color: #D4AF37; }
        .btn-logout { border: 1px solid red; color: red; padding: 10px 20px; text-decoration: none; }
    </style>
</head>
<body>
    <div class="header-admin">
        <h2>Mes Réservations</h2>
        <a href="logout.php" class="btn-logout">Déconnexion</a>
    </div>
    <table>
        <tr><th>Date</th><th>Nom</th><th>Contact</th><th>Type</th><th>Date souhaitée</th><th>Message</th></tr>
        <?php foreach ($reservations as $r): ?>
        <tr>
            <td><?= date('d/m/Y', strtotime($r['date_creation'])) ?></td>
            <td><?= htmlspecialchars($r['nom']) ?></td>
            <td><?= htmlspecialchars($r['email']) ?><br><?= htmlspecialchars($r['telephone']) ?></td>
            <td><strong><?= htmlspecialchars($r['type_seance']) ?></strong></td>
            <td><?= date('d/m/Y', strtotime($r['date_souhaitee'])) ?></td>
            <td><?= nl2br(htmlspecialchars($r['message'])) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>