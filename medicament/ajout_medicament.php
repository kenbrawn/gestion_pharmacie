<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_medicament = $_POST['nom_medicament'];
    $designation = $_POST['designation'];
    $prix_medicament = $_POST['prix_medicament'];
    $quantite_stock = $_POST['quantite_stock'];
    $date_ajout = $_POST['date_ajout'];
    $date_peremption = $_POST['date_peremption'];

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
    $sql = "INSERT INTO medicament(nom_medicament, designation, prix_medicament, quantite_stock, date_ajout, date_peremption)
            VALUES ('$nom_medicament', '$designation', '$prix_medicament', '$quantite_stock', '$date_ajout', '$date_peremption')";
   
    if ($conn->query($sql) === TRUE) {
        echo "Les informations ont été insérées avec succès dans la base de données.";
    } else {
        echo "Erreur lors de l'insertion des informations dans la base de données : " . $conn->error;
    }

    $conn->close();
}

// Afficher tous les médicaments enregistrés dans la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

$page = isset($_GET['page']) ? $_GET['page'] : 1; // Récupère le numéro de page à partir de la requête GET, sinon utilise la page 1 par défaut
$limit = 6; // Nombre d'éléments par page
$offset = ($page - 1) * $limit; // Calcul de l'offset

$sql = "SELECT * FROM medicament LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);
$total_rows = $result->num_rows; // Nombre total d'éléments
$total_pages = ceil($total_rows / $limit); // Nombre total de pages arrondi à l'entier supérieur
        


if ($result->num_rows > 0) {
  

    echo'<form method="POST" action="recherche.php">
    <input type="text" name="search_medicament" placeholder="rechercher ">
    <button type="submit">Search</button>
</form>';
    echo "<table border=1>";
    echo "<tr><th>code</th><th>Nom du médicament</th><th>Désignation</th><th>Prix du médicament</th><th>Quantité des stocks</th><th>Date d'ajout</th><th>Date de péremption</th><th>supprimer</th><th>modifier</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['code']."</td>";
        echo "<td>" . $row['nom_medicament'] . "</td>";
        echo "<td>" . $row['designation'] . "</td>";
        echo "<td>" . $row['prix_medicament'] . "</td>";
        echo "<td>" . $row['quantite_stock'] . "</td>";
        echo "<td>" . $row['date_ajout'] . "</td>";
        echo "<td>" . $row['date_peremption'] . "</td>";
        echo "<td><a href='modifier.php?code=".$row['code']."'>Modifier</a></td>";
        echo "<td><a href='supprimer.php?code=".$row['code']."'>Supprimer</a></td>";
        echo "</tr>";
    }
    echo "</table>";
        
        echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a>';
    }
    echo '</div>';
  
    
   

}

 else {
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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="form-container hidden" id="ajoutmedicament-form">
        <form method="post" action="">
            <!-- Vos champs de formulaire ici -->
        </form>
    </div>
</body>

</html>
