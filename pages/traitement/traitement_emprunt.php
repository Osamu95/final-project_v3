<?php
require("../../inc/fonction.php");
addemprunt($_SESSION['id_membre'],$_SESSION['id_objet'],$_GET['duré']);
header('')

?>