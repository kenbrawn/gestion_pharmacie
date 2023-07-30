<?php 


$imagePath = "profil.png";
session_start();
// Supposons que vous ayez stocké le chemin de l'image et le nom de l'utilisateur dans des variables de session lors de la connexion.

$nomUtilisateur = $_SESSION['nom_utilisateur'];

?> 


<!DOCTYPE html>
<html>
<head>
	<title>mon page d'accueil </title>
	<link rel="stylesheet" type="text/css" href="../style/accueil.css">
</head>
<body>
<header>
        <h2 style="	font-family: Arial, Helvetica, sans-serif;
	text-shadow: 1.5px 1.5px 1.5px #333333;">Bienvenu au page d'accueil gestion de pharmacie </h2>
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
	
      
        <div class="profil">
            <img src="<?php echo $imagePath; ?>" alt="Photo de profil" class="profile-image">
			<p style="	margin-left: 50px;font-style:italic;font-weight: 700;text-transform: uppercase ;
	color:red;"><?php echo $nomUtilisateur; ?></p>
       
        </div>


	<div class="form-container hidden" id="ajoutclient-form">
		<form action="../client/client.php" method="post">
			<h2>Client</h2>
			<label for="nom_client">Nom du client:</label>
			<input type="text" id="nom_client" name="nom_client" required>
            <label for="adresse_client">adresse:</label>
			<input type="text" id="adresse_client" name="adresse_client" required>
			<label for="medicament_acheter">Medicament acheter:</label>
			<input type="text" id="medicament_acheter"  name="medicament_acheter">
			<label for="telephone">telephone:</label>
			<input type="number" id="telephone" name="telephone" required><br><br>			
			<input type="submit" value="valider"><br><br>
			<a href="../client/client.php" class="voir_liste" style="color:green;font-size: 15px;background-color:red;margin-bottom:10px">Voir liste</a><br><br>
			<a href="../client/achetereffetsimediates.php" style="color:white;font-size: 15px;background-color:blue;margin-bottom:150px">achetees des medicaments a effets rapides</a>
		</form>
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
			<label for="nom_fournisseur">Nom fournisseur :</label>
			<input type="text" id="nom_fournisseur" name="nom_fournisseur">
			<label for="type_medicament">type de medicament :</label>
			<input type="text" id="type_medicament" name="type_medicament">
			<label for="quantite_stock">Quantite des stocks :</label>
			<input type="int" id="quantite_stock" name="quantite_stock" >
			<label for="date_ajout">Date d'ajout :</label>
			<input type="date" id="date_ajout" name="date_ajout" required>
			<label for="date_peremption">Date de peremption :</label>
			<input type="date" id="date_peremption" name="date_peremption" >
			<input type="submit" value="valider">
			<a href="../medicament/ajout_medicament.php" style="color:green;font-size: 15px;background-color:red;margin-bottom:10px">Voir liste</a><br><br>
			<a href="../medicament/perimes.php" style="color:white;font-size: 15px;background-color:green;margin-bottom:30px">medicaments perimes aujourd'hui</a><br<<br><br><br>
			<a href="../medicament/enstock.php" style="color:white;font-size: 15px;background-color:blue;margin-bottom:100px">medicaments  stock</a>
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
  
			<input type="submit" value="valider"><br><br>
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
			<input type="submit" value="valider"><br><br>
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
			<input type="submit" value="valider"><br><br>
			<a href="../commande/commande.php" style="color:green;font-size: 15px;background-color:red;margin-bottom:10px">Voir liste</a>
		</form>
	</div>
	<script>
     document.getElementById("ajoutmedicament-form").classList.remove("hidden");
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
  
  // Supprimer les données de la session disponibles localement
  sessionStorage.claire();

  // Rediriger l'utilisateur vers la page de connexion 
  fenetre.emplacement.href = "../index.php";
  sortie;
}

	</scénario>
	            <Bas de page>
                <classe div="">
                    <classe div="démarrage flottant">
                        <identifiant h3="signature">juin-juillet 2023 &copie ; ANDRIANAINA TSIRY KENNIA</h3>
                    </div>
                </div>
            </Bas de page>
</corps>
</html>
