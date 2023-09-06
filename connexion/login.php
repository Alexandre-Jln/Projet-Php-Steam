<?php
require_once('../layout/header.php');
require_once('../classes/ErrorCode.php');


if (isset($_POST['user_name']) && isset($_POST['password'])) {
    $username = $_POST['user_name'];
    $password = $_POST['password'];

    try {
        $pdo = new PDO("mysql:host=host.docker.internal:3306;dbname=php_project_steam", "root", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
    }


    // Connexion à la base de données
    $pdo = new PDO("mysql:host=host.docker.internal:3306;dbname=php_project_steam", "root", "");

    if (!$pdo) {
        echo "Erreur de connexion à la base de données.";
    } else {
        // Utilisation de requêtes préparées
        $Requete = $pdo->prepare("SELECT * FROM users WHERE username=:username");
        $Requete->bindValue(":username", $username);
        $Requete->execute();
        $result = $Requete->fetch(PDO::FETCH_ASSOC);

        if ($result !== false) {
            $hashedPassword = $result['password_hash'];

            if (password_verify($password, $hashedPassword)) {
                // Connexion réussie
                $_SESSION['user_name'] = $username;
                header('Location: /welcome.php');
                exit();
            } else {
                echo "Le mot de passe est incorrect.";
            }
        } /*else {
            echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
        }*/
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="mt-4 mb-4">Connexion</h2>
            <form method="post">
                <div class="mb-3">
                    <label for="user_name" class="form-label">Nom d'utilisateur :</label>
                    <input type="text" name="user_name" id="user_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe :</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <input type="submit" value="Se connecter" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../layout/footer.php'; ?>
