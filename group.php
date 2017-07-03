<?php
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=annuaire-php;charset=utf8','annuaire-php','fyzCUeC935WghByd');
  }
  catch(Exception $e){
    die('Erreur :' . $e->getMessage());
  }

  $reponse = $bdd->query('SELECT * FROM groupe');

  if(!empty($_POST['group'])){
    echo 'success';
    $req = $bdd->prepare('INSERT INTO groupe(name) VALUES(:name)');
    $req->execute(array(
      'name'=> $_POST['group'],
    ));
  }
  else{
    echo 'failed';
  }


?>
