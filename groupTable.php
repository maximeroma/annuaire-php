<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Group Table</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  </head>
  <body>
    <table class="table">
      <thead>
        <th>ID</th>
        <th>Name</th>
      </thead>
      <tbody>
        <?php
          try{
            $bdd = new PDO('mysql:host=localhost;dbname=annuaire-php;charset=utf8', 'annuaire-php', 'fyzCUeC935WghByd');
          }
          catch(Exception $e){
            die('Erreur :' . $e->getMessage());
          }
          $reponse = $bdd->query('SELECT * FROM groupe');
          foreach($reponse as $element){
            echo '<tr><td>' . $element['id'] . '</td><td>' . $element['name'] . '</td></tr>';
          }
        ?>
      </tbody>
    </table>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>
