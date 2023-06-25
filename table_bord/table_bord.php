<?php
// Connexion à la base de données
$connexion = mysqli_connect('localhost', 'utilisateur', 'motdepasse', 'ma_base_de_donnees');

// Requête pour sélectionner tous les médicaments
$resultat = mysqli_query($connexion, "SELECT * FROM medicaments");

// Génération du tableau HTML
echo '<table>';
echo '<thead><tr><th>Nom du médicament</th><th>Prix</th><th>Quantité en stock</th></tr></thead>';
echo '<tbody>';
while ($ligne = mysqli_fetch_assoc($resultat)) {
  echo '<tr><td>' . $ligne['nom'] . '</td><td>' . $ligne['prix'] . '€</td><td>' . $ligne['stock'] . '</td></tr>';
}
echo '</tbody>';
echo '</table>';

// Fermeture de la connexion à la base de données
mysqli_close($connexion);
?>
