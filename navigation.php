<!DOCTYPE>
<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=phpmyadmin', 'root', '');
 ?>
<html>
  <head>
    <meta charset="utf-8" / />
    <link rel="stylesheet" href="CSS.css" / />
    <title> Test site myDIL </title>
  </head>
  <body>
    <header>
      <div id="mydil">
        <img src="logo.png" alt="Logo"/>
      </div>

      <h1 id="Description">Site s'occupant du stock de MyDIL</h1>

    </header>
    <section>
      <ul id="menu-demo2">
	       <li><a href="#">DEVICE</a>
		         <ul>
			            <li><a href="#">Autre</a></li>
			            <li><a href="#">Tablette Graphique</a></li>
			            <li><a href="#">Vidéo Projecteur</a></li>
			            <li><a href="#">VR</a></li>
                  <li><a href="#">Webcam</a></li>
		        </ul>
	       </li>
	       <li><a href="#">IMAGE</a>
		         <ul>
			            <li><a href="#">Appareil Photo</a></li>
			            <li><a href="#">Caméra</a></li>
		         </ul>
	       </li>
	       <li><a href="#">IOT</a>
          	<ul>
  			         <li><a href="#">Ampoule</a></li>
			           <li><a href="#">Drone</a></li>
		       </ul>
	      </li>
	      <li><a href="#">MOBILITÉ</a>
		        <ul>
          			<li><a href="#">Bracelet</a></li>
          			<li><a href="#">Montre</a></li>
          			<li><a href="#">Smartphone</a></li>
          			<li><a href="#">Tablette Hybride</a></li>
		        </ul>
	     </li>
       <li><a href="#">PC</a>
           <ul>
               <li><a href="#">Barebone</a></li>
               <li><a href="#">PC Portable</a></li>
           </ul>
      </li>
      <li><a href="#">SYSTÈME EMBARQUÉ</a>
          <ul>
              <li><a href="#">Capteur</a></li>
              <li><a href="#">Module</a></li>
              <li><a href="#">Robot</a></li>
          </ul>
     </li>
     <?php
     if(isset($_POST['adminvalider'])) {
       $gettype = $_GET['type'];
       $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE type = ? ");
       $requser->execute(array($gettype));
       $userexist = $requser->rowCount();
       if($userexist == 'admin'){
         $erreur = '<li><a href="#">ADMINISTRATION</a>
             <ul>
                 <li><a href="#">Stocks</a></li>
                 <li><a href="#">Demandes</a></li>
             </ul>
        </li>';
      } else {
        $erreur = "Erreur 1";
      }
    } else {
      $erreur = "Erreur 2";
    }
      ?>
     </ul>
     <form>
       <input id="Recherche" type="text" placeholder="Recherche"/>
     </br>
       <button>Valider la recherche</button>
     </form>
     <form>
       <a href="demande.php"><input id="Demande" type="button" value="Faire une demande d'objet" onclick="demande.php"/></a>
     </form>
     <a href="http://localhost/PROJET%20MYDIL/profil.php?id=<?php echo ($_SESSION['id'])?>">Mon profil</a>
     <form method="post" action="">
       <input type="submit" name="adminvalider" value="Admin" class="bouton" align="center">
     </form>
     <?php
        if(isset($erreur)) {
           echo '<font color="red">'.$erreur."</font>";
        }
        ?>
    </section>

  </body>
</html>
