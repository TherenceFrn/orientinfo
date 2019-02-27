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

    <div id="contact">

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

          <li class="navigation-bouton"><a href="<?php echo "profil.php?id=".$_SESSION['id']; ?>">Profil</a></li>

        </ul>

      </nav>

      </header>

      <main>

      <section class="section section-1">

      <h2> Formulaire de contact </h2>

      <h3> Si vous souhaitez nous contacter veuillez remplir ce formulaire </h3>

      <form id="form_id" class="contact-form" action="contact.php" method="post">

        <article>

        <label class="label-form" for="prenom">Prénom</label>
        <label class="label-form" for="nom">Nom</label>
        <label class="label-form" for="aide-select">Sujet</label>
        <label class="label-form" for="objet">Objet</label>
        <label class="label-form" for="mail">e-Mail</label>
        <label class="label-form" for="content">Contenu du mail</label>

        </article>

        <aside>

        <input type="text" class="input-formulaire" id="prenom" name="prenom" placeholder="Entrez votre prénom">

        <input type="text" class="input-formulaire" id="nom" name="nom" placeholder="Entrez votre nom">

        <select id="aide-select">

            <option value="">Veuillez choisir :</option>

            <option value="1">Aide par rapport aux abonnements</option>

            <option value="2">Aide à l'orientation</option>

            <option value="3">Renseignement par rapport à une école</option>

            <option value="3">Renseignement par rapport à une filière</option>

        </select>

        <input type="text" class="input-formulaire" id="objet" name="objet" placeholder="Objet du mail">

        <input type="text" class="input-formulaire" id="mail" name="mail" placeholder="Votre adresse e-Mail">

        <textarea class="input-formulaire" id='content' name="content" placeholder="Votre adresse e-Mail">

        </textarea>

        </aside>

      </form>

      </section>

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
