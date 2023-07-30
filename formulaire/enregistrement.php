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
                // Vérifier si l'e-mail existe déjà dans la base de données
                $query = "SELECT * FROM utilisateur WHERE email = '$email'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    // L'e-mail existe déjà
                   
                    $message = "L'e-mail '$e-mail' existe déjà. Veuillez utiliser un autre e-mail.";
                 // Retour vers la page de connexion après 3 secondes
                 entête("rafraîchir : 3 ; url=../index.php");
                } autre {
                    // Le nom d'utilisateur n'existe pas et l'e-mail est valide, effectuer l'enregistrement
                    $requete = "INSERT INTO utilisateur (nom_utilisateur, mdp_utilisateur, type_utilisateur, email) VALEURS ('$nom_utilisateur', '$mdp_utilisateur', '$type_utilisateur', '$e-mail')";

                    si (mysqli_query($conn, $requete)) {
                        $message = "L'utilisateur '$nom_utilisateur' a été enregistré avec succès!";
                        // Redirection vers la page d'accueil après 3 secondes
                        entête("rafraîchir : 3 ; url=../accueil/accueil.php");
                    } autre {
                        $message = "Erreur lors de l'enregistrement de l'utilisateur: " . mysqli_error($conn);
                    }
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
<directeur>
    <titre>Enregistrement d'un nouvel utilisateur</titre>
</directeur>
<corps>
    <h1>Enregistrement d'un nouvel utilisateur</h1>
    <?PHP si (isset($message)) { ?>
        <div cours="notification">
            <p><?PHP écho $message; ?></p>
        </div>
    <?PHP } ?>
</corps>
</html>
