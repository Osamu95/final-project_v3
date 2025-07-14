<?php $emprunt = lister_emprunt($_SESSION['id']);

?>
<h2>Liste de mes emprunts</h2>

<? if ($emprunt != null){
    foreach($emprunt as $s) { ?>

        <div class="cards-container">
        <div class="card">
            <div class="card-title"><p><?= $s['nom_objet'] ?></p></div>

            <div class="card-actions">
                <a href="modele.php?page=retour.php&id=<?= $s['id_objet']?>">Rendre</a>
            </div>
        </div>
        </div>
<?php }} else { 
    echo "Aucun emprunt a afficher.";

} ?>