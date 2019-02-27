<?php session_start(); ?>


<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="formulaire_inscr" action="" method="post">
    <h3>Connexion</h3>
      <table>
        <tr>
          <td>
            <label for="emailCo">E-Mail:</label>
          </td>
          <td>
            <input type="email" placeholder="EMail" name="EmailCo" id="emailCo">
          </td>
        </tr>
        <tr>
          <td>
            <label for="mdpCo">Mot de passe</label>
          </td>
          <td>
            <input type="password" placeholder="Mot de passe" name="MdpCo" id="mdpCo">
          </td>
        </tr>
        <tr>
          <td>
            <input type="submit" value="Se connecter" name="formCo">
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

  if(isset($_POST['formCo'])){

    $emailCo = htmlspecialchars($_POST['EmailCo']);
    $mdpCo = sha1($_POST['MdpCo']);

      if(!empty($emailCo) AND !empty($mdpCo)){

        $requser = $connexion->prepare("SELECT * FROM membres WHERE mail=? AND motdepasse=?");
        $requser->execute(array($emailCo, $mdpCo));
        $userexist = $requser->rowCount();
          if($userexist == 1){

            $userinfo = $requser->fetch();
            $_SESSION['id']=$userinfo->id;
            $_SESSION['Prenom']=$userinfo->prenom;
            $_SESSION['Nom']=$userinfo->nom;
            $_SESSION['Email']=$userinfo->mail;
            header("Location: profil.php?id=".$_SESSION['id']);
          }else {
            $erreur = 'Mauvais ID';
          }

      }else{
        $erreur = "Tous les champs doivent être complétés";
      }
  }

  // Affiche le message d'erreur
  if(isset($erreur)){
  echo $erreur;
  }


 ?>
  </body>
</html>
