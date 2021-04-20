<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 
include('filters/fourn_auth_filter.php');

if(isset($_GET['id'])){
    if($_GET['id'] == $_SESSION['fourn_id']){

        $fourniss_infos = find_fourniss_by_id($_GET['id']);
        if(!$fourniss_infos){
            set_flash(" <i class=\"fas fa-exclamation-triangle\"></i>  Url Invalide , evitez de le trafiquer!","warning");
            redirect("fournissLogin.php");
        }

    }else{
      set_flash(" <i class=\"fas fa-exclamation-triangle\"></i>  L'id de l'url est différent de celui de l'utilisateur connecté","warning");
      redirect("fournissLogin.php");
    }
    

}else{
    redirect("fournProfile.php?id=".get_session('fourn_id'));
}







include 'views/fournProfile.view.php';