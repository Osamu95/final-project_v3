<?php
$id = $_GET['id'];
?>

<nav>
    <h2>Rendre un objet</h2>

    <form action="traitement/traitement_retour.php" method="POST" enctype="multipart/form-data">
        

    <p>Etat de l'objet  <input type="radio" name="etat" value="1">OK
    <input type="radio" name="genre" value="-1">Pas OK</p>

        <button type="submit" class="btn-upload">Rendre</button>
        </form>
        <div class="back-link">
        <a href="modele.php?page=home.php&id=<?= $id?>">⬅ Retour </a>
        </div>
</nav>