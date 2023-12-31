<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Code d'insertion des informations dans la base de données
    $nom_medicament= $_POST['nom_medicament'];
    $designation = $_POST['designation'];
    $type_medicament=$_POST['type_medicament'];
    $nom_fournisseur = $_POST['nom_fournisseur'];
    $prix_medicament = $_POST['prix_medicament'];
    $quantite_stock = $_POST['quantite_stock'];
    $date_ajout = $_POST['date_ajout'];
    $date_peremption = $_POST['date_peremption'];  
    // Connexion à la base de données
    include("../connection/connection.php");

    // Insertion des informations dans la base de données
    $sql = "INSERT INTO medicament(nom_medicament, designation,type_medicament, nom_fournisseur,prix_medicament,quantite_stock,date_ajout,date_peremption)
            VALUES ('$nom_medicament', '$designation','$type_medicament', '$nom_fournisseur','$prix_medicament','$quantite_stock','$date_ajout','$date_peremption')";
   
   // $total_rows = $result->num_rows;  Nombre total d'éléments
    if ($conn->query($sql) === TRUE) {
        echo "Les informations ont été insérées avec succès dans la base de données.";
    } else {
        echo "Erreur lors de l'insertion des informations dans la base de données : " . $conn->error;
    }

    $conn->close();
}

// Connexion à la base de données
include("../connection/connection.php");

$page = isset($_GET['page']) ? $_GET['page'] : 1; 
// Récupère le numéro de page à partir de la requête GET, sinon utilise la page 1 par défaut
$limit = 3; // Nombre d'éléments par page
$offset = ($page - 1) * $limit; // Calcul de l'offset

$sql = "SELECT * FROM medicament ORDER BY nom_medicament LIMIT $limit OFFSET $offset";


$result = $conn->query($sql);

$total_rows = $result->num_rows; // Nombre total d'éléments

if ($result->num_rows > 0) {
    echo "<header>
        <h2>Liste des médicaments</h2>
    </header>";

    // Formulaire de recherche
    echo '<form method="POST" action="recherche.php">
        <input type="text" name="search_medicament" placeholder="Rechercher">
        <button type="submit">Rechercher</button>';
    echo'<div class="form-container hidden" id="commande-form">
        <a href="perimes.php">Medicaments Perimes</a><br><br>
        <a href="effetsrapide.php">Effets rapide</a><br><br>
        <a href="enstock.php">Medicaments en stock</a>
        </form></div>';
    

    // Tableau des médicaments
    echo "<table border=1>";
    echo "<tr><th>Code</th><th>Nom du médicament</th><th>Désignation</th><th>Nom fournisseur</th><th>Type</th><th>Prix du médicament($)</th><th>Quantité des stocks</th><th>Date d'ajout</th><th>Date de péremption</th><th>Supprimer</th><th>Modifier</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row['code']."</td>";
        echo "<td>" . $row['nom_medicament'] . "</td>";
        echo "<td>" . $row['designation'] . "</td>";
        echo "<td>" . $row['nom_fournisseur'] . "</td>";
        echo "<td>" . $row['type_medicament'] . "</td>";
       
        echo "<td>" . $row['prix_medicament'] . "</td>";
        echo "<td>" . $row['quantite_stock'] . "</td>";
        echo "<td>" . $row['date_ajout'] . "</td>";
        echo "<td>" . $row['date_peremption'] . "</td>";
        echo "<td><a href='modifier.php?code=".$row['code']."'>Modifier</a></td>";
        echo "<td><a href='supprimer.php?code=".$row['code']."'>Supprimer</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    echo"<span><p>Allez a la Page</p></span>";
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
