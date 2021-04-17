<?php
session_start();
include "../include/functions.php"; 
include "../config/database.php"; 
//include('filters/guest_filter.php');

 //on selectionne les infos du super administrateur
$admin_infos=find_admin_by_id();

//On selectionne l'historique


$q=$db->query("SELECT idhistorique,evenement,date FROM historique");

$history = $q->fetchAll(PDO::FETCH_OBJ);


include "views/history.view.php"; 
