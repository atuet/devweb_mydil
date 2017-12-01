<!DOCTYPE html>
<?php
session_start();

  $bdd = new PDO('mysql:host=127.0.0.1;dbname=phpmyadmin', 'root', '');

            if(isset($_POST['valider'])) {
              $mailconnect=$_POST['mail'];
              $mdpconnect=$_POST['password'];
               if(!empty($mailconnect) AND !empty($mdpconnect)) {
                  $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE mail = ? AND password = ?");
                  $requser->execute(array($mailconnect, $mdpconnect));
                  $userexist = $requser->rowCount();
                  if($userexist == 1) {
                     $userinfo = $requser->fetch();
                     $_SESSION['id'] = $userinfo['id'];
                     $_SESSION['nom'] = $userinfo['nom'];
                     $_SESSION['prenom'] = $userinfo['prenom'];
                     $_SESSION['mail'] = $userinfo['mail'];
                     $_SESSION['type'] = $userinfo['type'];
                     header("Location: navigation.php?id=".$_SESSION['id'].$_SESSION['type']);
                  } else {
                     $erreur = "Mauvais mail ou mot de passe !";
                  }
               } else {
                  $erreur = "Tous les champs doivent être complétés !";
               }
            }


?>
<html>
  <link rel="stylesheet" type="text/css" href="stylemd.css"/>
  <head>
    <meta charset="utf-8">
    <title>Connexion</title>
  </head>
  <body>
    <div id="titre" class="all">
      <video preload="auto" autoplay="true" loop="loop" muted="muted" poster="backgroundvid1.mp4">
      <source src="backgroundvid1.mp4" type="video/mp4">
    </video>
    <div class="title" align="center">
      <div class="titreconnexion">
        <label>Connexion</label>
      </div>
        <form method='post' action="">
        <div class="formulaireconnection" align="center">
          <div class="champsconnexion">
          <h4 class="formco">Adresse Mail</h4>
          <input type="email" name="mail" class="formulaireco">

          <h4 class="formco">Mot de passe</h4>
          <input type="password" name="password" class="formulaireco">
        </div>
          <div class="validerconnexion">
            <input type="submit" name="valider" value="Valider" class="bouton" align="center">
        </form>
        <?php
         if(isset($erreur)) {
            echo '<font color="red">'.$erreur."</font>";
         }
         ?>
        </div>
    </div>
  </div>
  </body>
</html>
