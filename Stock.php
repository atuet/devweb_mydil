<!DOCTYPE>
<html>
  <head>
    <meta charset="utf-8" / />
    <link rel="stylesheet" href="CSS.css" / />
    <title> Gestion du stock </title>
  </head>
  <body>
    <?php
            $bdd = mysqli_connect("localhost","root","","projet_mydil")
            $id_pdt = mysqli_query($bdd, 'SELECT * FROM produit')
            while($donnees = mysqli_fetch_assoc($id_pdt))
            {
              echo $donnees['id_pdt'];
              echo "\n";
              echo $donnes['nom_pdt'];
            }
            mysqli_free_result($resultat);
    ?>
  </body>
</html>
