
<?php
if(isset($_GET['id'])){
    $_SESSION['id']=$_GET['id'];
}
$objet=verify_date();
$categorie = afficher_categorie();
// var_dump($categorie);
?>
<nav>
<form action="traitement/traitement_recherche.php" method="get">
    <p>Recherche par categorie <select name="categorie" id="">
        <option value="">...</option>
    <?php foreach($categorie as $c) { ?>
    <option value="<?= $c['id_categorie'] ?>"> <?= $c['nom_categorie'] ?></option>
    <?php } ?>
    </select></p>
    <br><hr><br>   
    <p><input type="text" name="nom_object" id="" placeholder="Recherche par nom de l'object"></p>
    <br><hr><br> 
    <p><input type="checkbox" name="disponible" value="1"> Objects disponibles</p>
    <br>
    <input type="submit" value="Rechercher">
</form>
</nav>
<h4>Filtre : 
<select name="categorie" id="">
    <?php foreach($categorie as $c) { ?>
        <option value="<?= $c['id_categorie'] ?>"> <?= $c['nom_categorie'] ?></option>
    <?php } ?>
</select>
</h4>

<?php
    if(isset($_GET['id_rech'])){
        include("rech_result.php");
        foreach($objet as $o) { ?> 
        <div class="cards-container">
        <div class="card">
            <div class="card-title"><p><?= $o['nom_objet'] ?></p></div>
            <div class="card-content">
                <p>Categorie : <?= $o['nom_categorie'] ?></p>
                <p>Par <?= $o['nom_membre'] ?></p>
               
            <div class="card-actions">
                <a href="gestion_emprunt.php?id_obj=<?= $o['id_objet'] ?>">emprunter</a>
                <a href="#">voir fiche</a>
            </div>
        </div>
    </div>
    <?php
    }}
        
    else{  foreach($objet as $o) { ?>

    <div class="cards-container">
    <div class="card">
        <div class="card-title"><p><?= $o['nom_objet'] ?></p></div>
        <div class="card-content">
            <p>Categorie : <?= $o['nom_categorie'] ?></p>
            <p>Par <?= $o['nom_membre'] ?></p>
            <?php if($o['date_retour']==null){ ?>
            <p>Dispo</p>
            <?php }else{ ?>
                <p>A rendre le <?= $o['date_retour'] ?></p>
            <?php } ?>   
        </div>
        <div class="card-actions">
        <a href="modele.php?page=gestion_emprunt.php&id_obj=<?= $o['id_objet'] ?>&id_mb=<?= $o['id_membre'] ?>">emprunter</a>
            <a href="#">voir fiche</a>
        </div>
    </div>
</div>
<?php }} ?>