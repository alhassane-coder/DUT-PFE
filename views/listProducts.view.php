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


    <title>Liste des produits</title>
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
                </div>         
            </div>
            <div class="btn-back">
                <form action="" method="POST">
                    <input class="filter"  style="margin-top :20px;" type="text" name="valueToSearch" value="<?= get_input('valueToSearch')?>" placeholder="Rechercher">
                    <input class="filter-button" type="submit" value="Filtrer" name="filter">
                </form>
            </div>
            <?php if(!empty($products)) : ?>

            <div class="listinfotable" style="overflow-x:auto;">
            <table style="margin: top 30px;">
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Nom de famille</th>
                    <th>Quantité</th>
                    <th>Date d'expiration</th>
                    <th>Prix</th>
                    <th>TVA</th>
                    <th>CODE QR</th>
                    <th>Action:</th>

                </tr>  
                <?php $i = 1; ?>

            <?php foreach($products as $product) : ?>
                <tr>
                    <td><?=  $i++ ?></td>
                    <td><?= $product->nomproduit ?></td>
                    <td><?= $product->nomfamille ?></td>
                    <td><?= $product->qte_produit ?></td>
                    <td><?= $product->expire_date ?></td>
                    <td><?= $product->prix?> Dhs</td>
                    <td><?= $product->tva ?></td>
                    <td><img class="qrcode" src="<?= $product->qrcode ?>" alt="Code qr du produit"> </td>
                    <td>
                      <a title="Supprimer le produit" style="text-align:justify;" onclick="return confirm('Voulez vous vraiment supprimer ce produit ?');" class="submit-btn1" href="delProduct.php?id=<?=$product->idproduit ?>&name=<?= $product->nomproduit ?>"><i style="font-size: 18px;" class="fas fa-trash-alt"></i> </a><br><br>
                      <a title="Mofifier le produit" style="text-align:justify;"  onclick="return confirm('Voulez vous vraiment modifier ce produit ?');" class="submit-btn2" href="editProduct.php?id=<?=$product->idproduit ?>"><i style="font-size: 18px;" class="far fa-edit"></i> </a>
                    </td>
                </tr>

            <?php endforeach; ?>

            </table><br><br>
            <a style="padding: 2px;" onclick="return confirm('Confirmez-vous l\'impression ?');" target="_blank" class="submit-btn4" href="printProduct.php"><i class="fa fa-print" aria-hidden="true"></i> Imprimer</a>

            <?php else: ?>
                <h8 ><i class="fas fa-exclamation-triangle"></i> Aucun produit pour le moment </h8>
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

<!-- Message de succès après suppression du Produit -->
 
<?php if(!empty($_SESSION['deleted'])):?>
    <script type="text/javascript">
         alertify.success("<i class=\"fas fa-check-circle\"></i> Produit supprimé avec succès !");
    </script>
  <?php endif;?>
  <?php $_SESSION['deleted']='';?>
 
  <!-- Message d'erreur après suppression du Produit -->

  <?php if(!empty($_SESSION['deleted_error'])):?>
    <script type="text/javascript">
         alertify.error("<i class=\"fas fa-check-circle\"></i> Erreur lors de la suppression du Produit !");
    </script>
  <?php endif;?>
  <?php $_SESSION['deleted_error']='';?>

  
<!-- Message de succès après ajout de Produit -->
 
<?php if(!empty($_SESSION['product_added'])):?>
    <script type="text/javascript">
         alertify.success("<?= $_SESSION['product_added'] ?>");
    </script>
  <?php endif;?>
  <?php $_SESSION['product_added']='';?>

  <!-- Message d'erreur après trafic de l'url -->
 
<?php if(!empty($_SESSION['url_error'])):?>
    <script type="text/javascript">
         alertify.error("<i class=\"fas fa-exclamation-triangle\"></i>Evitez de trafiquer l\'url");
    </script>
  <?php endif;?>
  <?php $_SESSION['url_error']='';?>

<!-- Message de succès après suppression du Produit -->
 
<?php if(!empty($_SESSION['product_edited'])):?>
    <script type="text/javascript">
         alertify.success("<i class=\"fas fa-check-circle\"></i> Produit modifié avec succès !");
    </script>
  <?php endif;?>
  <?php $_SESSION['product_edited']='';?>
 