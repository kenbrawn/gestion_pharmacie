<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_fournisseur= $_POST['nom_fournisseur'];
    $type_fournisseur= $_POST['type_fournisseur'];
    $date_creation = $_POST['date_creation'];
    
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacie";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Échec de la connexion à la base de données : " . $conn->connect_error);
}

$sql = "SELECT * FROM fournisseur";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo'<form method="POST" action="recherche.php">
    <input type="text" name="search_fournisseur" placeholder="Rechercher de fournisseur">
    <button type="submit">Rechercher</button>
</form>';
    echo "<table border=1>";
    echo "<tr><th>ID</th><th>Nom  du fournisseur</th><th>type de fournisseur</th><th>Date de creation</th></tr>";
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
    <link rel="stylesheet" href="style.css" class="css">
</head>
<body>
    
</body>
</html>

