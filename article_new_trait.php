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

  $urlimage = 'image/image-1.png';
  $date_art = date(NOW());

  $connexion = new PDO('mysql:host=localhost;dbname=orientinfo;charset=utf8', 'root', '', array(

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
  ));

  if(isset($_POST['type']) || isset($_POST['formation']) ||  isset($_POST['filiere']) || isset($_POST['ecole']) || isset($_POST['auteur']) || isset($_POST['duree']) || isset($_POST['description'])){

  $requete = $connexion -> prepare("INSERT INTO article(type, filiere, ecole, date_art, auteur, image, duree, description, formation) VALUES (?,?,?,?,?,?,?,?,?)");

  $insertart = $requete->execute(array(
    $_POST['type'],
    $_POST['filiere'],
    $_POST['ecole'],
    $date_art,
    $_POST['auteur'],
    $urlimage,
    $_POST['duree'],
    $_POST['description'],
    $_POST['formation']
    ));
  }
 ?>

  </body>
</html>
