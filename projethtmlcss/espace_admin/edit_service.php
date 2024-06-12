<?php
// Activer l'affichage des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'espace_admin');

    // Vérifier la connexion
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Récupérer les informations de l'article
    $stmt = $conn->prepare("SELECT service, prix FROM serv WHERE id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $article = $result->fetch_assoc();
        
        if ($article) {
            $service = $article['service'];
            $prix = $article['prix'];
        } else {
            echo "Aucun article trouvé pour cet ID.";
            exit;
        }
        
        $stmt->close();
    } else {
        echo "Erreur lors de la préparation de la requête: " . $conn->error;
        exit;
    }

    $conn->close();
} else {
    echo "Aucun article spécifié ou ID non valide.";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modifier le Prix d'un Article</title>
</head>
<body>
    <h1>Modifier le Prix d'un Article</h1>
    <form action="update_service.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <label for="service">Nom du service:</label>
        <input type="text" name="service" id="service" value="<?php echo htmlspecialchars($service); ?>" required>
        <br><br>
        
        <label for="prix">Prix:</label>
        <input type="text" id="prix" name="prix" value="<?php echo htmlspecialchars($prix); ?>" required><br><br>

        <input type="submit" value="Mettre à jour">
    </form>
</body>
</html>
