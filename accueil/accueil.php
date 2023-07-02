<!DOCTYPE html>
<html>
<head>
	<title>mon page d'accueil </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<nav>
		<ul>
		<!--<li><a href="#" onclick="showVenteForm()">produits</a></li>-->
			<li><a href="#" onclick="showAjoutclientForm()">Client</a></li>
			<li><a href="#" onclick="showAjoutmedicamentForm()">Medicaments</a></li>
			<li><a href="#" onclick="showAjoutfournisseurForm()">Ajout fournisseur</a></li>
      		<li><a href="#" onclick="showVenteForm()">Vente</a></li>
			<li><a href="#" onclick="logout()">Deconnexion</a></li>
		</ul>
	</nav>

	<div class="form-container hidden" id="ajoutclient-form">
		<form action="../client/client.php" method="post">
			<h2>Client</h2>
			<label for="nom_client">Nom du client:</label>
			<input type="text" id="nom_client" name="nom_client" required>
            <label for="adresse_client">adresse:</label>
			<input type="text" id="adresse_client" name="adresse_client" required>
            <label for="telephone">telephone:</label>
			<input type="number" id="telephone" name="telephone" required><br><br>
			
			<input type="submit" value="enregistrer"><br><br>
			<a href="../client/client.php" class="voir_liste" style="color:green;font-size: 15px;background-color:red;margin-bottom:10px">Voir liste</a>
		</form>
        <div class="description">
        <!-- Description de votre site web ici -->
         Bienvenu a notre page gestion de pharmacie
        </div>

	</div>

	<div class="form-container hidden" id="ajoutmedicament-form">
		<form method="post" action ="../affichage/ajout_medicament.php">
			<h2>Ajout Medicaments</h2>
            <label for="nom_medicament">Nom de medicament:</label>
			<input type="text" id="nom_medicament" name="nom_medicament" required>
			<label for="designation">Designation:</label>
			<input type="text" id="designation" name="designation" required>
            <label for="prix_medicament">Prix du medicament :</label>
			<input type="int" id="prix_medicament" name="prix_medicament" required>
			<label for="quantite_stock">Quantite des stocks :</label>
			<input type="int" id="quantite_stock" name="quantite_stock" required>
			<label for="date_ajout">Date d'ajout :</label>
			<input type="date" id="date_ajout" name="date_ajout" required>
			<label for="date_peremption">Date de peremption :</label>
			<input type="date" id="date_peremption" name="date_peremption" required>
			<input type="submit" value="Register">
			<a href="../medicament/ajout_medicament.php" style="color:green;font-size: 15px;background-color:red;margin-bottom:10px">Voir liste</a>
		</form>
	</div>
  <div class="form-container hidden" id="ajoutfournisseur-form">
		<form method="post" action="../fournisseurs/fournisseur.php">
			<h2>Ajout Fournisseur</h2>
			<label for="nom_fournisseur">Nom du fournisseur:</label>
			<input type="text" id="nom_fournisseur" name="nom_fournisseur" required>
      		<label for="type_fournisseur">Type de fournisseur:</label>
			<input type="text" id="type_fournisseur" name="type_fournisseur" required>
    		<label for="date_creation">Date de creation :</label>
      		<input type="date" id="date_creation" name="date_creation" required><br><br>
  
			<input type="submit" value="enregistrer"><br><br>
			<a href="../fournisseurs/fournisseur.php"  style="color:green;font-size: 15px;background-color:red;margin-bottom:10px">Voir liste</a>
		</form>
	</div>
  <div class="form-container hidden" id="vente-form">
		<form method="post" action="../vente/vente.php">
			<h2>Vente</h2>
			<label for="new-username">Nom de  medicament:</label>
			<input type="text" id="nom_medicament" name="nom_medicament" required>
            <label for="prix_unitaire">Prix  unitaire:</label>
			<input type="int" name="prix_unitaire"><br>
			<label for="quantite_vendu">Quantite vendu:</label>
			<input type="int" name="quantite_vendu"><br><br>
			<input type="submit" value="Register"><br><br>
			<a href="../vente/vente.php" style="color:green;font-size: 15px;background-color:red;margin-bottom:10px">Voir liste</a>
		</form>
	</div>

	<script>
       document.getElementById("ajoutclient-form").classList.remove("hidden");
		  function showAjoutclientForm() {
			var ajoutclientForm = document.getElementById("ajoutclient-form");
			var ajoutmedicamentForm = document.getElementById("ajoutmedicament-form");
            var ajoutfournisseurForm = document.getElementById("ajoutfournisseur-form");
            var venteForm = document.getElementById("vente-form");
			ajoutclientForm.classList.remove("hidden"); 
			ajoutmedicamentForm.classList.add("hidden");
            ajoutfournisseurForm.classList.add("hidden");
            venteForm.classList.add("hidden");
		}

		function showAjoutmedicamentForm() {

            var ajoutclientForm = document.getElementById("ajoutclient-form");
			var ajoutmedicamentForm = document.getElementById("ajoutmedicament-form");
            var ajoutfournisseurForm = document.getElementById("ajoutfournisseur-form");
            var venteForm = document.getElementById("vente-form");
			ajoutclientForm.classList.add("hidden"); 
			ajoutmedicamentForm.classList.remove("hidden");
            ajoutfournisseurForm.classList.add("hidden");
            venteForm.classList.add("hidden");

		}
    function showAjoutfournisseurForm() {

var ajoutclientForm = document.getElementById("ajoutclient-form");
var ajoutmedicamentForm = document.getElementById("ajoutmedicament-form");
var ajoutfournisseurForm = document.getElementById("ajoutfournisseur-form");
var venteForm = document.getElementById("vente-form");
ajoutclientForm.classList.add("hidden"); 
ajoutmedicamentForm.classList.add("hidden");
ajoutfournisseurForm.classList.remove("hidden");
venteForm.classList.add("hidden");

}

function showVenteForm() {

var ajoutclientForm = document.getElementById("ajoutclient-form");
var ajoutmedicamentForm = document.getElementById("ajoutmedicament-form");
var ajoutfournisseurForm = document.getElementById("ajoutfournisseur-form");
var venteForm = document.getElementById("vente-form");
ajoutclientForm.classList.add("hidden"); 
ajoutmedicamentForm.classList.add("hidden");
ajoutfournisseurForm.classList.add("hidden");
venteForm.classList.remove("hidden");

}


function logout() {
  // Effacer les cookies si nécessaire
  document.cookie = "nom_du_cookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  
  // Supprimer les données de la session stockées localement
  sessionStorage.clear();
  
  // Rediriger l'utilisateur vers la page de connexion (ou une autre page de votre choix)
  window.location.href = "../formulaire/inscription.php";
}

	</script>
</body>
</html>
