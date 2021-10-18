<?php  
    // ici on redirige l'user vers l'url raccourcie en utilisant la variable q definie plus loin
    if(isset($_GET['q'])) {

        $shortcut = htmlspecialchars($_GET['q']);

        $bdd = new PDO('mysql:host=localhost;dbname=formation_udemy;charset=utf8','fabino', 'MonopolI');
        
        // est-ce un shortcut de la bdd ?

        // occurence du shortcut dans bdd (on renome COUNT, x)
        $requete = $bdd->prepare('SELECT COUNT(*) AS x FROM links WHERE shortcut = ?');

        $requete->execute(array($shortcut));

        while($result = $requete->fetch()) {

            if($result['x'] != 1) {  // si occurence diff de 1 alors n'existe pas
                header('location: projet.php?error=true&message=Adresse non connue');
                exit();
            }
        }

        // redirection
        $requete = $bdd->prepare('SELECT * FROM links WHERE shortcut = ?');
        $requete->execute(array($shortcut));

        while($result = $requete->fetch()) {

            header('location: '.$result['url']);
            exit();
        }

      }

    if(isset($_POST['url'])) {

        $url = $_POST['url'];

        // verifie si l'adresse donnee est valide

        if(!filter_var($url, FILTER_VALIDATE_URL)) {
            header('location: projet.php?error=true&message=Adresse url non valide');
            // affiche cette ligne dans l'url sur la page en cas d'erreur
            exit(); // coupe le script au cas ou il y a plusieurs header
        }

        // creation shortcut
        $shortcut = crypt($url, rand()); // on ajoute un grain de sel time

        // on verifie si cette url raccourcie existe deja

        $bdd = new PDO('mysql:host=localhost;dbname=formation_udemy;charset=utf8','fabino', 'MonopolI');

        // occurence de l'url dans bdd (on renome COUNT, x)
        $requete = $bdd->prepare('SELECT COUNT(*) AS x FROM links WHERE url = ?');

        $requete->execute(array($url));

        while($result = $requete->fetch()) {

            if($result['x'] != 0) {  // si occurence >0 alors existe déja
                header('location: projet.php?error=true&message=Adresse déja raccourcie');
                exit();
            }
        }

        // envoi (connexion bdd déja effectuee)

        $requete = $bdd->prepare('INSERT INTO links(url , shortcut) VALUES(?, ?)');

        $requete->execute(array($url, $shortcut));

        header('location: projet.php?short='.$shortcut);
        exit();

    }
    ?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css"/>
    <link rel="icon" type="image/png" href="pictures/favico.png"> <!-- change icone dans onglet-->
    <title>Racourcisseur d'URL</title>
    
  </head>
  <body>

    <section id="hello">
      <div class="container">
        <header>
          <img src="pictures/logo.png" alt="logo" id="logo">
        </header>
        <h1>Une url longue ? Raccourcissez-la !</h1>
        <h2>Plus court et meilleur que les autres.</h2>
        <form method="post" action="projet.php">
          <input type="text" name="url" placeholder="Entrez l'url à raccourcir...">
          <button type="submit">Raccourcir</button>
        </form>

        <!-- ci dessous, mix entre html et php !! pour eviter de mettre trop de echo ?-->
        <?php if(isset($_GET['error']) && isset($_GET['message'])) { ?>
        <!-- erreur generee par index.php dans la barre url (methode GET pour aller voir) -->
        <!-- si erreur, on affiche le message sur la page -->
        <div class="center">
          <div id="result">
            <b><?php echo htmlspecialchars($_GET['message']);
            ?></b>
          </div>
        </div>
        <?php } else if(isset($_GET['short'])) { ?>
        <div class="center">
          <div id="result">
            <b>URL RACCOURCIE (copier/coller dans barre url):</br></b> <!-- on rajoute q= pour rediriger l'user (voir index.php) -->
            http://localhost/Dossier PHP/04 Projet : raccourcisseur d'URL (comme bit.ly)/projet.php?q=<?php echo htmlspecialchars($_GET['short']); ?>
          </div>
        </div> 
        <?php } ?> <!-- on ouvre php juste pour fermer } -->

      </div>
    </section>

    <section id="brands">
      <div class="container">
        <h3>Ces marques nous font confiance</h3>
        <img src="pictures/1.png" alt="logo" class="picture">
        <img src="pictures/2.png" alt="logo" class="picture">
        <img src="pictures/3.png" alt="logo" class="picture">
        <img src="pictures/4.png" alt="logo" class="picture">
      </div>
    </section>

    <footer>
      <img src="pictures/logo2.png" alt="logo" id="logo2">
      <p>2021@Bitly</p>
      <p><a href="#">Contact</a> - <a href="#">A propos</a></p>
    </footer>
   
  </body>
</html>