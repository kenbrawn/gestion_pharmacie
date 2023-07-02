<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_client = $_POST['nom_client'];
    $adresse_client = $_POST['adresse_client'];
    $telephone = $_POST['telephone'];
    
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
    $sql = "INSERT INTO client(nom_client, adresse_client, telephone)
            VALUES ('$nom_client', '$adresse_client', '$telephone')";
   
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

$sql = "SELECT * FROM client";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo'<form method="POST" action="recherche.php">
    <input type="text" name="search_client" placeholder="Rechercher de Client">
    <button type="submit">Rechercher</button>
</form>';
    echo "<table border=1>";
    echo "<tr><th>ID</th><th>Nom du client</th><th>Adresse</th><th>Téléphone</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id_client'] . "</td>";
        echo "<td>" . $row['nom_client'] . "</td>";
        echo "<td>" . $row['adresse_client'] . "</td>";
        echo "<td>" . $row['telephone'] . "</td>";
        echo "<td><a href='modifier.php?id_client=".$row['id_client']."'>Modifier</a></td>";
        echo "<td><a href='supprimer.php?id_client=".$row['id_client']."'>Supprimer</a></td>";
        echo "</tr>";
        echo "</tr>";
    }
    echo "</table>";
}
 else {
         echo "Aucun client enregistré dans la base de données.";
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

