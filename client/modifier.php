<?php
include("../connection/connection.php");

if (isset($_GET['id_client'])) {
    $id_client = $_GET['id_client'];

    // Vérifier si le formulaire de modification a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nom_client = $_POST['nom_client'];
        $adresse_client = $_POST['adresse_client'];
        $medicament_acheter = $_POST['medicament_acheter'];
        $telephone = $_POST['telephone'];
   

       $sql = "UPDATE client SET nom_client = '$nom_client', adresse_client = '$adresse_client',medicament_acheter = '$medicament_acheter', telephone = '$telephone' WHERE id_client = '$id_client'";

        if ($conn->query($sql) === TRUE) {
            echo "Les informations du client ont été mises à jour avec succès.";
            header("location:client.php");
        } else {
            echo "Erreur lors de la mise à jour des informations du client : " . $conn->error;
        }
    }
    $conn->close();
    include("../connection/connection.php");

    // Récupérer les informations du médicament à modifier
    $sql = "SELECT * FROM client WHERE id_client = '$id_client'";
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
            <link rel="stylesheet" type="text/css" href="../style/client.css">
            
            
        </head>

        <body>
            <div class="form-container">
               
                <form method="post" action="modifier.php?id_client=<?php echo $id_client; ?>">
                    <label for="nom_client">Nom du client:</label>
                    <input type="text" name="nom_client" value="<?php echo $row['nom_client']; ?>" required><br>
                    <label for="adresse_client">Adresse client:</label>
                    <input type="text" name="adresse_client" value="<?php echo $row['adresse_client']; ?>" required><br>
                    <label for="medicament_acheter">medicament acheter:</label>
                    <input type="text" name="medicament_acheter" value="<?php echo $row['medicament_acheter']; ?>"><br>
                    
                    <label for="telephone">Telephone:</label>
                    <input type="number" step="0.01" name="telephone" value="<?php echo $row['telephone']; ?>" required><br>
                    <input type="submit" value="Modifier">
                </form>
            </div>
        </body>

        </html>

    <?php
    } else {
        echo "Aucun client trouvé avec l'id: " . $id_client;
    }
} else {
    echo "La clé 'id' n'existe pas dans la requête GET.";
}

$conn->close();
?>
