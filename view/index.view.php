<?php $title = "Accueil" ;?>
 <?php include('partials/_header.php');?>
<body>
<div id="main-content">
	<div class="bg-image">
		<img src="assets/img/bg-image1.jpg" alt="">
	</div>
	<div class="bg-text">
  			<h1>Gérer le stock de votre entreprise</h1>
			<p class="bg-pub" >Le moins le plus simple pour la gestion d'un stock giganstesque!<br>
				<span style="font-size: 0.8em; font-weight: normal ;"> Simple, rapide et efficace ☺ .</span>
			</p>			  
	</div>
	
       <div class=" jumbotron ">
                <h1 class="fs-6 well text-center" >Simple et Rapide ☺!</h1>
				<p>Bienvenue sur cette application Web de gestioon de stock :).<br>
            	 Et qui dit stock ,dit également entreprise.
            	 Grace à cette plateforme , votre entreprise sera plus structurée et plus productive car vous aurez la possibilité de gérer avec une grande simplicité une grande stock,
				 suivre facilement vos produits, rester en contact avec vos fournisseurs , imprimer les détails des produits et beaucoup d'autres fonctionnalités.
			     Il permet également au directeur de l'entreprise d'ajouter, bloquer et supprimer des informaticiens qui utiliseront l'apllication et de superviser les travaux de ce dernier grace 
				 à un historique d'utilisation.Et permettra aussi à l'informaticien
				 de gérer les produits (ajouter , supprimer , modifier) et de faire des appels d'offres aux fournisseurs.
				 Les fournisseurs quant à eux , pourront répondre aux appels d'offres et/ou postuler des nouveautés.
	
				 Alors n'hesitez plus et <a href="register.php" class="btn btn-success btn-lg">Réjoignez </a>dès maintenant  en tant que <span style="font-weight: bold;">fournisseur</span> !☺ ou
				<button  class="btn btn-primary btn-lg Modal-btn2">Connectez-vous</button> pour gérer votre stock!</p>
                
      </div>

	  <!-- Connexion Modal -->
	  <div class="Modal-bg">
	  	 <div class="Modal">
			<h4 class="lead">En tant que: </h4>
			<a href="adminlogin.php" class="btn btn-primary ">Administrateur</a>
		    <a href="supadminlogin.php" class="btn btn-primary ">Directeur</a>
		    <a href="fournisslogin.php" class="btn btn-primary ">Fournisseur</a>
			<span class="modal-close"><i class="fa fa-times" aria-hidden="true"></i></span>
		</div>	  
	  </div>
	   <!-- END Connexion Modal -->
 </div>

<script src="assets/js/app.js"></script>

</body>
 <?php include('partials/_footer.php');?>



















