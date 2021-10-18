<?php
	session_start();

	require('src/log.php'); // pour detecter le cookie connex auto


	if(isset($_SESSION['connect'])) {   // rend impossible la redirection vers autres pages si connecté
		header('location: index.php');
		exit();
	}

	// AJOUTE NOUVEL UTILISATEUR
	if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two'])) {

		require('src/connect.php'); // comme include mais erreur bloquante si fichier indisponible
									// connexion a bdd ici pour éviter surcharge bande passante site
		$email 			= htmlspecialchars($_POST['email']);
		$password 		= htmlspecialchars($_POST['password']);
		$password_two 	= htmlspecialchars($_POST['password_two']);

		if($password != $password_two) {  // verifie si les deux password =

			header('location: inscription.php?error=1&message=Vos mots de passe sont différents.');
			exit();
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  // verifie format email car utilisateur peut modif le code source 
			
			header('location: inscription.php?error=1&message=Votre adresse email est invalide.');
			exit();
		} 

		// email déja utilisé ?
		$requete = $bdd->prepare('SELECT COUNT(*) AS numberEmail FROM usersNetflix WHERE email = ?');

		$requete->execute(array($email));
		
		while($result = $requete->fetch()) {
		
			if($result['numberEmail'] != 0) { 

				header('location: inscription.php?error=1&message=Cet email est déja utilisé.');
				exit();
			}
		}
		// hash
		$secret = sha1($email).time();
		$secret = sha1($secret).time(); // double chiffrement

		// chiffrage du mot de passe
		$password = "a5q".sha1($password."d7f")."r9h"; // grains de sel 

		// Envoi
		// attention de mettre dans BDD date valeur par defaut current_time...
		$requete = $bdd->prepare('INSERT INTO usersNetflix(email, password, secret) VALUES(?, ?, ?)');
		$requete->execute(array($email, $password, $secret));

		header('location: inscription.php?success=1');
		exit();
	}
		
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Netflix</title>
	<link rel="stylesheet" type="text/css" href="design/default.css">
	<link rel="icon" type="image/pngn" href="img/favicon.png">
</head>
<body>

	<?php include('src/header.php'); ?>
	
	<section>
		<div id="login-body">
			<h1>S'inscrire</h1>

			<?php if(isset($_GET['error']) && isset($_GET['message'])) {

				echo'<div class="alert error">'.htmlspecialchars($_GET['message']).'
					</div>';
				
			} else if (isset($_GET['success'])) {

				echo'<div class="alert success">Bienvenue sur Netflix. 
					<a href="index.php">Connectez-vous</a>.
					</div>';
			}

			 ?>

			<form method="post" action="inscription.php">
				<input type="email" name="email" placeholder="Votre adresse email" required />
				<input type="password" name="password" placeholder="Mot de passe" required />
				<input type="password" name="password_two" placeholder="Retapez votre mot de passe" required />
				<button type="submit">S'inscrire</button>
			</form>

			<p class="grey">Déjà sur Netflix ? <a href="index.php">Connectez-vous</a>.</p>
		</div>
	</section>

	<?php include('src/footer.php'); ?>
</body>
</html>