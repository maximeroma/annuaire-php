<?php
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=annuaire-php;charset=utf8','annuaire-php','fyzCUeC935WghByd');
  }
  catch(Exception $e){
    die('Erreur :' . $e->getMessage());
  }

  $groupe = $_POST['group'];
  $query = 'SELECT * FROM groupe';
  $reponse = $bdd->query($query);

  if(!empty($groupe)){
    echo 'success';
    $req = $bdd->prepare('INSERT INTO groupe(name) VALUES(:name)');
    $req->execute(array(
      'name'=> $groupe,
    ));
  }
  else{
    echo 'failed';
  }


?>
