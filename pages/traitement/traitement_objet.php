<?php
include("../../inc/fonction.php");

$nom= $_POST['title'];
//$categorie[]['id_categorie']= afficher_categorie($_POST['cate']);
$categorie= $_POST['cate'];
$file = $_FILES['media'];

$uploadDir = '../../assets/image/';
    
$originalName = pathinfo($file['name'], PATHINFO_FILENAME);
$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
$newName = $originalName . '_' . uniqid() . '.' . $extension;
if (move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
        
    $idobj= add_objet($nom, $categorie, $_SESSION['id']);
    add_images($newName, $idobj);
    echo "Objet ajouté avec succès : ". $newName;
    //header("Location:../modele.php?page=home.php");
    
} else {
echo "Échec de l'ajout.";
}
?>