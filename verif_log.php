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

    if(!isset($_SESSION['Motdepasse']) || !isset($_SESSION['Email']) || isset($_POST['Motdepasse']) || isset($_POST['Email']) ){

      $_SESSION['Motdepasse'] = sha1($_POST['Motdepasse']);

      $_SESSION['Email'] = $_POST['Email'];

      //MONTRE L'EMAIl

      echo $_SESSION['Email']."<br>";

      //MONTRE LE MOT DE PASSE

      echo $_SESSION['Motdepasse']."<br>";

      $emaillog = $_SESSION['Email'];

      $requete = $connexion -> prepare("SELECT COUNT(*) as countid FROM utilisateur WHERE email='$emaillog'");

      // $isOK = $requete -> execute(array());

      //MONTRE LE NOMBRE DE LIGNE QUI UTILISE L'EMAIL

      // if($isOK){
      //   $tab_utilisateur = $requete -> fetch();
      //   var_dump($tab_utilisateur);
      // }
      //
      // $tabluL = count($tab_utilisateur);
      //
      // echo $tabluL;

      $nbligne = $requete -> fetch();

      $emailexiste = $nbligne['countid'];

      echo "<br>".$emailexiste;

      if($emailexiste == 1){
      //SI L'EMAIL EST ENREGISTRE

      }else{
      //SI L'EMAIL N'EXISTE PASSE
      ?><script>alert('Vérifiez votre adresse mail');</script><?php

      }

    }



 ?>

  </body>
</html>
