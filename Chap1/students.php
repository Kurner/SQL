<?php

$db = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'user', 'user');

try 
{   
    $sql = $db->prepare("SELECT * FROM students");
    $sql->execute();
    $sqlSelect = $sql->fetchAll(PDO::FETCH_ASSOC);

    foreach($sqlSelect as $data)
    {
        echo "<p>" . $data['school'] . "</p>";
        echo "<p>" . $data['nom'] . " " . $data['prenom'] . " " . $data['datenaissance'] . " " . $data['genre'] . "</p>"; 
    }
    
}

catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}