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