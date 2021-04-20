<?php
session_start();
include "include/functions.php"; 
include "config/database.php"; 
include('filters/info_auth_filter.php');

 //on selectionne les infos de l'informaticien
 $informaticien = find_infos_by_id(get_session('info_id'));

//Si le formulaie a été soumis ;
if(isset($_POST['add_mag'])){
    if(not_empty(['name','firstName','login','email','password']) ){

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

             if(mb_strlen($password) < 6)
	         {

	         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Mot de passe  trop court! (Minimum 6 caractères)';
	         } 

             if(is_already_in_use('login',$login,'magasinier'))
             {
             	$errors[]='<i class="fas fa-exclamation-triangle"></i> Nom d\'utilisateur déja utilisé';
             }
             if(is_already_in_use('email',$email,'magasinier'))
             {
             	$errors[]='<i class="fas fa-exclamation-triangle"></i> Addresse E-mail  déja utilisé';
             }

             if(count($errors) == 0){

                //On enregistre l'utilisateur et on le  redirige vers la page d'accueil et l'alerter pour qu'il verifie sa boite mail

                  $q=$db->prepare('INSERT INTO magasinier (login,name,firstName,email,tel,password) VALUES(:login,:name,:firstName,:email,:tel,:password)');

                	  $success=$q->execute(array(
                            'login'=>$login,
                            'name'=>$name,
                            'firstName'=>$firstName,
                            'email'=>$email,
							'tel'=>$tel,
                            'password'=>password_hash($password , PASSWORD_BCRYPT)

                	  ));
                    if($success){
						//On génère la date et l'heure
						setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
						$date=strftime('%A %d %B %Y').' à '.date('h:i:s');
						
						// On enregistre l'évènement en base de donnée
						$q=$db->prepare('INSERT INTO historique(evenement,date) VALUES (:event,:date) ');
						$event='L\'informaticien <span style="color:blue">'.$informaticien->name.' '.$informaticien->firstName.'</span> a ajouté le magasinier<span style="color:blue">'.$name.' '.$firstName;
						$q->execute(array(
						'event'=>$event,
						'date'=>$date
						));

                      $_SESSION['magasinier_added']='<i class=\"fas fa-check-circle\"></i> Magasinier ajouté avec succès.';
                      redirect('listMagasinier.php');

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

include "views/addMagasinier.view.php"; 
?>