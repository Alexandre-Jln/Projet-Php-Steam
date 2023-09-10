<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <!-- Barre de navigation Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="../index.php">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav margin-right:auto">
                    <?php
                    if (isset($_SESSION['user_name'])) {
                        // L'utilisateur est connecté le bouton de déconnexion s'affiche
                        echo '<li class="nav-item">
           <a class="nav-link" href="../user-session.php">Informations du profil</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../connexion/logout.php">Déconnexion</a>
                          </li>';

                    } else {
                        // L'utilisateur n'est pas connecté, affiche les liens de connexion et inscription
                        echo '<li class="nav-item">
            <a class="nav-link" href="../connexion/login.php">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../registration.php">Inscription</a>
          </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

</body>

</html>
