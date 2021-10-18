<?php
	try {	
		$bdd = new PDO('mysql:host=localhost;dbname=autres_projets;charset=utf8','fabino', 'MonopolI');
	} catch(Exception $e) {
		die('Erreur : '.$e->getMessage());
	}

    if(!empty($_POST['pseudo']) && !empty($_POST['message']) && strlen($_POST['pseudo']) < 9 ) {

        $pseudo 			= htmlspecialchars($_POST['pseudo']);
        $message 		    = htmlspecialchars($_POST['message']);

		if(isset($_POST['cookie'])) {

			setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
		} 
	$requete = $bdd->prepare('INSERT INTO minichat(pseudo, message, date_creation) VALUES(?, ?, CURTIME())');

	$requete->execute(array($pseudo, $message)); 

    header('location: minichat.php?success=1');
	exit();

    } else {

		header('location: minichat.php');
	}
?>




