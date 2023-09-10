<?php
/*
session_start();

if (isset($_FILES['avatar']) && !empty($_FILES['avatar']['name'])) {
    $maxSize = 2097152;
    $extensionsValides = array('jpg', 'jpeg', 'gif', 'png');

    if ($_FILES['avatar']['size'] <= $maxSize) {
        $extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

        if (in_array($extensionUpload, $extensionsValides)) {
            $chemin = "assets/default_image_profile.jpg" . $_SESSION['id'] . ".jpg";
            $result = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);

            if ($result) {
                // Met à jour le chemin de l'avatar dans la base de données
                $updateavatar = $db->prepare('UPDATE users SET avatar = :avatar WHERE id = :id');
                $updateavatar->execute(array(
                    'avatar' => $_SESSION['id'] . '.jpg',
                    'id' => $_SESSION['id']
                ));
            } else {
                $msg = "Erreur durant l'importation de votre photo de profil";
            }
        } else {
            $msg = "Votre photo de profil doit être au format jpg, jpeg, gif ou png";
        }
    } else {
        $msg = "Votre photo de profil ne doit pas dépasser 2Mo";
    }

    // Redirige l'utilisateur vers une page après l'upload (par exemple, la page de profil)
    header('Location: profil.php');
    exit();
}
?>


