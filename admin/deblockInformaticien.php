<?php session_start();
 
 require("../include/functions.php");
 include('../config/database.php');

if(!empty($_GET['id'])){

//On debloque l'informaticien indiqué à l'url
 extract($_GET); 

 $q = $db->prepare('UPDATE informaticien set active=1 WHERE id=?');
 $sucess=$q->execute([$id]);

 if($sucess){
  $_SESSION['deblocked']="deblocked";
  redirect('listInformaticiens.php');

}else{
    $_SESSION['deblocked_error']='error';
    redirect('listInformaticiens.php');
}
    

}else{

  redirect('profile.php');
}









