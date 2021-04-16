<?php session_start();
 
 require("../include/functions.php");
 include('../config/database.php');

if(!empty($_GET['id'])){

//On supprime l'informaticien indiqué à l'url
 extract($_GET); 

 $q = $db->prepare('DELETE FROM informaticien WHERE id=?');
 $sucess=$q->execute([$id]);

 if($sucess){
  $_SESSION['deleted']="deleted";
  redirect('listInformaticiens.php');

}else{
    $_SESSION['deleted_error']='deleted';
    redirect('listInformaticiens.php');
}
    

}else{

  redirect('profile.php');
}









