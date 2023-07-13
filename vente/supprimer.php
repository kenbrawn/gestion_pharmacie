<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Vérifier si la clé 'id' existe dans $_GET
if (isset($_GET['code_vente'])) {
    $code_vente= $_GET['code_vente'];

    $sql = "DELETE FROM vente WHERE  code_vente= '$code_vente'";

    if ($conn->query($sql) === TRUE) {
        echo "Cette medicament a été supprimé avec succès.";
      }
    else 
         {
             echo "Erreur lors de la suppression du client : " . $conn->error;
         }
  } 
else {
        echo "La clé 'id' n'existe pas dans la requête GET.";
     }

$conn->close();

// Afficher tous les médicaments vendus enregistrés dans la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

$sql = "SELECT * FROM vente";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1>";
    echo "<tr><<th>Id</th><th>Nom du fournisseur</th><th>Atype de fournisseur</th><th>Date de creation</th><th>supprimer</th><th>modifier</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".  $row['code_vente']."</td>";
        echo "<td>" . $row['nom_medicament'] . "</td>";
        echo "<td>" . $row['prix_unitaire'] . "</td>";
        echo "<td>" . $row['quantite_vendu'] . "</td>";
        echo "<td><a href='modifier.php?code_vente=".$row['code_vente']."'>Modifier</a></td>";
        echo "<td><a href='supprimer.php?code_vente=".$row['code_vente']."'>Supprimer</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun médicament enregistré dans la base de données.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="form-container hidden" id="">
        <form method="post" action="">
            <!-- Vos champs de formulaire ici -->
        </form>
    </div>
</body>

</html>
