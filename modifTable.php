<?php
  session_start();
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>modifTable</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <?php
      try{
        $bdd = new PDO('mysql:host=localhost;dbname=annuaire-php;charset=utf8', 'annuaire-php', 'fyzCUeC935WghByd');
      }
      catch (Exception $e){
        die('Erreur :' . $e->getMessage());
      }
      $_SESSION['id'] = $_GET['idGroupe'];

        $update = 'UPDATE groupe SET name='. $_POST['name'] .' WHERE `groupe`.`id`='. $_SESSION['id'] .' ';
        $bdd->exec($update);
    


      $query = 'SELECT * FROM groupe WHERE id='. $_SESSION['id'] .'';
      $reponse = $bdd->query($query);
      $donnees = $reponse->fetch();
      var_dump($donnees['name']);
    ?>
    <form action="modifTable.php?action=updated" method="post">
      <div class="form-group">
        <label for="groupeModif">Nom à modifier</label>
        <input type="text" name="name" class="form-control" id="groupeModif" value="<?php echo $donnees['name'] ?>">
      </div>
      <button class="btn-success btn" type="submit">Update</button>
    </form>

    <?php



    ?>
    <a href="usersTable.php" class="btn btn-info">Répertoire</a>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
