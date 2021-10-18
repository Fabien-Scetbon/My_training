<?php
	try {	
		$bdd = new PDO('mysql:host=localhost;dbname=formation_udemy;charset=utf8','fabino', 'MonopolI');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

	   	// AJOUTE NOUVEL UTILISATEUR
	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['serie'])) {

		// on peut mettre if(!empty($_POST['pseudo'])) a la place de isset (teste aussi si c'est non vide)
		// htmlspecialchars inutile car PDO est sensé s'occuper de tout (ligne 3) ?!
		// si methode get utilisée dans le form html alors mettre _GET partout a la place de _POST
		// get passe par l'url (voir 02 Verif) et post par le serveur

		$prenom = $_POST['prenom'];
		$nom = $_POST['nom'];
		$serie = $_POST['serie'];

		$requete = $bdd->prepare('INSERT INTO users(prenom, nom, serie_preferee) VALUES(?, ?, ?)') or die(print_r($bdd->errorInfo()));

		$requete->execute(array($prenom, $nom, $serie));

		header('location: ../'); // empeche le rajout si page reactualisee en redirigeant (fct header) 
								 // vers page accueil

	}
	

		// AFFICHAGE TABLES users 
	$requete = $bdd->prepare('SELECT prenom, nom, serie_preferee FROM users');

	   	$requete->execute(); 
	
	echo '<table border>
				<tr>
					<th>prenom</th>
					<th>nom</th>
					<th>serie_preferee</th>
				</tr>';

	while($donnees = $requete->fetch()){	

		echo '<tr>
				<td>'.$donnees['prenom'].'</td>
				<td>'.$donnees['nom'].'</td>
				<td>'.$donnees['serie_preferee'].'</td>
			 </tr>';
		};

	     echo'</table>';

	$requete->closeCursor(); 


?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Titre </title>
	</head>

	<body>
		<h1>Ajouter un utilisateur</h1>

		<form method="post" action="01 Ajout Utilisateur POST (et GET).php">   <!-- ou method="get" -->

			<table>

				<tr>
					<td>Prénom</td>
					<td><input type="text" name="prenom"/></td>
				</tr>

				<tr>
					<td>Nom</td>
					<td><input type="text" name="nom"/></td>
				</tr>

				<tr>
					<td>Série préférée</td>
					<td><input type="text" name="serie"/></td>
				</tr>
			</table>

				<button type="submit">Ajouter</button>

		</form>
	</body>
</html>



