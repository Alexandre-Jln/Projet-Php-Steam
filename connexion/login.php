<?php
require_once 'layout/header.php';
require_once 'classes/ErrorCode.php';
?>

    <h2>Connexion</h2>

<?php if (isset($_GET['error'])) { ?>
    <div class="error">
        <?php echo ErrorCode::getErrorMessage(intval($_GET['error'])); ?>
    </div>
<?php } ?>

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