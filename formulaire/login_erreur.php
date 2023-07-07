<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacie";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérification de la connexion
if (!$conn) {
    die("Connexion échouée: " . mysqli_connect_error());
}

session_start();
$_SESSION['nom_utilisateur'] = $_POST['nom_utilisateur'];

// Récupération des données du formulaire de connexion
$nom = $_POST['nom_utilisateur'];
$pwd = $_POST['mdp_utilisateur'];

if (isset($_REQUEST['login'])) {
    $captcha = $_POST['captcha'];
    $code = $_POST['code'];
    if ($code != $captcha) {
        echo "<script type='text/javascript'>alert('Votre captcha n'est pas correct');</script>";
    } else {
        // Sélection de l'utilisateur correspondant aux informations de connexion
        $sql = "SELECT * FROM utilisateur WHERE nom_utilisateur='$nom' AND mdp_utilisateur='" . hash('sha256', $pwd) . "'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // L'utilisateur est authentifié avec succès
           // echo "<script>alert('Connexion réussie');</script>";
            header("refresh:2; url=../accueil/accueil.php");
        } else {
            echo "<script>alert('Mot de passe ou nom d'utilisateur invalide');</script>";
        }
    }
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>
