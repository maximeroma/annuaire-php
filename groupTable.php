<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Group Table</title>
  </head>
  <body>
    <table>
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
  </body>
</html>
