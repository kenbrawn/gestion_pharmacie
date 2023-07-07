

<!DOCTYPE html>
<html>
<head>
	<title>login de mon page </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
<header>
        <h2 style=" background-color: black;color:rgb(180, 213, 15);
			font-style: italic;
			font-weight: 1000;" >Site web gestion de pharmacie </h2>
</header>
	<nav>
		<ul>
			<li><a href="#" onclick="showLoginForm()">Login</a></li>
			<li><a href="#" onclick="showRegisterForm()">Register</a></li>
		</ul>
	</nav>

	<div class="form-container hidden" id="login-form">
		<form action="./formulaire/login.php" method="post">
			<h2>Login</h2>
			<label for="username">Nom d'utilisateur:</label>
			<input type="text" id="username" name="nom_utilisateur" required>
			<label for="password">Mot de passe:</label>
			<div class="password-input-container">
            <input type="password" id="password" name="mdp_utilisateur" required>
            <span class="password-toggle" onclick="togglePasswordVisibility()">&#x1F441;</span>
				
				
			<div >	
				<input type="submit"  id="login" value="Login">
			</div>
		</form> 

               </div>
      

	</div>

	<div class="form-container hidden" id="register-form">
		<form method="post" action="../formulaire/enregistrement.php">
			<h2>enregistrer</h2>
			<label for="new-username">Nom d'utilisateur:</label>
			<input type="text" id="new-username" name="nom_utilisateur" required>
			<label for="new-password">Mot de passe:</label>
			<input type="password" id="new-password" name="mdp_utilisateur" required>
			<label for="confirm-password">Confirmer votre mot de passe:</label>
			<input type="password" id="confirm_password" name="confirm_password" required>
			<label for="user-type">Type d'utilisateur:</label>
			<select id="user-type" name="type_utilisateur" required>
				<option value="admin">Admin</option>
				<option value="utilisateur">Utilisateur</option>
			</select>
			<input type="submit" value="Register">
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
		<div class="dline"></div>
		<p style="color:rgb(180, 213, 15);
			font-style: italic;
			font-weight: 1000;">simplifier la gestion de votre taches avec l'application gestion de pharmacie en ligne </p>
		<div class="dline"></div>
	</div>
	<div id="derniers-articles" style="display: flex;">
	<div id="derniers-articles" style="display: flex;">
    <article id="art-1" style="flex: 1; text-align: center; display: flex; flex-direction: column; justify-content: flex-end;background:black;">
        <h1 style="background-color: black; color: rgb(180, 213, 15); font-style: italic; font-weight: 700; margin-top: 30px; margin-bottom: 3px;">menu 1</h1>
        <img src="./accueil/fournisseur2.jpg" alt="" style="width:300px;height:200px;margin:20px" />
        <p style="margin-top: auto; background-color: black;">Liste des médicaments dans la pharmacie.</p>
        <p style="margin-top: auto; background-color: black;">Voir tous les clients qui nous visitent.</p>
        <p style="margin-top: auto; background-color: black;">Commander vos médicaments.</p>
        <p style="margin-top: auto; background-color: black;">Faciliter le mode de commerce.</p>
        <p style="margin-top: auto; background-color: black;">Informations de tous les fournisseurs de nos produits.</p>
    </article>
    <article id="art-2" style="flex: 1; text-align: center; display: flex; flex-direction: column; justify-content: flex-end;background:green;">
        <h1 style="background-color: #74c50a; color: white; font-style: italic; font-weight: 700; margin-top: 30px; margin-bottom: 3px;">menu 2</h1>
        <img src="./accueil/pile.jpg" alt="" style="width:300px;height:200px;margin:20px" />
        <p style="margin-top: auto; background-color: green; color: white;">Liste des médicaments dans la pharmacie.</p>
        <p style="margin-top: auto; background-color: green; color: white;">Voir tous les clients qui nous visitent.</p>
        <p style="margin-top: auto; background-color: green; color: white;">Commander vos médicaments.</p>
        <p style="margin-top: auto; background-color: green; color: white;">Faciliter le mode de commerce.</p>
    </article>
    <article id="art-3" style="flex: 1; text-align: center; display: flex; flex-direction: column; justify-content: flex-end;background:red;">
        <h1 style="background-color: #e00e0e; color: rgb(180, 213, 15); font-style: italic; font-weight: 700; margin-top: 30px; margin-bottom: 3px;">menu 3</h1>
        <img src="./accueil/admin.jpg" alt="" style="width:300px;height:200px;margin:20px" />
        <p style="margin-top: auto; background-color: red; color: white;">Gestion des clients.</p>
        <p style="margin-top: auto; background-color: red; color: white;">Liste des médicaments dans la pharmacie.</p>
        <p style="margin-top: auto; background-color: red; color: white;">Voir tous les clients qui nous visitent.</p>
        <p style="margin-top: auto; background-color: red; color: white;">Commander vos médicaments.</p>
        <p style="margin-top: auto; background-color: red; color: white;">Faciliter le mode de commerce.</p>
    </article>
</div>

</section>
		
	   <footer>
	   			<div class="">
                    <div class="float-start">
                        <h3 id="signature">juin-juillet 2023 &copy; ANDRIANAINA TSIRY KENNIA</h3>
                    </div>
                </div>
	   </footer>
</body>
</html>
