<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 

if(!isset($_SESSION['mag_login'])){
    set_flash("Attention,contenu reservée aux magasiniers!");
    redirect('magLogin.php');
}

if(isset($_GET['id'])){
    if($_GET['id'] == $_SESSION['mag_id']){
        $mag_infos = find_mag_by_id($_GET['id']);
        if(!$mag_infos){
            set_flash(" <i class=\"fas fa-exclamation-triangle\"></i>  Url invalide , évitez de le trafiquer !","warning");
            redirect("magLogin.php");
        }

    }else{
      set_flash(" <i class=\"fas fa-exclamation-triangle\"></i>  L'id de l'url est différent de celui de l'utilisateur connecté","warning");
      redirect("magLogin.php");
    }
    

}else{
    redirect("magProfile.php?id=".get_session('mag_id'));
}







include 'views/magProfile.view.php';