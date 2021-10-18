<?php

//ENVOI DE FICHIERS PHP
if(isset($_FILES['image']) && $_FILES['image']['error'] ==0){  //l'image existe et a été stockée temporairement sur le serveur

	$error = 1;

	if ($_FILES['image']['size']<= 3000000){ //l'image fait moins de 3MO

		$informationsImage = pathinfo($_FILES['image']['name']);
		$extensionImage = $informationsImage['extension'];
		$extensionsArray = array('png', 'gif', 'jpg', 'jpeg'); //extensions qu'on autorise

		if(in_array($extensionImage, $extensionsArray)){  // le type de l'image correspond à ce que l'on attend, on peut alors l'envoyer sur notre serveur
			$adress = 'uploads/'.time().rand().basename($_FILES['image']['name']); // pour etre reutilisee dans html

			move_uploaded_file($_FILES['image']['tmp_name'], $adress); // on renomme notre image avec une clé unique suivie du nom du fichier
			$error = 0; // image bien envoyee

		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Hebergeur d'images</title>
</head>
<style type="text/css">
	html, body { margin: 0; font-family: georgia;}
	header { text-align: center; color: white; background-color: orange; }
	article {margin-top: 50px; background: #f7f7f7; padding: 10px;}
	button {margin-top: 10px; background: #E6B981; border-radius: 10px;}
	h1 {margin-top: 0; text-align: center; color: #E8BC3A;}
	#presentation {text-align: center;}
	#image {max-width: 100px;}
	.container {width: 500px; margin: auto;}
</style>
<body>
	<header>
		<h2>Album Photos</h2>
	</header>
	<div class="container">
		<article>
			<h1>Hébergez une image</h1>

			<?php
				if(isset($error) && $error == 0) {
					echo'<div id="presentation">
							<img src="'.$adress.'" id="image" /><br/>

							<input type="text"
								value="http://localhost/'.$adress.'" />
						</div>';
				} else if(isset($error) && $error == 1) {
					echo'Erreur lors du téléchargement';
				}
			?>

			<form method="post" action="index.php" enctype="multipart/form-data">

			<p>
				<input type="file" required name="image"/><br/>
				<div style="text-align: center;">
					<button type="submit">Héberger</button>
				</div>
			</p>

		</article>
    </div>
</body>
</html>




