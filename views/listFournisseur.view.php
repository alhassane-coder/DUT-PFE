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
            <?php if(!empty($fournisseurs)) : ?>

            <div class="listinfotable" style="overflow-x:auto;">
            <table style="margin: top 30px;">
                <tr>
                    <th>N°</th>
                    <th>Prénom et Nom</th>
                    <th>Addresse Email</th>
                    <th>Numéro de Téléphone</th>
                    <th>Action:</th>
                </tr>  
                <?php $i = 1; ?>
            <?php foreach($fournisseurs as $fournsisseur) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $fournsisseur->name ?></td>
                    <td><?= $fournsisseur->email ?></td>
                    <td><?= $fournsisseur->tel ?></td>
                    <td>
                        <a title="Supprimer le fournisseur" onclick="return confirm('Voulez vous vraiment supprimer ce fournsisseur ?');" class="submit-btn1" href="delFournisseur.php?id=<?=$fournsisseur->id ?>&name=<?=$fournsisseur->name ?>"><i style="font-size: 18px;" class="fas fa-trash-alt"></i></a>
                </td>
                </tr>

            <?php endforeach; ?>

            </table>
            <?php else: ?>
                <h8 ><i class="fas fa-exclamation-triangle"></i> Aucun fournisseur pour le moment </h8>
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

<!-- Message de succès après suppression du Fournisseur -->
 
<?php if(!empty($_SESSION['deleted'])):?>
    <script type="text/javascript">
         alertify.success("<i class=\"fas fa-check-circle\"></i> Fournisseur supprimé avec succès !");
    </script>
  <?php endif;?>
  <?php $_SESSION['deleted']='';?>
 
  <!-- Message d'erreur après suppression du Fournisseur -->

  <?php if(!empty($_SESSION['deleted_error'])):?>
    <script type="text/javascript">
         alertify.error("<i class=\"fas fa-check-circle\"></i> Erreur lors de la suppression du fournisseur !");
    </script>
  <?php endif;?>
  <?php $_SESSION['deleted_error']='';?>

  
