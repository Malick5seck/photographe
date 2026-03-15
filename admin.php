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
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body { padding: 50px; }
        .header-admin { display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; }
        table { width: 100%; border-collapse: collapse; background: #111; border-radius: 8px; overflow: hidden; }
        th, td { padding: 15px; text-align: left; border-bottom: 1px solid #333; }
        th { color: #D4AF37; background: #1a1a1a; }
        
        /* =========================================
           BOUTON DÉCONNEXION ANIMÉ
           ========================================= */
        .btn-logout { 
            display: inline-flex; 
            align-items: center; 
            justify-content: center; 
            gap: 10px; /* Espace entre le texte et l'icône */
            border: 1px solid #ff4d4d; 
            color: #ff4d4d; 
            padding: 10px 24px; 
            text-decoration: none; 
            border-radius: 30px; /* Forme de pilule */
            text-transform: uppercase;
            font-size: 0.9rem;
            font-weight: bold;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275); /* Rebond fluide */
            background: transparent;
        }

        /* L'icône à l'intérieur du bouton */
        .btn-logout i {
            font-size: 1.1rem;
            transition: transform 0.3s ease; /* Animation fluide de l'icône */
        }

        /* Ce qui se passe quand on survole le bouton */
        .btn-logout:hover { 
            background: #ff4d4d; 
            color: #fff; 
            transform: translateY(-3px); /* Le bouton monte légèrement */
            box-shadow: 0 6px 12px rgba(255, 77, 77, 0.3); /* Ombre rouge lumineuse */
        }

        /* Ce qui se passe pour l'icône quand on survole le bouton */
        .btn-logout:hover i {
            transform: translateX(5px); /* L'icône glisse vers la droite ! */
        }
    </style>
</head>
<body>
    <div class="header-admin">
        <h2 style="color: #D4AF37; font-family: 'Playfair Display', serif;">Mes Réservations</h2>
        
        <a href="logout.php" class="btn-logout">
            Déconnexion <i class="fa-solid fa-right-from-bracket"></i>
        </a>
    </div>
    
    <table>
        <tr>
            <th>Date</th>
            <th>Nom</th>
            <th>Contact</th>
            <th>Type</th>
            <th>Date souhaitée</th>
            <th>Message</th>
        </tr>
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