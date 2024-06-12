
  <?php
// Activer l'affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Connexion à la base de données
$conn = new mysqli('localhost', 'root', '', 'form');

// Vérifier la connexion
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Préparer la requête pour récupérer les rendez-vous
$sql = "SELECT * FROM regi";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Liste des Rendez-vous</title>
</head>
<body>
    <h1>Liste des Rendez-vous</h1>
    <table border="1">
        <tr>
            <th>Nom du patient </th>
            <th>prenom du Patient</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Numero du telephone </th>
            <th>Date du Rendez-vous</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            // Afficher chaque rendez-vous
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                
                        <td>{$row['nom']}</td>
                        <td>{$row['prenom']}</td>
                        <td>{$row['gender']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['Numero']}</td>
                        <td>{$row['dispo']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>Aucun rendez-vous trouvé</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php
// Fermer la connexion
$conn->close();
?>
