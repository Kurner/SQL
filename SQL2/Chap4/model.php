<?php

$db = new PDO('mysql:host=localhost;dbname=chapitre4;charset=utf8', 'user', 'user');

$sql = db->prepare('SELECT *
                    FROM utilisateur
                    LEFT JOIN table2 
                    ON table1.id = table2.fk_id')