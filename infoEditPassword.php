<?php
session_start();
include "include/functions.php"; 
include "config/database.php"; 
//include('filters/auth_filter.php');

 //on selectionne les infos de l'informaticien
 $informaticien = find_infos_by_id(get_session('info_id'));

if(isset($_POST['change_password'])){

	 if(not_empty(['current_password','new_password','new_password_confirm'])){

	    $errors=[];

	    extract($_POST);

		 if(mb_strlen($new_password) < 6){

		         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Nouveau mot de passe  trop court! (Minimum 6 caractères)';

		   } else {

		             if($new_password != $new_password_confirm){

		                	$errors[]='<i class="fas fa-exclamation-triangle"></i> Les deux mots de passes ne concordent pas !';
		             }
		         }


		            if(count($errors) == 0){

			            //Si tout est bon on verifie l'authenticité du mot de passe en bdd

			            $q = $db->prepare('SELECT password as hashed_password FROM informaticien WHERE id=? ');
                        
                        $q->execute([get_session('info_id')]);

			            $passwordHasBeenFound=$q->rowCount();

			            $data=$q->fetch(PDO::FETCH_OBJ);

			            if($passwordHasBeenFound && password_verify($current_password,$data->hashed_password )){

        
			            	// Si tout est bon on modifie son mot de passe et le redirige à son profil
			            	$q = $db->prepare('UPDATE informaticien SET password = :new_password WHERE id=:id');

			            	$success = $q->execute([
                                 'new_password'=>password_hash($new_password, PASSWORD_BCRYPT),
                                 'id'=>get_session('info_id')

			            	]);

                             if($success){

								 //On génère la date et l'heure
								setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
								$date=strftime('%A %d %B %Y').' à '.date('h:i:s');
								
								// On enregistre l'évènement en base de donnée
								$q=$db->prepare('INSERT INTO historique(evenement,date) VALUES (:event,:date) ');
								$event='l\'informaticien <span style="color:blue">'.$informaticien->name.' '.$informaticien->firstName.'</span> a modifié son mot de passe';
								$q->execute(array(
								'event'=>$event,
								'date'=>$date
								));
								
                             	$_SESSION['password_updated']="<i class=\"fas fa-check-circle\"></i>  Mot de passe changée avec succès";// Variable session pour afficher un succès avec alertify

                            	redirect('infoProfile.php?id='.get_session('info_id'));

                             }


			            } else {
			            	$errors[] = '<i class="fas fa-exclamation-triangle"></i> Le mot de passe actuel saisi est incorrect.<br> Veuillez réessayer SVP';


			            }


		            }
	} else {

	    	$errors[] = '<i class="fas fa-exclamation-triangle"></i> Veuillez SVP remplir tous les champs!';
	    	
	    }

} else {
	clear_input_data();
}


include "views/infoEditPassword.view.php"; 
