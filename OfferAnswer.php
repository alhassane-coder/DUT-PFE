<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 

$fourniss_infos = find_fourniss_by_id(get_session('fourn_id'));

if(isset($_GET['id']) && !empty($_GET['id'])){
    //On selectionne les données de l'offre
    $q=$db->prepare("SELECT id,produit,qte,date,answered FROM appel_offre WHERE id=?");
    $q->execute([$_GET['id']]);
    $offer = $q->fetch(PDO::FETCH_OBJ);
   
    if(!$offer){
        $offer=null;
    }
    $q=$db->prepare('INSERT INTO magasinier (login,name,firstName,email,tel,password) VALUES(:login,:name,:firstName,:email,:tel,:password)');

 if(!empty($_POST['answer'])){
     $q=$db->prepare('INSERT INTO reponses (fournissName,produit,qte,answer,date) VALUES(:fournissName,:produit,:qte,:answer,:date)');
     $success=$q->execute(array(
       'fournissName'=>get_session('fourn_name'),
       'produit'=>$offer->produit,
       'qte'=>$offer->qte,
       'answer'=>$_POST['answer'],
       'date'=>date('Y-m-d').' à '.date('h:i:s')
     ));
     if($success){
          //On génère la date et l'heure
          setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
          $date=strftime('%A %d %B %Y').' à '.date('h:i:s');
          $event='Le fournisseur <span style="color:blue">'.$fourniss_infos->name.'</span> a repondu l\'appel d\'offre pour <span style="color:red">'.$offer->qte.'</span> unités du produit <span style="color:blue">'.$offer->produit;

          // On enregistre l'évènement en base de donnée
          $q=$db->prepare('INSERT INTO historique(evenement,date) VALUES (:event,:date) ');
          $q->execute(array(
          'event'=>$event,
          'date'=>$date
          ));

          //On  met la reponse à repondu 
          $q=$db->prepare('UPDATE appel_offre SET answered=1 WHERE id=?');
          $q->execute([$_GET[id]]);
      
         $_SESSION['offre_answered']='<i class=\"fas fa-check-circle\"></i> Reponse envpyée avec succès.';
         redirect('fournOffersList.php');
     }
 }

}else{
    redirect('fournOfferList.php');
}

?>

<?php include "views/offerAnswer.view.php";