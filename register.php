<?php
session_start();
//include('filters/guest_filter.php');
require("include/functions.php");
require("config/database.php");

//Si le formulaie a été soumis ;
if(isset($_POST['register']))
  {
    if(not_empty(['name','login','email','password','password_confirm']) )
	    {

	         $errors=[];

	         extract($_POST);

	         if(mb_strlen($login)<3)
	         {
	         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Nom d\'utilisateur trop court! (Minimum 3 caractères)';
	         }
             if(mb_strlen($name)<3)
	         {
	         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Nom trop court! (Minimum 3 caractères)';
	         }

	         if(!filter_var($email,FILTER_VALIDATE_EMAIL))
	         {
	         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Addresse email invalide!';
	         }

             if(mb_strlen($password) < 6)
	         {

	         	$errors[]='<i class="fas fa-exclamation-triangle"></i> Mot de passe  trop court! (Minimum 6 caractères)';
	         } else{

                if($password != $password_confirm){

                	$errors[]='<i class="fas fa-exclamation-triangle"></i> Les deux mots de passes ne concordent pas !';
                }
	         }

             if(is_already_in_use('login',$login,'fournisseurs'))
             {
             	$errors[]='<i class="fas fa-exclamation-triangle"></i> Nom d\'utilisateur déja utilisé';
             }
             if(is_already_in_use('email',$email,'fournisseurs'))
             {
             	$errors[]='<i class="fas fa-exclamation-triangle"></i> Addresse E-mail  déja utilisé';
             }

             if(count($errors) == 0){

               // Si tout est bon

               //Envoi d'un mail d'activation

              $from='alhassane@alhass.ddns.net';

             	$to = $email;

             	$subject ='-Activation de compte';

             	$password=password_hash($password , PASSWORD_BCRYPT);


                $token = sha1($login.$email.$password);

              // On inclut la page activate.tmpl.php sans l'afficher grace à ob_start

                ob_start();

                require('templates/emails/activation.tmpl.php');

                //On enregistre tout dans $content

                $content = ob_get_clean();

                $headers[] = "From:" . $from;
                $headers[] = 'MIME-Version: 1.0';
                $headers[] = 'Content-type: text/html; charset=iso-8859-1';

                // On envoi finalement l'email

                if(  mail($to, $subject, $content, implode("\r\n", $headers)))
                {

                      //On enregistre l'utilisateur et on le  redirige vers la page d'accueil et l'alerter pour qu'il verifie sa boite mail

                  $q=$db->prepare('INSERT INTO fournisseurs (login,name,email,password) VALUES(:login,:name,:email,:password)');

                	  $success=$q->execute(array(
                            'login'=>$login,
                            'name'=>$name,
                            'email'=>$email,
                            'password'=>$password            

                	  ));
                    if($success){
                      $_SESSION['email_sent']='success';
                      redirect('index.php');

                    }              

                }else {

                    $q=$db->prepare('DELETE FROM fournisseur WHERE id = ?');

                        $id = $db->lastInsertId();
                        $q->execute([$id]);

                	set_flash("<i class=\"fas fa-exclamation-triangle\"> Echec lors de l'envoi de l'email ressayer!",'info');
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

?>

<?php require('views/register.view.php');?>
