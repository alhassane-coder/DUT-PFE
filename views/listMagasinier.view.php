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


    <title>Liste des fournisseurs</title>
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
            <?php if(!empty($magasiniers)) : ?>

            <div class="listinfotable" style="overflow-x:auto;">
            <table style="margin: top 30px;">
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Addresse Email</th>
                    <th>Numéro de Téléphone</th>
                    <th>Action:</th>
                </tr>  
            <?php $i = 1; ?>
            <?php foreach($magasiniers as $magasinier) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $magasinier->name ?></td>
                    <td><?= $magasinier->firstName ?></td>
                    <td><?= $magasinier->email ?></td>
                    <td><?= $magasinier->tel ?></td>
                    <td>
                        <a onclick="return confirm('Voulez vous vraiment supprimer ce magasinier ?');" class="submit-btn1" href="delMagasinier.php?id=<?=$magasinier->id ?>&name=<?=$magasinier->name ?>"><i class="fas fa-trash-alt"></i> Supprimer</a>
                </td>
                </tr>

            <?php endforeach; ?>

            </table>
            <?php else: ?>
                <h8 ><i class="fas fa-exclamation-triangle"></i> Aucun Magasinier pour le moment </h8>
            <?php endif; ?>
                    
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

<!-- Message de succès après l'ajout du Magasinier -->
 
<?php if(!empty($_SESSION['magasinier_added'])):?>
    <script type="text/javascript">
         alertify.success("<?= $_SESSION['magasinier_added'] ?>");
    </script>
  <?php endif;?>
  <?php $_SESSION['magasinier_added']='';?>

<!-- Message de succès après suppression du Magasinier -->
 
<?php if(!empty($_SESSION['deleted'])):?>
    <script type="text/javascript">
         alertify.success("<i class=\"fas fa-check-circle\"></i> Magasinier supprimé avec succès !");
    </script>
  <?php endif;?>
  <?php $_SESSION['deleted']='';?>
 
  <!-- Message d'erreur après suppression du Magasinier -->

  <?php if(!empty($_SESSION['deleted_error'])):?>
    <script type="text/javascript">
         alertify.error("<i class=\"fas fa-check-circle\"></i> Erreur lors de la suppression du magasinier !");
    </script>
  <?php endif;?>
  <?php $_SESSION['deleted_error']='';?>

  
