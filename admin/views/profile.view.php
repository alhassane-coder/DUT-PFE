<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c1cf6b23f8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/dashboard.css">


    <title>Admin dashboard</title>
</head>
<body>
    <input type="checkbox" name="" id="sidebar-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-flex">
              
              <div class="brand-icons">
                 <span ><i class="fas fa-user"></i></span>            
              </div>
            </div>
        
        </div>
        <div class="sidebar-main">
            <div class="sidebar-user">
                <img src="../assets/img/user.jpeg" alt="">
                <div>
                  <h3> <?= $_SESSION['admin_name'] ?></h3>
                  <span> <?= $_SESSION['admin_email'] ?> </span>
                </div>
            </div>
            <div class="sidebar-menu">
                    <div class="menu-head">
                        <span>Tableau de bord</span>                   
                    </div>
                    <ul>
                        <li>
                             <a href="">
                                <span><i class="fas fa-history"></i> </span>
                                Historique d'utilisation
                             </a>
                        </li>
                        <li>
                             <a href="">
                                <span><i class="fas fa-list"></i> </span>
                                Liste des produits
                             </a>
                        </li>
                    </ul>
                    <div class="menu-head">
                        <span>Gestion</span>                   
                    </div>
                    <ul>
                        <li>
                             <a href="">
                                <span><i class="fas fa-user-plus"></i> </span>
                                Ajouter des informaticiens
                             </a>
                        </li>
                        <li>
                             <a href="">
                                <span><i class="fas fa-list"></i> </span>
                                Liste des informaticiens
                             </a>
                        </li>
                       
                        <li>
                             <a href="">
                                <span><i class="fas fa-list"></i> </span>
                                Liste des fournisseurs
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
                <input type="search" placeholder="Rechercher">
                <span><i class="fas fa-search"></i></span>
                <span style="color: rgb(0, 174, 255); font-size: 0.9rem;text-decoration:none;" ><a style="color: rgb(0, 174, 255); font-size: 0.9rem;text-decoration:none;"href="../logout.php"><i class="fas fa-sign-out-alt"></i>Se Deconnecter</a></span>
            </div>     
        </header>
        <main>
            <div class="page-header">
                <div>
                    <h1> Profil du directeur </h1>
                    <small> Gestionnaire de l'application web</small>
                </div>
                <div class="header-actions">
                     <button>
                     <span><i class="fas fa-edit"></i></span>
                      Modifier mon profil
                    </button>
                </div>         
            </div>
                    
        </main>
    </div>
<label for="sidebar-toggle" class="body-label"></label>
</body>
</html>