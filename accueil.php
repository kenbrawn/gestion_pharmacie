<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
// le menu du page
  <nav>
  <ul>
    <li><a href="#">Accueil</a></li>
    <li><a href="#">Médicaments</a></li>
    <li><a href="#">Pharmacies</a></li>
    <li><a href="#">Client</a></li>
    <li><a href="#">Achat</a></li>
    <li><a href="#">Fournisseurs</a></li>
    <li><a href="#">vente</a></li>
    <li><a href="#">Stock</a></li>
    <li><a href="#">Parametre</a></li>
    <li><a href="#">Deconexion</a></li>
  </ul>
</nav>

//le bouton rechercher
<form method="get" action="recherche.php">
  <label for="medicament">Médicament :</label>
  <input type="text" id="medicament" name="medicament">
  
  <label for="pharmacie">Pharmacie :</label>
  <input type="text" id="pharmacie" name="pharmacie">
  <input type="submit" value="Rechercher">
</form>

// tableau de bord de cette page
<table>
  <thead>
    <tr>
      <th>Nom du médicament</th>
      <th>Prix</th>
      <th>Quantité en stock</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Aspirine</td>
      <td>5€</td>
      <td>50</td>
    </tr>
    <tr>
      <td>Paracétamol</td>
      <td>4€</td>
      <td>100</td>
    </tr>
  </tbody>
</table>

</body>
</html>