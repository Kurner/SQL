<?php 
session_start();

    include 'connexion.php';

    try
    {
        $sqlSelect = $db->prepare("SELECT Pseudo, mdp FROM users");
        $sqlSelect->execute();

        $sqlChecks = $sqlSelect->fetchAll(PDO::FETCH_ASSOC);

        if(isset($_POST['pseudo']) AND isset($_POST['mdp']))
        {
            $pseudoUser = $_POST['pseudo'];
            $mdpUser = $_POST['mdp'];
        }

        foreach($sqlChecks as $check)
        {
            if($pseudoUser === $check['Pseudo'] AND $mdpUser === $check['mdp'])
            {
                $_SESSION['LOGGED_USER'] = $check['Pseudo'];
            }
            header('Location: ../read.php');
        }

    }

    catch (Exception $e)
    {
        die('Erreur: ' . $e->getMessage());
    }
    

?>