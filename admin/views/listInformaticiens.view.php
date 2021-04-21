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


    <title>Liste des informaticiens</title>
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
                    <small> Liste des informaticiens </small>
                </div>
                <div class="header-actions">
                 
                </div>         
            </div>

            <?php if(!empty($informaticiens)) : ?>

            <div class="listinfotable" style="overflow-x:auto;">
             <table style="margin: top 30px;">
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Addresse Email</th>
                    <th>Numéro de Téléphone</th>
                    <th>Action:</th>
                </tr>  
                <?php $i = 1; ?>
            <?php foreach($informaticiens as $informaticien) : ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= $informaticien->name ?></td>
                  <td><?= $informaticien->firstName ?></td>
                  <td><?= $informaticien->email ?></td>
                  <td><?= $informaticien->tel ?></td>
                  <td>
                      <a title="Supprimer l'informaticien" style="text-align:justify;" onclick="return confirm('Voulez vous vraiment supprimer cet informaticien ?');" class="submit-btn1" href="delInformaticien.php?id=<?=$informaticien->id ?>&name=<?=$informaticien->login ?>"><i style="font-size:18px;" class="fas fa-trash-alt"></i> </a><br><br>
                     <?php if($informaticien->active == 1) : ?>
                      <a title="Bloquer l'informaticien" style="text-align:justify;" onclick="return confirm('Voulez vous vraiment bloquer cet informaticien ?');" class="submit-btn2" href="blockInformaticien.php?id=<?=$informaticien->id ?>&name=<?=$informaticien->login ?>"><i style="font-size:18px;" class="fas fa-stop-circle"></i> Bloquer</a>
                      <?php else: ?>
                      <a title="Debloqueer l'informaticien" style="text-align:justify;" onclick="return confirm('Voulez vous vraiment débloquer cet informaticien ?');" class="submit-btn3" href="deblockInformaticien.php?id=<?=$informaticien->id ?>&name=<?=$informaticien->login ?>"><i style="font-size:18px;" class="fas fa-check-circle"></i> Debloquer</a>
                      <?php endif; ?>
                </td>

                </tr>
            

            <?php endforeach; ?>

             </table>
             <?php else: ?>
                <h8 ><i class="fas fa-exclamation-triangle"></i> Aucun informaticien pour le moment </h8>
             <?php endif; ?>

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

 <!-- Message de succès après suppression de l'informaticien -->
 
 <?php if(!empty($_SESSION['deleted'])):?>
    <script type="text/javascript">
         alertify.success("<i class=\"fas fa-check-circle\"></i> Informaticien supprimé avec succès !");
    </script>
  <?php endif;?>
  <?php $_SESSION['deleted']='';?>
 
  <!-- Message d'erreur après suppression de l'informaticien -->

  <?php if(!empty($_SESSION['deleted_error'])):?>
    <script type="text/javascript">
         alertify.error("<i class=\"fas fa-check-circle\"></i> Erreur lors de la suppression de l'informaticien !");
    </script>
  <?php endif;?>
  <?php $_SESSION['deleted_error']='';?>
 
<!-- Message de succès après bloquage de l'informaticien -->

 <?php if(!empty($_SESSION['blocked'])):?>
    <script type="text/javascript">
         alertify.success("<i class=\"fas fa-check-circle\"></i> Informaticien bloqué avec succès.Il ne pourra donc plus se connecter !");
    </script>
  <?php endif;?>
  <?php $_SESSION['blocked']='';?>

<!-- Message d'erreur après bloquage de l'informaticien -->

<?php if(!empty($_SESSION['blocked_error'])):?>
    <script type="text/javascript">
         alertify.success("<i class=\"fas fa-check-circle\"></i> Erreur lors du blocage de l'informaticien !");
    </script>
  <?php endif;?>
  <?php $_SESSION['blocked_error']='';?>

<!-- Message de succès après debloquage de l'informaticien -->

<?php if(!empty($_SESSION['deblocked'])):?>
    <script type="text/javascript">
         alertify.success("<i class=\"fas fa-check-circle\"></i> Informaticien debloqué avec succès.Il pourra desormais se connecter !");
    </script>
  <?php endif;?>
  <?php $_SESSION['deblocked']='';?>
  
<!-- Message d'erreur après debloquage de l'informaticien -->

<?php if(!empty($_SESSION['deblocked_error'])):?>
    <script type="text/javascript">
         alertify.success("<i class=\"fas fa-check-circle\"></i> Erreur lors du blocage de l'informaticien !");
    </script>
  <?php endif;?>
  <?php $_SESSION['deblocked_error']='';?>