<?php

    if(isset($_COOKIE['auth']) && !isset($_SESSION['connect'])) { // 2eme partie permet de ne pas recharger ce script a chaque fois

        $secret = htmlspecialchars($_COOKIE['auth']);

        // Verification

        require('src/connect.php');

        $requete = $bdd->prepare("SELECT count(*) as numberAccount FROM usersNetflix WHERE secret = ?");
        $requete->execute(array($secret));

        while($user = $requete->fetch()) {

            if($user['numberAccount'] == 1) {
                
                $reqUser = $bdd->prepare("SELECT * FROM usersNetflix WHERE secret = ?");
                $reqUser->execute(array($secret));

                while($userAccount = $reqUser->fetch()) {

                    $_SESSION['connect'] = 1; 
                    $_SESSION['email'] 	 = $userAccount['email'];
                }

            }
        }
    }

// test si user blocked

    if(isset($_SESSION['connect'])) {

        require('src/connect.php');

        $reqUser = $bdd->prepare("SELECT * FROM usersNetflix WHERE email = ?");
        $reqUser->execute(array($_SESSION['email']));

        while($userAccount = $reqUser->fetch()) {

            if($userAccount['blocked'] == 1) {
                header('location: logout.php'); // pourquoi sans ../ ?
                exit();
            }
        }
    }

