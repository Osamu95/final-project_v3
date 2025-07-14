<?php $_SESSION['id_membre']=$_GET['id_mb'];
$_SESSION['id_objet']=$_GET['id_obj']  ?>
<form action="traitement/traitement_emprunt.php" method="get">
<p>durée de l'emprunt <input type="number" name="duré" id=""> (jour/s)</p>
<input type="submit" value="valider">
</form>