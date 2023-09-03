<?php
require_once 'layout/header.php';
require_once 'classes/ErrorCode.php';
?>

    <h2>Connexion</h2>

<?php
session_start();

if (isset($_POST['connexion'])) {
    if (empty($_POST['user_name']) || empty($_POST['password_hash'])) {
        echo "Le champ Nom d'utilisateur ou Mot de passe est vide.";
    } else {
        $UserName = $_POST['user_name'];
        $Password = $_POST['password_hash'];

        $mysqli = mysqli_connect("localhost", "root", "", "project-php-steam");

        if (!$mysqli) {
            echo "Erreur de connexion à la base de données.";
        } else {
            // Utilisation de requêtes préparées
            $Requete = $mysqli->prepare("SELECT * FROM users WHERE username = ? LIMIT 1");
            $Requete->bind_param("s", $UserName);
            $Requete->execute();
            $result = $Requete->get_result();

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $hashedPassword = $row['passwordHash'];

                // Utilisation de password_verify pour vérifier les mots de passe
                if (password_verify($Password, $hashedPassword)) {
                    $_SESSION['user_name'] = $UserName;
                    echo "Vous êtes à présent connecté !";
                } else {
                    echo "Le mot de passe est incorrect.";
                }
            } else {
                echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
            }

            $Requete->close();
        }
    }
}

// Connexion réussie
$_SESSION['user_name'] = $UserName;
header('Location: bienvenue.php');
exit();
?>


    <form method="post" action="login.php">
        <label>Nom d'utilisateur :</label>
        <input type="text" name="user_name" required><br><br>
        <label>Mot de passe :</label>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Se connecter">
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    ?>

<?php require_once 'layout/footer.php';