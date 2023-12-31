<?php
// Recherche de médicaments
if (isset($_POST['search_medicament'])) {
    $search_term = $_POST['search_medicament'];
    // Connexion à la base de données
    include("../connection/connection.php");
    // Requête de recherche des médicaments correspondants
    $sql = "SELECT * FROM medicament WHERE nom_medicament LIKE '%$search_term%' OR designation LIKE '%$search_term%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Résultats de recherche pour \"$search_term\" :</h2>";
        echo "<table border=1>";
        echo "<tr><th>code</th><th>Nom du médicament</th><th>Désignation</th><th>Prix du médicament</th><th>Quantité des stocks</th><th>Date d'ajout</th><th>Date de péremption</th><th>supprimer</th><th>modifier</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row['code']."</td>";
            echo "<td>" . $row['nom_medicament'] . "</td>";  
            echo "<td>" . $row['designation'] . "</td>";
            echo "<td>" . $row['prix_medicament'] . "</td>";
            echo "<td>" . $row['quantite_stock'] . "</td>";
            echo "<td>" . $row['date_ajout'] . "</td>";
            echo "<td>" . $row['date_peremption'] . "</td>";
            echo "<td><a href='modifier.php?code=".$row['code']."'>Modifier</a></td>";
            echo "<td><a href='supprimer.php?code=".$row['code']."'>Supprimer</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Aucun résultat trouvé pour \"$search_term\".";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/medicament.css" class="css">
</head>
<body>
    
</body>
</html>
