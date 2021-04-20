
<?php
if(isset($_SESSION['admin_login']) ){	
	set_flash("<i class=\"fas fa-exclamation-circle\"></i>  Vous êtes déjà connecté ".$_SESSION['admin_name']." !<br> déconnectez-vous pour accèder à cette page",'warning');
	redirect('admin/profile.php?id=1');
	exit();
}
?>
