<?php 

session_start();/*
$imagePath = "/pharma.jpg";

// Récupération des données du formulaire de connexion
// Supposons que vous ayez stocké le chemin de l'image et le nom de l'utilisateur dans des variables de session lors de la connexion.
$imagePath = $_SESSION['pharma.jpg'];
$nomUtilisateur = $_SESSION['nom_utilisateur'];

// ... Autres traitements ...
// Vous pouvez maintenant inclure le code HTML ci-dessus pour afficher l'image et le nom de l'utilisateur.
  */?>


<!DOCTYPE html>
<html>
<head>
	<title>mon page d'accueil </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
        <h2>Bienvenu au page d'accueil gestion de pharmacie </h2>
</header>
	<nav>
		<ul>
		
			<li><a href="#" onclick="showAjoutclientForm()">Client</a></li>
			<li><a href="#" onclick="showAjoutmedicamentForm()">Medicaments</a></li>
			<li><a href="#" onclick="showAjoutfournisseurForm()">Ajout fournisseur</a></li>
      		<li><a href="#" onclick="showVenteForm()">Vente</a></li>
			<li><a href="#" onclick="showCommandeForm()">Commande client</a></li>
			<li><a href="#" onclick="logout()">Deconnexion</a></li>
		</ul>
	</nav>
    <!-- <div class="profil">
       <img src="profil.png" alt="Photo de profil" class="profile-image">
		<img src="<?php echo $imagePath; ?>" alt="Image de profil" class="profile-image">
        <p><?php echo $nomUtilisateur; ?></p>
    </div>-->
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
        <div >

        <!-- Description de votre site web ici -->
 

        </div>

	</div>

	<div class="form-container hidden" id="ajoutmedicament-form">
		<form method="post" action ="../medicament/ajout_medicament.php">
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
	<div class="form-container hidden" id="commande-form">
		<form method="post" action ="../commande/commande.php">
			<h2>Commande de client</h2>
            <label for="date_commande">Date de commande:</label>
			<input type="date" id="date_commande" name="date_commande" required>
			<label for="idclient">Id client:</label>
			<input type="int" id="idclient" name="idclient" required>
			<label for="medicament_cmd">Medicament commander:</label>
			<input type="text" id="medicament_cmd" name="medicament_cmd" required>
            <label for="quantite_cmd">Quantite de commande :</label>
			<input type="int" id="quantite_cmd" name="quantite_cmd" required>
			<label for="prix_vente">Prix de vente :</label>
			<input type="int" id="prix_vente" name="prix_vente" required>
			<input type="submit" value="Register"><br><br>
			<a href="../commande/commande.php" style="color:green;font-size: 15px;background-color:red;margin-bottom:10px">Voir liste</a>
		</form>
	</div>
	<script>
       document.getElementById("ajoutclient-form").classList.remove("hidden");
		  function showAjoutclientForm() {
			var ajoutclientForm = document.getElementById("ajoutclient-form");
			var commandeForm = document.getElementById("commande-form");
			var ajoutmedicamentForm = document.getElementById("ajoutmedicament-form");
            var ajoutfournisseurForm = document.getElementById("ajoutfournisseur-form");
            var venteForm = document.getElementById("vente-form");
			ajoutclientForm.classList.remove("hidden"); 
			ajoutmedicamentForm.classList.add("hidden");
            ajoutfournisseurForm.classList.add("hidden");
            venteForm.classList.add("hidden");
			commandeForm.classList.add("hidden");
		}

		function showAjoutmedicamentForm() {
            var commandeForm = document.getElementById("commande-form");
            var ajoutclientForm = document.getElementById("ajoutclient-form");
			var ajoutmedicamentForm = document.getElementById("ajoutmedicament-form");
            var ajoutfournisseurForm = document.getElementById("ajoutfournisseur-form");
            var venteForm = document.getElementById("vente-form");
			ajoutclientForm.classList.add("hidden"); 
			ajoutmedicamentForm.classList.remove("hidden");
            ajoutfournisseurForm.classList.add("hidden");
            venteForm.classList.add("hidden");
			commandeForm.classList.add("hidden");

		}
    function showAjoutfournisseurForm() {
var commandeForm = document.getElementById("commande-form");
var ajoutclientForm = document.getElementById("ajoutclient-form");
var ajoutmedicamentForm = document.getElementById("ajoutmedicament-form");
var ajoutfournisseurForm = document.getElementById("ajoutfournisseur-form");
var venteForm = document.getElementById("vente-form");
ajoutclientForm.classList.add("hidden"); 
ajoutmedicamentForm.classList.add("hidden");
ajoutfournisseurForm.classList.remove("hidden");
venteForm.classList.add("hidden");
commandeForm.classList.add("hidden");

}

function showVenteForm() {
var commandeForm = document.getElementById("commande-form");
var ajoutclientForm = document.getElementById("ajoutclient-form");
var ajoutmedicamentForm = document.getElementById("ajoutmedicament-form");
var ajoutfournisseurForm = document.getElementById("ajoutfournisseur-form");
var venteForm = document.getElementById("vente-form");
ajoutclientForm.classList.add("hidden"); 
ajoutmedicamentForm.classList.add("hidden");
ajoutfournisseurForm.classList.add("hidden");
venteForm.classList.remove("hidden");
commandeForm.classList.add("hidden");

}

function showCommandeForm() {
	        var commandeForm = document.getElementById("commande-form");
			var ajoutclientForm = document.getElementById("ajoutclient-form");
			var ajoutmedicamentForm = document.getElementById("ajoutmedicament-form");
            var ajoutfournisseurForm = document.getElementById("ajoutfournisseur-form");
            var venteForm = document.getElementById("vente-form");
			commandeForm.classList.remove("hidden"); 
			ajoutclientForm.classList.add("hidden"); 
			ajoutmedicamentForm.classList.add("hidden");
            ajoutfournisseurForm.classList.add("hidden");
            venteForm.classList.add("hidden");
		}
function logout() {
  // Effacer les cookies si nécessaire
  document.cookie = "nom_du_cookie=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  
  // Supprimer les données de la session stockées localement
  sessionStorage.clear();

  // Rediriger l'utilisateur vers la page de connexion (ou une autre page de votre choix)
  window.location.href = "../formulaire/inscription.php";
  exit;
}

	</script>
	            <footer>
                <div class="">
                    <div class="float-start">
                        <h3 id="signature">juin-juillet 2023 &copy; ANDRIANAINA TSIRY KENNIA</h3>
                    </div>
                </div>
            </footer>
</body>
</html>
