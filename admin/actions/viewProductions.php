<?php
$result = mysqli_query($con,"SELECT `production`.`id` AS id, `production`.`periode` AS periode,
 `production`.`quantite` AS quantite, `production`.`image` AS image, `production`.`idAdmin` 
 AS idAdmin, `production`.`dateEncodage` AS dateEncodage, `production`.`produit` 
 AS idProduit,produits.description AS produit,admin.userName AS userName FROM 
 `production`,produits,admin WHERE production.idAdmin=admin.id AND 
 production.produit=produits.id");
 $result1 = mysqli_query($con,"SELECT `production`.`id` AS id, `production`.`periode` AS periode,
 `production`.`quantite` AS quantite, `production`.`image` AS image, `production`.`idAdmin` 
 AS idAdmin, `production`.`dateEncodage` AS dateEncodage, `production`.`produit` 
 AS idProduit,produits.description AS produit,admin.userName AS userName FROM 
 `production`,produits,admin WHERE production.idAdmin=admin.id AND 
 production.produit=produits.id");
?>