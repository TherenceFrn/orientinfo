<?php session_start(); ?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="formulaire_inscr" action="" method="post">
      <h3>Inscription</h3>
      <table>
        <tr>
          <td>
            <label for="Prenom">Prenom :</label>
          </td>
          <td>
            <input type="text" placeholder="Prenom" name="Prenom" id="Prenom" value="<?php if(isset($Prenom)){ echo $Prenom;} ?>"/>
          <td>
        </tr>
        <tr>
          <td>
            <label for="Nom">Nom :</label>
          </td>
          <td>
            <input type="text" placeholder="Nom" name="Nom" id="Nom" value="<?php if(isset($Nom)){ echo $Nom;} ?>"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="Email">Email :</label>
          </td>
          <td>
            <input type="email" placeholder="Entrez votre adresse mail" name="Email" id="Email"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="Email2">Confirmation Email :</label>
          </td>
          <td>
            <input type="email" placeholder="Confirmez votre adresse mail" name="Email2" id="Email2"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="Motdepasse">Mot de passe :</label>
          </td>
          <td>
            <input type="password" name="Motdepasse" placeholder="Mot de passe" id="Motdepasse"/>
          </td>
        </tr>
        <tr>
          <td>
            <label for="Motdepasse2">Confirmation Mot de passe :</label>
          </td>
          <td>
            <input type="password" name="Motdepasse2" placeholder="Confirmation Mot de passe" id="Motdepasse2"/>
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="S'inscrire" name="forminscription">
          </td>
          <td>
            <input type="reset" value="Reinitialiser les valeurs">
          </td>
        </tr>
        <tr>
          <td colspan=2>
            <a href="index.php">Acceuil</a>
          </td>
        </tr>
      </table>

    </form>

  <?php


  $connexion = new PDO('mysql:host=localhost;dbname=orientinfo;charset=utf8', 'root', '', array(

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'",
  ));

  if(isset($_POST['forminscription']))
  {

    $Prenom = htmlspecialchars($_POST['Prenom']);
    $Nom = htmlspecialchars($_POST['Nom']);
    $Mail = htmlspecialchars($_POST['Email']);
    $Mail2 = htmlspecialchars($_POST['Email2']);
    $Mdp = sha1($_POST['Motdepasse']);
    $Mdp2 = sha1($_POST['Motdepasse2']);

    if(!empty($_POST['Prenom']) AND !empty($_POST['Nom']) AND !empty($_POST['Email']) AND !empty($_POST['Email2']) AND !empty($_POST['Motdepasse']) AND !empty($_POST['Motdepasse2'])){

      $Prenom_L = strlen($Prenom);
      $Nom_L = strlen($Nom);

        if($Prenom_L <= 255){

          if($Nom_L <= 255){

              if ($Mail == $Mail2) {

                if(filter_var($Mail, FILTER_VALIDATE_EMAIL)){

                    $reqmail = $connexion->prepare("SELECT * FROM membres WHERE mail=?");

                    $reqmail->execute(array(
                    $Mail
                    ));

                    $mailexist = $reqmail->rowCount();

                    if($mailexist == 0){

                        if ($Mdp == $Mdp2) {

                          $requete = $connexion->prepare("INSERT INTO membres(prenom, nom, mail, motdepasse) VALUES(?,?,?,?)");

                          $requete->execute(array($Prenom, $Nom, $Mail, $Mdp));

                          $erreur = 'Compte crée';

                        }else{

                        $erreur = "Vos mots de passe ne correspondent pas";
                        }

                      }else{

                      $erreur = "Mail déja pris";
                      }

                  }else{

                    $erreur = 'Votre adresse mail n\'est pas valide';
                  }

              }else{

              $erreur = "Vos adresses mails ne correspondent pas";
              }

          }else{

          $erreur = "Nom trop long";
          }

        }else{

        $erreur = "Prenom trop long";
        }

    }
    else{
      $erreur = "Tous les champs doivent être complétés !";
    }

  }

  // Affiche le message d'erreur
  if(isset($erreur)){
  echo $erreur;
  }


  // if(!empty($_POST['Nom']) || !empty($_POST['Prenom']) || !empty($_POST['Email']) || !empty($_POST['Ville']) || !empty($_POST['Ecole']) || !empty($_POST['Biographie']) || !empty($_POST['Motdepasse'])){
  //
  //     $_POST['Motdepasse'] = sha1($_POST['Motdepasse']);
  //
  //     $requete = $connexion -> prepare("INSERT INTO `utilisateur`(`nom`, `prenom`, `email`, `ville`, `ecole`, `biographie`, `motdepasse`) VALUES (?,?,?,?,?,?,?)");
  //
  //     $requete -> execute(array(
  //       $_POST['Nom'],
  //       $_POST['Prenom'],
  //       $_POST['Email'],
  //       $_POST['Ville'],
  //       $_POST['Ecole'],
  //       $_POST['Biographie'],
  //       $_POST['Motdepasse'],
  //   ));
  //
  //   $_POST['Nom'] = null;
  //   $_POST['Prenom'] = null;
  //   $_POST['Email'] = null;
  //   $_POST['Ville'] = null;
  //   $_POST['Ecole'] = null;
  //   $_POST['Biographie'] = null;
  //   $_POST['Motdepasse'] = null;
  //
  //   }
  //
  //
  // // AFFICHER LES UTILISATEURS
  //
  // $resultats = $connexion -> query('SELECT * FROM utilisateur');
  //
  // $tableauresultats = $resultats -> fetchAll();
  //
  // foreach ($tableauresultats as $ligne) {
  //
  // echo "<p>".$ligne -> id;
  //
  // echo " - ".$ligne -> nom;
  //
  // echo " - ".$ligne -> prenom;
  //
  // echo " - ".$ligne -> email;
  //
  // echo " - ".$ligne -> ville;
  //
  // echo " - ".$ligne -> ecole;
  //
  // echo " - ".$ligne -> biographie;
  //
  // echo " - ".$ligne -> motdepasse."</p>";
  //
  // }



 ?>

  </body>
</html>
