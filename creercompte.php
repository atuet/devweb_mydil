<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="stylemd.css"/>
  <head>
    <meta charset="utf-8">
    <title>Créer uefhbetrn compte</title>
  </head>
  <?php
	if(isset($_GET["valider"])){
		$nom = $_GET["nom"];
		$prenom = $_GET["prenom"];
		$mail = $_GET["mail"];
    $classe = $_GET["class"];
    $pwd = $_GET["pwd"];
    echo $nom."<br>".$prenom."<br>".$mail."<br>".$classe."<br>".$pwd;
	}
	 ?>
  <body>
    <form method="post" action="">
    <div id="titre" class="all">
      <video preload="auto" autoplay="true" loop="loop" muted="muted" poster="backgroundvid1.mp4">
      <source src="backgroundvid1.mp4" type="video/mp4">
    </video>
    <div class="title">
      <div class="formulaireinscription">
      <div class="div1">
      <h4 class="form">Nom</h4>
      <input type="text" name="nom" class="formulaire">

      <h4 class="form">Prénom</h4>
      <input type="text" name="prenom" class="formulaire">

      <h4 class="form">Mail</h4>
      <input type="text" name="mail" class="formulaire" value="@epsi.fr">
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
      <input type="password" name="pwd" class="formulaire">

      <h4 class="form">Confirmer le Mot de passe</h4>
      <input type="password" name="passwordconfirm" class="formulaire">
    </div>
    <div class="validerinscription">
      <input type="submit" name="valider" value="Valider" class="bouton">
      <?php
                $con=mysqli_connect("localhost","root","","projet_mydil");
                if (!$con){
                    die("Erreur de connection: "  .mysqli_connect_error());
                }

                $nom=$_POST['nom'];
                $prenom=$_POST['prenom'];
                $mail=$_POST['mail'];
                $classe=$_POST['classe'];
                $pwd=$_POST['pwd'];

                $sql="INSERT INTO utilisateur (nom, prenom, mail, classe, pwd)
                VALUES ('$nom' ,'$prenom' ,'$mail' ,'$classe' ,'$pwd')";
                if(mysqli_query($con,$sql)){
                    echo '<p class="valider">Les informations on bien ete enregistrees</p>';
                } else{
                    echo ('Erreur' .$sql. "<br>" .mysqli_error($con));
                }
                mysqli_close($con);
            ?>
    </div>
    </div>
  </form>
  </body>


</html>
