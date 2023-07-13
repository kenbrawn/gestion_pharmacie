<?php

// Recherche de clients
if (isset($_POST['search_vente'])) {
    $search_term = $_POST['search_vente'];
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacie";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }
    
    // Requête de recherche des fournisseurs correspondants
    $sql = "SELECT * FROM vente WHERE nom_medicament LIKE '%$search_term%' OR prix_unitaire LIKE '%$search_term%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Résultats de recherche pour \"$search_term\" :</h2>";
        echo "<table border=1>";
        echo "<tr><th>code</th><th>Nom du medicament</th><th>Prix unitaire</th><th>Quantite vendu</th><th>modifier</th><th>supprimer</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['code_vente'] . "</td>";
            echo "<td>" . $row['nom_medicament'] . "</td>";
            echo "<td>" . $row['prix_unitaire'] . "</td>";
            echo "<td>" . $row['quantite_vendu'] . "</td>";
            echo "<td><a href='modifier.php?code_vente=".$row['code_vente']."'>Modifier</a></td>";
            echo "<td><a href='supprimer.php?code_vente=".$row['code_vente']."'>Supprimer</a></td>";
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
    <link rel="stylesheet" href="../style/vente.css" class="css">
</head>
<body>
    
</body>
</html>
