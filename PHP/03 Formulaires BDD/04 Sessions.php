<?php

session_start(); // a mettre tout en haut et sur toutes les pages ou on a besoin de la session et de ses variables!!

// session_destroy(); pour fermer la session (se declenche automatiquement (timeout) apres plusieurs minutes sans action)

	if(!empty($_POST['pseudo'])) {		// comme isset($_POST['pseudo']) mais verifie 
										// non vide en plus

		$pseudo = $_POST['pseudo'];

		$_SESSION['pseudo'] = $pseudo;			// php genere un cookie PHPSESSID pour cette session
												// les donnees sont detruites a la fermeture du navigateur et ne sont pas modifiables par l'utilisateur

	}
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>PHP</title>
	</head>

	<body>
		<h1>Entrer votre pseudo</h1>

		<form method="post" action="04 Sessions.php">   

			<table>

				<tr>
					<td>Pseudo</td>
					<td><input type="text" name="pseudo"/></td>
				</tr>
				
			</table>

				<button type="submit">Connexion</button>

		</form>

		<?php

		if(!empty($_SESSION['pseudo'])) {
			
			echo'<h2>Bienvenue '.htmlspecialchars($_SESSION['pseudo']).'</h2>'; // grosse sécu

		}
		?>

	</body>
</html>



