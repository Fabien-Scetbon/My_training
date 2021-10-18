<?php

	if(!empty($_POST['pseudo'])) {		// comme isset($_POST['pseudo']) mais verifie 
										// non vide en plus

		$pseudo = $_POST['pseudo'];

		// cookie (valeur, nom, date expi, options) à écrire avant <!DOCTYPE> !! 
		// une info par cookie !!

		setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);

		// le dernier true active httpOnly (cookie inaccessible par JS)

		// date actuelle + 1 an en secondes / 3 options secondaires / true active http Only (petite sécu)

		// pour checker les cookies en cours, clic sur i à gauche de localhost dans url

		// attention un utilisateur peut modif les cookies car stockés dans le navigateur (voir 04 sessions)

		// on peut re setcookie le même cookie pour le modifier
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

		<form method="post" action="03 Cookie.php">   

			<table>

				<tr>
					<td>Pseudo</td>
					<td><input type="text" name="pseudo"/></td>
				</tr>
				
			</table>

				<button type="submit">Connexion</button>

		</form>

		<!-- on utilise le cookie -->

		<?php

		if(!empty($_COOKIE['pseudo'])) {
			
			echo'<h2>Bienvenue '.htmlspecialchars($_COOKIE['pseudo']).'</h2>'; // grosse sécu

		}
		?>

	</body>
</html>



