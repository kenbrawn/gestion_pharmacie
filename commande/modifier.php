<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

if (isset($_GET['id_cmd'])) {
    $id_cmd = $_GET['id_cmd'];

    // Vérifier si le formulaire de modification a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $date_commande = $_POST['date_commande'];
        $idclient = $_POST['idclient'];
        $medicament_cmd = $_POST['medicament_cmd'];
        $designation=$_POST['designation'];
        $quantite_cmd= $_POST['quantite_cmd'];
        $prix_vente= $_POST['prix_vente'];

  

       $sql = "UPDATE commande SET date_commande= '$date_commande', idclient = '$idclient', medicament_cmd = '$medicament_cmd',quantite_cmd='$quantite_cmd',prix_vente='$prix_vente' WHERE prix_vente = '$prix_vente'";

        if ($conn->query($sql) === TRUE) {
            echo "Les informations du client ont été mises à jour avec succès.";
            header("location:commande.php");
        } else {
            echo "Erreur lors de la mise à jour des informations du client : " . $conn->error;
        }
    }
    $conn->close();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacie";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Récupérer les informations du  commande médicament à modifier
    $sql = "SELECT * FROM commande  WHERE id_cmd = '$id_cmd' ORDER BY date_commande";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Modifier le client</title>
            <link rel="stylesheet" type="text/css" href="../style/commande.css">
         
        </head>

        <body>
            <div class="form-container">
                <div class="image-container">
                    
                </div>
                <form method="post" action="modifier.php?id_cmd=<?php echo $id_cmd; ?>">
                    <label for="date_commande">Date de commande:</label>
                    <input type="date" name="date_commande" value="<?php echo $row['date_commande']; ?>" required><br>
                    <label for="idclient">id client:</label>
                    <input type="int" name="idclient" value="<?php echo $row['idclient']; ?>" required><br>
                    <label for="medicament_cmd">Medicament commander:</label>
                    <input type="text" step="0.01" name="medicament_cmd" value="<?php echo $row['medicament_cmd']; ?>" required><br>
                    <label for="quantite_cmd">Quantite commander:</label>
                    <input type="int" step="0.01" name="quantite_cmd" value="<?php echo $row['quantite_cmd']; ?>" required><br>
                    <label for="prix_vente">Prix Medicament:</label>
                    <input type="int" step="0.01" name="prix_vente" value="<?php echo $row['prix_vente']; ?>" required><br>
                    <input type="submit" value="Modifier">
                </form>
            </div>
        </body>
        </html>

    <?php
    } else {
        echo "Aucun commande trouvé avec l'id: " ;
    }
} else {
    echo "La clé 'id_cmd' n'existe pas dans la requête GET.";
}

$conn->close();
?>
