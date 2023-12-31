<?php
include("../connection/connection.php");

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Vérifier si le formulaire de modification a été soumis
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nom_medicament = $_POST['nom_medicament'];
        $designation = $_POST['designation'];
        $prix_medicament = $_POST['prix_medicament'];
        $nom_fournisseur = $_POST['nom_fournisseur '];
        $quantite_stock = $_POST['quantite_stock'];
        $date_ajout = $_POST['date_ajout'];
        $date_peremption = $_POST['date_peremption'];

       $sql = "UPDATE medicament SET nom_medicament = '$nom_medicament', designation = '$designation', prix_medicament = '$prix_medicament', quantite_stock = '$quantite_stock', date_ajout = '$date_ajout', date_peremption = '$date_peremption' WHERE code = '$code'";

        if ($conn->query($sql) === TRUE) {
            echo "Les informations du médicament ont été mises à jour avec succès.";
            header("location:ajout_medicament.php");
        } else {
            echo "Erreur lors de la mise à jour des informations du médicament : " . $conn->error;
        }
    }
    $conn->close();
    include("../connection/connection.php");
    // Récupérer les informations du médicament à modifier
    $sql = "SELECT * FROM medicament WHERE code = '$code'";
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
            <title>Modifier le médicament</title>
            <link rel="stylesheet" type="text/css" href="../style/medicament.css">
            
        </head>

        <body>
            <div class="form-container">
                <form method="post" action="modifier.php?code=<?php echo $code; ?>">
                    <label for="nom_medicament">Nom du médicament:</label>
                    <input type="text" name="nom_medicament" value="<?php echo $row['nom_medicament']; ?>" required><br>

                    <label for="designation">Désignation:</label>
                    <input type="text" name="designation" value="<?php echo $row['designation']; ?>" required><br>

                    <label for="prix_medicament">Prix du médicament:</label>
                    <input type="number" step="0.01" name="prix_medicament" value="<?php echo $row['prix_medicament']; ?>" required><br>

                    <label for="nom_fournisseur">Nom fournisseur:</label>
                    <input type="text" name="nom_fournisseur" value="<?php echo $row['nom_fournisseur']; ?>" ><br>

                    <label for="quantite_stock">Quantité des stocks:</label>
                    <input type="number" name="quantite_stock" value="<?php echo $row['quantite_stock']; ?>" required><br>

                    <label for="date_ajout">Date d'ajout:</label>
                    <input type="date" name="date_ajout" value="<?php echo $row['date_ajout']; ?>" required><br>

                    <label for="date_peremption">Date de péremption:</label>
                    <input type="date" name="date_peremption" value="<?php echo $row['date_peremption']; ?>" ><br>

                    <input type="submit" value="Modifier">
                </form>
            </div>
        </body>

        </html>

    <?php
    } else {
        echo "Aucun médicament trouvé avec le code : " . $code;
    }
} else {
    echo "La clé 'code' n'existe pas dans la requête GET.";
}

$conn->close();
?>
