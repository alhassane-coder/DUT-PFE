<?php

//Database credentials 
//InfinityFree - base "if0_42569797_stock"

define('DB_HOST', 'sql204.infinityfree.com');
define('DB_NAME', 'if0_42569797_stock');
define('DB_USERNAME', 'if0_42569797');
define('DB_PASSWORD', 'QhN0MknQtqlY7OY');
define('DB_CHARSET', 'utf8mb4');

// URL publique du site (sans slash final)
define('SITE_URL', 'https://dutpfe.freehosting.dev');


try
{
	$db= new PDO('mysql:host='.DB_HOST.';charset='.DB_CHARSET.';dbname='.DB_NAME,DB_USERNAME,DB_PASSWORD);
	$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
	die('Erreur: '.$e->getMessage());
}
