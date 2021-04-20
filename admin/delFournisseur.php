<?php session_start();
 
 require("include/functions.php");
 include('config/database.php');
 include('filters/admin_filter.php');


if(!empty($_GET['id'])){

//On supprime l'informaticien indiqué à l'url
 extract($_GET); 

 $q = $db->prepare('DELETE FROM fournisseurs WHERE id=?');
 $sucess=$q->execute([$id]);

 if($sucess){ 
   //On génère la date et l'heure
  setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
  $date=strftime('%A %d %B %Y').' à '.date('h:i:s');
  
  // On enregistre l'évènement en base de donnée
  $q=$db->prepare('INSERT INTO historique(evenement,date) VALUES (:event,:date) ');
  $event='<span style="color:blue"> Vous</span> avez supprimer le fournisseur <span style="color:blue">'.$name.'</span>';
  $q->execute(array(
  'event'=>$event,
  'date'=>$date
  ));

  $_SESSION['deleted']="deleted";
  redirect('listFournisseurs.php');

}else{
    $_SESSION['deleted_error']='deleted';
    redirect('listFournisseurs.php');
}
    

}else{

  redirect('profile.php');
}









