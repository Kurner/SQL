<?php
    try 
    {
        include 'connexion.php';
    
       $id = $_GET['id'];

        $sql = "DELETE FROM hiking WHERE id=$id";
        $sth = $db->prepare($sql);
        $sth->execute();
        
        header('Location: ../read.php');
    }

    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }

?>

