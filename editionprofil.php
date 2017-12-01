<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=phpmyadmin', 'root', '');

if(isset($_SESSION['id'])) {
   $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE id = ?");
   $requser->execute(array($_SESSION['id']));
   $user = $requser->fetch();
   if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['nom']) {
      $newnom=$_POST['newnom'];
      $insertnom = $bdd->prepare("UPDATE utilisateur SET nom = ? WHERE id = ?");
      $insertnom->execute(array($newnom, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['prenom']) {
      $newprenom=$_POST['newprenom'];
      $insertprenom = $bdd->prepare("UPDATE utilisateur SET prenom = ? WHERE id = ?");
      $insertprenom->execute(array($newprenom, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
      $newmail=$_POST['newmail'];
      $insertmail = $bdd->prepare("UPDATE utilisateur SET mail = ? WHERE id = ?");
      $insertmail->execute(array($newmail, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newclasse']) AND !empty($_POST['newclasse']) AND $_POST['newclasse'] != $user['classe']) {
      $newclasse=$_POST['newclasse'];
      $insertclasse = $bdd->prepare("UPDATE utilisateur SET classe = ? WHERE id = ?");
      $insertclasse->execute(array($newclasse, $_SESSION['id']));
      header('Location: profil.php?id='.$_SESSION['id']);
   }
   if(isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdp1 = $_POST['newmdp1'];
      $mdp2 = $_POST['newmdp2'];
      if($mdp1 == $mdp2) {
         $insertmdp = $bdd->prepare("UPDATE utilisateur SET password = ? WHERE id = ?");
         $insertmdp->execute(array($mdp1, $_SESSION['id']));
         header('Location: profil.php?id='.$_SESSION['id']);
      } else {
         $msg = "Vos deux mdp ne correspondent pas !";
      }
   }
?>
<html>
   <head>
      <title>Edition Profil</title>
      <meta charset="utf-8">
   </head>
   <body>
      <div align="center">
         <h2>Edition de mon profil</h2>
         <div align="left">
            <form method="POST" action="" enctype="multipart/form-data">
               <label>Nom:</label>
               <input type="text" name="newnom" placeholder="Nom" value="<?php echo $user['nom']; ?>" /><br /><br />
               <label>Prenom:</label>
                <input type="text" name="newprenom" placeholder="Prenom" value="<?php echo $user['prenom']; ?>" /><br /><br />
               <label>Mail :</label>
               <input type="email" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br /><br />
               <label>Classe :</label>
               <select name='newclasse'>
                 <option value='b1'<?php if (isset($_POST["newclasse"]) && $_POST["newclasse"] == "b1") echo " selected"; ?>>B1
                 <option value='b2'<?php if (isset($_POST["newclasse"]) && $_POST["newclasse"] == "b2") echo " selected"; ?>>B2
                 <option value='b3'<?php if (isset($_POST["newclasse"]) && $_POST["newclasse"] == "b3") echo " selected"; ?>>B3
                 <option value='i4'<?php if (isset($_POST["newclasse"]) && $_POST["newclasse"] == "i4") echo " selected"; ?>>I4
                 <option value='i5'<?php if (isset($_POST["newclasse"]) && $_POST["newclasse"] == "i5") echo " selected"; ?>>I5
                 <option value='Professeur'<?php if (isset($_POST["newclasse"]) && $_POST["newclasse"] == "Professeur") echo " selected"; ?>>Professeur
               </select><br /><br />
               <label>Mot de passe :</label>
               <input type="password" name="newmdp1" placeholder="Mot de passe"/><br /><br />
               <label>Confirmation - mot de passe :</label>
               <input type="password" name="newmdp2" placeholder="Confirmation du mot de passe" /><br /><br />
               <input type="submit" value="Mettre à jour mon profil !" />
            </form>
            <?php if(isset($msg)) { echo $msg; } ?>
         </div>
      </div>
   </body>
</html>
<?php
}
else {
   header("Location: connexion.php");
}
?>
