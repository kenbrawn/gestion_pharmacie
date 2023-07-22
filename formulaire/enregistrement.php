<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs du formulaire
    $nom_utilisateur = $_POST['nom_utilisateur'];
    $mdp_utilisateur = $_POST['mdp_utilisateur'];
    $confirm_Password = $_POST['confirm_password'];
    $type_utilisateur = $_POST["type_utilisateur"];
    $email = $_POST['email'];

    // Vérifier si les mots de passe correspondent
    if ($mdp_utilisateur === $confirm_Password) {

   include("../connection/connection.php");
        session_start();
        $_SESSION['nom_utilisateur'] = $_POST['nom_utilisateur'];

        // Échapper les caractères spéciaux pour éviter les injections SQL
        $nom_utilisateur = mysqli_real_escape_string($conn, $nom_utilisateur);
        $mdp_utilisateur = mysqli_real_escape_string($conn, $mdp_utilisateur);
        $email = mysqli_real_escape_string($conn, $email);

        

        // Vérifier si le nom d'utilisateur existe déjà dans la base de données
        $query = "SELECT * FROM utilisateur WHERE nom_utilisateur = '$nom_utilisateur'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            // Le nom d'utilisateur existe déjà
            $message = "Le nom d'utilisateur '$nom_utilisateur' existe déjà. Veuillez choisir un autre nom d'utilisateur.";
            header("refresh:3; url=../index.php");
        } else {
            // Vérifier si l'e-mail est valide
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $message = "L'e-mail '$email' n'est pas valide. Veuillez entrer une adresse e-mail valide.";
            } else {
                // Le nom d'utilisateur n'existe pas et l'e-mail est valide, effectuer l'enregistrement
                $requete = "INSERT INTO utilisateur (nom_utilisateur, mdp_utilisateur, type_utilisateur, email) VALUES ('$nom_utilisateur', '$mdp_utilisateur', '$type_utilisateur', '$email')";

                if (mysqli_query($conn, $requete)) {
                    $message = "L'utilisateur '$nom_utilisateur' a été enregistré avec succès!";
                    // Redirection vers la page d'accueil après 3 secondes
                    header("refresh:3; url=../accueil/accueil.php");
                } else {
                    $message = "Erreur lors de l'enregistrement de l'utilisateur: " . mysqli_error($conn);
                }
            }
        }

        // Fermeture de la connexion à la base de données
        mysqli_close($conn);
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
        <div class="notification">
            <p><?php echo $message; ?></p>
        </div>
    <?php } ?>
</body>
</html>
