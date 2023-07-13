<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Code d'insertion des informations dans la base de données
}

// Connexion à la base de données
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
$limit = 3; // Nombre d'éléments par page
$offset = ($page - 1) * $limit; // Calcul de l'offset

$sql = "SELECT * FROM medicament
        LIMIT $limit OFFSET $offset";

$result = $conn->query($sql);

$total_rows = $result->num_rows; // Nombre total d'éléments

if ($result->num_rows > 0) {
    echo "<header>
        <h2>Liste des médicaments</h2>
    </header>";

    // Formulaire de recherche
    echo '<form method="POST" action="recherche.php">
        <input type="text" name="search_medicament" placeholder="Rechercher">
        <button type="submit">Rechercher</button>
    </form>';

    // Tableau des médicaments
    echo "<table border=1>";
    echo "<tr><th>Code</th><th>Nom du médicament</th><th>Désignation</th><th>Nom fournisseur</th><th>Prix du médicament</th><th>Quantité des stocks</th><th>Date d'ajout</th><th>Date de péremption</th><th>Supprimer</th><th>Modifier</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['code']."</td>";
        echo "<td>" . $row['nom_medicament'] . "</td>";
        echo "<td>" . $row['designation'] . "</td>";
        echo "<td>" . $row['nom_fournisseur'] . "</td>";
        echo "<td>" . $row['prix_medicament'] . "</td>";
        echo "<td>" . $row['quantite_stock'] . "</td>";
        echo "<td>" . $row['date_ajout'] . "</td>";
        echo "<td>" . $row['date_peremption'] . "</td>";
        echo "<td><a href='modifier.php?code=".$row['code']."'>Modifier</a></td>";
        echo "<td><a href='supprimer.php?code=".$row['code']."'>Supprimer</a></td>";
        echo "</tr>";
    }
    echo "</table>";
  $resultat_total=mysqli_query($conn,"SELECT COUNT(*) AS total FROM medicament");
  $ligne_total=mysqli_fetch_array($resultat_total);
  $total_elements=$ligne_total['total'];
  $total_pages = ceil($total_elements / $limit); // Nombre total de pages arrondi à l'entier supérieur    
    // Pagination
    echo '<div class="pagination">';
    for ($i = 1; $i <= $total_pages; $i++) {
        echo '<a href="?page=' . $i . '">' . $i . '</a>&nbsp;';
    }
    echo '</div>';
    
    // Pied de page
    echo '<footer>
        <div class="">
            <div class="float-start">
                <h3 id="signature">Juin-Juillet 2023 &copy; ANDRIANAINA TSIRY KENNIA</h3>
            </div>
        </div>
    </footer>';
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
    <link rel="stylesheet" type="text/css" href="../style/medicament.css">
</head>
<body>

</body>
</html>
