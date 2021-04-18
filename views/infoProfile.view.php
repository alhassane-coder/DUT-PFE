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
            <div class="infos_back">
                <div class="form-content">
                    <h5>Nom: <span style="font-size:1em; color:blue"><?= $informaticien->name ?></span></h5><br>
                    <h5>Prenom:  <span style="font-size:1em; color:blue"><?= $informaticien->firstName ?></span></h5><br>
                    <h5>Email:  <span style="font-size:1em; color:blue"><?= $informaticien->email?></span></h5><br>
                    <h5>Numéro de Téléphone:  <span style="font-size:1.5em; color:blue"><?= $informaticien->tel ?></span></h5><br>
                </div>              
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


<!-- Message de succès après connection -->
 <?php if(!empty($_SESSION['connected'])):?>
    <script type="text/javascript">
         alertify.success('<?= $_SESSION['connected'] ?>');
    </script>
  <?php endif;?>
  <?php $_SESSION['connected']='';?>

<!-- Message de succès après modification du mot de passe -->
<?php if(!empty($_SESSION['password_updated'])):?>
    <script type="text/javascript">
         alertify.success('<?= $_SESSION['password_updated'] ?>');
    </script>
  <?php endif;?>
  <?php $_SESSION['password_updated']='';?>

  <!-- Message de succès après modification du profil -->
<?php if(!empty($_SESSION['informatician_updated'])):?>
    <script type="text/javascript">
         alertify.success('<?= $_SESSION['informatician_updated'] ?>');
    </script>
  <?php endif;?>
  <?php $_SESSION['informatician_updated']='';?>


  <!-- Message de succès après appel -->
<?php if(!empty($_SESSION['offre_added'])):?>
    <script type="text/javascript">
         alertify.success('<?= $_SESSION['offre_added'] ?>');
    </script>
  <?php endif;?>
  <?php $_SESSION['offre_added']='';?>
