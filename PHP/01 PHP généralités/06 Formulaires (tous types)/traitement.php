<?php
	// Formulaire

	if(isset($_POST['prenom']) && isset($_POST['nom'])) {  // on verifie si on reçoit les données prenom 														   et nom ( ou GET )

		$prenom = htmlspecialchars($_POST['prenom']); // evite que l'utilisateur entre du code malveillant
												      // execute le code en tant que texte 
		$nom = htmlspecialchars($_POST['nom']);

			if(isset($_POST['maj'])) {

				echo'Bonjour '.$prenom.' '.$nom.' ! Vous êtes majeur.';
			} else {
				echo'Bonjour '.$prenom.' '.$nom.' ! Vous êtes mineur.';
			}
		}

	