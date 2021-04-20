<?php 
if(!isset($_SESSION['info_login'])){

$_SESSION['forwading_url']=$_SERVER['REQUEST_URI'];

set_flash("<i class=\"fas fa-exclamation-circle\"></i>Attention,Contenu réservé aux informaticiens pouvant se connecter!.",'danger');
	redirect('adminLogin.php');
}
?>