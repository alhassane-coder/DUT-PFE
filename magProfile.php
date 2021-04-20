<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 

if(isset($_GET['id'])){
    if($_GET['id'] == $_SESSION['mag_id']){

        $mag_infos = find_mag_by_id($_GET['id']);

    }else{
      set_flash(" <i class=\"fas fa-exclamation-triangle\"></i>  L'id de l'url est différent de celui de l'utilisateur connecté","warning");
      redirect("fournissLogin.php");
    }
    

}else{
    redirect("magProfile.php?id=".get_session('mag_id'));
}







include 'views/magProfile.view.php';