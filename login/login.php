<?php
session_start();

// Vérification des identifiants de connexion
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Vérifiez les informations de connexion ici (par ex. à partir d'une base de données)

  if ($username == 'mon_utilisateur' && $password == 'mon_mot_de_passe') {
    // La vérification a réussi, stockez l'identifiant de l'utilisateur dans la session
    $_SESSION['username'] = $username;
    header('Location: /accueil/accueil.php');
    exit();
  } else {
    // La vérification a échoué, affichez un message d'erreur
    $error = 'Identifiant ou mot de passe incorrect';
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <!-- Ajouter les liens vers les fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kRsBQ" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mb-4">Connexion</h2>
                <!-- Créer le formulaire de connexion -->
                <form action="connexion.php" method="POST">
                    <div class="form-group">
                        <label for="username_or_email">Nom d'utilisateur ou email :</label>
                        <input type="text" class="form-control" id="username_or_email" name="username_or_email" required placeholder="Entrez votre adresse e-mail">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe :</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Ajouter les scripts de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kRsBQ" crossorigin="anonymous"></script>

</body>
</html>

