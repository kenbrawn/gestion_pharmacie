<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_client = $_POST['nom_client'];
    $adresse_client = $_POST['adresse_client'];
    $medicament_acheter=$_POST['medicament_acheter'];
    $telephone = $_POST['telephone'];
    
  include("../connection/connection.php");
    // Insertion des informations dans la base de données
    $sql = "INSERT INTO client(nom_client, adresse_client,medicament_acheter, telephone)
            VALUES ('$nom_client', '$adresse_client','$medicament_acheter', '$telephone')";
   
  
    if ($conn->query($sql) === TRUE) {
        echo "Les informations ont été insérées avec succès dans la base de données.";
    } else {
        echo "Erreur lors de l'insertion des informations dans la base de données : " . $conn->error;
    }

    $conn->close();
}
include("../connection/connection.php");
$page = isset($_GET['page']) ? $_GET['page'] : 1; 
// Récupère le numéro de page à partir de la requête GET, sinon utilise la page 1 par défaut
$limit = 3; // Nombre d'éléments par page
$offset = ($page - 1) * $limit; 
$sql = "SELECT * 
FROM client LIMIT $limit OFFSET $offset";

 
$result = $conn->query($sql);

$total_rows = $result->num_rows; // Nombre total d'éléments
if ($result->num_rows > 0) {
    echo'<header>
    <h2> Tous les listes des clients  </h2>
</header>';
    echo'<form method="POST" action="recherche.php">
    <input type="text" name="search_client" placeholder="Rechercher de Client">
    <button type="submit">Rechercher</button> ';
  
    echo'<div><p>Client qui a achetees de Medicaments a </p>
    <a href="achetereffetsimediates.php">Effets rapide</a>
   
    </form></div>';
    echo "<table border=1>"; 
    echo "<tr><th>ID</th><th>Nom du client</th><th>Adresse</th><th>nom medicament</th><th>Téléphone</th><th>Modifier</th><th>Supprimer</th></tr>";
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
        echo "</tr>";
    }
    echo "</table>";
    $resultat_total=mysqli_query($conn,"SELECT COUNT(*) AS total FROM client");
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
         echo "Aucun client enregistré dans la base de données.";
       }

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<directeur>
    <méta jeu de caractères="UTF-8">
    <méta http-equiv="Compatible X-UA" contenu="IE=bord">
    <méta Nom="fenêtre" contenu="width=device-width, initial-scale=1.0">
    <titre>Document</titre>
    <privilège rel="feuille de style" href="../style/client.css" cours="CSS">
</directeur>
<corps>
  <bas de Page>
    <div cours="Bas de page">
        <div cours="démarrage flottant">
            <h3 identifiant="signature">juin-juillet 2023 &Photocopieuse; ANDRIANAINA TSIRY KENNIA</h3>
        </div>
    </div>
</Bas de page>;   
</corps>
</html>

