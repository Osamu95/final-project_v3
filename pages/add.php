<nav>
    <h2>Creation d'un compte</h2>
<form action="traitement/traitement_add.php" method="get">
    <p><input type="text" name="nom" placeholder="Nom"></p>
    <p>Date de naissance<input type="date" name="date_naissance" placeholder="Date de naissance"></p>
    <p>Genre  <input type="radio" name="genre" value="H">Homme
    <input type="radio" name="genre" value="H">Femme</p>
    
    <p><input type="text" name="ville" placeholder="Ville"></p>
    <p><input type="email" name="email" placeholder="Email"></p>
    <p><input type="password" name="mdp" placeholder="Mot de passe"></p>
    <p><input type="submit" value="Ajouter"></p>
</form>
</nav>