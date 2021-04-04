
 <?php $title='Connection';?>

<?php include('partials/_header.php');?>
 <body>
   <div id="main-content">

     <div class="container">

       <div  class="border border-primary">

          <h1 id="login-lead" class="lead text-center">Connexion du fournisseur:</h1>

       </div>

          <form  method="POST" class="wells col-md-6 col-md-offset-3 " >

           <!-- Pseudo or Email-Field -->

            <div class="form-group">
                   <label class="control-label" for="pseudo">Pseudo ou Addresse Email:</label>
                   <input type="text" class="form-control" id="pseudo" name="credentials" required="required" >

          </div>


           <!--Password Field -->

            <div class="form-group">
                   <label class="control-label" for="password">Mot de passe:</label>
                   <input type="password" class="form-control" id="password"  name="password" required="required" >

             </div>

         <!-- Remember me Field -->

         <div class="form-group">
           <label class="control-label" for="session_active">
                <input type="checkbox" id="session_active"  name="remember_me"/>
                Garder ma session active
           </label>
         </div>

           <input type="submit" class="btn btn-primary" value="Connection" name="login">
           <p>
             <h5 class="text-center">Vous avez oublié votre mot passe ?
               <a href="forgot_password" class= "btn btn-warning">Réinitialisez!</a>
             </h5>
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



