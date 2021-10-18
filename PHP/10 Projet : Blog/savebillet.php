<?php
	try {	
		$bdd = new PDO('mysql:host=localhost;dbname=projet_blog;charset=utf8','fabino', 'MonopolI');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}
    if(!empty($_POST['auteur_billet']) && !empty($_POST['titre']) && !empty($_POST['contenu_billet'])) {

        $auteur_billet		= htmlspecialchars($_POST['auteur_billet']);
        $titre 		        = htmlspecialchars($_POST['titre']);
        $contenu_billet     = htmlspecialchars($_POST['contenu_billet']);

	$requete = $bdd->prepare('INSERT INTO billets(auteur, titre, contenu , date_creation) VALUES(?, ?, ?, NOW())');
	$requete->execute(array($auteur_billet, $titre, $contenu_billet)); 

    header('location: index.php?');
	exit();

    } else {

		header('location: index.php');
	}
?>
