<?php
	session_start();

	require('src/log.php'); // pour detecter le cookie connex auto


	// VERIFIE IDENTIFIANTS UTILISATEUR
	if(!empty($_POST['email']) && !empty($_POST['password'])) {

		require('src/connect.php'); // comme include mais erreur bloquante si fichier indisponible
									// connexion a bdd ici pour éviter surcharge bande passante site
		$email 			= htmlspecialchars($_POST['email']);
		$password 		= htmlspecialchars($_POST['password']);

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  // verifie format email car utilisateur peut modif le code source 
			
			header('location: index.php?error=1&message=Votre adresse email est invalide.');
			exit();
		} 

		// chiffrage du mot de passe
		$password = "a5q".sha1($password."d7f")."r9h"; // même que inscription

		// recherche email dans bdd
		$requete = $bdd->prepare('SELECT COUNT(*) AS numberEmail FROM usersNetflix WHERE email = ?');

		$requete->execute(array($email));
		
		while($result = $requete->fetch()) {
		
			if($result['numberEmail'] != 1) { 

				header('location: index.php?error=1&message=Authentification impossible (mail).'); // ne pas dire "email inconnu" car revellerait l'existence de l'adresse mail
				exit();
			} 
		}

		// verifier si email et mot de passe coincident
		$requete = $bdd->prepare('SELECT * FROM usersNetflix WHERE email = ?');

		$requete->execute(array($email));

		while($donnees = $requete->fetch()){

			if($donnees['password'] == $password && $user['blocked'] == 0) { 

				$_SESSION['connect'] = 1; // parametres de session
				$_SESSION['email'] 	 = $donnees['email'];

				// connexion auto si checkbox cochée (se souvenir de moi)

				if(isset($_POST['auto'])) {
					 
					//creation cookie

					setcookie('auth', $donnees['secret'], time() + 365*24*3600, null, null, false, true);
				}
				
				header('location: index.php?success=1');
				exit();

			} else { header('location: index.php?error=1&message=Authentification impossible (mdp).');
					 exit();
			}
		}

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

		<!-- ici on enleve le formulaire si l user est connecté -->
		<?php if(isset($_SESSION['connect'])) { ?>

			<h1>Bonjour !</h1>

			<?php if (isset($_GET['success'])) { 
					echo'<div class="alert success">Vous êtes bien connecté avec '.$_SESSION['email'].' 
						</div>';
					} ?>

			<p>Qu allez-vous regarder aujourd hui ?</p>
			<small><a href="logout.php">Déconnexion</a></small>

		<?php } else { ?> <!-- ici on met le formulaire car user non connecté -->

				<h1>Sidentifier</h1>

				<?php if(isset($_GET['error']) && isset($_GET['message'])) {

					echo'<div class="alert error">'.htmlspecialchars($_GET['message']).'
						</div>';

					  } 
				?>

				<form method="post" action="index.php">
					<input type="email" name="email" placeholder="Votre adresse email" required />
					<input type="password" name="password" placeholder="Mot de passe" required />
					<button type="submit">Identification</button>
					<label id="option"><input type="checkbox" name="auto" checked />Se souvenir de moi</label>
				</form>
			

				<p class="grey">Première visite sur Netflix ? <a href="inscription.php">Inscrivez-vous</a>.</p>
			<?php } ?>
		
		</div>
	</section>

	<?php include('src/footer.php'); ?>
</body>
</html>