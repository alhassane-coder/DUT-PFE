<?php
session_start();
include "include/functions.php"; 
include "config/database.php"; 
//include('filters/guest_filter.php');

 //on selectionne les infos de l'informaticien
 $fourniss_infos = find_fourniss_by_id(get_session('fourn_id'));


 if(isset($_POST['make_news'])){
     if(not_empty(['productname','qte','expire_date','description'])){
        
        $errors=[];

			extract($_POST);
          
            if(strlen($qte) <= 0 )
			{
				$errors[]='<i class="fas fa-exclamation-triangle"></i> La quantité du produit doit etre supérieure à 0 ! ';
			}

			if(mb_strlen($productname)<3)
			{
				$errors[]='<i class="fas fa-exclamation-triangle"></i> Nom du produit trop court! (Minimum 3 caractères)';
			}
        
            if(count($errors) == 0){
             
                // On ajoute la nouveauté  dans notre base de donnée
                $q=$db->prepare('INSERT INTO news (produit,qte,date,description) VALUES(:produit,:qte,:expire,:description)');
                $success=$q->execute(array(
                  'produit'=>$productname,
                  'qte'=>$qte,
                  'expire'=>$expire_date,
                  'description'=>$description
                ));

                if($success){
                         //On génère la date et l'heure
                        setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
						$date=strftime('%A %d %B %Y').' à '.date('h:i:s');
                        $event='Le fournisseur <span style="color:blue">'.$fourniss_infos->name.'</span> a ajouté de la nouveauté dont <span style="color:red">'.$qte.'</span> unités du produit <span style="color:blue">'.$productname;

						// On enregistre l'évènement en base de donnée
						$q=$db->prepare('INSERT INTO historique(evenement,date) VALUES (:event,:date) ');
						$q->execute(array(
						'event'=>$event,
						'date'=>$date
						));
					

                       $_SESSION['news_added']='<i class=\"fas fa-check-circle\"></i> Nouveauté ajoutée avec succès.';
                       redirect('fournProfile.php?id='.get_session('fourn_id'));
                }


            }else{
                save_input_data();

            }			

     }else{
            $errors[] = '<i class="fas fa-exclamation-triangle"></i> Veuillez SVP remplir tous les champs!';
            save_input_data();
     }
 }else{
    
    save_input_data();
 }

 include "views/addNews.view.php"; 