<?php
// Affichage de message flash

if(!function_exists('set_flash')){

	function set_flash($message,$type='info'){

		$_SESSION['notification']['message']=$message;
		$_SESSION['notification']['type']=$type;

	}

}

// Redirige l'utilisateur sur la page donnée en paramètre


if(!function_exists('redirect')){
	function redirect($page){

		header('Location:'.$page);
		exit();
	}
}

// Stocke les inputs du formualaire de manière temporaire  en session

if(!function_exists('save_input_data')){

	function save_input_data(){
      foreach ($_POST as $key => $value) {
      	if(strpos($key, 'password')==false){

      		$_SESSION['input'][$key]=$value;

      	}


      }
	}
}

//Recupère les inputs du formualaire stockés de manière temporaire  en session

if(!function_exists('get_input')){

	function get_input($key){


         	return !empty($_SESSION['input'][$key])

         	? escape($_SESSION['input'][$key])

         	: null;

	}

}

//Supprimer les données en sesssion dès que l'utilisateur a fini l'inscription
if(!function_exists('clear_input_data')){

	function clear_input_data(){
		if(isset($_SESSION['input'])){

			$_SESSION['input']= [] ;
	   }

    }

 }


 //Redirection de l'utilisateur sur la page desirée lorsqu'il n'est pas connectée;
if(!function_exists('redirect_friendly')){

	function redirect_friendly($default_url){
		if($_SESSION['forwading_url']){

            $url = $_SESSION['forwading_url'];

		} else{

			$url = $default_url;

		}
		$_SESSION['forwading_url']=null;
		redirect($url);
	}

}


 //Filtre les données  saisies par l'utilisateur
if(!function_exists('escape')){

	function escape($string){
		if($string){
			return htmlspecialchars($string);
		}
	}

}

// Recupère les informations en session;

if(!function_exists('get_session')){

	function get_session($key){
		if($key){
			return !empty($_SESSION[$key])

         	? escape($_SESSION[$key])

         	: null;

		}
	}

}

// Verifie si un tableau de champ n'est pas vide 
if(!function_exists('not_empty'))
{

		function not_empty($fields=[]){

			if(count($fields) != 0)
			{
				foreach ($fields as $field) {

					if(empty($_POST[$field]) || trim($_POST[$field]) == ""){

		             return false;

			       }

			    }
			    return true;
			}

	    }

  }

  // Verifie si le username et l'email sont pas déja dans notre base de donnée

if(!function_exists('is_already_in_use')){

	function is_already_in_use($field, $value, $table){

		  global $db;

		  $q = $db->prepare("SELECT id FROM $table WHERE $field = ?");

		  $q->execute([$value]);

		  $count = $q->rowCount();

		  $q->closeCursor();

		  return $count;

	}

}

if(!function_exists('ceil_count')){

	function ceil_count($table,$field,$value){
   
		global $db;
   
		$q = $db->prepare("SELECT * FROM $table WHERE $field = ?");
   
		$q->execute([$value]);
   
		return $q->rowCount();
	}
   
   }

   // Rechercher toutes les données du directeur avec son id;

if(!function_exists('find_admin_by_id')){

	function find_admin_by_id($id=1){

		global $db;

		$q=$db->prepare("SELECT name,firstName,email,tel FROM super_administrateur WHERE id_admin=? ");

		$q->execute([$id]);

        $data =$q->fetch(PDO::FETCH_OBJ);

        $q->closeCursor();

        return $data;

    }

 }

  // Rechercher toutes les données du fournisseur avec son id;

if(!function_exists('find_fourniss_by_id')){

	function find_fourniss_by_id($id){

		global $db;

		$q=$db->prepare("SELECT name,email,tel FROM fournisseurs WHERE id=? ");

		$q->execute([$id]);

        $data =$q->fetch(PDO::FETCH_OBJ);

        $q->closeCursor();

        return $data;

    }

 }

   // Rechercher toutes les données de l'informaticien avec son id;

if(!function_exists('find_infos_by_id')){

	function find_infos_by_id($id){

		global $db;

		$q=$db->prepare("SELECT name,firstName,email,tel FROM informaticien WHERE id=? ");

		$q->execute([$id]);

        $data =$q->fetch(PDO::FETCH_OBJ);

        $q->closeCursor();

        return $data;

    }

 }
