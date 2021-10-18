<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css"/>

    <title>SecretFiles</title>
    
  </head>
  <body>
    <header>
        <h1>SecretFiles</h1>
    </header>
    <div class="container">
        <p>Entrez le mot de passe afin de poursuivre sur le site :</p>
        <div id="form">
            <form method="post" action="formulaire.php">
				<input type="password" name="password" />
				<button type="submit">Envoyer</button>
            </form>
            
            <?php
                if(isset($_POST['password'])) { 														  

                    $password = htmlspecialchars($_POST['password']); 

                        if($password == 'kangourou') {

                            header('location: secret.php'); 

                        } else { 

                            echo'<div id="error">Le mot de passe est incorrect.</div>';
                        }
                    }
                ?>
            
        </div>
    </div>
</body>
</html>
            



