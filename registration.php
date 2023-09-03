<?php
require_once 'layout/header.php';
require_once 'classes/ErrorCode.php';
?>

<h2>Inscription</h2>
<form method="post" action="register.php">

    <label for="user_name">Nom d'utilisateur :</label>
    <input type="text" name="user_name" id="user_name"> <br>
    <br>
    <label for="last_name">Nom :</label>
    <input type="text" name="last_name" id="last_name"> <br>
    <br>
    <label for="first_name">Prénom :</label>
    <input type="text" name="first_name" id="first_name"> <br>
    <br>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email"> <br>
    <br>
    <label for="birth_date">Date de naissance :</label>
    <input type="date" name="birth_date" id="birth_date"> <br>
    <br>
    <label for="passwordHash">Mot de passe :</label>
    <input type="password" name="passwordHash" id="passwordHash"> <br>
    <br>
    <input type="submit" value="S'inscrire"> <br>

</form>
<?php

//Pour vérifiez les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if (empty($_POST['id']) || empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['email']) || empty($_POST['birth_date']) || empty($_POST['passwordHash'])) {
    echo 'Veuillez remplir tous les champs.';
    exit();
}

// Vérifie que l'email est valide
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo 'L\'email n\'est pas valide.';
    exit();
}

// Hashe le mot de passe
$passwordHash = password_hash($_POST['passwordHash'], PASSWORD_DEFAULT);

// Enregistre les données dans la base de données
$db = new PDO('mysql:host=localhost;dbname=project-php-steam', 'root', '');
$statement = $db->prepare('INSERT INTO users (id, user_name, last_name, first_name, email, birth_date, passwordHash) VALUES (:id, :first_name, :last_name, :email, :birth_date, :passwordHash)');
$statement->execute(array(
    'id' => $_POST['id'],
    'user_name' => $_POST['user_name'],
    'last_name' => $_POST['last_name'],
    'first_name' => $_POST['first_name'],
    'email' => $_POST['email'],
    'birth_date' => $_POST['birth_date'],
    'passwordHash' => $passwordHash
));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: login.php');
}
?>

<?php require_once 'layout/footer.php';
