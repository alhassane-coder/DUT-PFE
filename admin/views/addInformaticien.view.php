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


    <title>Ajouter des informaticiens</title>
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
                <span><a style="color: red; font-size: 0.9rem;text-decoration:none;"href="../logout.php"><i class="fas fa-sign-out-alt"></i>Se Deconnecter</a></span>
            </div>     
        </header>
        <main>
            <div class="page-header">
                <div>
                    <h1> Profil du directeur </h1>
                    <small> Ajouter des informaticiens </small>
                </div>
                <div class="header-actions">
                    <a class="buton" href="">
                     <span><i class="fas fa-edit"></i></span>
                      Modifier mon profil
                    </a>
                </div>         
            </div>
                <div class="form-content">
                <?php include('../partials/_errors.php'); ?>
                <?php include('../include/scripts.php');?>
                  <form  method="POST" class="infos" data-parsley-validate >
			   <h4 style="background: rgb(0, 174, 255); color: white; margin-bottom: 10px;">Ajouter un informaticien</h4>

			   <table class="tb-add" align=center cellspacing=10 >
                            <!--Username Field -->
					<th class="hidden_th">Nom d'utilisateur:</th>
					<tr>
						<td class="column1">Nom d'utilisateur:</td>
						<td><input type="text" placeholder="Nom d'utilisateur:"id="name" name="login" required="required" data-parsley-minlength="3" data-parsley-trigger="change"></td>
					</tr>

                        <!--  Name Field -->
                                    
					<th class="hidden_th">Nom:</th>
					<tr>
						<td class="column1">Nom:</td>
						<td><input type="text" placeholder="Nom:"name="name" required="required"  data-parsley-minlength="5" data-parsley-trigger="change"></td>
					</tr>
          
					<!--  firstName Field -->
					<th class="hidden_th">Prénom:</th>
					<tr>
						<td class="column1">Prénom:</td>
						<td><input type="text" placeholder="Prénom:"name="firstName" required="required"  data-parsley-minlength="5" data-parsley-trigger="change"></td>
					</tr>

                    <!-- Email Field -->
					<th class="hidden_th">Email:</th>
					<tr>
						<td class="column1">Email:</td>
						<td><input type="email" placeholder="Addresse Email:"name="email" required="required"   data-parsley-trigger="change"></td>
					</tr>

                     <!-- Tel Field -->
					<th class="hidden_th">Téléphone:</th>
					<tr>
						<td class="column1">Téléphone</td>
						<td><input type="tel" placeholder="Numéro de Téléphone:"name="tel" required="required"  data-parsley-minlength="8" data-parsley-trigger="change"></td>
					</tr>

                    <!--Password Field -->
                        <th class="hidden_th">Mot de passe:</th>
					<tr>
						<td class="column1">Mot de passe:</td>
						<td><input type="password" placeholder="Mot de passe:"name="password" required="required"  data-parsley-minlength="5" data-parsley-trigger="keypres"></td>
					</tr>            
     
			</table>
			<input type="submit" class="submit-btn" value="Ajouter" name="add_informaticien">
				                      
                  
                </form>
		

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



  
