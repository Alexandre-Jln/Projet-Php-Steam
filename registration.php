<?php
require_once 'layout/header.php';

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
$db = new PDO('mysql:host=localhost;dbname=mon_site', 'root', '');
$statement = $db->prepare('INSERT INTO utilisateurs (id, first_name, last_name, email, birth_date, passwordHash) VALUES (:id, :first_name, :last_name, :email, :birth_date, :passwordHash)');
$statement->execute(array(
    'id' => $_POST['id'],
    'first_name' => $_POST['first_name'],
    'last_name' => $_POST['last_name'],
    'email' => $_POST['email'],
    'birth_date' => $_POST['birth_date'],
    'passwordHash' => $passwordHash
)); ?>

    <form action="traitement.php" method="post">

        <label for="first_name">Prénom</label>
        <input type="text" name="first_name" id="first_name">

        <label for="last_name">Nom</label>
        <input type="text" name="last_name" id="last_name">

        <label for="email">Email</label>
        <input type="email" name="email" id="email">

        <label for="birth_date">Date de naissance</label>
        <input type="date" name="birth_date" id="birth_date">

        <label for="passwordHash">Mot de passe</label>
        <input type="password" name="passwordHash" id="passwordHash">

        <input type="submit" value="S'inscrire">

    </form>

<?php require_once 'layout/footer.php'; ?>