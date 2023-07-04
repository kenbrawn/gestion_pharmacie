<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mdp_utilisateur = $_POST['mdp_utilisateur'];
    $confirm_Password = $_POST['confirm_password'];
    $type_utilisateur=$_POST["type_utilisateur"];

     // Vérifier si les mots de passe correspondent
     if ($mdp_utilisateur === $confirm_Password) {
      
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pharmacie";
        
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Vérification de la connexion à la base de données
        if (!$conn) {
            die('Erreur de connexion à la base de données: ' . mysqli_connect_error());
        }
        session_start();
        $_SESSION['nom_utilisateur'] = $_POST['nom_utilisateur'];
        // Échapper les caractères spéciaux pour éviter les injections SQL
        $nom_utilisateur = mysqli_real_escape_string($conn, $nom_utilisateur);
        $mdp_utilisateur = mysqli_real_escape_string($conn, $mdp_utilisateur);

        // Création de la requête SQL
        $requete = "INSERT INTO utilisateur (nom_utilisateur, mdp_utilisateur,type_utilisateur) VALUES ('$nom_utilisateur', '$mdp_utilisateur','$type_utilisateur')";

        // Exécution de la requête SQL
        if (mysqli_query($conn, $requete)) {
            $message = "L'utilisateur '$nom_utilisateur' a été enregistré avec succès!";
        } else {
            $message = "Erreur lors de l'enregistrement de l'utilisateur: " . mysqli_error($conn);
        }

        // Fermeture de la connexion à la base de données
        mysqli_close($conn);
        
        if (isset($message)) {
            // Redirection vers la page de connexion après 2 secondes
            header("refresh:2; url=inscription.php");
        }
    } else {
        // Les mots de passe ne correspondent pas
        $message = "Les mots de passe ne correspondent pas. Veuillez réessayer.";
    }

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enregistrement d'un nouvel utilisateur</title>
</head>
<body>
    <h1>Enregistrement d'un nouvel utilisateur</h1>
    
    <?php if (isset($message)) { ?>
        <p><?php echo $message; ?></p>
    <?php } ?>

</body>
</html>
