<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">

    <title>Orient'Info</title>

    <link rel="stylesheet" type="text/css" href="style/style.css">

  </head>

  <body>

    <div id="temoignages">

      <header class="header">

      <nav>

        <ul class="navigation">

          <li class="navigation-bouton"><a href="index.php">Acceuil</a></li>

          <li class="navigation-bouton"><a href="magazine.php">Magazine</a></li>

          <li class="navigation-bouton"><a href="filiere.php">Les Filières</a></li>

          <li class="navigation-bouton"><a href="ecole.php">Les Ecoles</a></li>

          <li class="navigation-bouton"><a href="temoignages.php">Temoignages</a></li>

          <li class="navigation-bouton"><a href="contact.php">Contact</a></li>

          <li class="navigation-bouton"><a href="profil.php">Profil</a></li>

          <li class="navigation-bouton"><a href="article_new.php">Articles</a></li>

        </ul>

      </nav>

      </header>

      <main>

      <h1> Les Témoignages </h1>
    <?php
    $connexion = new PDO('mysql:host=localhost;dbname=orientinfo;charset=utf8', 'root', '', array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
    ));
    $resultats = $connexion -> query("SELECT * FROM article WHERE type='temoignage' ORDER BY id DESC LIMIT 10");
    $tableauresultats = $resultats -> fetchAll();
    foreach ($tableauresultats as $ligne) {
    echo '<section class="temoignage-1"><article>';
    echo "<p><strong>Ecole : </strong>".$ligne -> ecole."</p>";
    echo "<p><strong>Filiere : </strong>".$ligne -> filiere."</p>";
    echo "<p><strong>Description : </strong>".$ligne -> description."</p>";
    echo "<p><strong>Date : </strong>".$ligne -> date_art."</p>";
    echo '</article><aside><video width="600" height="337" controls="controls">';
    echo '<source src="content/videos/video1.mp4" type="video/mp4"><p>'. $ligne -> ecole .'</p></video><div><p>'. $ligne -> ecole.'</p></div></aside></section>';
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
