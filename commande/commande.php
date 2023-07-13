<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $date_commande = $_POST['date_commande'];
    $idclient = $_POST['idclient'];
    $medicament_cmd = $_POST['medicament_cmd'];
    $quantite_cmd = $_POST['quantite_cmd'];
    $prix_vente = $_POST['prix_vente'];
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
    $sql = "INSERT INTO commande(date_commande, idclient,medicament_cmd,quantite_cmd,prix_vente)
            VALUES ('$date_commande', '$idclient', '$medicament_cmd','$quantite_cmd','$prix_vente')";
   
    if ($conn->query($sql) === TRUE) {
        echo "Les informations ont été insérées avec succès dans la base de données.";
    } else {
        echo "Erreur lors de l'insertion des informations dans la base de données : " . $conn->error;
    }

    $conn->close();
}

// Afficher tous les commandes enregistrés dans la base de données
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
$sql = "SELECT *
FROM commande JOIN medicament ON medicament.nom_medicament=commande.medicament_cmd   LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

$total_rows = $result->num_rows; // Nombre total d'éléments
if ($result->num_rows > 0) {
    echo'<form method="POST" action="recherche.php">
    <input type="text" name="search_commande" placeholder="Rechercher de commande">
    <button type="submit">Rechercher</button>
</form>';
    echo "<table border=1>";
    echo "<tr><th>ID</th><th>date de commande</th><th>id client</th><th>medicament commander</th><th>Designation</th><th>Quantite commander</th><th>prix de vente</th><th>modifier</th><th>supprimer</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id_cmd'] . "</td>";
        echo "<td>" . $row['date_commande'] . "</td>";
        echo "<td>" . $row['idclient'] . "</td>";      
        echo "<td>" . $row['medicament_cmd'] . "</td>";
        echo "<td>" . $row['designation'] . "</td>";
        echo "<td>" . $row['quantite_cmd'] . "</td>";
        echo "<td>" . $row['prix_vente'] . "</td>";
        echo "<td><a href='modifier.php?id_cmd=".$row['id_cmd']."'>Modifier</a></td>";
        echo "<td><a href='supprimer.php?id_cmd=".$row['id_cmd']."'>Supprimer</a></td>";
        echo "</tr>";
        echo "</tr>";
    }
    echo "</table>";
    $resultat_total=mysqli_query($conn,"SELECT COUNT(*) AS total FROM commande");
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
         echo "Aucun commande enregistré dans la base de données.";
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
    <link rel="stylesheet" href="../style/commande.css" class="css">
</head>
<body >
    
</body>
</html>

