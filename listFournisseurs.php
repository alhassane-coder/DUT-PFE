<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 
include('filters/info_auth_filter.php');


$informaticien = find_infos_by_id(get_session('info_id'));


// On selectionne la liste fournisseurs 

$q=$db->query("SELECT id,name,email,tel FROM fournisseurs where active=1");

$fournisseurs = $q->fetchAll(PDO::FETCH_OBJ);

include "views/listFournisseur.view.php"; 
