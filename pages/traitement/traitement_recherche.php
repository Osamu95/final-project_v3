<?php
require("../../inc/fonction.php");

if($_GET['categorie']!=""){
$_SESSION['categorie'] = $_GET['categorie'];
header("location: ../modele.php?id_rech=1&&page=home.php");
}
if($_GET['nom_object']!=""){
$_SESSION['nom_object'] = $_GET['nom_object'];
header("location: ../modele.php?id_rech=2&&page=home.php");
}
// if($_GET['disponible']=='1'){

// }



?>