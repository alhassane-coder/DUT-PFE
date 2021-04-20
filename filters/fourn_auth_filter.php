<?php 
if(!isset($_SESSION['fourn_login'])){

$_SESSION['forwading_url']=$_SERVER['REQUEST_URI'];

set_flash("<i class=\"fas fa-exclamation-circle\"></i>Attention,Contenu réservé aux fournisseurs pouvant se connecter!.",'danger');
	redirect('fournissLogin.php');
}
?>