<?php
	try {	
		$bdd = new PDO('mysql:host=localhost;dbname=formation_udemy;charset=utf8','fabino', 'MonopolI');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

	   	$requete = $bdd->prepare('SELECT prenom, nom, serie_preferee, metier 
	   						   FROM users   
	   						   INNER JOIN jobs  
	   						   ON users.id = jobs.id_user');

	   	$requete->execute(); 

		// AFFICHAGE TABLES users & jobs
	
	echo '<table border>
				<tr>
					<th>pseudo</th>
					<th>nom</th>
					<th>serie_preferee</th>
					<th>mot de passe</th>
				</tr>';

	while($donnees = $requete->fetch()){	

		echo '<tr>
				<td>'.$donnees['prenom'].'</td>
				<td>'.$donnees['nom'].'</td>
				<td>'.$donnees['serie_preferee'].'</td>
				<td>'.sha1($donnees['metier']).'grainDeSel</td>     
			 </tr>';
		};

	     echo'</table>';

		 // on utilise le cryptage sha1 mais insuffisant car site de decryptage sur le web
	     // donc on insert un grain de sel du type f8g4
	     // le top etant de creer une nouvelle entree dans la table users et de donner un grain aleatoire different a chaque user (le grain peut etre place n'importe ou dans le cryptage sha1)

	$requete->closeCursor(); 
	
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Titre </title>
</head>

<body>

</body>



