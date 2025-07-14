<?php $categorie = afficher_categorie();
?>

<nav>
    <h2>Ajouter un objet</h2>

    <form action="traitement/traitement_objet.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Nom</label>
            <input type="text" id="title" name="title" placeholder="Nom de l'objet" required>
        </div>
        Categorie: <select name="cate" id="cate">
            <?php foreach($categorie as $c) { ?>
                <option value="<?= $c['id_categorie'] ?>"> <?= $c['nom_categorie'] ?></option>
            <?php } ?>
        </select>
        <div class="form-group">
            <label for="media">Image(s) : </label>
            <input type="file" id="media" name="media" accept="image/*,video/*" multiple required>
        </div>
        <button type="submit" class="btn-upload">Ajouter</button>
        </form>
        <div class="back-link">
        <a href="modele.php?page=home.php">⬅ Retour </a>
        </div>
</nav>

