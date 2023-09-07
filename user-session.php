<?php
require_once 'layout/header.php';
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Titre de la page</title>
        <!-- Incluez ici les liens vers les fichiers CSS et JavaScript Bootstrap si nécessaire -->
    </head>

    <body>

        <div class="container">
            <div class="row">
                <h1 class="text-center align-items-center">Profil Steam</h1>
                <div class="col-md-6">

                <form action="upload_image.php" method="POST" enctype="multipart/form-data">
                    <label for="image">Image de profil :</label>
                    <input type="file" name="image" id="image" accept="image/*">
                    <!--<input type="submit" value="Télécharger">-->
                </form>

                    <h4>Bans et restrictions</h4>
                    <table class="table table-bordered table-hover table-fixed table-responsive-flex">
                        <tbody>
                            <tr>
                                <td class="span3">Bans de Jeux</td>
                                <td>Aucun</td>
                            </tr>
                            <tr>
                                <td class="span3">Bans Valve Anti Cheat</td>
                                <td>Aucun</td>
                            </tr>
                            <tr>
                                <td class="span3">Bans  de la Communauté</td>
                                <td>Aucun</td>
                            </tr>
                            <tr>
                                <td class="span3">Bans d'échange</td>
                                <td>Aucun</td>
                            </tr>
                        </tbody>
                    </table>

                    <h4>Jeux</h4>

                    <table class="table table-bordered table-hover table-fixed table-responsive-flex">
                        <tbody>
                            <tr>
                                <td class="span3">Jeux Acheter</td>
                                <td>
                                    464.6h
                                    <i class="muted"> (82.4%)</i>
                                </td>
                            </tr>
                            <tr>
                                <td class="span3">Jeux Gratuit</td>
                                <td>
                                    66.4h
                                    <i class="muted"> (11.8%)</i>
                                </td>
                            </tr>
                            <tr>
                                <td class="span3">Les Autres Produits</td>
                                <td>
                                    33.0h
                                    <i class="muted"> (5.9%)</i>
                                </td>
                            </tr>
                            <tr>
                                <td class="span3">Total</td>
                                <td>563.9h</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

    </body>

</html>

<?php require_once 'layout/footer.php';
