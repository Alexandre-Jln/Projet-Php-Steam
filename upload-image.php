<?php
require_once 'user-session.php';
require_once '../connection/login.php';
?>
<?php
// Connexion à la base de données

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    // Récupérer les données de l'image téléchargée
    $imageData = file_get_contents($_FILES['image']['tmp_name']);

    // Insérer les données de l'image dans la base de données
    $query = "INSERT INTO users (avatar) VALUES (?, ?)";
    $stmt = $pdo->prepare($query);
    $name = "user_name";
    $stmt->bind_value("ss", $name, $imageData);

    if ($stmt->execute()) {
        echo "L'image a été téléchargée et stockée avec succès.";
    } else {
        echo "Erreur lors de l'insertion de l'image dans la base de données.";
    }
}
?>

