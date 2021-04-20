<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 


$informaticien = find_infos_by_id(get_session('info_id'));

// On selectionne les reponses 

$q=$db->query("SELECT id,fournissName,produit,qte,answer,date FROM reponses");

$anwsers = $q->fetchAll(PDO::FETCH_OBJ);

// On selectionne les nouveauté
$q=$db->query("SELECT id,fournissName,produit,qte,description,date FROM news");

$news = $q->fetchAll(PDO::FETCH_OBJ);

include "views/listAnswers.view.php"; 
