
<?php
// Connexion à la base de données
include("../connection/connection.php");
$page = isset($_GET['page']) ? $_GET['page'] : 1; 
// Récupère le numéro de page à partir de la requête GET, sinon utilise la page 1 par défaut
$limit = 4; // Nombre d'éléments par page
$offset = ($page - 1) * $limit; // Calcul de l'offset


// Vérifier les médicaments périmés

$sql_perimes = "SELECT * FROM medicament WHERE date_peremption <  NOW() ORDER BY date_peremption LIMIT $limit OFFSET $offset";
$result_perimes = $conn->query($sql_perimes);

if ($result_perimes->num_rows > 0) {
    echo "<h2>Liste des médicaments périmés</h2>";

    // Tableau des médicaments périmés
    echo "<table border='1'>";
    echo "<tr><th>Code</th><th>Nom du médicament</th><th>Désignation</th><th>Nom fournisseur</th><th>Prix du médicament</th><th>Quantité des stocks</th><th>Date d'ajout</th><th>Date de péremption</th><th>modifier</th><th>supprimer</th></tr>";
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
        echo "<td><a href='modifier.php?code=".$row_perimes['code']."'>Modifier</a></td>";
        echo "<td><a href='supprimer.php?code=".$row_perimes['code']."'>Supprimer</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    $resultat_total=mysqli_query($conn,"SELECT COUNT(*) AS total FROM medicament WHERE date_peremption <  NOW() ");
    $ligne_total=mysqli_fetch_array($resultat_total);
    $total_elements=$ligne_total['total'];
    $total_pages = ceil($total_elements / $limit); // Nombre total de pages arrondi à l'entier supérieur    
      // Pagination
      echo '<div class="pagination">';
      for ($i = 1; $i <= $total_pages; $i++) {
          echo '<a href="?page=' . $i . '">' . $i . '</a>&nbsp;';
      }
      echo '</div>';
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
