<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  require_once("./views/inc/head.php");
  ?>

  <link rel="stylesheet" href="./assets/css/font-awesome.css">
  <link rel="stylesheet" href="./assets/css/user.css">
  <link rel="stylesheet" href="./assets/css/index.css">

</head>
<?php
require_once("./views/inc/navbar.php");
?>

<body>
  <div class="container" style="margin-top: 20px;">
    <div class="row">
      <div class="col-sm-12">
        
      </div>
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