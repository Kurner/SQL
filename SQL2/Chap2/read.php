<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Randonnées</title>
    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body>
    <h1>Liste des randonnées</h1>
    <table>
    <?php      
        try
        {
            include 'connexion.php';

            $sql =  $db->prepare("SELECT id,name FROM hiking ORDER BY name");
            $sql->execute();
            $sqlSelect = $sql->fetchAll(PDO::FETCH_ASSOC);


            foreach($sqlSelect as $randonnee)
            {
                echo "<p><a href=update.php?id=".$randonnee['id'].">" . $randonnee['name'] . "</a></p>";
                echo "
                <form action='delete.php'>
                  <button type='submit' name='id' value=".$randonnee['id'].">
                    Delete
                  </button>
                </form>";
            }

            if(!isset($_SESSION['LOGGED_USER']))
            {
              echo "<p><input type=button onclick=window.location.href='../create.php'; value='Ajouter une randonnée' /></p>";
              
              echo "<p> Besoin d'un compte ? C'est ici ! </p>";
              echo "<p><input type=button onclick=window.location.href='../inscription.php'; value='Inscription' /></p>";

              echo "<div class='formulaireConnexion'><p>Déjà inscrit ? Connectez-vous !</p></div>
              <form action='connexionUser.php' method='post'>
                  <p>Pseudo : <input type='text' name='pseudo' /></p>
                  <p>Mot de passe : <input type='password' name='mdp'></p>
                  <p><input type='submit' value='Ok'></p>
              </form>";
            }

            if(isset($_SESSION['LOGGED_USER']))
            {
                echo "<p>Bienvenu, " . $_SESSION['LOGGED_USER'] . " !</p>";
            }
        }

        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
    ?>
    </table>
  </body>
</html>