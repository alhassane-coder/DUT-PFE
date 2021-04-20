<?php
session_start();
include "include/functions.php"; 
include "config/database.php"; 
include('filters/info_auth_filter.php');

 //on selectionne les infos de l'informaticien
 $informaticien = find_infos_by_id(get_session('info_id'));


//Si le formulaie a été soumis ;
if(isset($_POST['update_informaticien'])){
    if(not_empty(['name','firstName','login','email']) ){

	         $errors=[];
            
	         extract($_POST);

	         if(mb_strlen($login)<3)
	         {
	         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Nom d\'utilisateur trop court! (Minimum 3 caractères)';
	         }
             if(mb_strlen($name)<5)
	         {
	         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Nom trop court! (Minimum 5 caractères)';
	         }
             if(mb_strlen($firstName)< 5)
	         {
	         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Prénom trop court! (Minimum 5 caractères)';
	         }
			 if(mb_strlen($tel)< 8)
	         {
	         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Numéro trop court! (Minimum 8 caractères)';
	         }

	         if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	         {
	         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Addresse email invalide!';
	         }


             if(count($errors) == 0){

                //On enregistre l'utilisateur et on le  redirige vers la page d'accueil et l'alerter pour qu'il verifie sa boite mail

                  $q=$db->prepare('UPDATE informaticien set login=:login,name=:name,firstName=:firstName,email=:email,tel=:tel WHERE id=:id');

                	  $success=$q->execute(array(
                            'login'=>$login,
                            'name'=>$name,
                            'firstName'=>$firstName,
                            'email'=>$email,
							'tel'=>$tel,
                            'id'=>get_session('info_id')
                	  ));
                    if($success){
                    
                        //On génère la date et l'heure
                        setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
                        $date=strftime('%A %d %B %Y').' à '.date('h:i:s');
                        
                        // On enregistre l'évènement en base de donnée
                        $q=$db->prepare('INSERT INTO historique(evenement,date) VALUES (:event,:date) ');
                        $event='l\'informaticien <span style="color:blue">'.$informaticien->name.' '.$informaticien->firstName.'</span> a mis à jour son profil';
                        $q->execute(array(
                        'event'=>$event,
                        'date'=>$date
                        ));                   
                         $_SESSION['informatician_updated']='<i class=\"fas fa-check-circle\"></i> Votre profil a été mis à jour avec succès.';
                        redirect('infoProfile.php?id='.get_session('info_id'));

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

include "views/infoEditProfile.view.php"; 
?>