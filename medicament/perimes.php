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

// Vérifier les médicaments périmés

$sql_perimes = "SELECT * FROM medicament WHERE date_peremption <  NOW() ORDER BY date_peremption";
$result_perimes = $conn->query($sql_perimes);

if ($result_perimes->num_rows > 0) {
    echo "<h2>Liste des médicaments périmés</h2>";

    // Tableau des médicaments périmés
    echo "<table border='1'>";
    echo "<tr><th>Code</th><th>Nom du médicament</th><th>Désignation</th><th>Nom fournisseur</th><th>Prix du médicament</th><th>Quantité des stocks</th><th>Date d'ajout</th><th>Date de péremption</th></tr>";
    while ($row_perimes = $result_perimes->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row_perimes['code'] . "</td>";
        echo "<td>" . $row_perimes['nom_medicament'] . "</td>";
        echo "<td>" . $row_perimes['designation'] . "</td>";
        echo "<td>" . $row_perimes['nom_fournisseur'] . "</td>";
        echo "<td>" . $row_perimes['prix_medicament'] . "</td>";
        echo "<td>" . $row_perimes['quantite_stock'] . "</td>";
        echo "<td>" . $row_perimes['date_ajout'] . "</td>";
        echo "<td>" . $row_perimes['date_peremption'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Aucun médicament périmé.";
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