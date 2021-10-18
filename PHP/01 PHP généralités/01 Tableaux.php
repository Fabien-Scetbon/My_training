<?php

    // tests sur les TABLEAUX

    // tableau numérique
    $array1 = [10,"Jean",true];
    $array1[3]="Barman"; // ajout donnée
    $array1[]="Rouge"; // ajout donnée à la suite

    // tableau associatif
    $array2 = ['nom' => 'Doe', 'prenom' => 'John', 'age' => 35, 'majeur' => true];
    $array2['metier']="Barman"; // ajout donnée
    $array2[]="Rouge"; // ajout donnée avec clé = 0


    echo 'Affiche arrays <br/>';

    echo '<pre>'; // pour belle presentation
    print_r( $array1);
    echo '</pre>';

    echo '<br/>';

    echo '<pre>';
    print_r( $array2);
    echo '</pre>';
    
    echo '<br/>';

    echo 'Affiche contenu array1 <br/>';
    foreach($array1 as $element)
        {
            echo '<p>'.$element.'</p>'; // n'affiche pas booleen !?
        }

    if(!$array1[2]) {

        echo 'prise en compte de $array[2]<br/>'; // mais les prend en compte
    }

    echo 'Affiche contenu array2 <br/>';
    foreach($array2 as $element)
        {
            echo '<p>'.$element.'</p>'; // affiche 1 pour true et false ?!
        }

    echo 'Affiche contenu et libelle array1 <br/>';
    foreach($array1 as $libelle => $element)
        {
            echo '<p>'.$libelle.' vaut '.$element.'</p>';
        }

    echo 'Affiche contenu et libelle array2 <br/>';
    foreach($array2 as $libelle => $element)

        {
            echo '<p>'.$libelle.' vaut '.$element.'</p>';
        }

    // Fonctions sur les tableaux :

    // Rechercher une cle dans un tableau (renvoie true ou false)

    if(array_key_exists('prenom', $array2)) { 
        echo 'La cle prenom existe dans array2<br/>';
    }

    if(!array_key_exists('ville', $array2)) {
        echo 'La cle ville n existe pas dans array2<br/>';
    }

    // Rechercher une valeur dans un tableau numérique (renvoie true ou false)

    if(in_array('Jean', $array1, true)) { // on ajoute l'option true 
        echo 'La valeur Jean existe dans array1<br/>';
    }

    if(!in_array('Paris', $array1, true)) {
        echo 'La valeur Paris n existe pas dans array1<br/>';
    }

    // Rechercher une valeur dans un tableau associatif (renvoie true ou false)

    if(in_array('Barman', $array2, true)) {
        echo 'La valeur Barman existe dans array2<br/>';
    }


    if(!in_array('Paris', $array2, true)) {
        echo 'La valeur Paris n existe pas dans array2<br/>';
    }

    // Recuperer cle d'une valeur

    $position = array_search('Jean', $array1);
    echo 'Jean est a la position '.$position.' dans array1<br/>';

    $position2 = array_search('Doe', $array2);
    echo 'Doe est a la position '.$position2.' dans array2';



    



    