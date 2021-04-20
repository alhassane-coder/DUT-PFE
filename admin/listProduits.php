<?php
session_start();
include "../include/functions.php"; 
include "../config/database.php"; 
//include('filters/guest_filter.php');

 //on selectionne les infos du super administrateur
$admin_infos=find_admin_by_id();

// Si la liste a été filtrée
if(isset($_POST['filter']) && !empty($_POST['valueToSearch'])){
 // On selectionne la liste produits qui correspondent à la recherche       
    $valueToSearch = $_POST['valueToSearch'];
    $query=" SELECT * FROM produits WHERE CONCAT(idproduit,nomproduit,nomfamille,expire_date,qte_produit,prix,tva) LIKE '%".$valueToSearch."%'";
    $products =filterTable($query);
    save_input_data();

}else{
    // On selectionne la liste produits 

    $query="SELECT * FROM produits";

    $products = filterTable($query);
    save_input_data();
}

include "views/listProduits.view.php"; 
