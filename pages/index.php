<?php  $_SESSION['emprunt'];?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Project</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    
</head>

<body>
    <nav><form action="traitement/traitement_login.php" method="get">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="mdp" placeholder="Mot de passe" required>
        <button type="submit">Se connecter</button>
        </form>
        <br><br>
        <a href="modele.php?page=add.php">Créer un compte ?</a>
    </nav>
</body>
</html>

