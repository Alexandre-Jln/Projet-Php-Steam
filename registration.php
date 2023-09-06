<?php

require_once 'layout/header.php';
require_once 'classes/ErrorCode.php';


$db = new PDO('mysql:host=host.docker.internal;dbname=php_project_steam', 'root', '');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!$db) {
    echo 'Erreur de connexion à la base de données.';
    exit();
}

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $first_name = $_POST['first_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $birth_date = $_POST['birth_date'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($user_name) || empty($last_name) || empty($first_name) || empty($email) || empty($birth_date)) {
        $errorMessage = 'Veuillez remplir tous les champs.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = 'L\'email n\'est pas valide.';
    } else {
        $statement = $db->prepare('SELECT * FROM users WHERE username = :username');
        $statement->bindParam(':username', $user_name);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $errorMessage = 'Un utilisateur avec ce nom d\'utilisateur existe déjà.';
        } else {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);

            $insertStatement = $db->prepare('INSERT INTO users (username, last_name, first_name, email, birth_date, password_hash) VALUES (:user_name, :last_name, :first_name, :email, :birth_date, :passwordHash)');
            $insertStatement->execute(array(
                'user_name' => $user_name,
                'last_name' => $last_name,
                'first_name' => $first_name,
                'email' => $email,
                'birth_date' => $birth_date,
                'passwordHash' => $passwordHash
            ));

            header('Location: welcome.php');
            exit();
        }
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="mt-4 mb-4">Inscription</h2>
            <?php
            if (!empty($errorMessage)) {
                echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
            }
            ?>
            <form method="post" action="registration.php">
                <div class="mb-3">
                    <label for="user_name" class="form-label">Nom d'utilisateur :</label>
                    <input type="text" name="user_name" id="user_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Nom :</label>
                    <input type="text" name="last_name" id="last_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="first_name" class="form-label">Prénom :</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email :</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="birth_date" class="form-label">Date de naissance :</label>
                    <input type="date" name="birth_date" id="birth_date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <input type="submit" value="S'inscrire" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

