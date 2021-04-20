<?php session_start();
include "include/functions.php"; 
include "config/database.php"; 

$mag_infos = find_mag_by_id(get_session('mag_id'));
// On selectionne la liste des produits 

// Si la liste a été filtrée
if(isset($_POST['filter']) && !empty($_POST['valueToSearch'])){
    // On selectionne la liste produits qui correspondent à la recherche       
       $valueToSearch = $_POST['valueToSearch'];
       $query=" SELECT * FROM produits WHERE CONCAT(idproduit,nomproduit,nomfamille,qte_produit,expire_date,prix,tva) LIKE '%".$valueToSearch."%'";
       $products =filterTable($query);
       save_input_data();
   
} else{
       // On selectionne la liste produits 
   
       $query="SELECT * FROM produits";
   
       $products = filterTable($query);
       save_input_data();

    }

include "views/magListProducts.view.php"; 