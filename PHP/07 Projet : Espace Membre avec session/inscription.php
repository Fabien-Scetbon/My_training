<?php

require('src/connexBDD.php');

// INSCRIPTION
// AJOUTE NOUVEL UTILISATEUR
if(!empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password_two'])) {

    // variables
    $pseudo 		= htmlspecialchars($_POST['pseudo']);
    $email 			= htmlspecialchars($_POST['email']);
    $password 		= htmlspecialchars($_POST['password']);
    $password_two 	= htmlspecialchars($_POST['password_two']); 

    // verifie si les deux password =

    if($password != $password_two) {  

        header('location: inscription.php?error=1&password=1');
        exit();
    }

    // verifie si mail existe deja
    $requete = $bdd->prepare('SELECT COUNT(*) AS numberEmail FROM usersEspMb WHERE email = ?');
	$requete->execute(array($email));
		
		while($result = $requete->fetch()) {
		
			if($result['numberEmail'] != 0) { 

				header('location: inscription.php?error=1&email=1');
				exit();
			}
		}

    // hash
	$secret = sha1($email).time();
	$secret = sha1($secret).time().time(); // double chiffrement

    // chiffrage du mot de passe
	$password = "a5q".sha1($password."d7f")."r9h"; // grains de sel 

    // envoi de la requete

    $requete = $bdd->prepare('INSERT INTO usersEspMb(pseudo, email, password, secret) VALUES(?, ?, ?, ?)');
	$requete->execute(array($pseudo, $email, $password, $secret));

	header('location: inscription.php?success=1');
	exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="sstyle.css">
</head>
<body>
    <header>
        <h1>Inscription</h1>
    </header>
    <div class="container">
        <p id="info">Bienvenue sur mon site, pour en voir plus, inscrivez-vous. Sinon, <a href="connexion.php">connectez-vous</a></p>
        
        <?php // affiche erreur si mdp differents

        if(isset($_GET['error'])) {
            if(isset($_GET['password'])) {

                echo'<p id="error">Les mots de passe ne sont pas identiques.</p>';

            } else if(isset($_GET['email'])) {

                echo'<p id="error">L\'adresse mail existe déja.</p>';

            } 
        }
        
        else if(isset($_GET['success'])) { 

            echo'<p id="success">Inscription réussie.</p>';
        }
        
        ?>

        <form method="post" action="inscription.php">
            <table>
                <tr>
                    <td>Pseudo</td>
                    <td><input type="text" name="pseudo" placeholder="Ex : Fabino" required /></td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td><input type="email" name="email" placeholder="Ex : fabino@gmail.com" required /></td>
                </tr>

                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="password" placeholder="Ex : ******" required /></td>
                </tr>

                <tr>
                    <td>Vérifier votre mot de passe</td>
                    <td><input type="password" name="password_two" placeholder="Ex : ******" required /></td>
                </tr>
            </table>

            <button type="submit">Inscription</button>
        </form>
    </div>
</body>
</html>


