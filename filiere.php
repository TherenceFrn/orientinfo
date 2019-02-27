<?php session_start();
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">

    <title>Orient'Info</title>

    <link rel="stylesheet" type="text/css" href="style/style.css">

  </head>

  <body>

    <div id="filiere">

      <header class="header">

      <nav>

        <ul class="navigation">

          <li class="navigation-bouton"><a href="index.php">Acceuil</a></li>

          <li class="navigation-bouton"><a href="magazine.php">Magazine</a></li>

          <li class="navigation-bouton"><a href="filiere.php">Les Filières</a></li>

          <li class="navigation-bouton"><a href="ecole.php">Les Ecoles</a></li>

          <li class="navigation-bouton"><a href="temoignages.php">Temoignages</a></li>

          <li class="navigation-bouton"><a href="contact.php">Contact</a></li>

          <li class="navigation-bouton"><a href="etude.php">Etudes</a></li>

          <li class="navigation-bouton"><a href="<?php
            if(isset($_SESSION['id']))
              {echo "profil.php?id=".$_SESSION['id'];
            }else{echo "profil.php";
          } ?>">Profil</a></li>


        </ul>

      </nav>

      </header>

      <main>

    <?php

    $connexion = new PDO('mysql:host=localhost;dbname=orientinfo;charset=utf8', 'root', '', array(

      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
    ));

    $resultats = $connexion -> query("SELECT * FROM article WHERE type='filiere' ORDER BY id DESC LIMIT 10");

    $tableauresultats = $resultats -> fetchAll();

    foreach ($tableauresultats as $ligne) {

    echo "<a href='errorarticle.php'>";

    echo "<section class='magazine'><div class='texte-article'>";

    echo "<h2>".$ligne -> filiere."</h2>";

    echo "</div></section></a>";

    };

    ?>

      </main>

      <footer>

        <ul class="footer">

          <li class="footer-bouton">Orient'Info</li>

          <li class="footer-bouton">Nous contacter</li>

          <li class="footer-bouton">CGU</li>

          <li class="footer-bouton">Réseaux Sociaux</li>

          <li class="footer-bouto">

          <ul class="reso-footer">

          <li><a href="#" id="reso-1">Twitter</a></li>

          <li><a href="#" id="reso-2">Facebook</a></li>

          <li><a href="#" id="reso-3">Instagram</a></li>

          <li><a href="#" id="reso-4">LinkedIn</a></li>

          </ul>

          </li>

        </ul>

      </footer>

    </div>

  </body>

</html>
