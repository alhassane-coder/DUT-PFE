<?php session_start();
 
 require("../include/functions.php");
 include('../config/database.php');

if(!empty($_GET['id'])){

//On bloque l'informaticien indiqué à l'url
 extract($_GET); 

 $q = $db->prepare('UPDATE informaticien set active=0 WHERE id=?');
 $sucess=$q->execute([$id]);

 if($sucess){
  $_SESSION['blocked']="blocked";
  redirect('listInformaticiens.php');

}else{
    $_SESSION['blocked_error']='error';
    redirect('listInformaticiens.php');
}
    

}else{

  redirect('profile.php');
}









