<?php

class ImageUploader
{
    private $bdd;

    public function __construct($pdo)
    {
        $this->bdd = $pdo;
    }

    public function uploadImage($file)
    {
        $maxSize = 2097152; // Taille maximale en octets (2 Mo)
        $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

        // Vérifie si un fichier a été soumis
        if (!empty($file['name'])) {
            // Vérifie la taille du fichier
            if ($file['size'] <= $maxSize) {
                $extensionUpload = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

                // Vérifie l'extension du fichier
                if (in_array($extensionUpload, $extensionsValides)) {
                    // Définir le chemin de destination
                    $destinationPath = "users/avatar/" . $_SESSION['id'] . "." . $extensionUpload;

                    // Déplace le fichier téléchargé vers le chemin de destination
                    if (move_uploaded_file($file['tmp_name'], $destinationPath)) {
                        // Met à jour la base de données avec le nom du fichier
                        $updateAvatar = $this->bdd->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                        $updateAvatar->execute(array(
                            'avatar' => $_SESSION['id'] . "." . $extensionUpload,
                            'id' => $_SESSION['id']
                        ));

                        return true;
                    } else {
                        return "Erreur durant l'importation de votre photo de profil";
                    }
                } else {
                    return "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
                }
            } else {
                return "Votre photo de profil ne doit pas dépasser 2Mo";
            }
        }

        return "Aucun fichier n'a été soumis";
    }
}
