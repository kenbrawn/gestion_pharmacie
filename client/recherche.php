<?php

// Recherche de clients
if (isset($_POST['search_client'])) {
    $search_term = $_POST['search_client'];
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacie";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }
    
    // Requête de recherche des clients correspondants
    $sql = "SELECT * FROM client WHERE nom_client LIKE '%$search_term%' OR adresse_client LIKE '%$search_term%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Résultats de recherche pour \"$search_term\" :</h2>";
        echo "<table border=1>";
        echo "<tr><th>ID</th><th>Nom du client</th><th>Adresse client</th><th>Téléphone</th><th>modifier</th><th>supprimer</th><tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id_client'] . "</td>";
            echo "<td>" . $row['nom_client'] . "</td>";
            echo "<td>" . $row['adresse_client'] . "</td>";
            echo "<td>" . $row['telephone'] . "</td>";
            echo "<td><a href='modifier.php?id_client=".$row['id_client']."'>Modifier</a></td>";
            echo "<td><a href='supprimer.php?id_client=".$row['id_client']."'>Supprimer</a></td>";
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
    <link rel="stylesheet" href="../style/client.css" class="css">
</head>
<body>
    
</body>
</html>
