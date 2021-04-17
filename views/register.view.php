
 <?php $title='Inscription';?>

<?php include('partials/_header.php');?>
 <body>
   <div id="main-content">

     <div class="container">

       <div  class="border border-primary">

          <h1 id="login-lead" class="lead text-center">Inscription du fournisseur</h1>

       </div>

          <form  method="POST" class="wells col-md-6 col-md-offset-3 " data-parsley-validate >
          <?php include('partials/_errors.php'); ?>
          <?php include('include/scripts.php');?>

               <!--Username Field -->
                       	 
               <div class="form-group">
              		<label class="control-label" for="name">Nom d'utilisateur:</label>
              		<input type="text" class="form-control" id="name" name="login" value="<?= get_input('login') ?>"n required="required">
              	</div>

            <!-- Full Name Field -->
                       	 
            <div class="form-group">
                <label class="control-label" for="name">Prénom & Nom:</label>
 				        <input type="text" class="form-control" id="name" name="name" required="required" value="<?= get_input('name') ?>" data-parsley-minlength="5" data-parsley-trigger="change">
              				    
            </div>
           <!-- Email Field -->
                       	 
             <div class="form-group">
              	<label class="control-label" for="Email">Addresse Email:</label>
              	<input type="email" class="form-control" id="Email"  name="email" data-parsley-trigger="keypress" value="<?= get_input('email') ?>" required="required">
              	<small id="emailHelp" class="form-text text-muted" style="color: white; " >On ne partagera votre email avec personne d'autre.</small>
            </div>

            <!-- Tel Field -->
                       	 
             <div class="form-group">
              	<label class="control-label" for="tel">Téléphone:</label>
              	<input type="tel" class="form-control" id="tel"  name="tel" data-parsley-trigger="keypress" value="<?= get_input('tel') ?>" required="required">
              	<small id="emailHelp" class="form-text text-muted" style="color: white; " >Votre numéro reste confidentiel, on ne le partagera pas.</small>
            </div>

          <!--Password Field -->
                       	 
             <div class="form-group">
              	 <label class="control-label" for="password">Mot de passe:</label>
    		    <input type="password" class="form-control" id="password"  name="password" required="required"  data-parsley-minlength="6" data-parsley-trigger="keypres">
          				    
            </div>
	    <!--Password Confirmation-->
                       	 
            <div class="form-group">
              	<label class="control-label" for="password_confirm">Confirmer Mot de passe :</label>
              	<input type="password" class="form-control" id="password_confirm" name="password_confirm" required="required" data-parsley-equalto="#password" data-parsley-trigger="keypress" >
              				    
            </div>


            <input type="submit" class="btn btn-primary" value="Inscription" name="register">                        
                 <p >
                     <h5 class="text-center">Vous avez déja un compte compte?</h5>
                    <div class="text-center" ><a class="Modal-btn2">Connectez-vous!</a></div>
                </p>

        </form>

     </div><!-- /.container -->
	  
     <!-- Connexion Modal -->
    <div class="Modal-bg">
	  	 <div class="Modal">
			  <h4 class="lead">En tant que: </h4>
			  <a href="adminLogin.php" class="btn btn-primary ">Administrateur</a>
	      <a href="supadminLogin.php" class="btn btn-primary ">Directeur</a>
		    <a href="fournissLogin.php" class="btn btn-primary ">Fournisseur</a>
	      <a href="magLogin.php" class="btn btn-primary ">Magasinier</a>
			  <span class="modal-close"><i class="fa fa-times" aria-hidden="true"></i></span>
		</div>	  
	  </div>
    <script src="assets/js/app.js"></script>
   </div>

   	  
     <!-- END Connexion Modal -->
  </body>

   <?php include('partials/_footer.php');?>



