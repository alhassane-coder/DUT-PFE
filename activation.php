<?php session_start();

require('config/database.php');
require("include/functions.php");
//include('filters/guest_filter.php');

$login = base64_decode($_GET['user']);

if(!empty($_GET['user']) &&

 is_already_in_use('login',$login,'fournisseurs')

  && !empty($_GET['token'])

){

	$login = base64_decode($_GET['user']);

	$token= $_GET['token'];

	$q=$db->prepare('SELECT email FROM fournisseurs where login = ?');

	$q->execute([$login]);

	$data=$q->fetch(PDO::FETCH_OBJ);

    $token_verif = sha1($login.$data->email);

    if($token == $token_verif){

     // On active l'utilisateur si tout est ok:

     $q=$db->prepare("UPDATE fournisseurs SET active='1' WHERE login = ? ");

     $q->execute([$login]);

      set_flash("<i class=\"fas fa-check-circle\"></i>Compte activé avec succès connectez-vous avec le formulaire ci-dessous");
      redirect('fournissLogin.php');

    }else{ 
        $_SESSION['invalid'] ="invalid";      
        set_flash("<i class=\"fas fa-exclamation-triangle\"></i>Token de vérification invalide réessayer SVP l'inscription  ",'danger');
    	redirect('index.php');
    }

}else{
	redirect('index.php');
}
