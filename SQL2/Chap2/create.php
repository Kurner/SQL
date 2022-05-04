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
        try 
		{
			include 'connexion.php';
			
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
				}

                $sqlQuery = "INSERT INTO hiking (name,difficulty,distance,duration,height_difference,available) VALUES ('$name', '$difficulty', '$distance', '$duration', '$height', $available)";
                $db->exec($sqlQuery);   
            
        }

        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
    ?>

	<form action="create.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="">
		</div>

		<div>
			<label for="difficulty">Difficulté</label>
			<select name="difficulty">
				<option value="Très facile">Très facile</option>
				<option value="Facile">Facile</option>
				<option value="Moyen">Moyen</option>
				<option value="Difficile">Difficile</option>
				<option value="Très difficile">Très difficile</option>
			</select>
		</div>

		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="time" name="duration" value="">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="">
		</div>
		<div>
			<label for="available">Disponible</label>
			<input type="text" name="available" placeholder='oui ou non'>
		</div>
		
		<button type="submit" name="button">Envoyer</button>
	</form>
</body>
</html>