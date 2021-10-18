<?php
	// Hote : localhost   ou    sql.monserveurperso.com au cas ou
	// NOM DE LA BASE : formation_udemy
	// LOGIN : fabino
	// MDP : Mono...
	// nom de la table : users


	// CONNEXION (une seule fois)
	// recherche d'erreurs lors de la connexion a la base de donnees
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=formation_udemy;charset=utf8','fabino', 'MonopolI', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());  // die pour afficher !                                            affiche erreurs dans code SQL
	}

	// Affiche les erreurs dans le code SQL


	// LIRE INFOS

	// les methodes query et exec doivent etre remplacee par prepare (voir 07 securite)

	$requete = $bdd->query('SELECT * 			 /* selectionne tout (*) depuis la table users (on peut mettre que prenom si que prenom utilisé (preserve la BDD)
													ou users.prenom afin de preciser quelle table au besoin) */
							FROM users

						 /* WHERE prenom = "Romeo" || nom ="Sawyer"   selections particuieres */

							ORDER BY id DESC   /* selectionner dans l ordre inverse (desc) des id */
											/* on peut ORDER BY nom (ordre alpha nom) */
							LIMIT 1, 7'); /* selectionner a partir de 0 sur une length de 2 */
	
	echo '<table border>
				<tr>
					<th>Nom</th>
					<th>Prenom</th>
					<th>Serie</th>
				</tr>';

	while($donnees = $requete->fetch()){	// tant qu'il y a une entree (ligne) a lire, on boucle . La var $donnees est un tableau qui contient le contenu de la ligne
											// il y a une methode fetchall qui permet d'eviter le while
		echo '<tr>
				<td>'.$donnees['prenom'].'</td>
				<td>'.$donnees['nom'].'</td>
				<td>'.$donnees['serie_preferee'].'</td>
			 </tr>';
		};

	     echo'</table>';

	$requete->closeCursor();  // termine la serie de fetch (ou ferme co BDD)
							// inutile avec Mysql mais le mettre quand meme 


?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Connexion bdd </title>
</head>

<body>

</body>



