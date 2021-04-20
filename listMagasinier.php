<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 

$informaticien = find_infos_by_id(get_session('info_id'));


// On selectionne la liste fournisseurs 

$q=$db->query("SELECT id,name,firstName,email,tel FROM magasinier");

$magasiniers = $q->fetchAll(PDO::FETCH_OBJ);

include "views/listMagasinier.view.php"; 
