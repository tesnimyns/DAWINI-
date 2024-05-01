<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs des champs du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $Numero = $_POST['Numero'];
    $dr = $_POST['dr'];
    $dispo = $_POST['dispo'];

    // Connexion à la base de données
    $conn = new mysqli('localhost', 'root', '', 'form');
    // Vérifier la connexion
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    } else {
        // Préparer la requête d'insertion
        $stmt = $conn->prepare("INSERT INTO registration (nom, prenom, gender, email, Numero, dr, dispo) VALUES (?, ?, ?, ?, ?, ?, ?)");
        // Vérifier si la préparation a réussi
        if ($stmt) {
            // Lier les valeurs aux paramètres de la requête
            $stmt->bind_param("ssssiss", $nom, $prenom, $gender, $email, $Numero, $dr, $dispo);
            // Exécuter la requête
            if ($stmt->execute()) {
                echo "Inscription réussie";
            } else {
                echo "Erreur lors de l'insertion: " . $conn->error;
            }
            // Fermer la déclaration
            $stmt->close();
        } else {
            echo "Erreur lors de la préparation de la requête: " . $conn->error;
        }
        // Fermer la connexion
        $conn->close();
    }
} else {
    // Afficher un message d'erreur si le formulaire n'a pas été soumis
    echo "Le formulaire n'a pas été soumis";
}
