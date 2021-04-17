<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c1cf6b23f8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" type="text/css" href="librairies/alertify/css/alertify.css">


    <title>Informaticien dashboard</title>
</head>
<body>
    <input type="checkbox" name="" id="sidebar-toggle">
  <?php include "infosidebar.php"; ?>
    <div class="main-content">
        <header>
            <div class="menu-toogle">
                <label for="sidebar-toggle">
                    <span><i class="fas fa-bars"></i></span>
                </label>
            </div>
            <div class="header-icons">
                <span><a style="color: red; font-size: 0.9rem;text-decoration:none;"href="logout.php"><i class="fas fa-sign-out-alt"></i>Se Deconnecter</a></span>
            </div>     
        </header>
        <main>
            <div class="page-header">
                <div>
                    <h1> Profil de l'administrateur </h1>
                    <small> Admin de l'application web</small>
                    <?php include('partials/_flash.php'); ?>

                </div>
                <div class="header-actions">
                    <a class="buton" href="infoEditProfile.php">
                     <span><i class="fas fa-edit"></i></span>
                      Modifier mon profil
                    </a>
                </div>         
            </div>
            <div class="form-content">
                <?php include('partials/_errors.php'); ?>
                <?php include('include/scripts.php');?>
                  <form  method="POST" class="infos" data-parsley-validate >
			   <h4 style="color: rgb(0, 174, 255); margin-bottom: 10px;">Modifier le mot de passe</h4>

			   <table class="tb-add" align=center cellspacing=10 >
                            <!--Mot de passe actuel -->
					<th class="hidden_th">Mot de passe actuel:</th>
					<tr>
						<td class="column1">Mot de passe actuel: </td>
						<td><input type="password" placeholder="Mot de passe actuel: "id="password" name="current_password" required="required" data-parsley-minlength="6" data-parsley-trigger="change"></td>
					</tr>

                        <!--  Nouveau mot de passe -->
                                    
					<th class="hidden_th">Nouveau mot de passe:</th>
					<tr>
						<td class="column1">Nouveau mot de passe:</td>
						<td><input type="password" placeholder="Nouveau mot de passe:"name="new_password" id="new_password" required="required"  data-parsley-minlength="6" data-parsley-trigger="change"></td>
					</tr>

                    <!--Config New Password Field -->
                        <th class="hidden_th">Confirmer nouveau mot de passe:</th>
					<tr>
						<td class="column1">Confirmer nouveau mot de passe:</td>
						<td><input type="password" placeholder="Confirmer nouveau  mot de passe:"name="new_password_confirm" required="required"  data-parsley-minlength="6" data-parsley-equalto="#new_password" data-parsley-trigger="keypres"></td>
					</tr>            
     
			  </table>
			    <input type="submit" style="margin-top: 20px;" class="submit-btn3" value="Modifier" name="change_password">
				                      
                  
                </form>
		

         </div>                
                    
        </main>
    </div>
<label for="sidebar-toggle" class="body-label"></label> <!-- Connexion Modal -->
	  <div class="Modal-bg">
	  	 <div class="Modal">
			  <h4 class="lead">Action:</h4>
			  <a href="addProducts.php" class="btn btn-primary "><i class="fas fa-plus"></i> Ajouter un produit</a>
	       	  <a href="listProducts.php" class="btn btn-primary "><i class="fas fa-list"></i></i> Liste des produits </a>
			  <span class="modal-close"><i class="fa fa-times" aria-hidden="true"></i></span>
		</div>	  
	  </div>
    <script src="assets/js/app.js"></script>


</body>

<?php include('partials/_footer.php');?> 