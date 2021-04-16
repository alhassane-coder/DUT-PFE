<div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-flex">
              
              <div class="brand-icons">
                 <span ><a href="profile.php"><i class="fas fa-user"></i></a></span>            
              </div>
            </div>
        
        </div>
        <div class="sidebar-main">
            <div class="sidebar-user">
                <img src="../assets/img/user.jpeg" alt="">
                <div>
                  <h3> <?= $admin_infos->name.' '.$admin_infos->firstName?></h3>
                  <span> <?= $admin_infos->email ?> </span>
                </div>
            </div>
            <div class="sidebar-menu">
                    <div class="menu-head">
                        <span>Tableau de bord</span>                   
                    </div>
                    <ul>
                        <li>
                             <a href="history.php">
                                <span><i class="fas fa-history"></i> </span>
                                Historique d'utilisation
                             </a>
                        </li>
                        <li>
                             <a href="listProduits.php">
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
                             <a href="addInformaticien.php">
                                <span><i class="fas fa-user-plus"></i> </span>
                                Ajouter des informaticiens
                             </a>
                        </li>
                        <li>
                             <a href="listInformaticiens.php">
                                <span><i class="fas fa-tasks"></i></span>
                                Gérer les informaticiens
                             </a>
                        </li>
                       
                        <li>
                             <a href="listFournisseurs.php">
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