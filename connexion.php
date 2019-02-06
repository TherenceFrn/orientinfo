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
                <form class="formulaire_inscr" action="connexion.php" method="post">
                  <input type="email" placeholder="Entrez votre adresse mail" name="Email" />
                  <input type="text" name="Motdepasse" placeholder="Mot de passe"/>
                  <input type="submit" value="Se connecter">
                  <a href="inscription.php"><input type="button" value="S\'inscrire"></a>
                </form>
              </fieldset>';

          $emailreqlof = 'SELECT * FROM utilisateur WHERE email='.$_POST["Email"];

          $requete = $connexion -> prepare($emailreqlof);

          $requete -> execute();

          }



 ?>

  </body>
</html>
