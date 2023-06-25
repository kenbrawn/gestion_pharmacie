<?php

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Récupérer les valeurs des champs
    $username_or_email = $_POST["username_or_email"];
    $password = $_POST["password"];

    // Vérifier les informations de connexion
    if ($username_or_email == "mon_nom_d_utilisateur" || $username_or_email == "mon_email@example.com" && $password == "mon_mot_de_passe") {
        // Rediriger l'utilisateur vers une page de succès
        header("Location: test.php");
        exit();
    } else {
        // Rediriger l'utilisateur vers une page d'erreur
        header("Location: connexion_echouee.php");
        exit();
    }

}

?>
