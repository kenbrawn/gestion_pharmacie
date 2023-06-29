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
//session_start();

// Récupération des données du formulaire de connexion
$username = $_POST['username'];
$password = $_POST['password'];

// Sélection de l'utilisateur correspondant aux informations de connexion
$sql = "SELECT * FROM utilisateur WHERE nom_utilisateur='$username' AND mdp_utilisateur='$password'";
$result = mysqli_query($conn, $sql);

// Vérification de l'existence de l'utilisateur dans la base de données
if (mysqli_num_rows($result) > 0) {
    // L'utilisateur est authentifié avec succès
  
 // $_SESSION['username'] = $username; // Sauvegarde du nom d'utilisateur dans la session
   header("Location : ../accueil/accueil.php");
  
} else {
    // Échec de l'authentification
    echo "Nom d'utilisateur ou mot de passe incorrect";
     header("Location :inscription.php");
}

mysqli_close($conn);
?>
