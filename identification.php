<!DOCTYPE html>
<html>
<head>
	<title>Identification</title>
	<style>
		body {
			background-color: #f5f5f5;
			font-family: Arial, sans-serif;
		}
		h1 {
			margin-top: 50px;
			text-align: center;
		}
		h2 {
			margin-top: 30px;
		}
		form {
			display: inline-block;
			vertical-align: top;
			border: 1px solid #000;
			padding: 20px;
			margin: 0 20px 20px 20px;
			border-radius: 0px;
			background-color: #fff;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.2);
		}
		label {
			display: block;
			margin-bottom: 5px;
		}
		input[type="text"], input[type="email"], input[type="password"] {
			display: block;
			width: 100%;
			padding: 10px;
			margin-bottom: 10px;
			border: 1px dashed #000;
			border-radius: 5px;
			font-size: 16px;
			color: #000;
			box-sizing: border-box;
		}
		input[type="submit"] {
			background-color:#E9967A;
			color: #fff;
			border: none;
			padding: 10px 20px;
			border-radius: 5px;
			font-size: 16px;
			cursor: pointer;

		}
		input[type="submit"]:hover {
			background-color: #148f77;
		}
	</style>
</head>
<body>
	<h1>Bienvenue dans la boutique d'Isaac</h1>
	<h2>Iszone.fr</h2>
	<div style="text-align: center;">
		<form action="auth.php" method="post">
			<h2>Se connecter</h2>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>

			<label for="password">Mot de passe:</label>
			<input type="password" id="password" name="password" required>

			<input type="submit" value="Se connecter">
		</form>

		<form action="sign_up.php" method="post">
			<h2>Créer un compte utilisateur</h2>
			<label for="firstname">Prénom:</label>
			<input type="text" id="firstname" name="firstname" required>

			<label for="lastname">Nom:</label>
			<input type="text" id="lastname" name="lastname" required>

			<label for="email2">Email:</label>
			<input type="email" id="email2" name="email" required>

			<label for="password2">Mot de passe:</label>
			<input type="password" id="password2" name="password" required>

			<input type="submit" value="Créer un compte">
		</form>
	</div>
</body>
</html>
