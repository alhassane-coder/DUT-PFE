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




    <title>Fournisseur dashboard</title>
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
            <?php if(!empty($offer)) :?>
            <div class="infos_back">
            <center style="color:green;"><b><p>Vous repondez à l'offre N°<?= $offer->id?>:</p></b></center><br>
                <div class="form-content">
                    <h5>Produit souhaité par le magasin : <span style="font-size:1em; color:blue"><?= $offer->produit ?></span></h5><br>
                    <h5>Quantité demandée:  <span style="font-size:1em; color:blue"><?= $offer->qte?></span></h5><br>
                    <h5>Cette offre expirera Le:  <span style="font-size:1.5em; color:blue"><?= $offer->date ?></span></h5><br>
                    <form action="" method="POST">
                        <textarea  name="answer" id="" cols="35" rows="5" placeholder="Votre réponse ici: ................."></textarea><br>
                        <input type="submit" style="margin-top:10px;" class="submit-btn3" value="Repondre">
                    </form>
                </div>              
            </div>
            <?php else: ?>
            <p style="color:red">Url de l'offre invalide</p>
            <?php endif ?>      
        </main>
    </div>
<label for="sidebar-toggle" class="body-label"></label>

</body>

<?php include('partials/_footer.php');?> 
