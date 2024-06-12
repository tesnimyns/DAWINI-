
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
$sql = "SELECT * FROM serv";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des specialites et leurs prix</title>
</head>
<body>
    <h1>Liste des specialites et leurs prix</h1>
    <table border="1">
        <tr>
            <th>id </th>
            <th>service </th>
            <th>prix</th>
            <th>actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Afficher chaque rendez-vous
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                
                        <td>{$row['id']}</td>
                        <td>{$row['service']}</td>
                        <td>{$row['prix']}</td>
                        <td>
                        <form action='edit_service.php' method='post' style='display:inline;'>
                            <input type='hidden' name='service' value='{$row['id']}'>
                            <input type='hidden' name='prix' value='{$row['prix']}'>
                            <input type='submit' value='Modifier'>
                        </form>
                        <form action='delete_service.php' method='post' style='display:inline;'>
                            <input type='hidden' name='service' value='{$row['id']}'>
                            <input type='submit' value='Supprimer'>
                        </form>
                    </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Aucun service trouvé</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
// Fermer la connexion
$conn->close();
?>
