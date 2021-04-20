<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 
include('filters/info_auth_filter.php');

if(isset($_GET['id'])){
    if($_GET['id'] == $_SESSION['info_id']){

        $informaticien = find_infos_by_id($_GET['id']);
        if(!$informaticien){
            set_flash("<i class=\"fas fa-exclamation-triangle\"></i>  Mauvais identifiant ","warning");
            redirect('adminLogin.php');
        }

    }else{
      set_flash(" <i class=\"fas fa-exclamation-triangle\"></i>  L'ID de l'url est différent de celui de l'utilisateur connecté","warning");
      redirect("adminLogin.php");
    }
    

}else{
    set_flash("<i class=\"fas fa-exclamation-triangle\"></i>  ID manquant dans l'url","warning");
    redirect('adminLogin.php');
}







include 'views/infoProfile.view.php';

