<?php
// On utilise la libraie phpqrcode pour générer nos codes QR
require_once('librairies/phpqrcode/qrlib.php');

//Le contenu de notre  code sera le lien vers le produit
$data='http://pfe.rtest.local/Pfe/productView.phpid=1';

//On génère enfin le code
QRcode::png($data,2);
