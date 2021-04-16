<?php
session_start();
include "../include/functions.php"; 
include "../config/database.php"; 
//include('filters/guest_filter.php');

 //on selectionne les infos du super administrateur
$admin_infos=find_admin_by_id();

// On selectionne la liste fournisseurs 

$q=$db->query("SELECT id,name,email,tel FROM fournisseurs");

$fournisseurs = $q->fetchAll(PDO::FETCH_OBJ);

include "views/listFournisseurs.view.php"; 
