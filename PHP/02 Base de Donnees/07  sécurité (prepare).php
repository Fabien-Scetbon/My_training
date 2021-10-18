<?php
	try {	
		$bdd = new PDO('mysql:host=localhost;dbname=formation_udemy;charset=utf8','fabino', 'MonopolI');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

		/*Hack par injection SQL
		$prenom = '" OR 1=1#';	 Methode de hack !! condition vraie donc il affiche tout malgré ligne 17

		 $prenom = htmlspecialchars($prenom);  1ere sécurité mais lourd

	   	$requete = $bdd->query('SELECT prenom, nom, serie_preferee, metier 
	   						   FROM users   
	   						   INNER JOIN jobs  
	   						   ON users.id = jobs.id_user
	   						   WHERE prenom = "'.$prenom.'"'); 

	   	 explications : avec exec ou query, on execute la requete; avec prepare, on la prepare (voir ci-desous)
	   	 */

	   	$prenom = 'Tom'; 
	   	$nom = 'Sawyer';

	   	$requete = $bdd->prepare('SELECT prenom, nom, serie_preferee, metier 
	   						   FROM users   
	   						   INNER JOIN jobs  
	   						   ON users.id = jobs.id_user
	   						   WHERE prenom = ? && nom = ? '); // on peut mettre autant de parametres que l'on veut

	   	$requete->execute(array($prenom, $nom)); // et ici on l'execute (même ordre que WHERE)






		// AFFICHAGE TABLES users & jobs
	
	echo '<table border>
				<tr>
					<th>prenom</th>
					<th>nom</th>
					<th>serie_preferee</th>
					<th>Metier</th>
				</tr>';

	while($donnees = $requete->fetch()){	

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



