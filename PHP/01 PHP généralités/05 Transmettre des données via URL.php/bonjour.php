<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Transmettre donnees</title>
    
  </head>
  <body>
    <p>
    <?php 
        if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['repeter'])) { // securité anti plantage de site
            
            $nbRepetitions = (int) $_GET['repeter']; // tente de convertir en entier
            
            if ($nbRepetitions > 0 && $nbRepetitions < 20) {
            
                for ($repetition = 0; $repetition < $_GET['repeter']; $repetition++) {

                    echo '<p>Bonjour '.$_GET['prenom'].' '.$_GET['nom'].'</p>';

                } 
            } else {

                echo 'Nombre de répétitions invalide !';
            }

        } else {

                echo 'Problème d identification !';
        }
    ?>
    </p>
   
</body>
</html>