
<?php
// Activer l'affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'espace_admin');

// Vérifier la connexion
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Préparer la requête pour récupérer les rendez-vous
$sql = "SELECT * FROM docteurs";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des docteurs et leurs specialites </title>
</head>
<body>
    <h1>Liste des dentistes et leurs specialites </h1>
    <table border="1">
        <tr>
            <th>dentiste </th>
            <th>specialite</th>
            <th>actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Afficher chaque rendez-vous
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                
                        <td>{$row['nom']}</td>
                        <td>{$row['specialite']}</td>
                        <td>
                        <form action='delete_docteur.php' method='post' style='display:inline;'>
                            <input type='hidden' name='nom' value='{$row['nom']}'>
                            <input type='submit' value='Supprimer'>
                        </form>
                    </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Aucun dentiste trouvé</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
// Fermer la connexion
$conn->close();
?>
