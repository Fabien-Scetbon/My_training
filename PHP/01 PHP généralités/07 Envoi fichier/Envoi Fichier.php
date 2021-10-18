<?php

//ENVOI DE FICHIERS PHP
if(isset($_FILES['image']) && $_FILES['image']['error'] ==0){  //l'image existe et a été stockée temporairement sur le serveur

	// options possibles pour la file 'image'
	// $_FILES['image']['name']
	// $_FILES['image']['type']
	// $_FILES['image']['size'] 8Mo max
	// $_FILES['image']['tmp_name']  emplacement temporaire
	// $_FILES['image']['error']

	if ($_FILES['image']['size']<= 3000000){ //l'image fait moins de 3MO

		$informationsImage = pathinfo($_FILES['image']['name']); // cree tableau avec infos file
		$extensionImage = $informationsImage['extension'];
		$extensionsArray = array('png', 'gif', 'jpg', 'jpeg'); //extensions qu'on autorise

		if(in_array($extensionImage, $extensionsArray)){  // le type de l'image correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
			if(is_dir('uploads/')) {

    			echo 'Le dossier existe<br />';
				move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/'.time().basename($_FILES['image']['name'])); // on renomme notre image avec une clé unique suivie du nom du fichier
				echo 'Envoi bien réussi !' ;

			} else {

			    echo 'Le dossier n\'existe pas';
			}

			

		} else {
			echo 'L extension du fichier est invalide.';
		}
	} else {
		echo 'La taille du fichier est trop grande.';
	}
} 

// cree la variable $_FILES['image']

echo'<form method="post" action="Envoi Fichier.php" enctype="multipart/form-data">
	<p>
		<h1>Formulaire</h1>
		<input type="file" name="image" /><br />
		<button type="submit">Envoyer</button>  
		
	</p>
	</form>';

	