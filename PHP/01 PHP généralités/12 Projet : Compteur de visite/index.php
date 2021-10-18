<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="style.css"/>

    <title>Compteur de visite</title>
    
  </head>
  <body>
    <header>
        <h1>Super Site</h1>
    </header>

    <div class="container">
      <p>
        <?php
            
            $fichier = fopen('count.txt', 'r+');

            $compteur = fgets($fichier);
            $compteur++;
            
            fseek($fichier,0); 
            fputs($fichier, $compteur); 
            
            echo 'Vous êtes le visiteur no '.$compteur;

            fclose($fichier);
        ?>
      </p>
    </div>
</body>
</html>
            


            

            

            