<?php

session_start();
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <?php


  $connexion = new PDO('mysql:host=localhost;dbname=orientinfo;charset=utf8', 'root', '', array(

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
  ));

    if(!isset($_SESSION['Motdepasse']) || !isset($_SESSION['Email'])){

      echo '<fieldset>
              <legend>Connectez-vous</legend>
                <form class="formulaire_inscr" action="verif_log.php" method="post">
                  <input type="email" placeholder="Entrez votre adresse mail" name="Email" />
                  <input type="text" name="Motdepasse" placeholder="Mot de passe"/>
                  <input type="submit" value="Se connecter">
                  <a href="inscription.php"><input type="button" value="S\'inscrire"></a>
                </form>
              </fieldset>';


      }else{

        echo $_SESSION['Email'];

        $emaillog = $_SESSION['Email'];

        $requete = $connexion -> prepare("SELECT count(*) FROM utilisateur WHERE email='$emaillog'");

        $isOK = $requete -> execute(array());

        //afficher l'adresse mail

        // if($isOK){
        //   $tab_utilisateur = $requete -> fetch();
        //   var_dump($tab_utilisateur);
        //
        // }

      }

    // session_destroy();
 ?>

  </body>
</html>
