<?php
session_start();
$erreur = "";
$mot_de_passe_secret = "photo2026"; // À changer plus tard

if (isset($_POST['submit'])) {
    if ($_POST['password'] === $mot_de_passe_secret) {
        $_SESSION['admin'] = true;
        header("Location: admin.php");
        exit();
    } else {
        $erreur = "Mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Administration</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; }
        .login-box { background: #111; padding: 40px; border-radius: 8px; border: 1px solid #D4AF37; text-align: center; }
        .login-box input { margin: 20px 0; padding: 10px; width: 100%; background: #222; border: 1px solid #444; color: white; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2 style="color: #D4AF37;">Espace Admin</h2>
        <?php if ($erreur) echo "<p style='color:red;'>$erreur</p>"; ?>
        <form method="POST">
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit" name="submit" class="btn-gold">Se connecter</button>
        </form>
    </div>
</body>
</html>