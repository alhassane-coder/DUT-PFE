<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 

if(isset($_GET['id'])){
    if($_GET['id'] == $_SESSION['info_id']){

        $informaticien = find_infos_by_id($_GET['id']);

    }else{
      set_flash(" <i class=\"fas fa-exclamation-triangle\"></i>  L'ID de l'url est différent de celui de l'utilisateur connecté","warning");
      redirect("adminLogin.php");
    }
    

}else{
    set_flash("<i class=\"fas fa-exclamation-triangle\"></i>  ID manquant dans l'url","warning");
    redirect("infoProfile.php?id=".get_session('info_id'));
}







include 'views/infoProfile.view.php';

