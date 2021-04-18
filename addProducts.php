<?php
session_start();
include "include/functions.php"; 
include "config/database.php"; 
//include('filters/guest_filter.php');

 //on selectionne les infos de l'informaticien
 $informaticien = find_infos_by_id(get_session('info_id'));

//Si le formulaie a été soumis ;
if(isset($_POST['add_product'])){
    if(not_empty(['productname','familyname','qte','expire_date','price','tva']) ){

	         $errors=[];
            
	         extract($_POST);

	         if(mb_strlen($productname)<3)
	         {
	         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Nom du produit trop court! (Minimum 3 caractères)';
	         }
             if(mb_strlen($familyname)<5)
	         {
	         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Nom de famille du produit trop court! (Minimum 3 caractères)';
	         }
             
             if(count($errors) == 0){

                //On enregistre le produit

                  $q=$db->prepare('INSERT INTO produits (nomproduit,nomfamille,qte_produit,expire_date,prix,tva) VALUES(:name,:family,:qte,:expire,:price,:tva)');

                	  $success=$q->execute(array(
                            'name'=>$productname,
                            'family'=>$familyname,
                            'qte'=>$qte,
                            'expire'=>$expire_date,
							'price'=>$price,
                            'tva'=>$tva
                	  ));
                    if($success){
						//On génère la date et l'heure
						setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
						$date=strftime('%A %d %B %Y').' à '.date('h:i:s');
						
						// On enregistre l'évènement en base de donnée
						$q=$db->prepare('INSERT INTO historique(evenement,date) VALUES (:event,:date) ');
						$event='L\'informaticien <span style="color:blue">'.$informaticien->name.' '.$informaticien->firstName.'</span> a ajouté le produit <span style="color:blue"><span style="color:blue">'.$productname;
						$q->execute(array(
						'event'=>$event,
						'date'=>$date
						));

                       $_SESSION['product_added']='<i class=\"fas fa-check-circle\"></i> Produit ajouté avec succès.';
                       redirect('listProducts.php');

                    }              

                }else{
             	save_input_data();
             }


	    } else {

	    	$errors[] = '<i class="fas fa-exclamation-triangle"></i> Veuillez SVP remplir tous les champs!';
	    	save_input_data();
	    }


} else{

      clear_input_data();
}

include "views/addProducts.view.php"; 

?>