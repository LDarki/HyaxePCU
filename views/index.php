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
                    <img class="card-img-top" src="<?=$data["notice"]["imagen"]?>" style="max-height: 600px;">
                    <div class="card-body">
                        <h2 class="card-title"><?=$data["notice"]["titulo"]?></h2>
                        <p class="card-text"><?=$data["notice"]["desc"]?></p>
                        <a href="./notice?id=<?=$data["notice"]["id"]?>" class="btn btn-primary">Leer más →</a>
                    </div>
                    <div class="card-footer">
                        Publicado el <?=$data["notice"]["fecha"]?>
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