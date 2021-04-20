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


    <title>Modifier un produit</title>
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
            <div class="form-content">
                <?php include('partials/_errors.php'); ?>
                <?php include('include/scripts.php');?>
                  <form  method="POST" class="infos" data-parsley-validate >
			   <h4 style="color: rgb(0, 174, 255); margin-bottom: 10px;">Modifier un produit</h4>

			   <table class="tb-add" align=center cellspacing=10 >
                        
                            <!--Product name Field -->
					<th class="hidden_th">Nom du produit:</th>
					<tr>
						<td class="column1">Nom du produit:</td>
						<td><input type="text" placeholder="Nom du produit:"id="productname" name="productname" value="<?= $product->nomproduit  ?>"   required="required" data-parsley-minlength="3" data-parsley-trigger="change"></td>
					</tr>

                        <!-- Family Name Field -->
                                    
					<th class="hidden_th">Nom famille :</th>
					<tr>
						<td class="column1">Nom famille :</td>
						<td><input type="text" placeholder="Nom famille :"name="familyname" value="<?= $product->nomfamille  ?>" required="required" data-parsley-minlength="3" data-parsley-trigger="change"></td>
					</tr>
          
					<!--  Quantity Field -->
					<th class="hidden_th">Quantité du produit:</th>
					<tr>
						<td class="column1">Quantité du produit:</td>
						<td><input type="number" placeholder="Quantité du produit:"name="qte" value="<?= $product->qte_produit?>" required="required"></td>
					</tr>

                    <!-- Expire date Field -->
					<th class="hidden_th">Date d'expiration:</th>
					<tr>
						<td class="column1">Date d'expiration:</td>
						<td><input type="date" placeholder="Date d'expiration:"name="expire_date" value="<?= $product->expire_date ?>" required="required" ></td>
					</tr>

                     <!-- Price Field -->
					<th class="hidden_th">Prix:</th>
					<tr>
						<td class="column1">Prix</td>
						<td><input type="number" placeholder="Prix:"name="price" value="<?= $product->prix ?>" required="required"></td>
					</tr> 

                    <!-- TVA Field -->
					<th class="hidden_th">TVA:</th>
					<tr>
						<td class="column1">TVA</td>
						<td><input type="text" placeholder="TVA:"name="tva" value="<?= $product->tva ?>" required="required"></td>
					</tr>            
     
			    </table>
			    <input type="submit" style="margin-top:10px;" class="submit-btn" value="Modifer" name="edit_product">
				                      
                  
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