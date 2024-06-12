<?php
// Activer l'affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $service = $_POST['service'];
    $prix = $_POST['prix'];

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'espace_admin');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Préparer la requête de mise à jour
    $stmt = $conn->prepare("UPDATE serv SET service = ?, prix = ? WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("isi" , $id, $service, $prix);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo "Le prix du service a été mis à jour avec succès.";
            header('Location: prix.php');
            exit();
        } else {
            echo "Erreur lors de la mise à jour du prix: " . $stmt->error;
        }

        // Fermer la déclaration
        $stmt->close();
    } else {
        echo "Erreur lors de la préparation de la requête: " . $conn->error;
    }

    // Fermer la connexion
    $conn->close();
} else {
    echo "Le formulaire n'a pas été soumis.";
}
?>
