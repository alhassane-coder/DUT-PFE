<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c1cf6b23f8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <link rel="stylesheet" href="assets/css/all.css">



    <title>Fournisseur dashboard</title>
</head>
<body>
    <input type="checkbox" name="" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-flex">
              
              <div class="brand-icons">
                 <span ><a href="magProfile.php"><i class="fas fa-user"></i></a></span>            
              </div>
            </div>
        
        </div>
        <div class="sidebar-main">
            <div class="sidebar-user">
                <img src="assets/img/mag.jpeg" alt="">
                <div>
                  <h3> <?= $mag_infos->name?></h3>
                  <span> <?= $mag_infos->email ?> </span>
                </div>
            </div>
            <div class="sidebar-menu">
                    <div class="menu-head">
                        <span>Tableau de bord</span>                   
                    </div>
                    <ul>
                        <li>
                             <a href="magListProducts.php">
                                <span><i class="fas fa-list"></i> </span>
                                Liste des produits
                             </a>
                        </li>
                    </ul>
            </div>

        </div>
    
    </div>
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
                    <h1> Profil du magasinier </h1>
                    <small> Simple Utilisateur de l'application Web </small>
                    <?php include('partials/_flash.php'); ?>

                </div>
                <div class="header-actions">
                   
                </div>         
            </div>
            <div class="infos_back">
                <div class="form-content">
                    <h5>Nom et Prénom: <span style="font-size:1em; color:blue"><?= $mag_infos->name ?></span></h5><br>
                    <h5>Email:  <span style="font-size:1em; color:blue"><?= $mag_infos->email?></span></h5><br>
                    <h5>Numéro de Téléphone:  <span style="font-size:1.5em; color:blue"><?= $mag_infos->tel ?></span></h5><br>
                </div>              
            </div>
                    
        </main>
    </div>
<label for="sidebar-toggle" class="body-label"></label>

</body>

<?php include('partials/_footer.php');?> 


<!-- Message de succès après connection -->
 <?php if(!empty($_SESSION['connected'])):?>
    <script type="text/javascript">
         alertify.success('Bienvenue Mr <?= $_SESSION['admin_name'] ?> .');
    </script>
  <?php endif;?>
  <?php $_SESSION['connected']='';?>


  
