<?php
    $db = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'user', 'user');

    $sql = $db->prepare("SELECT * FROM Meteo");
    $sql->execute();
    $sqlSelect = $sql->fetchAll(PDO::FETCH_ASSOC);

?>

<form action="index.php" method="post">
    <?php
      echo "<table border = 1>";
      echo "<tr>
        <td></td>
        <td>Ville</td>
        <td>Haut</td>
        <td>Bas</td>
      </tr>";

      foreach($sqlSelect as $select)
      {
          echo "<tr>
            <td>";
           echo "<input type='checkbox' name='box[]' value=".$select['ville'].">
            </td>
            <td>" . $select['ville'] . "</td>
            <td>" . $select['haut'] . "</td>
            <td>" . $select['bas'] . "</td>
          </tr> ";
      }
      echo "</table>";
    ?>
     <p><input type="submit" value="Supprimer selection"></p>

</form>
  
<?php
    try
    {    
        var_dump($_POST['box']);
    if(isset($_POST['box']))
    {
        $villeDelete = $_POST['box'];

        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        foreach($villeDelete as $delete)
        {
            $sql = "DELETE FROM Meteo WHERE ville='$delete'";
            $sth = $db->prepare($sql);
            $sth->execute();
        }
    }
    
        if (isset($_POST['ville']) AND isset($_POST['haut']) AND isset($_POST['bas']))
        {
            $ville = $_POST['ville'];
            $haut = (int)$_POST['haut'];
            $bas = (int)$_POST['bas'];

            var_dump($bas);
            
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sqlQuery = "INSERT INTO Meteo(ville,haut,bas) VALUES ('$ville',$haut,$bas)";
            $db->exec($sqlQuery);
    
            echo 'Formulaire bien reçu !';  
        }
    }
    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }
?>

<form action="index.php" method="post">
    <p>Ville : <input type="text" name="ville"></p>
    <p>Haut : <input type="number" name="haut"></p>
    <p>Bas : <input type="number" name="bas"></p>
    <p><input type="submit" value="Ok"></p>
</form>