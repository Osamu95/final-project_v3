<?php
require("../../inc/fonction.php");

$email = $_GET['email'];
$mdp = $_GET['mdp'];

$id = verifyuser($email, $mdp);

if ($id > 0){
header("Location: ../modele.php?page=home.php&id=$id");

}else{
header("Location: ../modele.php?page=add.php");
    
}

?>