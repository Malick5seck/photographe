<?php
$host = 'localhost';
$dbname = 'photo_portfolio';
$username = 'root'; // Par défaut sur XAMPP/WAMP
$password = '';     // Par défaut sur XAMPP/WAMP

$email_photographe = "contact@tonsite.com";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $telephone = htmlspecialchars($_POST['telephone']);
        $type_seance = htmlspecialchars($_POST['type_seance']);
        $date_souhaitee = htmlspecialchars($_POST['date_souhaitee']);
        $lieu = htmlspecialchars($_POST['lieu']);
        $message = htmlspecialchars($_POST['message']);

        $sql = "INSERT INTO reservations (nom, email, telephone, type_seance, date_souhaitee, lieu, message) 
                VALUES (:nom, :email, :telephone, :type_seance, :date_souhaitee, :lieu, :message)";
        
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $nom, ':email' => $email, ':telephone' => $telephone,
            ':type_seance' => $type_seance, ':date_souhaitee' => $date_souhaitee,
            ':lieu' => $lieu, ':message' => $message
        ]);

        $sujet = "Nouvelle reservation - $type_seance";
        $contenu = "Nom: $nom\nEmail: $email\nTel: $telephone\nDate: $date_souhaitee\nLieu: $lieu\nMessage: $message";
        $headers = "From: no-reply@tonsite.com\r\nReply-To: $email";
        @mail($email_photographe, $sujet, $contenu, $headers); // @ masque l'erreur mail en local

        echo "<script>alert('Réservation envoyée avec succès !'); window.location.href='index.php';</script>";
        exit;
    }
} catch(PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>