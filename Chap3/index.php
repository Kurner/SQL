<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'user', 'user');

        $sqlSelect = $db->prepare("SELECT * FROM clients");
        $sqlSelect->execute();

        echo "<p>CLIENTS :</p>";

        foreach($sqlSelect as $client)
        {
            echo "<p>" . $client['lastName'] . " " . $client['firstName'] ."</p>";
        }

        $sqlSelect2 = $db->prepare("SELECT * FROM shows");
        $sqlSelect2->execute();

        echo "<p>SPECTACLE :</p>";

        foreach($sqlSelect2 as $show)
        {
            echo "<p>" . $show['title'];
        }

        echo "<p>20 PREMIERS CLIENTS :</p>";

        $sqlSelect3 = $db->prepare("SELECT * FROM clients LIMIT 20");
        $sqlSelect3->execute();

        foreach($sqlSelect3 as $client)
        {
            echo "<p>" . $client['lastName'] . " " . $client['firstName'] ."</p>";
        }

        echo "<p>CLIENTS AVEC CARTES :</p>";

        $sqlSelect4 = $db->prepare("SELECT * FROM clients WHERE card=1");
        $sqlSelect4->execute();

        foreach($sqlSelect4 as $client)
        {
            echo "<p>" . $client['lastName'] . " " . $client['firstName'] ."</p>";
        }

        echo "<p>CLIENTS AVEC M :</p>";

        $sqlSelect5 = $db->prepare("SELECT * FROM clients WHERE lastName LIKE 'M%' ORDER BY firstName DESC");
        $sqlSelect5->execute();

        foreach($sqlSelect5 as $client)
        {
            echo "<p>Nom du client : " .$client['lastName'] . "</p><p>Prénom du client :  " . $client['firstName'] ."</p>";
        }

        $sqlSelect6 = $db->prepare("SELECT * FROM shows");
        $sqlSelect6->execute();

        echo "<p>SPECTACLE :</p>";

        foreach($sqlSelect6 as $show)
        {
            echo "<p>" . $show['title'] . " par " . $show['performer'] . " le " . $show['date'] . " à " . $show['startTime'] . "</p>";
        }

        echo "<p>INFOS CLIENTS : </p>";

        $sqlSelect7 = $db->prepare("SELECT * FROM clients");
        $sqlSelect7->execute();

        foreach($sqlSelect7 as $client)
        {
            $card = ($client['card'] == 0) ? ("Oui") : ("Non");
            echo "<p>Nom : " . $client['lastName'] . "</p>
            <p>Prénom : " . $client['firstName'] . "</p>
            <p>Date de naisasnce : " . $client['birthDate'] ."</p>
            <p>Carde de fidélité : " . $card . "</p>
            <p>Numéro de carte : " . $client['cardNumber'] . "</p>";            
        }

    ?>
</body>
</html>