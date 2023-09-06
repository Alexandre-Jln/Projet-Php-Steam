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
                <div class="col-md-6">
                    <h4>Bans et restrictions</h4>
                    <table class="table table-bordered table-hover table-fixed table-responsive-flex">
                        <tbody>
                        <tr>
                            <td class="span3">Game Bans</td>
                            <td>In good standing</td>
                        </tr>
                        <tr>
                            <td class="span3">VAC Bans</td>
                            <td>In good standing</td>
                        </tr>
                        <tr>
                            <td class="span3">Community Ban</td>
                            <td>In good standing</td>
                        </tr>
                        <tr>
                            <td class="span3">Trade Ban</td>
                            <td>In good standing</td>
                        </tr>
                        </tbody>
                    </table>
                    <h4>Jeux</h4>
                    <table class="table table-bordered table-hover table-fixed table-responsive-flex">
                        <tbody>
                        <tr>
                            <td class="span3">In paid games</td>
                            <td>
                                464.6h
                                <i class="muted"> (82.4%)</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="span3">In free games</td>
                            <td>
                                66.4h
                                <i class="muted"> (11.8%)</i>
                            </td>
                        </tr>
                        <tr>
                            <td class="span3">In other products</td>
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
