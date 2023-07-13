<?php

// Recherche de clients
if (isset($_POST['search_fournisseur'])) {
    $search_term = $_POST['search_fournisseur'];
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
    $sql = "SELECT * FROM fournisseur WHERE nom_fournisseur LIKE '%$search_term%' OR type_fournisseur LIKE '%$search_term%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Résultats de recherche pour \"$search_term\" :</h2>";
        echo "<table border=1>";
        echo "<tr><th>ID</th><th>Nom du client</th><th>type de fournisseur</th><th>date de creation</th><th>modifier</th><th>supprimer</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_fournisseur'] . "</td>";
            echo "<td>" . $row['nom_fournisseur'] . "</td>";
            echo "<td>" . $row['type_fournisseur'] . "</td>";
            echo "<td>" . $row['date_creation'] . "</td>";
            echo "<td><a href='modifier.php?id_fournisseur=".$row['id_fournisseur']."'>Modifier</a></td>";
            echo "<td><a href='supprimer.php?id_fournisseur=".$row['id_fournisseur']."'>Supprimer</a></td>";
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
    <link rel="stylesheet" href="../style/fournisseur.css" class="css">
</head>
<body>
    
</body>
</html>
