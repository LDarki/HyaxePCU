<!DOCTYPE html>
<html lang="en">

<head>
    <?php 
    require_once("./views/inc/head.php");
    ?>

    <link rel="stylesheet" href="./assets/css/font-awesome.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/index.css">

</head>
<?php
require_once("./views/inc/navbar.php");
?>

<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-3">

            </div>

            <div class="col-md-6">

                <h1 class="my-4"></h1>

                <div class="card mb-4">
                    <img class="card-img-top" src="./assets/img/wallpaper.jpg">
                    <div class="card-body">
                        <h2 class="card-title">Primer post</h2>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                        <a href="https://bootsnipp.com/fullscreen/6Xa15" class="btn btn-primary">Leer más →</a>
                    </div>
                    <div class="card-footer">
                        Publicado el 16 de Agosto, 2020
                    </div>
                </div>
            </div>

            <div class="col-md-3">
            </div>
        </div>

        <script src="./assets/js/index.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>

        <?php
        if (isset($data) && !is_null($data["notification"])) {
            echo '<script>document.addEventListener("DOMContentLoaded", () => Notification.show("' . $data["notification"] . '", "' . $data["notificationType"] . '"));</script>';
        }
        ?>

</body>

</html>