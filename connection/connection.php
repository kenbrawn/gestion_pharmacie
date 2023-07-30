 <?PHP  
    // Connexion à la base de données
$nom du serveur = "hôte local";
$Nom d'utilisateur = "racine";
$Mot de passe = "";
$dbname = "pharmacie";
$conn = new mysqli($servername, $username, $password, $dbname);
si ($conn-&gt;connect_error) {
    die("Échec de la connexion à la base de données : " . $conn-&gt;connect_error);
}

?>
