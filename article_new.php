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

  <fieldset class="">
  <legend>Nouvel article</legend>
  <form id="form_id" class="" action="article_new_trait.php" method="post">

  <select name="type">
    <option value="filiere">Filière</option>
    <option value="ecole">Ecole</option>
    <option value="temoignage">Témoignage</option>
  </select>
  <input type="text" name="formation" placeholder="Nom de la formation">
  <input type="text" name="filiere" placeholder="Filiere">
  <input type="text" name="ecole" placeholder="Ecole">
  <input type="text" name="auteur" placeholder="Auteur">
  <input type="file">
  <label class="" for="duree">Choisir une durée</label>
  <select name="duree">
    <option value="1">1 An</option>
    <option value="2">2 Ans</option>
    <option value="3">3 Ans</option>
    <option value="4">4 Ans</option>
    <option value="5">5 Ans</option>
    <option value="6">6 Ans</option>
    <option value="7">7 Ans</option>
    <option value="8">8 Ans</option>
    <option value="9">9 Ans</option>
    <option value="10">10 Ans</option>
  </select>
  <input type="textarea" name="description" placeholder="Régidez l'article">
  <input type="submit" value="Créez l'article">
  <input type="reset" value="Réinitialiser">
  </form>
  </fieldset>

  <?php


  $connexion = new PDO('mysql:host=localhost;dbname=orientinfo;charset=utf8', 'root', '', array(

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
  ));

 ?>

  </body>
</html>
