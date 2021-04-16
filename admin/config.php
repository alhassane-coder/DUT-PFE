<?php
// This is the admin config file.
/* The web admin has to write his cretentials and keep save this file, it's will be dangerous if an 
attaquer gain access to this. */
// Ce fichier admin ne doit etre à la disposition de personne sauf le directeur

$admin = array(
  'login'=>'admin',
  'password' =>'123456',
  'name' =>'Diaby',
  'firstName'=>'Alhassane',
  'email' =>'pfert2021@gmail.com',
  'tel' =>'06689567' 
);
$password=password_hash($admin['password'], PASSWORD_BCRYPT);

if (isset($admin) && !empty($admin)) {
    if(ceil_count('super_administrateur','login',$admin['login']) > 0){
      $q = $db->prepare('UPDATE super_administrateur set login=:login,password=:password,name=:name,firstName=:firstName,email=:email,tel=:tel');
      $q->execute(array(
        'login'=>$admin['login'],
        'password'=>$password,
        'name'=>$admin['name'],
        'firstName'=>$admin['firstName'],
        'email'=>$admin['email'],
        'tel' =>$admin['tel']
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
