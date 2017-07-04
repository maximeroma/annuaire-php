<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Formulaire</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      <h1>Formulaire de contact</h1>
      <form action="users.php" method="post">
        <div class="form-group">
          <label for="lastname">Name</label>
          <input class="form-control" type="text" name="lastname" id="lastname">
        </div>
        <div class="form-group">
          <label for="firstname">Firstname</label>
          <input class="form-control" type="text" name="firstname" id="firstname">
        </div>
        <div class="form-group">
          <label for="corporate">Entreprise</label>
          <input class="form-control" type="text" name="corporate" id="corporate">
        </div>
        <div class="form-group">
          <label for="birthday">Date de naissance</label>
          <input class="form-control" type="text" name="birthday" id="birthday">
        </div>
        <div class="form-group">
          <label for="address">Adresse</label>
          <input class="form-control" type="text" name="address" id="address">
        </div>
        <div class="form-group">
          <label for="code">Code postal</label>
          <input class="form-control" type="text" name="code" id="code">
        </div>
        <div class="form-group">
          <label for="city">Ville</label>
          <input class="form-control" type="text" name="city" id="city">
        </div>
        <div class="form-group">
          <label for="phone">Phone number</label>
          <input class="form-control" type="text" name="phone" id="phone">
        </div>
        <h2>Groupe</h2>

        <?php
        try{
          $bdd = new PDO('mysql:host=localhost;dbname=annuaire-php;charset=utf8', 'annuaire-php', 'fyzCUeC935WghByd');
        }
        catch(Exception $e){
          die('Erreur :' . $e->getMessage());
        }
        $query = 'SELECT * FROM groupe';
        $reponse = $bdd->query($query);

        foreach($reponse as $element){
          echo '<label class="checkbox-inline">
                  <input type="checkbox" name="checkbox[]" id="groupe' . $element['id']. '" value="'. $element['id'] .'"> '. $element['name'] .'
                </label>';
        }
        ?>
        <button class="btn btn-success" type="submit">Enregistrer</button>
      </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
