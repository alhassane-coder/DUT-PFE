<?php
session_start();

require("config/database.php");
require("include/functions.php");
//include('filters/guest_filter.php');

//Si le formulaie de connection a été soumis ;
if(isset($_POST['login']))
  {
    if(not_empty(['credentials','password']) ){

        extract($_POST);

        $q=$db->prepare("SELECT id,login,email,password as hashed_password FROM magasinier WHERE
         (login = :credentials or email = :credentials)");

        $q->execute([
           'credentials'=> $credentials
        ]);

        $userHasBeenFound=$q->rowCount();

        $magasinier = $q->fetch(PDO::FETCH_OBJ);

        if($userHasBeenFound && password_verify($password, $magasinier->hashed_password) ){

          // Variable session pour la librairie alertify

            $_SESSION['connected']="Bienvenue $magasinier->login , Vous êtes connecté avec succès <i class=\"fas fa-check-circle\"></i>.<br> Profitez-en ☺!";
            $_SESSION['mag_id']= $magasinier->id;
            $_SESSION['mag_login']= $magasinier->login;
            $_SESSION['mag_email']= $magasinier->email;
            setlocale(LC_TIME, ['fr', 'fra', 'fr_FR']);
            $date=strftime('%A %d %B %Y').' à '.date('h:i:s');
            
            // On enregistre l'évènement en base de donnée
            $q=$db->prepare('INSERT INTO historique(evenement,date) VALUES (:event,:date) ');
            $event='Le magasinier <span style="color:blue">'.$magasinier->login.'</span> a accedé au stock';
            $q->execute(array(
            'event'=>$event,
            'date'=>$date
            ));


            redirect_friendly('magProfile.php?id='.$magasinier->id);


        }else{

            $errors[]="<i class=\"fas fa-exclamation-triangle\"></i> Combinaison Identifiants/Mot de passe Incorrect!";
            save_input_data();
        }

    }else{
           $errors[] = '"<i class="fas fa-exclamation-triangle"></i> Veuillez SVP remplir tous les champs pour vous connecter!';
            save_input_data();
    }


} else{

      clear_input_data();
}

?>

<?php include 'views/magLogin.view.php';
