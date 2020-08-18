<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">

  <meta name="description" content="Hyaxe V | PCU">
  <meta name="author" content="LDarki">

  <title>Hyaxe V | PCU</title>

  <link rel="stylesheet" href="./assets/css/login.css">
  <link rel="stylesheet" href="./assets/css/index.css">

</head>

<body>
<main>
    <div class="col-12 col-lg-3 offset-lg-9 panel h-100 py-5">
      <div class="card">
        <h1 class="card-title text-center mb-4">Inicia sesión</h1>
        <form action="/HyaxePCU/login" method="post" class="card-body">
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Nombre de Usuario" required>
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
          </div>
          <div class="form-group text-center pt-4">
            <input type="submit" value="Iniciar sesión" class="btn btn-primary w-100">
          </div>
        </form>
      </div>
</div>
</main>
<script src="./assets/js/index.js"></script>

<?php 
if(isset($data) && !is_null($data["notification"]))
{
  echo '<script>document.addEventListener("DOMContentLoaded", () => Notification.show("'.$data["notification"].'", "'.$data["notificationType"].'"));</script>';
}
?>

</body>

</html>