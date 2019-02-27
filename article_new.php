<?php

session_start();
if(!isset($_SESSION['Prenom'])){
header('Location: connexion.php');
}else{

}
 ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style>
      table{
        border: 1px solid black;
        margin: 0;
        padding: 0;
        }
      td{
          border-bottom: 1px solid black;
        }
      tr:last-child td{
          border-bottom: 1px solid white;
        }
      fieldset{
          display: block;
      }
    </style>
  </head>
  <body>
  <fieldset>
  <legend>Menu</legend>
  <a href="<?php echo "profil.php?id=".$_SESSION['id'];?>">Profil</a>
  <a href="deconnexion.php">Deconnexion</a>
  <a href="magazine.php">Magazine</a>
  </fieldset>

  <fieldset>
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

    // $requete = $connexion -> prepare("SELECT * FROM article ORDER BY id DESC");
    //
    // $insertart = $requete->execute(

    $resultats = $connexion -> query("SELECT * FROM article ORDER BY id DESC");

    $tableauresultats = $resultats -> fetchAll();

    echo "<fieldset><table><thead><td>id</td><td>type</td><td>filiere</td><td>ecole</td><td>date_art</td><td>auteur</td><td>image</td><td>duree</td><td>description</td><td>formation</td></thead><tbody>";

    foreach ($tableauresultats as $ligne) {

    echo "<tr><td>".$ligne -> id."</td>";

    echo "<td>".$ligne -> type."</td>";

    echo "<td>".$ligne -> filiere."</td>";

    echo "<td>".$ligne -> ecole."</td>";

    echo "<td>".$ligne -> date_art."</td>";

    echo "<td>".$ligne -> auteur."</td>";

    echo "<td>".$ligne -> image."</td>";

    echo "<td>".$ligne -> duree."</td>";

    echo "<td>".$ligne -> description."</td>";

    echo "<td>".$ligne -> formation."</td></tr>";

    };

    echo "</tbody></table>";


    // $resultats = $connexion -> query("SELECT * FROM article WHERE type='filiere' ORDER BY id DESC ");

    $requete = $connexion->prepare("SELECT * FROM article WHERE auteur=? ORDER BY id DESC ");

    $requete->execute(array($_SESSION["Prenom"]));

    $tableauresultats = $requete -> fetchAll();

    echo "<h1> Auteur connecté : ".$_SESSION['Prenom']."</h1><table><thead><td>id</td><td>filiere</td><td>ecole</td><td>date_art</td><td>auteur</td><td>image</td><td>duree</td><td>description</td><td>formation</td></thead><tbody>";

    foreach ($tableauresultats as $ligne) {

    echo "<tr><td>".$ligne -> id."</td>";

    echo "<td>".$ligne -> filiere."</td>";

    echo "<td>".$ligne -> ecole."</td>";

    echo "<td>".$ligne -> date_art."</td>";

    echo "<td>".$ligne -> auteur."</td>";

    echo "<td>".$ligne -> image."</td>";

    echo "<td>".$ligne -> duree."</td>";

    echo "<td>".$ligne -> description."</td>";

    echo "<td>".$ligne -> formation."</td></tr>";

    };

    echo "</tbody></table>";

    $resultats = $connexion -> query("SELECT * FROM article WHERE type='filiere' ORDER BY id DESC ");

    $tableauresultats = $resultats -> fetchAll();

    echo "<h1>Les Filieres</h1><table><thead><td>id</td><td>filiere</td><td>ecole</td><td>date_art</td><td>auteur</td><td>image</td><td>duree</td><td>description</td><td>formation</td></thead><tbody>";

    foreach ($tableauresultats as $ligne) {

    echo "<tr><td>".$ligne -> id."</td>";

    echo "<td>".$ligne -> filiere."</td>";

    echo "<td>".$ligne -> ecole."</td>";

    echo "<td>".$ligne -> date_art."</td>";

    echo "<td>".$ligne -> auteur."</td>";

    echo "<td>".$ligne -> image."</td>";

    echo "<td>".$ligne -> duree."</td>";

    echo "<td>".$ligne -> description."</td>";

    echo "<td>".$ligne -> formation."</td></tr>";

    };

    echo "</tbody></table>";

    $resultats = $connexion -> query("SELECT * FROM article WHERE type='ecole' ORDER BY id DESC ");

    $tableauresultats = $resultats -> fetchAll();

    echo "<h1>Les Ecoles</h1><table><thead><td>id</td><td>filiere</td><td>ecole</td><td>date_art</td><td>auteur</td><td>image</td><td>duree</td><td>description</td><td>formation</td></thead><tbody>";

    foreach ($tableauresultats as $ligne) {

    echo "<tr><td>".$ligne -> id."</td>";

    echo "<td>".$ligne -> filiere."</td>";

    echo "<td>".$ligne -> ecole."</td>";

    echo "<td>".$ligne -> date_art."</td>";

    echo "<td>".$ligne -> auteur."</td>";

    echo "<td>".$ligne -> image."</td>";

    echo "<td>".$ligne -> duree."</td>";

    echo "<td>".$ligne -> description."</td>";

    echo "<td>".$ligne -> formation."</td></tr>";

    };

    echo "</tbody></table>";

    $resultats = $connexion -> query("SELECT * FROM article WHERE type='temoignage' ORDER BY id DESC ");

    $tableauresultats = $resultats -> fetchAll();

    echo "<h1>Les Temoignages</h1><table><thead><td>id</td><td>filiere</td><td>ecole</td><td>date_art</td><td>auteur</td><td>image</td><td>duree</td><td>description</td><td>formation</td></thead><tbody>";

    foreach ($tableauresultats as $ligne) {

    echo "<tr><td>".$ligne -> id."</td>";

    echo "<td>".$ligne -> filiere."</td>";

    echo "<td>".$ligne -> ecole."</td>";

    echo "<td>".$ligne -> date_art."</td>";

    echo "<td>".$ligne -> auteur."</td>";

    echo "<td>".$ligne -> image."</td>";

    echo "<td>".$ligne -> duree."</td>";

    echo "<td>".$ligne -> description."</td>";

    echo "<td>".$ligne -> formation."</td></tr>";

    };

    echo "</tbody></table>";

    echo "</fieldset>";

 ?>

  </body>
</html>
