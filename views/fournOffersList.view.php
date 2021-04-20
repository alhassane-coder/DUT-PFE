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




    <title>Appels d'offres</title>
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
    
                </div>         
            </div>
            <?php if(!empty($offers)) : ?>

            <div class="listinfotable" style="overflow-x:auto;">
            <table style="margin: top 30px;">
                <tr>
                    <th>N°</th>
                    <th>Produit demandé</th>
                    <th>Quantité</th>
                    <th>Description:</th>
                    <th>Expiration de l'offre</th>
                    <th>Action:</th>
                </tr>  
            <?php foreach($offers as $offer) : ?>
                <tr>
                    <td><?= $offer->id ?></td>
                    <td><?= $offer->produit ?></td>
                    <td><?= $offer->qte ?></td>
                    <td><?= $offer->description ?></td>
                    <td><?= $offer->date ?></td>

                    <td>
                        <a onclick="return confirm('Confirmez-vous la reponse  ?');" class="submit-btn3" href="OfferAnswer.php?id=<?=$offer->id ?>"><i class="fa fa-comments" aria-hidden="true"></i> Repondre</a>
                    </td>
                </tr>

            <?php endforeach; ?>

            </table>
            <?php else: ?>
                <h8 ><i class="fas fa-exclamation-triangle"></i> Aucun fournisseur pour le moment </h8>
            <?php endif; ?>
                        
                    
        </main>
    </div>
<label for="sidebar-toggle" class="body-label"></label>

</body>

<?php include('partials/_footer.php');?> 


