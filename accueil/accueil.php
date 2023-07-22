

<!DOCTYPE html>
<html>
<head>
	<title>login de mon page </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
<header>
        <h2 style=" background-color: green;color:rgb(180, 213, 15);
			font-style: italic;
			font-weight: 1000;	font-family: Arial, Helvetica, sans-serif;
	text-shadow: 1.5px 1.5px 1.5px #333333;margin-right:310px;margin-left:310px;" >Site web gestion de pharmacie </h2>
</header>
	<nav>
		<ul>
			<li><a href="#" onclick="showLoginForm()">Login</a></li>
			<li><a href="#" onclick ="showRegisterForm()">Register</a></li>
		</ul>
	</nav>
	
	<div class="form-container hidden" id="login-form">
		<form action="./formulaire/login.php" method="post">
			<h2>Login</h2>
			<label for="nom_utilisateur">Nom d'utilisateur:</label>
			<input type="text" id="nom_utilisateur" name="nom_utilisateur" required>
			<label for="password">Mot de passe:</label>
			<div class="password-input-container">
            <input type="password" id="password" name="mdp_utilisateur" required>
            <span class="password-toggle" onclick="togglePasswordVisibility()">&#x1F441;</span>
								
			<div >	
				<input type="submit"  id="login" value="Se connecter">
			</div>
		</form> 

               </div>
      

	</div>

	<div class="form-container hidden" id="register-form">
		<form method="post" action="./formulaire/enregistrement.php">
			<h2>enregistrer</h2>
			<label for="new-username">Nom d'utilisateur:</label>
			<input type="text" id="new-username" name="nom_utilisateur" required>
			<label for="new-password">Mot de passe:</label>
			<input type="password" id="new-password" name="mdp_utilisateur" required>
			<label for="confirm-password">Confirmer votre mot de passe:</label>
			<input type="password" id="confirm_password" name="confirm_password" required>
			<label for="user-type">Type d'utilisateur:</label>
			<select id="user-type" name="type_utilisateur" required>
				<option value="utilisateur">Utilisateur</option>
				<option value="admin">Admin</option>
				
			</select>
			<label for="email">Email:</label>
      		<input type="email" id="email" name="email" required><br>
			<input type="submit" value="enregistrer">
		</form>
	</div>

	<script>
       // document.getElementById("login-form").classList.remove("hidden");
		function showLoginForm() {
			var loginForm = document.getElementById("login-form");
			var registerForm = document.getElementById("register-form");
 			loginForm.classList.remove("hidden"); 
			registerForm.classList.add("hidden");
		}

		function showRegisterForm() {
			var loginForm = document.getElementById("login-form");
			var registerForm = document.getElementById("register-form");
			loginForm.classList.add("hidden");
			registerForm.classList.remove("hidden");
		}
		
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var passwordToggle = document.querySelector(".password-toggle");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                passwordToggle.innerHTML = "&#x1F443;"; // Eye icon open
            } else {
                passwordInput.type = "password";
                passwordToggle.innerHTML = "&#x1F441;"; // Eye icon closed
            }
        }
		
	</script> 

<section>
	<div id="line">
		<div class="dline">
		<p >simplifiez votre taches avec notre application<br> gestion de pharmacie en ligne </p>
		</div>
	</div>
	<div id="derniers-articles" style="display: flex;">
	<div id="derniers-articles" style="display: flex;">
    <article id="art-1" style="flex: 1;margin-top:50px; text-align: center; display: flex; flex-direction: column; justify-content: flex-end;background:orange;">
        <h1 style="background-color: black; color: rgb(180, 213, 15);margin-top:2px; font-style: italic; font-weight: 300; margin-top: 30px; margin-bottom: 1px;">Description 1</h1>
        <img src="./accueil/fanafody.webp" alt="" style="width:300px;height:200px;margin:20px" />
   
        <p ><i>En vue de faciliter une accessibilité économique des médicaments essentiels à la population, 
l'accès aux médicaments essentiels de qualité a été reconnu dans plusieurs engagements internationaux comme un Droit Humain qui relève de l'éthique, de l'équité et de la justice sociale</i></p>
    </article>
    <article id="art-2" style="flex: 1;margin-top:50px; text-align: center; display: flex; flex-direction: column; justify-content: flex-end;background:green;">
        <h1 style="background-color: #74c50a; color: white; font-style: italic; font-weight: 300; margin-top: 30px; margin-bottom: 1px;">Description 2</h1>
        <img src="./accueil/pharmamaison.jpg" alt="" style="width:300px;height:200px;margin:20px" />
        <p><i>L'analyse et le traitement des données ayant facilité la révision de la Liste  des Médicaments Essentiels qui répondent aux besoins prioritaires de santé d'une population
		. La présente liste comporte de groupes pharmaco-thérapeutiques et  médicaments qui répondent aux pathologies les plus courantes du pays.</i></p>
    </article>
    <article id="art-3" style="flex: 1; margin-top:50px; text-align: center; display: flex; flex-direction: column; justify-content: flex-end;background:red;">
        <h1 style="background-color: #e00e0e; color: rgb(180, 213, 15); font-style: italic; font-weight: 300; margin-top: 30px; margin-bottom: 1px;">Description 3</h1>
        <img src="./accueil/admin.jpg" alt="" style="width:300px;height:200px;margin:20px" />
       <p><i>Cet outil de référence prend en compte les trois niveaux de la pyramide sanitaire et demeure ainsi incontournable pour tout professionnel de santé, tout industriel et importateur soucieux de faciliter à la clientèle des institutions de santé, une accessibilité économique, optimale à des médicaments de qualité, de façon rationnelle.</i> </p>
    </article>
</div>

</section>
		
	   <footer>

				<div class="xx">
				<h3>Contact Us:</h3>
				<p>Antananarivo-Madagascar<br>Ken brawny<br><br></p>
				</div>
				<div class="xz">
				   <p>Telephone:0344217287<br>
				     e-mail:karim6roben@gmail.com<br></p>
				</div>
				
                 
				<div class="float-start">
                        <h3 id="signature">juin-juillet 2023 &copy; ANDRIANAINA TSIRY KENNIA</h3>
                </div>
            
	   </footer>
</body>
</html>
