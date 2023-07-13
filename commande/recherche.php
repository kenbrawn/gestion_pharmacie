<?php
// Recherche de médicaments
if (isset($_POST['search_commande'])) {
    $search_term = $_POST['search_commande'];
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacie";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }
    
    // Requête de recherche des médicaments correspondants
    $sql = "SELECT * FROM commande WHERE medicament_cmd LIKE '%$search_term%' OR idclient LIKE '%$search_term%' OR date_commande LIKE '%$search_term%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Résultats de recherche pour \"$search_term\" :</h2>";
        echo "<table border=1>";
        echo "<tr><th>Id</th><th>Date commande</th><th>Id client</th><th>medicament commander</th><th>Quantité commander</th><th>prix vente</th><th>modifier</th><th>supprimer</th></tr>";
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
    <link rel="stylesheet" href="../style/commande.css" class="css">
</head>
<body>
    
</body>
</html>