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
                 <span ><a href="fournissProfile.php"><i class="fas fa-user"></i></a></span>            
              </div>
            </div>
        
        </div>
        <div class="sidebar-main">
            <div class="sidebar-user">
                <img src="assets/img/user.jpeg" alt="">
                <div>
                  <h3> <?= $fourniss_infos->name?></h3>
                  <span> <?= $fourniss_infos->email ?> </span>
                </div>
            </div>
            <div class="sidebar-menu">
                    <div class="menu-head">
                        <span>Gestion</span>                   
                    </div>
                    <ul>
                        <li>
                             <a href="">
                                <span><i class="fas fa-plus"></i></span>
                                Postuler des nouveautés
                             </a>
                        </li>
                        <li>
                             <a href="">
                                <span><i class="fas fa-reply"></i> </span>
                                Repondre aux appels d'offre
                             </a>
                        </li>
                    
                        <li>
                             <a href="">
                                <span><i class="far fa-edit"></i> </span>
                               Modifier mon mot de passe
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
                    <h1> Profil du fournisseur </h1>
                    <small> Utilisateur de l'application Web </small>
                    <?php include('partials/_flash.php'); ?>

                </div>
                <div class="header-actions">
                    <a class="buton" href="">
                     <span><i class="fas fa-edit"></i></span>
                      Modifier mon profil
                    </a>
                </div>         
            </div>
            <div class="infos_back">
                <div class="form-content">
                    <h5>Nom et Prénom: <span style="font-size:1em; color:blue"><?= $fourniss_infos->name ?></span></h5><br>
                    <h5>Email:  <span style="font-size:1em; color:blue"><?= $fourniss_infos->email?></span></h5><br>
                    <h5>Numéro de Téléphone:  <span style="font-size:1.5em; color:blue"><?= $fourniss_infos->tel ?></span></h5><br>
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


  
