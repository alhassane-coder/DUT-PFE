<?php session_start();
 
 require("../include/functions.php");
 include('../config/database.php');

if(!empty($_GET['id'])){

//On supprime l'informaticien indiqué à l'url
 extract($_GET); 

 $q = $db->prepare('DELETE FROM fournisseurs WHERE id=?');
 $sucess=$q->execute([$id]);

 if($sucess){
  $_SESSION['deleted']="deleted";
  redirect('listFournisseurs.php');

}else{
    $_SESSION['deleted_error']='deleted';
    redirect('listFournisseurs.php');
}
    

}else{

  redirect('profile.php');
}









