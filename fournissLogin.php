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

        $q=$db->prepare("SELECT id,login,email,password as hashed_password FROM fournisseurs WHERE
         (login = :credentials or email = :credentials)
         and active='1'");

        $q->execute([
           'credentials'=> $credentials
        ]);

        $userHasBeenFound=$q->rowCount();

        $fournisseur = $q->fetch(PDO::FETCH_OBJ);

        if($userHasBeenFound && password_verify($password, $fournisseur->hashed_password) ){

          // Variable session pour la librairie alertify

            $_SESSION['connected']="Bienvenue $fournisseur->login , Vous êtes connecté avec succès <i class=\"fas fa-check-circle\"></i>.<br> Profitez-en ☺!";
            $_SESSION['fourn_id']= $fournisseur->id;
            $_SESSION['fourn_login']= $fournisseur->login;
            $_SESSION['email']= $fournisseur->email;

            redirect_friendly('fournProfile.php?id='.$fournisseur->id);


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

<?php include 'views/fournissLogin.view.php';