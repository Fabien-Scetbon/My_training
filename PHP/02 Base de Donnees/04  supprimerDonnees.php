<?php
	// Hote : localhost   ou    sql.monserveurperso.com
	// NOM DE LA BASE : formation_udemy
	// LOGIN : fabino
	// MDP : Mono...
	// Nom de la table : users


	// CONNEXION (une seule fois)
	// recherche d'erreurs lors de la connexion a la base de donnees
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=formation_udemy;charset=utf8','fabino', 'MonopolI');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

	/* AJOUT DONNEES
	$requete = $bdd->exec('INSERT INTO users(prenom, nom, serie_preferee) VALUES("Mark", "Zuckero", "Facebook")');  */ 

	// MODIFIER DONNEES   

	/* $requete = $bdd->exec('UPDATE users SET serie_preferee = "Zoro" ');  modifie la serie partout 

	   $requete = $bdd->exec('UPDATE users SET serie_preferee = "Zoro" WHERE prenom = "Paul" ');   on cible la modif (cas principal) */

	// SUPPRIMER DONNEES

	   // $requete = $bdd->exec('DELETE FROM users');  supprime tout !!

	   $requete = $bdd->exec('DELETE FROM users WHERE prenom = "Romeo"'); // on cible la suppression 


	// LIRE INFOS

	$requete = $bdd->query('SELECT * 			 /* selectionne tout (*) depuis la table users (on peut 												mettre prenom) */
							FROM users');



							 
	
	echo '<table border>
				<tr>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Serie</th>
				</tr>';

	while($donnees = $requete->fetch()){	// tant qu'il y a une entree (ligne) a lire, on boucle . La var $donnees est un tableau qui contient le contenu de la ligne

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
	<title>Ajout de donnees </title>
</head>

<body>

</body>



