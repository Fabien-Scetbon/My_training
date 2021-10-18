<?php
// CONNEXION User
if(!empty($_POST['email']) && !empty($_POST['password'])) {

    require('src/connexBDD.php'); // comme include mais erreur bloquante si fichier indisponible
                                // connexion a bdd ici pour éviter surcharge bande passante site
    
    $email 			= htmlspecialchars($_POST['email']);
    $password 		= htmlspecialchars($_POST['password']);

    // chiffrage du mot de passe comme inscription
	$password = "a5q".sha1($password."d7f")."r9h";

    // recherche email dans bdd
    $requete = $bdd->prepare('SELECT COUNT(*) AS numberEmail FROM usersEspMb WHERE email = ?');
	$requete->execute(array($email));
		
	while($result = $requete->fetch()) {
		
		if($result['numberEmail'] != 1) { 

			header('location: connexion.php?error=1&emailinex=1'); 
			exit();
		} 
	}

	// verifier si email et mot de passe coincident
	$requete = $bdd->prepare('SELECT * FROM usersEspMb WHERE email = ?');
	$requete->execute(array($email));

		while($donnees = $requete->fetch()){

			if($donnees['password'] == $password) { 

                header('location: connexion.php?success=1');
				exit();

			} else { header('location: connexion.php?error=1&password=1');
					 exit();
			}
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="sstyle.css">
</head>
<body>
    <header>
        <h1>Connexion</h1>
    </header>
    <div class="container">
        <p id="info">Bienvenue sur mon site, si vous n'êtes pas inscrit, <a href="inscription.php">inscrivez-vous</a></p>
        
        <?php // affiche erreur si mdp differents

        if(isset($_GET['error'])) {
            if(isset($_GET['emailinex'])) {

                echo'<p id="error">Connexion impossible -mail-.</p>';

            } else if(isset($_GET['password'])) {

                echo'<p id="error">Connexion impossible -mdp-.</p>';

            } 
        }
        
        else if(isset($_GET['success'])) {

            echo'<p id="success">Connexion réussie.</p>';
            // header('location: page1.php');
        } 
        
        ?>

        <form method="post" action="connexion.php">
            <table>

                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" placeholder="Ex : fabino@gmail.com" required /></td>
                </tr>

                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="password" placeholder="Ex : ******" required /></td>
                </tr>
                
            </table>

            <button type="submit">Connexion</button>
        </form>
    </div>
</body>
</html>