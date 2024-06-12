<?php 
  session_start();
  $bdd= new PDO('mysql:host=localhost;dbname=espace_admin;','root','root');
  if (!isset($_SESSION['mdp'])) {
      header('Location: connexion.php');
      exit();
  }
  ?>
  
  <!DOCTYPE html>
  <html lang="fr">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Afficher les membres</title>
  </head>
  <body>
      <!-- Contenu de la page des membres -->
        <?php 
            $recupUsers = $bdd->query('SELECT * FROM membres');
            while($user= $recupUsers->fetch()){
                ?>
                <p><?=  $user['pseudo'];?> <a href="bannir.php?id=<?= $user['id']; ?>" style="color:red;text-decoration:none;">  supprimer le membre</a>
                </p>
                <?php
                
            }
        
        
        
        ?>
  </body>
  </html>
  