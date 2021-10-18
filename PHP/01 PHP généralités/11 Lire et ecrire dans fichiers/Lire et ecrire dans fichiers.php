<?php
    // Lire et ecrire dans un fichier

    // MODE
    // r Lire le fichier
    // r+ Lire et ecrire dans le fichier et ecrase le contenu
    // a Lire le fichier et le cree s'il n'existe pas 
    // a+ Lire le fichier et le cree s'il n'existe pas et ecrit a la suite du fichier 

    // ouvrir

    $fichier = fopen('count.txt', 'r+'); // extension txt inutile

    // positionner curseur dans fichier (pas avec a et a+)
    // fseek($fichier, i); ou i est le no du curseur

    // ecrire valeur dans fichier

    fputs($fichier, 'Hello World'); // ecrit dans count.txt du texte

    // lire
       
    // avec file
    $lines = file("count.txt");
        foreach($lines as $n => $line){
            echo $line . "<br />";
        }

    // avec file get contents
    $pages = file_get_contents("count.txt");
    echo $pages;
    echo'<br />';

    // avec
    // fgets()  lire une ligne (boucler pour avoir tout, chaque appel envoie ligne suivante)
    // fgetc()  lire caractere (moins utile)
    fseek($fichier,0); // ne marche pas sans ça car pointeur en fin de fichier
    $ligne = fgets($fichier); 
    echo $ligne;


    // fermer

    fclose($fichier);

    