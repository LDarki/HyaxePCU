<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta name="description" content="Hyaxe V | PCU">
  <meta name="author" content="LDarki">

  <title>Hyaxe V | PCU</title>

  <link rel="stylesheet" href="./assets/css/login.css">

</head>

<body>
  <div class="form">
    <form action="/HyaxePCU/login" method="post" class="login-form">
      <input type="text" name="username" placeholder="Nombre de Usuario" />
      <input type="password" name="password" placeholder="Contraseña" />
      <button type="submit">Iniciar</button>
      <p><?= $data["notification"] ?></p>
    </form>
  </div>
</body>

</html>