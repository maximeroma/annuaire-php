<?php
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=annuaire-php;charset=utf8', 'annuaire-php', 'fyzCUeC935WghByd');
  }
  catch (Exception $e){
    die('Erreur :' . $e->getMessage());
  }
  $reponse = $bdd->query('SELECT * FROM annuaire WHERE id="'.$_GET['id'].'"');
  $donnees=$reponse->fetch();
  $id= $donnees['id'];
  if(!empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['phone'])){
    $bdd->exec('UPDATE annuaire SET lastname="'.$_POST['lastname'].'",firstname="'.$_POST['firstname'].'",corporate="'.$_POST['corporate'].'",birthday="'.$_POST['birthday'].'",
    address="'.$_POST['address'].'",code="'.$_POST['code'].'", city="'.$_POST['city'].'",phone="'.$donnees['phone'].'" WHERE id = "'.$id.'" ');
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Modification</title>
  </head>
  <body>
    <?php
        echo '<form action="modifUser.php?id='.$id.'" method="post">
        <label for="lastname">Name</label>
        <input type="text" name="lastname" id="lastname" value="'.$donnees['lastname'].'">
        <label for="firstname">Firstname</label>
        <input type="text" name="firstname" id="firstname" value="'.$donnees['firstname'].'">
        <label for="corporate">Entreprise</label>
        <input type="text" name="corporate" id="corporate" value="'.$donnees['corporate'].'">
        <label for="birthday">Date de naissance</label>
        <input type="text" name="birthday" id="birthday" value="'.$donnees['birthday'].'">
        <label for="address">Adresse</label>
        <input type="text" name="address" id="address" value="'.$donnees['address'].'">
        <label for="code">Code postal</label>
        <input type="text" name="code" id="code" value="'.$donnees['code'].'">
        <label for="city">Ville</label>
        <input type="text" name="city" id="city" value="'.$donnees['city'].'">
        <label for="phone">Phone number</label>
        <input type="text" name="phone" id="phone" value="'.$donnees['phone'].'">
        <button type="submit">Enregistrer</button>
    </form>';

    ?>
  </body>
</html>
