<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_medicament= $_POST['nom_medicament'];
    $prix_unitaire= $_POST['prix_unitaire'];
    $quantite_vendu = $_POST['quantite_vendu'];
    
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacie";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Échec de la connexion à la base de données : " . $conn->connect_error);
    }
    
    // Insertion des informations dans la base de données
    $sql = "INSERT INTO vente(nom_medicament, prix_unitaire,quantite_vendu)
            VALUES ('$nom_medicament', '$prix_unitaire', '$quantite_vendu')";
   
    if ($conn->query($sql) === TRUE) {
        echo "Les informations ont été insérées avec succès dans la base de données.";
    } else {
        echo "Erreur lors de l'insertion des informations dans la base de données : " . $conn->error;
    }

    $conn->close();
}

// Afficher tous les medicaments vendu enregistrés dans la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}
$page = isset($_GET['page']) ? $_GET['page'] : 1; 
// Récupère le numéro de page à partir de la requête GET, sinon utilise la page 1 par défaut
$limit = 2; // Nombre d'éléments par page
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM vente LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

$total_rows = $result->num_rows; // Nombre total d'éléments
if ($result->num_rows > 0) {
    echo'<form method="POST" action="recherche.php">
    <input type="text" name="search_vente" placeholder="Rechercher de medicament">
    <button type="submit">Rechercher</button>
</form>';
    echo "<table border=1>";
    echo "<tr><th>code</th><th>Nom medicament</th><th>prix unitaire</th><th>Quantite vendu</th><th>modifier</th><th>supprimer</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['code_vente'] . "</td>";
        echo "<td>" . $row['nom_medicament'] . "</td>";
        echo "<td>" . $row['prix_unitaire'] . "</td>";
        echo "<td>" . $row['quantite_vendu'] . "</td>";
        echo "<td><a href='modifier.php?code_vente=".$row['code_vente']."'>Modifier</a></td>";
        echo "<td><a href='supprimer.php?code_vente=".$row['code_vente']."'>Supprimer</a></td>";
        echo "</tr>";
        echo "</tr>";
    }
    echo "</table>";
    $resultat_total=mysqli_query($conn,"SELECT COUNT(*) AS total FROM vente");
  $ligne_total=mysqli_fetch_array($resultat_total);
  $total_elements=$ligne_total['total'];
  $total_pages = ceil($total_elements / $limit); // Nombre total de pages arrondi à l'entier supérieur    
    // Pagination
    echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<a href="?page=' . $i . '" class="numero-page">' . $i . '</a>&nbsp;';
    }
    echo '</div>';
}
 else {
         echo "Aucun medicament a enregistré dans la base de données.";
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
    <link rel="stylesheet" href="../style/vente.css" class="css">
</head>
<body>
    
</body>
</html>

