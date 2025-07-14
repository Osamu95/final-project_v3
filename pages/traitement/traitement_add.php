<?php

require("../../inc/fonction.php");

if(isset($_GET['nom']) && isset($_GET['date_naissance']) && isset($_GET['genre']) && isset($_GET['ville']) && isset($_GET['email']) && isset($_GET['mdp'])){
    $nom = $_GET['nom'];
    $date_naissance = $_GET['date_naissance'];
    $genre = $_GET['genre'];
    $ville = $_GET['ville'];
    $email = $_GET['email'];
    $mdp = $_GET['mdp'];

    adduser($nom,$date_naissance,$genre,$ville,$email,$mdp);
    $id = verifyuser($email, $mdp);
    echo $id;
    header("Location: ../modele.php?page=home.php&id=$id");

}

?>
