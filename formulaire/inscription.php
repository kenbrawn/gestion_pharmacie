

<!DOCTYPE html>
<html>
<head>
	<title>login de mon page </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
<header>
        <h2>Site web gestion de pharmacie </h2>
</header>
	<nav>
		<ul>
			<li><a href="#" onclick="showLoginForm()">Login</a></li>
			<li><a href="#" onclick="showRegisterForm()">Register</a></li>
		</ul>
	</nav>

	<div class="form-container hidden" id="login-form">
		<form action="login.php" method="post">
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
		<form method="post" action="enregistrement.php">
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
        document.getElementById("login-form").classList.remove("hidden");
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
	   <footer>
	   			<div class="">
                    <div class="float-start">
                        <h3 id="signature">juin-juillet 2023 &copy; ANDRIANAINA TSIRY KENNIA</h3>
                    </div>
                </div>
	   </footer>
</body>
</html>
