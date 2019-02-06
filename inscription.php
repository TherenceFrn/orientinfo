<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
  <fieldset>
  <legend>Inscrivez - vous </legend>
  <form class="formulaire_inscr" action="test.php" method="post">
    <input type="text" placeholder="Prenom" name="Prenom" />
    <input type="text" placeholder="Nom" name="Nom" />
    <input type="email" placeholder="Entrez votre adresse mail" name="Email" />
    <input type="text" placeholder="Ville" name="Ville" />
    <input type="text" placeholder="Ecole" name="Ecole" />
    <input type="textarea" name="Biographie" placeholder="Biographie...">
    <input type="text" name="Motdepasse" placeholder="Mot de passe"/>
    <input type="submit" value="S'inscrire">
    <input type="reset" value="Reinitialiser les valeurs">
  </form>
  </fieldset>

  <?php


  $connexion = new PDO('mysql:host=localhost;dbname=orientinfo;charset=utf8', 'root', '', array(

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
  ));

  if(!empty($_POST['Nom']) || !empty($_POST['Prenom']) || !empty($_POST['Email']) || !empty($_POST['Ville']) || !empty($_POST['Ecole']) || !empty($_POST['Biographie']) || !empty($_POST['Motdepasse'])){

      $_POST['Motdepasse'] = sha1($_POST['Motdepasse']);

      $requete = $connexion -> prepare("INSERT INTO `utilisateur`(`nom`, `prenom`, `email`, `ville`, `ecole`, `biographie`, `motdepasse`) VALUES (?,?,?,?,?,?,?)");

      $requete -> execute(array(
        $_POST['Nom'],
        $_POST['Prenom'],
        $_POST['Email'],
        $_POST['Ville'],
        $_POST['Ecole'],
        $_POST['Biographie'],
        $_POST['Motdepasse'],
    ));

    $_POST['Nom'] = null;
    $_POST['Prenom'] = null;
    $_POST['Email'] = null;
    $_POST['Ville'] = null;
    $_POST['Ecole'] = null;
    $_POST['Biographie'] = null;
    $_POST['Motdepasse'] = null;

    }


  // AFFICHER LES UTILISATEURS

  $resultats = $connexion -> query('SELECT * FROM utilisateur');

  $tableauresultats = $resultats -> fetchAll();

  foreach ($tableauresultats as $ligne) {

  echo "<p>".$ligne -> id;

  echo " - ".$ligne -> nom;

  echo " - ".$ligne -> prenom;

  echo " - ".$ligne -> email;

  echo " - ".$ligne -> ville;

  echo " - ".$ligne -> ecole;

  echo " - ".$ligne -> biographie;

  echo " - ".$ligne -> motdepasse."</p>";

  }



 ?>

  </body>
</html>
