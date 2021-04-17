<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c1cf6b23f8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/dashboard.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <link rel="stylesheet" type="text/css" href="../librairies/alertify/css/alertify.css">


    <title>Liste des produits du stock</title>
</head>
<body>
    <input type="checkbox" name="" id="sidebar-toggle">
    
    <!-- Sidebar -->
    
     <?php require("sidebar.php"); ?>
    
    <div class="main-content">
        <header>
            <div class="menu-toogle">
                <label for="sidebar-toggle">
                    <span><i class="fas fa-bars"></i></span>
                </label>
            </div>
            <div class="header-icons">
                <span><a style="color: red; font-size: 0.9rem;text-decoration:none;"href="../logout.php"><i class="fas fa-sign-out-alt"></i>Se Deconnecter</a></span>
            </div>     
        </header>
        <main>
            <div class="page-header">
                <div>
                    <h1> Profil du directeur </h1>
                    <small> Liste des Produits du stock </small>
                </div>
                <div class="header-actions">             
                </div>         
            </div>
            
            <?php if(!empty($products)) : ?>

            <div class="listinfotable" style="overflow-x:auto;">
            <table style="margin: top 30px;">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Nom de famille</th>
                    <th>Quantité</th>
                    <th>Date d'expiration</th>
                    <th>Prix</th>
                    <th>TVA</th>

                </tr>  
            <?php foreach($products as $product) : ?>
                <tr>
                    <td><?= $product->idproduit ?></td>
                    <td><?= $product->nomproduit ?></td>
                    <td><?= $product->nomfamille ?></td>
                    <td><?= $product->qte_produit ?></td>
                    <td><?= $product->expire_date ?></td>
                    <td><?= $product->prix ?></td>
                    <td><?= $product->tva ?></td>
                </tr>

            <?php endforeach; ?>

            </table>
            <?php else: ?>
                <h8 ><i class="fas fa-exclamation-triangle"></i> Aucun produit pour le moment </h8>
            <?php endif; ?>     
        </main>
    </div>
<label for="sidebar-toggle" class="body-label"></label>

</body>

<!-- SCRIPTS-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="../librairies/Parsley/parsley.min.js"></script>
<script src="../librairies/Parsley/i18n/fr.js"></script>
<script src="../librairies/alertify/alertify.min.js"></script>



  
