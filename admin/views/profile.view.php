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




    <title>Admin dashboard</title>
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
               <!-- <input type="search" placeholder="Rechercher">
                <span><i class="fas fa-search"></i></span> -->
                <span><a style="color: red; font-size: 0.9rem;text-decoration:none;"href="../logout.php"><i class="fas fa-sign-out-alt"></i>Se Deconnecter</a></span>
            </div>     
        </header>
        <main>
            <div class="page-header">
                <div>
                    <h1> Profil du directeur </h1>
                    <small> Gestionnaire de l'application web</small>

                </div>
                <div class="header-actions">
                  
                </div>         
            </div>
            <div class="infos_back">
                <div class="form-content">
                    <h5>Nom: <span style="font-size:1em; color:blue"><?= $admin_infos->name ?></span></h5><br>
                    <h5>Prenom:  <span style="font-size:1em; color:blue"><?= $admin_infos->firstName ?></span></h5><br>
                    <h5>Email:  <span style="font-size:1em; color:blue"><?= $admin_infos->email?></span></h5><br>
                    <h5>Numéro de Téléphone:  <span style="font-size:1.5em; color:blue"><?= $admin_infos->tel ?></span></h5><br>
                </div>              
            </div>
                    
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


<!-- Message de succès après connection -->
 <?php if(!empty($_SESSION['connected'])):?>
    <script type="text/javascript">
         alertify.success('Bienvenue Mr <?= $_SESSION['admin_name'] ?> ☺.');
    </script>
  <?php endif;?>
  <?php $_SESSION['connected']='';?>

  <!-- Message de succès après ajout d'utilisateur -->
 <?php if(!empty($_SESSION['informatician_added'])):?>
    <script type="text/javascript">
         alertify.success("<?= $_SESSION['informatician_added'] ?>");
    </script>
  <?php endif;?>
  <?php $_SESSION['informatician_added']='';?>


  
