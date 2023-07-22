<?php
include("../connection/connection.php");
// Démarrage de la session
session_start();

// Récupération des données du formulaire de connexion
$nom = $_POST['nom_utilisateur'];
$pwd = $_POST['mdp_utilisateur'];

// Sélection de l'utilisateur correspondant aux informations de connexion
$sql = "SELECT * FROM utilisateur WHERE nom_utilisateur='$nom' AND mdp_utilisateur='$pwd'";
$result = mysqli_query($conn, $sql);

// Vérification de l'existence de l'utilisateur dans la base de données
if (mysqli_num_rows($result) > 0) {

    $_SESSION['nom_utilisateur'] = $nom;
    header("Location: ../accueil/accueil.php");
} else {
    // Échec de l'authentification
    echo "Nom d'utilisateur ou mot de passe incorrect";
    header("refresh:3; url=../index.php");
}

mysqli_close($conn);
?>
