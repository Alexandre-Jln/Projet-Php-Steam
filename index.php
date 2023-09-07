<?php require_once 'layout/header.php';?>

    <style>
        body {
            background-image: url('assets/steam_image.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: right;
        }
    </style>

    <!-- Contenu principal -->
<?php
if (isset($_SESSION['user_name'])) {
    // L'utilisateur est connecté, masque le contenu principal
    echo '<div class="container mt-4 text-white">';
    echo '<h1>Bienvenue sur notre site</h1>';
    echo '<p>Vous êtes déjà connecté.</p>';
    echo '</div>';
} else {
    // L'utilisateur n'est pas connecté, alors affiche le contenu principal
    echo '<div class="container mt-4 text-white">';
    echo '<h1>Bienvenue sur notre site</h1>';
    echo '<p>Cliquez sur <a href="connexion/login.php">Connexion</a> ou <a href="registration.php">Inscription</a> pour continuer.</p>';
    echo '</div>';
}
require_once 'layout/footer.php';
