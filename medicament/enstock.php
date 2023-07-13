<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

// Récupérer tous les médicaments en stock
$sql = "SELECT * FROM medicament ORDER BY nom_medicament";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Liste des médicaments en stock</h2>";

    // Tableau des médicaments
    echo "<table border='1'>";
    echo "<tr><th>Code</th><th>Nom du médicament</th><th>Désignation</th><th>Nom fournisseur</th><th>Prix du médicament</th><th>Quantité des stocks</th><th>Date d'ajout</th><th>Date de péremption</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['code'] . "</td>";
        echo "<td>" . $row['nom_medicament'] . "</td>";
        echo "<td>" . $row['designation'] . "</td>";
        echo "<td>" . $row['nom_fournisseur'] . "</td>";
        echo "<td>" . $row['prix_medicament'] . "</td>";
        echo "<td>" . $row['quantite_stock'] . "</td>";
        echo "<td>" . $row['date_ajout'] . "</td>";
        echo "<td>" . $row['date_peremption'] . "</td>";
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
    <link rel="stylesheet" type="text/css" href="../style/medicament.css">
</head>
<body>

</body>
</html>