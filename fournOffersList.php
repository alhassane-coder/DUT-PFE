<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 

$fourniss_infos = find_fourniss_by_id(get_session('fourn_id'));


// On selectionne la liste appels d'offres 

$q=$db->query("SELECT id,produit,qte,description,date,answered FROM appel_offre");

$offers = $q->fetchAll(PDO::FETCH_OBJ);

include "views/fournOffersList.view.php"; 


