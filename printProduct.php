<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 

if(!isset($_SESSION['info_login']) || !isset($_SESSION['admin_login'])){
    set_flash("Impossible d'accèder à la page, vous devez d'abord etre connecté");
    redirect('index.php');
}

$informaticien = find_infos_by_id(get_session('info_id'));

// On selectionne la liste des produits à imprimer 

$q=$db->query("SELECT * FROM produits ");

$products = $q->fetchAll(PDO::FETCH_OBJ);
include "views/printProducts.view.php"; 