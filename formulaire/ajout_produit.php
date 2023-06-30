<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST["nom_medicament"];
    $designation = $_POST["designation"];
    $prix_medicament = $_POST["prix_medicament"];
    $quantite_stock = $_POST["quantite_stock"];
    $date_ajout = $_POST["date_ajout"];
    $date_peremption = $_POST["date_peremption"];

    $sql = "INSERT INTO medicament (nom_medicament, designation, prix_medicament, quantite_stock, date_ajout, date_peremption) VALUES ('$nom', '$designation', '$prix_medicament', '$quantite_stock', '$date_ajout', '$date_peremption')";

    // Connexion à votre base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "pharmacie";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    if ($conn->query($sql) === TRUE) {
        echo "Produit ajouté avec succès.";
    } else {
        echo "Erreur lors de l'ajout du produit : " . $conn->error;
    }

    $conn->close();
}
?>



