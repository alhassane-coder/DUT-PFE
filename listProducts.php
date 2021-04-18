<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 

$informaticien = find_infos_by_id(get_session('info_id'));

// On selectionne la liste des produits 

$q=$db->query("SELECT * FROM produits ");

$products = $q->fetchAll(PDO::FETCH_OBJ);
include "views/listProducts.view.php"; 