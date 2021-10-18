<?php
	// Hote : localhost   ou    sql.monserveurperso.com au cas ou
	// NOM DE LA BASE : formation_udemy
	// LOGIN :fabino
	// MDP : Mono...
	// Nom des tables : users et jobs


	// CONNEXION (une seule fois)
	// recherche d'erreurs lors de la connexion a la base de donnees
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=formation_udemy;charset=utf8','fabino', 'MonopolI');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

	// AJOUT DONNEES DANS TABLE jobs (en commentaire sinon il les rajoute a chaque fois !!)
	/*$requete = $bdd->exec('INSERT INTO jobs(id_user, metier) VALUES(1, "Prof")'); 
	$requete = $bdd->exec('INSERT INTO jobs(id_user, metier) VALUES(2, "Auteur")');
	$requete = $bdd->exec('INSERT INTO jobs(id_user, metier) VALUES(3, "Acteur")');
	$requete = $bdd->exec('INSERT INTO jobs(id_user, metier) VALUES(4, "Chanteur")');
	$requete = $bdd->exec('INSERT INTO jobs(id_user, metier) VALUES(5, "PDG")');
	$requete = $bdd->exec('INSERT INTO jobs(id_user, metier) VALUES(6, "Ouvrier")');  */                


	// PARTIE FACULTATIVE sur la table jobs
	// LIRE INFOS DE jobs

	$requete = $bdd->query('SELECT * 			  /*selectionne tout (*) depuis la table users (on peut 												mettre prenom) */
							FROM jobs');

	// AFFICHAGE TABLE jobs
	
	echo '<table border>
				<tr>
					<th>id_user</th>
					<th>Metier</th>
				</tr>';

	while($donnees = $requete->fetch()){	// tant qu'il y a une entree (ligne) a lire, on boucle . La var $donnees est un tableau qui contient le contenu de la ligne

		echo '<tr>
				<td>'.$donnees['id_user'].'</td>
				<td>'.$donnees['metier'].'</td>
			 </tr>';
		};

	     echo'</table>';
	// fin partie facultative


	// JOINTURE users avec jobs
	// 1er WHERE : un peu obsolète
	// 2em JOIN : mieux !

	// 1er avec WHERE 
	// Lire les infos

	   /*$requete = $bdd->query('SELECT prenom, nom, serie_preferee, metier 
	   						   FROM users, jobs
	   						   WHERE users.id = jobs.id_user');*/

	// 2em avec JOIN 

	   	$requete = $bdd->query('SELECT prenom, nom, serie_preferee, metier 
	   						   FROM users   /* ou FROM users AS u (ou même users u)pour renommer la table afin de simplifier le code */
	   						   INNER JOIN jobs  /* idem avec jobs AS j */
	   						   ON users.id = jobs.id_user');  /* ou ON u.id = j.id_user si renommés */

	// 2em avec JOIN : CAS OU 2 colonnes portent le même nom (par ex : nomCommun) dans les 2 tables avec valeurs différentes et on veut valeurs table jobs

		/*$requete = $bdd->query('SELECT prenom, nom, serie_preferee, metier, jobs.nomCommun AS nomCommun
			   					FROM users
			   					INNER JOIN jobs
			   					ON users.id = jobs.id_user');*/

	/* 2em avec Join : Cas ou on souhaite afficher toutes les donnees d'une table ou de l'autre même si elles ne "s'imbriquent" pas bien 
		Remplacer INNER JOIN jobs par RIGHT JOIN jobs pour avoir users ou LEFT JOIN jobs pour avoir jobs*/




// AFFICHAGE TABLES users & jobs
	
	echo '<table border>
				<tr>
					<th>prenom</th>
					<th>nom</th>
					<th>serie_preferee</th>
					<th>Metier</th>
				</tr>';

	while($donnees = $requete->fetch()){	// tant qu'il y a une entree (ligne) a lire, on boucle . La var $donnees est un tableau qui contient le contenu de la ligne

		echo '<tr>
				<td>'.$donnees['prenom'].'</td>
				<td>'.$donnees['nom'].'</td>
				<td>'.$donnees['serie_preferee'].'</td>
				<td>'.$donnees['metier'].'</td>
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

</body>



