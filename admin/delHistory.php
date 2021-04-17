<?php session_start();
 
 require("../include/functions.php");
 include('../config/database.php');

if(!empty($_GET['id'])){

//On supprime l'informaticien indiqué à l'url
 extract($_GET); 

 $q = $db->prepare('DELETE FROM historique WHERE idhistorique=?');
 $sucess=$q->execute([$id]);

 if($sucess){
  $_SESSION['story_deleted']="deleted";
  redirect('history.php');

}else{
    $_SESSION['deleted_error']='deleted';
    redirect('history.php');
}
    

}else{

  redirect('profile.php');
}









