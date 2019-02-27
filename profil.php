<?php session_start();

$connexion = new PDO('mysql:host=localhost;dbname=orientinfo;charset=utf8', 'root', '', array(
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
  PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
));

if(isset($_GET['id']) AND $_GET['id'] > 0){

  $getid = intval($_GET['id']);
  $requser = $connexion->prepare('SELECT * FROM membres WHERE id=?');
  $requser->execute(array($getid));

  $userinfo = $requser->fetch();
?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <h2>Profil de <?php echo $userinfo->prenom; echo " "; echo $userinfo->nom; ?></h2>
  <h3>Nom : <?php echo $userinfo->nom; ?></h3>
  <h3>Prenom : <?php echo $userinfo->prenom; ?></h3>
  <h3>E-Mail : <?php echo $userinfo->mail; ?></h3>
  <h3>Mot de passe : <?php echo $userinfo->motdepasse; ?></h3>

  <?php

  if(isset($_SESSION['id']) AND $userinfo->id == $_SESSION['id']){
  ?>
  <a href="#">Editer mon profil</a>
  <a href="deconnexion.php">Se deconnecter</a>
  <a href="article_new.php">Ecrire un article</a>
  <a href="index.php">Acceuil</a>
  <?php
  }
 ?>
  </body>
</html>
<?php
}else {

header('Location: connexion.php');
}
 ?>
