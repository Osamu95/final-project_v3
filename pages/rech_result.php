<?php
if($_GET['id_rech']=='1'){
    $objet = rech_categorie($_SESSION['categorie']);
     
}
if($_GET['id_rech']=='2'){
    $objet = rech_object($_SESSION['nom_objcet']);
}
if($_GET['id_rech']=='3'){

}
?>