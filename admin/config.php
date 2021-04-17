<?php
// Ceci est le fichier de configuration
/* L'administrateur doit remplir ces identifiants dans ce fichier , ce ser dangereux si un individu non autorisé
gagne accès à ce fichier.*/
// Ce fichier admin ne doit etre à la disposition de personne sauf le directeur

$admin = array(
  'login'=>'admin',
  'password' =>'123456',
  'name' =>'PFE',
  'firstName'=>'RT2',
  'email' =>'pfert2021@gmail.com',
  'tel' =>'06689567' 
);
//Fin de la configuration
// Ce bout de code ci-dessous ne doit pas étre modifié.

$password=password_hash($admin['password'], PASSWORD_BCRYPT);

if (isset($admin) && !empty($admin)) {
  $q = $db->prepare('SELECT * from super_administrateur where id_admin=?');
  $q->execute([1]);
  $answer = $q->rowCount();
    if(!empty($answer)){
      $q = $db->prepare('UPDATE super_administrateur set login=:login,password=:password,name=:name,firstName=:firstName,email=:email,tel=:tel WHERE id_admin=1');
      $q->execute(array(
        'login'=>$admin['login'],
        'password'=>$password,
        'name'=>$admin['name'],
        'firstName'=>$admin['firstName'],
        'email'=>$admin['email'],
        'tel' =>$admin['tel'],
      ));
    }else{
      $q= $db->prepare('INSERT INTO super_administrateur(login,password,name,firstName,email,tel) VALUES(:login,:password,:name,:firstName,:email,:tel)');
      $q->execute( array(
        'login'=>$admin['login'],
        'password'=>$password,
        'name'=>$admin['name'],
        'firstName'=>$admin['firstName'],
        'email'=>$admin['email'],
        'tel' =>$admin['tel']
      ));
  }  
  
}
