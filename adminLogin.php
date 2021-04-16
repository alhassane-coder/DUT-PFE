<?php
session_start();

require("config/database.php");
require("include/functions.php");
//include('filters/guest_filter.php');

//Si le formulaie de connection a été soumis ;
if(isset($_POST['login']))
  {
    if(not_empty(['credentials','password']) ){

        extract($_POST);
        $errors =[];

        $q=$db->prepare("SELECT id,login,email,password as hashed_password FROM informaticien WHERE
         (login = :credentials or email = :credentials)
         and active='1'");
        $q->execute([
           'credentials'=> $credentials
        ]);
        $userHasBeenFound=$q->rowCount();

        $informaticien = $q->fetch(PDO::FETCH_OBJ);

        if($userHasBeenFound && password_verify($password, $informaticien->hashed_password) ){

          // Variable session pour la librairie alertify

            $_SESSION['connected']="Bienvenue $informaticien->login , Vous êtes connecté avec succès <i class=\"fas fa-check-circle\"></i>.<br> Profitez-en ☺!";
            $_SESSION['info_id']= $informaticien->id;
            $_SESSION['info_login']= $informaticien->login;
            $_SESSION['email']= $informaticien->email;

            redirect_friendly('infoProfile.php?id='.$informaticien->id);


        }else{

            $errors[]="<i class=\"fas fa-exclamation-triangle\"></i> Combinaison Identifiants/Mot de passe Incorrect!";
            save_input_data();
        }

    }else{
           $errors[] = '"<i class="fas fa-exclamation-triangle"></i> Veuillez SVP remplir tous les champs pour vous connecter!';
            save_input_data();
    }


} else{

      clear_input_data();
}

?>

<?php include 'views/adminLogin.view.php';
