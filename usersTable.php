<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>User Table</title>
  </head>
  <body>
    <table class="table">
      <thead>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Entreprise</th>
        <th>Age</th>
        <th>Adresse</th>
        <th>Code postal</th>
        <th>Ville</th>
        <th>Numéro de tel</th>
      </thead>
      <tbody>
        <?php
        try{
          $bdd = new PDO('mysql:host=localhost;dbname=annuaire-php;charset=utf8', 'annuaire-php', 'fyzCUeC935WghByd');
        }
        catch(Exception $e){
          die('Erreur :' . $e->getMessage());
        }
        $reponse = $bdd->query('SELECT * FROM annuaire');

        foreach($reponse as $element){
          echo '<tr><td>'. $element['id'] .'</td><td>' . $element['lastname'] . '</td><td>'
          . $element['firstname'] . '</td><td>' .$element['corporate'].'</td><td>'
          . $element['birthday'] . '</td><td>'.$element['address'].'</td><td>'
          .$element['code'].'</td><td> '. $element['city']. '</td><td>'
          . $element['phone'] . '</td><td><a href="modifUser.php?id='.$element['id'].'" ><button type="button" class="btn">Modifier</button></a></td></tr>';
        }

        ?>
      </tbody>
    </table>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>
