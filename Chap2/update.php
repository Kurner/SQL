<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Ajouter</h1>

    <?php
         include 'connexion.php';
        
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $sql =  $db->prepare("SELECT * FROM hiking WHERE id=$id");
            $sql->execute(array($_GET['id']));
            $sqlSelect = $sql->fetchAll(PDO::FETCH_ASSOC);

            foreach($sqlSelect as $data)
            {
                $name = $data['name'];
                $difficulty = $data['difficulty'];
                $distance = $data['distance'];
                $duration = $data['duration'];
                $height = $data['height_difference'];
                $available = $data['available'];
            }
        }
            $difficultyArray = array("Très facile", "Facile", "Moyen", "Difficile", "Très difficile");

        try 
        {
            if(isset($_POST['name']) AND isset($_POST['difficulty']) AND isset($_POST['distance']) AND isset($_POST['duration']) AND isset($_POST['height_difference']) AND isset($_POST['available']))
            {
                $name = $_POST['name'];
                $difficulty = $_POST['difficulty'];
                $distance = $_POST['distance'];
                $duration = $_POST['duration'];
                $height = $_POST['height_difference'];

                if(strtolower($_POST['available']) == 'oui')
				{
					$available = 1;
				}
				else
				{
					$available = 0;
				}

                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = $db->prepare("UPDATE hiking SET name='$name', difficulty='$difficulty', distance='$distance', duration='$duration', height_difference=$height, available=$available WHERE id=$id");
   
                $sql->execute();

                header('Location: ../read.php');
            }
        }

        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }

    ?>

	<form action="" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?php echo $name?>">
		</div>


		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
                <?php 

                    foreach($difficultyArray as $value)
                    {
                        if($value !== $difficulty)
                        { 
                        ?>
                            <option value="<?php echo $value ?>"><?php echo $value ?></option> 
                        <?php
                        }
                        else
                        { 
                        ?>
                            <option selected value="<?php echo $value ?>"><?php echo $value ?></option>
                        <?php
                        }
                    }
                ?>
				<!-- <option value="Très facile">Très facile</option>
				<option value="Facile">Facile</option>
				<option value="Moyen">Moyen</option>
				<option value="Difficile">Difficile</option>
				<option value="Très difficile">Très difficile</option> -->
			</select>
		</div>
		
		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?php echo $distance?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="<?php echo $duration?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?php echo $height?>">
		</div>
        <div>
			<label for="available">Disponible</label>
			<input type="text" name="available" placeholder='oui ou non'>
		</div>
		<button type="submit" name="id">Envoyer</button>
	</form>
</body>
</html>