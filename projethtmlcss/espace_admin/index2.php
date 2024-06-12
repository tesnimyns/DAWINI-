<?php 
    session_start();
    if(!isset($_SESSION['mdp'])){
        header('Location: connexion.php');
    }
    
       

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Home</title>
</head>
<body>
    <a href="membres.php">afficher tous les membres</a>
    <br><br>
    <a href="rendez_vous.php">afficher tous les rendez-vous</a>
    <br><br>
    <a href="prix.php">afficher les specialites et les prix</a>
    <br><br>
    <a href="docteurs.php">afficher tous les dentistes</a>
</body>
</html>