<div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-flex">
              
              <div class="brand-icons">
                 <span ><a href="infoProfile.php?id=<?=get_session('info_id') ?>"><i class="fas fa-user"></i></a></span>            
              </div>
            </div>
        
        </div>
        <div class="sidebar-main">
            <div class="sidebar-user">
                <img src="assets/img/user.png" alt="">
                <div>
                  <h3> <?= $informaticien->name.' '.$informaticien->firstName?></h3>
                  <span> <?= $informaticien->email ?> </span>
                </div>
            </div>
            <div class="sidebar-menu">
                    <div class="menu-head">
                        <span>Tableau de bord</span>                   
                    </div>
                    <ul>
                        <li>
                             <a href="listFournisseurs.php">
                                <span><i class="fas fa-list"></i> </span>
                                Liste des fournisseurs
                             </a>
                        </li>
                        <li>
                             <a href="listMagasinier.php">
                                <span><i class="fas fa-list"></i> </span>
                                Liste des magasiniers
                             </a>
                        </li>
                    </ul>
                    <div class="menu-head">
                        <span>Gestion</span>                   
                    </div>
                    <ul>
                        <li>
                             <a class="Modal-btn1" style="cursor:pointer;">
                                <span><i class="fas fa-tasks"></i></span>
                                Gestion des produits
                             </a>
                        </li>
                        <li>
                             <a href="addOffer.php">
                                <span><i class="fab fa-buffer"></i></i> </span>
                                Faire un appel d'offre
                             </a>
                        </li>
                        <li>
                             <a href="addMagasinier.php">
                                <span><i class="fas fa-user-plus"></i> </span>
                               Ajouter un magasinier
                             </a>
                        </li>                      
                        <li>
                             <a href="infoEditPassword.php">
                                <span><i class="far fa-edit"></i> </span>
                               Modifier mon mot de passe
                             </a>
                        </li>

                    </ul>
            </div>

        </div>
    
    </div>