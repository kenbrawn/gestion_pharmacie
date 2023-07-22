<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_fournisseur= $_POST['nom_fournisseur'];
    $type_fournisseur= $_POST['type_fournisseur'];
    $date_creation = $_POST['date_creation'];
    
    // Connexion à la base de données
    include("../connection/connection.php");
    
    // Insertion des informations dans la base de données
    $sql = "INSERT INTO fournisseur(nom_fournisseur, type_fournisseur,date_creation)
            VALUES ('$nom_fournisseur', '$type_fournisseur', '$date_creation')";
   
    if ($conn->query($sql) === TRUE) {
        echo "Les informations ont été insérées avec succès dans la base de données.";
    } else {
        echo "Erreur lors de l'insertion des informations dans la base de données : " . $conn->error;
    }

    $conn->close();
}

// Afficher tous les clients enregistrés dans la base de données
include("../connection/connection.php");
$page = isset($_GET['page']) ? $_GET['page'] : 1; 
// Récupère le numéro de page à partir de la requête GET, sinon utilise la page 1 par défaut
$limit = 3; // Nombre d'éléments par page
$offset = ($page - 1) * $limit; 
$sql = "SELECT *
FROM fournisseur
LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);
$total_rows = $result->num_rows; // Nombre total d'éléments
if ($result->num_rows > 0) {
    echo'<form method="POST" action="recherche.php">
    <input type="text" name="search_fournisseur" placeholder="Rechercher de fournisseur">
    <button type="submit">Rechercher</button>
</form>';
    echo "<table border=1>";
    echo "<tr><th>ID</th><th>Nom  du fournisseur</th><th>type de fournisseur</th><th>Date de creation</th><th>modifier</th><th>Supprimer</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id_fournisseur'] . "</td>";
        echo "<td>" . $row['nom_fournisseur'] . "</td>";
        echo "<td>" . $row['type_fournisseur'] . "</td>";
        echo "<td>" . $row['date_creation'] . "</td>";
        echo "<td><a href='modifier.php?id_fournisseur=".$row['id_fournisseur']."'>Modifier</a></td>";
        echo "<td><a href='supprimer.php?id_fournisseur=".$row['id_fournisseur']."'>Supprimer</a></td>";
        echo "</tr>";
        echo "</tr>";
    }
    echo "</table>";
    $resultat_total=mysqli_query($conn,"SELECT COUNT(*) AS total FROM fournisseur");
  $ligne_total=mysqli_fetch_array($resultat_total);
  $total_elements=$ligne_total['total'];
  $total_pages = ceil($total_elements / $limit); // Nombre total de pages arrondi à l'entier supérieur    
    // Pagination
    echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a>&nbsp;';
    }
    echo '</div>';
    
}
 else {
         echo "Aucun fournisseur enregistré dans la base de données.";
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
    <link rel="stylesheet" href="../style/fournisseur.css" >
</head>
<body>
    
</body>
</html>

