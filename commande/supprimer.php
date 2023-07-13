<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Vérifier si la clé 'code' existe dans $_GET
if (isset($_GET['id_cmd'])) {
    $id_cmd = $_GET['id_cmd'];

    $sql = "DELETE FROM commande WHERE id_cmd = '$id_cmd'";

    if ($conn->query($sql) === TRUE) {
        echo "Le médicament a été supprimé avec succès.";
    } else {
        echo "Erreur lors de la suppression du médicament : " . $conn->error;
    }
} else {
    echo "La clé 'code' n'existe pas dans la requête GET.";
}

$conn->close();

// Afficher tous les  commandes médicaments enregistrés dans la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

$sql = "SELECT * FROM commande";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border=1>";
    echo "<tr><th>ID</th><th>Date commande</th><th>Id client</th><th>médicament commander</th><th>Quantité des commande</th><th>Prix de vente</th><th>Modifier</th><th>supprimer</th><th>modifier</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['id_cmd']."</td>";
        echo "<td>" . $row['date_commande'] . "</td>";
        echo "<td>" . $row['idclient'] . "</td>";
        echo "<td>" . $row['medicament_cmd'] . "</td>";
        echo "<td>" . $row['quantite_cmd'] . "</td>";
        echo "<td>" . $row['prix_vente'] . "</td>";
        echo "<td><a href='modifier.php?id_cmd=".$row['id_cmd']."'>Modifier</a></td>";
        echo "<td><a href='supprimer.php?id_cmd=".$row['id_cmd']."'>Supprimer</a></td>";
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
    <link rel="stylesheet" type="text/css" href="../style/commande.css">
</head>

<body>
    <div class="form-container hidden" id="ajoutmedicament-form">
        <form method="post" action="">
            <!-- Vos champs de formulaire ici -->
        </form>
    </div>
</body>

</html>
