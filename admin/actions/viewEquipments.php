<?php
$result = mysqli_query($con,"SELECT `equipement`.`id` AS id,`equipement`.`nom` AS nom, 
`equipement`.`specification` AS specification, `equipement`.`image` AS image,
 `equipement`.`idAdmin` AS idAdmin, `equipement`.`idStructure` AS idStructure, 
 `equipement`.`dateEncodage` AS dateEncodage, `equipement`.`nbreTotal` AS nbreTotal, 
 `equipement`.`nbreBon` AS nbreBon, `equipement`.`nbreMauvais` AS nbreMauvais,
 structure.structure AS structure,structure.description AS description,admin.userName 
 AS userName FROM `equipement`,structure,admin WHERE equipement.idAdmin=admin.id AND 
 equipement.idStructure=structure.id ORDER BY `equipement`.`id` DESC");
 $result1 = mysqli_query($con,"SELECT `equipement`.`id` AS id,`equipement`.`nom` AS nom, 
 `equipement`.`specification` AS specification, `equipement`.`image` AS image,
  `equipement`.`idAdmin` AS idAdmin, `equipement`.`idStructure` AS idStructure, 
  `equipement`.`dateEncodage` AS dateEncodage, `equipement`.`nbreTotal` AS nbreTotal, 
  `equipement`.`nbreBon` AS nbreBon, `equipement`.`nbreMauvais` AS nbreMauvais,
  structure.structure AS structure,structure.description AS description,admin.userName 
  AS userName FROM `equipement`,structure,admin WHERE equipement.idAdmin=admin.id AND 
  equipement.idStructure=structure.id");
?>