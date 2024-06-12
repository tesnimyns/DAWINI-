<?php
session_start();
if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])){
    $pseudo_par_defaut = "admin";
    $mdp_par_defaut = "admin1234";

    $pseudo_saisi = htmlspecialchars(($_POST['pseudo']));
    $mdp_saisi = htmlspecialchars($_POST['mdp']);

    if ($pseudo_saisi == $pseudo_par_defaut AND $mdp_saisi == $mdp_par_defaut){
        $_SESSION['mdp'] = $mdp_saisi;
        header('Location: index2.php');
    }else{
        echo "votre pseudo ou mot de passe est incorrect";
    }
}else{
    echo "veuillez completer tous les champs...";
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>espace de connexion admin</title>
</head>
<body>
    <form method="POST" action="" align="center">
    <label for="name">Nom :</label>
        <input type="text" name="pseudo" id="name" autocomplete="off">
        <br>
        <label for="mdp">mot de passe: </label>
        <input type="password" name="mdp" id="mdp">
        <br><br>
        <input type="submit" name="valider">
    </form>
</body>
</html>