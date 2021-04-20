<?php 
if(!isset($_SESSION['admin_login'])){

$_SESSION['forwading_url']=$_SERVER['REQUEST_URI'];

set_flash("<i class=\"fas fa-exclamation-circle\"></i>Attention,Contenu réservé au Directeur.",'danger');
	redirect('../supadminLogin.php');
}
?>