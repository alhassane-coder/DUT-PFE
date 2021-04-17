<?php session_start();
 
 require("include/functions.php");
 include('config/database.php');

if(!empty($_GET['id']) && !empty($_GET['name'])){

//On supprime l'informaticien indiqué à l'url
 extract($_GET); 

 $q = $db->prepare('DELETE FROM fournisseurs WHERE id=?');
 $sucess=$q->execute([$id]);

 if($sucess){
    
    //On génère la date et l'heure
    setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
    $date=strftime('%A %d %B %Y').' à '.date('h:i:s');
     
    $q=$db->prepare('INSERT INTO historique(evenement,date) VALUES (:event,:date) ');
    $event='l\'informaticien <span style="color:blue">'.get_session('info_login').'</span> a supprimé le fournisseur <span style="color:blue">'.$name;
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









