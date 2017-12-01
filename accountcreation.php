<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="stylemd.css"/>
  <head>
    <meta charset="utf-8">
    <title>Créer un compte</title>
  </head>
  <body>
    <form method="post" action="">
    <div id="titre" class="all">
      <video preload="auto" autoplay="true" loop="loop" muted="muted" poster="backgroundvid1.mp4">
      <source src="backgroundvid1.mp4" type="video/mp4">
    </video>
    <div class="title">
      <div class="titreinscription" align="center">
        <label>Creer un compte</label>
      </div>
      <div class="formulaireinscription">
      <div class="div1">
      <h4 class="form">Nom</h4>
      <input type="text" name="nom" class="formulaire">

      <h4 class="form">Prénom</h4>
      <input type="text" name="prenom" class="formulaire">

      <h4 class="form">Mail</h4>
      <input type="email" name="mail" class="formulaire" value="@epsi.fr">
    </div>
    <div class="div2">
      <h4 class="form">Classe</h4>
      <div class="choixclasse">
      <select class="formulaire" name="classe">
        <option value="b1">B1</option>
        <option value="b2">B2</option>
        <option value="b3">B3</option>
        <option value="i4">I4</option>
        <option value="i5">I5</option>
        <option value="prof">Professeur</option>
      </select>
    </div>

      <h4 class="form">Mot de passe</h4>
      <input type="password" name="password" class="formulaire">

      <h4 class="form">Confirmer le Mot de passe</h4>
      <input type="password" name="password2" class="formulaire">
    </div>
    <div class="validerinscription">
      <input type="submit" name="valider" value="Valider" class="bouton">
      <?php
      $bdd = new PDO('mysql:host=127.0.0.1;dbname=phpmyadmin', 'root', '');

      if (!$bdd){
        die("Erreur de connection: "  .mysqli_connect_error());
      }

      if(isset($_POST['valider'])) {
      $nom=$_POST['nom'];
      $prenom=$_POST['prenom'];
      $mail=$_POST['mail'];
      $classe=$_POST['classe'];
      $password=$_POST['password'];
      $password2 =$_POST['password2'];
       if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['classe']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
                      if($password == $password2) {
                          $requete="INSERT INTO utilisateur (nom, prenom, mail, classe, password)
                          VALUES ('$nom' ,'$prenom' ,'$mail' ,'$classe' ,'$password')";
                          $bdd->query($requete);
                          $_SESSION['id'] = $userinfo['id'];
                          $_SESSION['nom'] = $userinfo['nom'];
                          $_SESSION['prenom'] = $userinfo['prenom'];
                          $_SESSION['mail'] = $userinfo['mail'];
                          $erreur = "<div class='comptecree'>
                            <h5>Votre compte à bien été créé !</h5>
                            <a href=\"navigation.php\"><code>Acceder au site</code></a>
                          </div>";
                        } else {
                         $erreur = "Vos mots de passes ne correspondent pas !";
                      }

       } else {
          $erreur = "Tous les champs doivent être complétés !";
       }
      }

      ?>
      </div>
      </div>

      </form>
      <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
  </body>


</html>
