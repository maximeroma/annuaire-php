<?php
  // mdp : fyzCUeC935WghByd
  try{
    $bdd = new PDO('mysql:host=localhost;dbname=annuaire-php;charset=utf8', 'annuaire-php', 'fyzCUeC935WghByd');
  }
  catch (Exception $e){
    die('Erreur :' . $e->getMessage());
  }
  $reponse = $bdd->query('SELECT * FROM annuaire');


  // $lastname = $_POST['lastname'];
  // $firstname = $_POST['firstname'];
  // $age = $_POST['age'];
  // $phone = $_POST['phone'];

  if (!empty($_POST['lastname']) && !empty($_POST['firstname'])
  && !empty($_POST['corporate']) && !empty($_POST['birthday'])
  && !empty($_POST['address']) && !empty($_POST['code'])
  && !empty($_POST['city']) && !empty($_POST['phone'])){
    echo 'success';
    $req = $bdd->prepare('INSERT INTO annuaire(firstname, lastname, corporate, birthday, address, code, city, phone) VALUES(:firstname,:lastname,:corporate,:birthday,:address,:code,:city,:phone)');
    $req->execute(array(
      'lastname'=> $_POST['lastname'],
      'firstname'=> $_POST['firstname'],
      'corporate'=> $_POST['corporate'],
      'birthday'=> $_POST['birthday'],
      'address'=> $_POST['address'],
      'code'=> $_POST['code'],
      'city'=> $_POST['city'],
      'phone'=> $_POST['phone']
    ));
  }
  else {
    echo 'failed';
  }
?>
