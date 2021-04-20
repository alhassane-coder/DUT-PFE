<div class="sidebar">
        <div class="sidebar-brand">
            <div class="brand-flex">
              
              <div class="brand-icons">
                 <span ><a href="fournProfile.php"><i class="fas fa-user"></i></a></span>            
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
                             <a href="fournOffersList.php">
                                <span><i class="fas fa-reply"></i> </span>
                                Repondre aux appels d'offre
                             </a>
                        </li>
                    
                        <li>
                             <a href="fournEditPassword.php">
                                <span><i class="far fa-edit"></i> </span>
                               Modifier mon mot de passe
                             </a>
                        </li>

                    </ul>
            </div>

        </div>
    
    </div>
























