<?php
  session_start();
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=annuaire-php;charset=utf8', 'annuaire-php', 'fyzCUeC935WghByd');
  }
  catch (Exception $e){
    die('Erreur :' . $e->getMessage());
  }



    $update = 'UPDATE annuaire SET lastname="'.$_POST['lastname'].'",firstname="'.$_POST['firstname'].'",corporate="'.$_POST['corporate'].'",birthday="'.$_POST['birthday'].'",
    address="'.$_POST['address'].'",code="'.$_POST['code'].'", city="'.$_POST['city'].'",phone="'.$_POST['phone'].'" WHERE id = "'.$_SESSION['id'].'" ';




    if(!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['phone'])){
      $bdd->exec($update);
      //print_r( $bdd->errorInfo() );
      /*
      $bdd->exec('UPDATE annuaire SET lastname="'.$_POST['lastname'].'",firstname="'.$_POST['firstname'].'",corporate="'.$_POST['corporate'].'",birthday="'.$_POST['birthday'].'",
      address="'.$_POST['address'].'",code="'.$_POST['code'].'", city="'.$_POST['city'].'",phone="'.$_POST['phone'].'", WHERE id = "'.$_SESSION['id'].'" ');
      */
    }

    $query = 'SELECT * FROM annuaire WHERE id='.$_GET['id'].'';
    $reponse = $bdd->query($query);

    echo $sql;
    $donnees=$reponse->fetch();
    var_dump($donnees);
    $_SESSION['id']= $donnees['id'];

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modification</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <h1>Modification</h1>
    <form action="modifUser.php?id=<?php echo $_SESSION['id']; ?>&name=update" method="post">
      <div class="form-group">
        <label for="lastname">Name</label>
        <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo $donnees['lastname']; ?>">
      </div>
      <div class="form-group">
        <label for="firstname">Firstname</label>
        <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo $donnees['firstname']; ?>">
      </div>
      <div class="form-group">
        <label for="corporate">Entreprise</label>
        <input class="form-control" type="text" name="corporate" id="corporate" value="<?php echo $donnees['corporate']; ?>">
      </div>
      <div class="form-group">
        <label for="birthday">Date de naissance</label>
        <input class="form-control" type="text" name="birthday" id="birthday" value="<?php echo $donnees['birthday']; ?>">
      </div>
      <div class="form-group">
        <label for="address">Adresse</label>
        <input class="form-control" type="text" name="address" id="address" value="<?php echo $donnees['address']; ?>">
      </div>
      <div class="form-group">
        <label for="code">Code postal</label>
        <input class="form-control" type="text" name="code" id="code" value="<?php echo $donnees['code']; ?>">
      </div>
      <div class="form-group">
        <label for="city">Ville</label>
        <input class="form-control" type="text" name="city" id="city" value="<?php echo $donnees['city']; ?>">
      </div>
      <div class="form-group">
        <label for="phone">Phone number</label>
        <input class="form-control" type="text" name="phone" id="phone" value="<?php echo $donnees['phone']; ?>">
      </div>
      <button type="submit" class="btn btn-success">Enregistrer</button>
    </form>';
    <a href="usersTable.php" class="btn btn-info">Répertoire</a>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
