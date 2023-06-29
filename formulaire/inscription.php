<!DOCTYPE html>
<html>
<head>
	<title>login de mon page </title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body >
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
			<input type="text" id="username" name="username" required>
			<label for="password">Mot de passe:</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Login">
		</form> 
        <div class="description">
        <!-- Description de votre site web ici -->
        <p> Si vous n'avez pas de compte d'utlisateur!</p></br>
		<p> creer d'abord votre compte en cliquant register au dessus.</p>
        </div>

	</div>

	<div class="form-container hidden" id="register-form">
		<form method="post">
			<h2>enregistrer</h2>
			<label for="new-username">Nom d'utilisateur:</label>
			<input type="text" id="new-username" name="new-username" required>
			<label for="new-password">Mot de passe:</label>
			<input type="password" id="new-password" name="new-password" required>
			<label for="confirm-password">Confirmer votre mot de passe:</label>
			<input type="password" id="confirm-password" name="confirm-password" required>
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
	</script>
</body>
</html>
