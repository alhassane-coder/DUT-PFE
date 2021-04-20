<?php
session_start();

require("config/database.php");
require("include/functions.php");
require("admin/config.php");
include('admin/filters/guest_filter.php');

//Si le formulaie de connection a été soumis ;
 if(isset($_POST['login'])){
    if(not_empty(['credentials','password']) ){

        extract($_POST);
        $errors=[];
        if( isset($admin)
            && $admin['login'] == $credentials
            && $admin['password']== $password 
            || $admin['email'] == $credentials 
            && $admin['password']== $password  ){
               
                extract($admin);
                $_SESSION['connected'] = 'success';
                $_SESSION['admin_login'] = $login;
                $_SESSION['admin_email'] = $email;
                $_SESSION['admin_name'] = $name;
                $_SESSION['admin_firstName'] = $firstName;
                $_SESSION['admin_tel'] = $tel;
               
                redirect_friendly('admin/profile.php?id=1');
                set_flash("Bienvenue $login, Vous êtes connecté avec succès <i class=\"fas fa-check-circle\"></i>.<br> Profitez-en ☺!");


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

<?php include 'views/supadminLogin.view.php';