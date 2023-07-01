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
$username = $_POST['username'];
$password = $_POST['password'];

// Sélection de l'utilisateur correspondant aux informations de connexion
$sql = "SELECT * FROM utilisateur WHERE nom_utilisateur='$username' AND mdp_utilisateur='$password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 1) {
    echo "connexion avec sucess";
}
else{
    echo"erreur de connexion";
}