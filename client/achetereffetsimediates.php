<?php
// Connexion à la base de données
include("../connection/connection.php");
$page = isset($_GET['page']) ? $_GET['page'] : 1; 
// Récupère le numéro de page à partir de la requête GET, sinon utilise la page 1 par défaut
$limit = 4; // Nombre d'éléments par page
$offset = ($page - 1) * $limit; // Calcul de l'offset

// Récupérer tous les clients qui achètent des médicaments à effet immédiat
$sql = "SELECT id_client,nom_client,adresse_client,medicament_acheter,telephone
        FROM client JOIN medicament ON medicament.nom_medicament = client.medicament_acheter       
        WHERE medicament.type_medicament = 'liberation immediate'LIMIT $limit OFFSET $offset";

        
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Liste  clients qui acheter des médicaments à effets rapides et immédiats</h2>";

    // Tableau des clients qui achètent des médicaments à effets rapides ou immédiats
    echo "<table border='1'>";
    echo "<tr><th>Code</th><th>Nom du client</th><th>Adresse</th><th>Médicament acheté</th><th>Téléphone</th><th>Modifier</th><th>Supprimer</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id_client'] . "</td>";
        echo "<td>" . $row['nom_client'] . "</td>";
        echo "<td>" . $row['adresse_client'] . "</td>";
        echo "<td>" . $row['medicament_acheter'] . "</td>";
        echo "<td>" . $row['telephone'] . "</td>";
        echo "<td><a href='modifier.php?id_client=".$row['id_client']."'>Modifier</a></td>";
        echo "<td><a href='supprimer.php?id_client=".$row['id_client']."'>Supprimer</a></td>";
        echo "</tr>";
    }
    echo "</table>";

    // Calcul du nombre total d'éléments et de pages pour la pagination
    $resultat_total = mysqli_query($conn, "SELECT COUNT(*) AS total FROM client JOIN medicament ON medicament.nom_medicament = client.medicament_acheter WHERE medicament.type_medicament = 'liberation immediate'");
    $ligne_total = mysqli_fetch_array($resultat_total);
    $total_elements = $ligne_total['total'];
    $total_pages = ceil($total_elements / $limit); // Nombre total de pages arrondi à l'entier supérieur

    // Pagination
    echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a>&nbsp;';
    }
    echo '</div>';
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
    <link rel="stylesheet" type="text/css" href="../style/client.css">
</head>
<body>

</body>
</html>
