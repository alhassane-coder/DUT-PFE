<?php
session_start();
include "../include/functions.php"; 
include "../config/database.php"; 
include('filters/admin_filter.php');

//include('filters/guest_filter.php');

 //on selectionne les infos du super administrateur
$admin_infos=find_admin_by_id();

// On selectionne la liste informaticiens 

$q=$db->query("SELECT id,login,name,firstName,email,tel,active FROM informaticien");

$informaticiens = $q->fetchAll(PDO::FETCH_OBJ);


include "views/listInformaticiens.view.php"; 
