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




    <title>Postuler des nouveautés</title>
</head>
<body>
    <input type="checkbox" name="" id="sidebar-toggle">
    <?php include "fournsidebar.php"; ?>
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
                    <h1> Profil du fournisseur </h1>
                    <small> Utilisateur de l'application Web </small>
                    <?php include('partials/_flash.php'); ?>

                </div>
                <div class="header-actions">
                    <a class="buton" href="fournEditProfile.php">
                     <span><i class="fas fa-edit"></i></span>
                      Modifier mon profil
                    </a>
                </div>         
            </div>
            <div class="form-content">
                <?php include('partials/_errors.php'); ?>
                <?php include('include/scripts.php');?>
                  <form  method="POST" class="infos" data-parsley-validate >
			   <h4 style="color: rgb(0, 174, 255); margin-bottom: 10px;">Postuler des nouveautés</h4>

			   <table class="tb-add" align=center cellspacing=10 >
                        
                            <!--Product name Field -->
					<th class="hidden_th">Nom du nouveau produit :</th>
					<tr>
						<td class="column1">Nom du nouveau produit :</td>
						<td><input type="text" placeholder="Nom du nouveau produit:"id="productname" name="productname"   required="required" data-parsley-minlength="3" data-parsley-trigger="change"></td>
					</tr>

					<!--  Quantity Field -->
					<th class="hidden_th">Quantité du produit:</th>
					<tr>
						<td class="column1">Quantité du produit:</td>
						<td><input type="number" placeholder="Quantité du produit:"name="qte"  required="required"></td>
					</tr>

                    <!-- Expire date Field -->
					<th class="hidden_th">Date d'expiration:</th>
					<tr>
						<td class="column1">Date d'expiration:</td>
						<td><input type="date" placeholder="Date d'expiration:"name="expire_date"  required="required" ></td>
					</tr>

                     <!-- Price Field -->
					<th class="hidden_th">Description de la nouveauté:</th>
					<tr>
						<td class="column1">Description de la nouveauté</td>
						<td><textarea  style=" font-size:17px;" name="description" placeholder="Description de la nouveauté:" cols="23" required="required"></textarea></td>
					</tr>            
     
			    </table>
			    <input type="submit" style="margin-top:10px;" class="submit-btn3" value="Postuler" name="make_news">
				                      
                  
                </form>
		

         </div>   
         
                    
        </main>
    </div>
<label for="sidebar-toggle" class="body-label"></label>

</body>

<?php include('partials/_footer.php');?> 
