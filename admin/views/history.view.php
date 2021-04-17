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

    <title>Historique d'utilisation</title>
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
                    <small> Historique d'utilisation </small>
                </div>
                <div class="header-actions">
                   
                </div>         
            </div>

            <?php if(!empty($history)) : ?>

            <div class="listinfotable" style="overflow-x:auto;">
                <table style="margin: top 30px;">
                    <tr>
                        <th>ID</th>
                        <th>Evènement</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr> 
                <?php foreach($history as $history) : ?>
                    <tr>
                        <td><?= $history->idhistorique ?></td>
                        <td><?= $history->evenement ?></td>
                        <td><?= $history->date ?></td>
                        <td>
                            <a style="text-align:justify;" onclick="return confirm('Voulez vous vraiment supprimer cet historique ?');" class="submit-btn1" href="delHistory.php?id=<?=$history->idhistorique ?>"><i class="fas fa-trash-alt"></i> Supprimer</a>
                        </td>

                    </tr>

                <?php endforeach; ?>

                </table>
            <?php else: ?>
                <h8 ><i class="fas fa-exclamation-triangle"></i> Aucun evenement pour le moment </h8>
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

<!-- Message d'alerte après succès de la suppression de l'evenement -->
<?php if(!empty($_SESSION['story_deleted'])):?>
    <script type="text/javascript">
         alertify.success("<i class=\"fas fa-check-circle\"></i> évènement supprimé avec succès !");
    </script>
  <?php endif;?>
  <?php $_SESSION['story_deleted']='';?>

<!-- En cas d'Erreur de suppression -->
  <?php if(!empty($_SESSION['deleted_error'])):?>
    <script type="text/javascript">
         alertify.error("<i class=\"fas fa-check-circle\"></i> Erreur lors de la suppression de l'évènement !");
    </script>
  <?php endif;?>
  <?php $_SESSION['deleted_error']='';?>