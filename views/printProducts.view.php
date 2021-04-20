<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/c1cf6b23f8.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/all.css">
    <link rel="stylesheet" type="text/css" href="librairies/alertify/css/alertify.css">


    <title>Liste des produits</title>
</head>
<body onload="window.print()"> 
        <main>
            <div class="listinfotable" style="overflow-x:auto;">
            <table style="margin: top 30px;">
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Nom de famille</th>
                    <th>Quantité</th>
                    <th>Date d'expiration</th>
                    <th>Prix</th>
                    <th>TVA</th>
                    <th>Code QR </th>

                </tr>  
                <?php $i = 1; ?>
            <?php foreach($products as $product) : ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $product->nomproduit ?></td>
                    <td><?= $product->nomfamille ?></td>
                    <td><?= $product->qte_produit ?></td>
                    <td><?= $product->expire_date ?></td>
                    <td><?= $product->prix.'Dhs' ?></td>
                    <td><?= $product->tva ?></td>
                    <td><img class="qrcode" src="<?= $product->qrcode ?>" alt="Code qr du produit"> </td>

                </tr>

            <?php endforeach; ?>
                    
        </main>

</body>
 