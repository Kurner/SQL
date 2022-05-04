<?php

try {
    $db = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'user', 'user');

    // $sql = "CREATE TABLE Meteo(
    //     Id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    //     ville VARCHAR(9),
    //     haut INT,
    //     bas INT
    //     )";

    // $db->beginTransaction();

    // $sql = "INSERT INTO Meteo(ville, haut, bas)
    // VALUES('Bruxelles', 27, 13)";

    // $sql2 = "INSERT INTO Meteo(ville, haut, bas)
    // VALUES('Liege', 25, 15)";

    // $sql3 = "INSERT INTO Meteo(ville, haut, bas)
    // VALUES('Namur', 26, 15)";

    // $sql4 = "INSERT INTO Meteo(ville, haut, bas)
    // VALUES('Charleroi', 25, 12)";

    // $sql5 = "INSERT INTO Meteo(ville, haut, bas)
    // VALUES('Bruges', 28, 16)";


    // $db->exec($sql);
    // $db->exec($sql2);
    // $db->exec($sql3);
    // $db->exec($sql4);
    // $db->exec($sql5);

    // $db->commit();
    
    echo 'Données bien créée !';
}

catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}

?>