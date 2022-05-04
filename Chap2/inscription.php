<?php

    include 'connexion.php';

    
    if(!isset($_SESSION['LOGGED_USER']))
     {
         echo "<div class='formulaireInscription'>Formulaire d'inscription
             <form action='inscription.php' method='post'>
             <p>Pseudo : <input type='text' name='pseudo' /></p>
                 <p>Mot de passe : <input type='password' name='mdp'></p>
                 <p><input type='submit' value='Ok'></p>
             </form>
             </div>";
            }
    echo '<p><button class="buttonMenu"><a href="../read.php">Retour au menu</a></button></p>';
    try
    {
        $sqlSelect = $db->prepare("SELECT Pseudo, mdp FROM users");
        $sqlSelect->execute();

        $sqlChecks = $sqlSelect->fetchAll(PDO::FETCH_ASSOC);

        if(isset($_POST['pseudo']) AND isset($_POST['mdp']))
        {
            $pseudoUser = $_POST['pseudo'];
            $mdpUser = $_POST['mdp'];

            foreach($sqlChecks as $check)
            {
                if($pseudoUser == $check['Pseudo'])
                {
                    echo "Ce pseudo est déjà pris !"; 
                    backtomenu();
                    return;
                }

            }
                $sqlQuery = "INSERT INTO users(Pseudo,mdp) VALUES ('$pseudoUser', '$mdpUser')";
                $db->exec($sqlQuery);

                echo 'Compte créé avec succés, bravo !';  
                backtomenu(); 
        }  
    }

    catch (Exception $e)
    {
        die('Erreur: ' . $e->getMessage());
    }
?>