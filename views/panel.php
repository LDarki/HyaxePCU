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

        <ul class="nav nav-tabs block">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home">Dinero</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu1">Stats</a>
          </li>
        </ul>

        <div class="tab-content block">
          <div class="tab-pane container active" id="home">
            <div class="row stats">
              <div class="col-sm-12">
                <div class="row text-center">
                  <div class="col-sm-4">
                    <h1 class="price"><span class="cur">U$D</span><?= $data["userData"]["bank"] ?></h1>
                    <span class="sub-price">Débito/Crédito</span>
                  </div>
                  <div class="col-sm-4">
                    <h1 class="price"><span class="cur">HC</span><?= $data["userData"]["hycoins"] ?></h1>
                    <span class="sub-price">HyCoins</span>
                  </div>
                  <div class="col-sm-4">
                    <h1 class="price"><span class="cur">U$D</span><?= $data["userData"]["money"] ?></h1>
                    <span class="sub-price">Efectivo</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane container fade stats" id="menu1">
            <div class="row">
              <div class="col-md-6">
                Dni: <?= $data["userData"]["dni"] ?><br />
                Edad: <?= $data["userData"]["age"] ?><br />
                Nivel: <?= $data["userData"]["level"] ?><br />
                Exp: <?= $data["userData"]["exp"] ?><br />
              </div>
              <div class="col-md-6">
                Vida: <?= $data["userData"]["health"] ?><br />
                Armadura: <?= $data["userData"]["armour"] ?><br />
                Ultima entrada: <?= $data["userData"]["lastLogin"] ?><br />
                Faccion: <?= $data["userData"]["faction"]["name"] ?><br />
                Rango: <?= $data["userData"]["faction"]["rank"] ?><br />
              </div>
            </div>
            </p>
          </div>

        </div>

      </div>

    </div>

    <div class="row" style="margin-top: 20px;">

      <div class="col-sm-6">
        <div class="right-tabs clearfix">
          <ul class="nav nav-tabs block">
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#shome">Precios Hyaxe</a>
            </li>
          </ul>

          <div class="tab-content block">

            <div class="tab-pane container active" id="shome">

              <div class="row stats cht">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-4">
                          <span style="vertical-align: middle;"><img src="./assets/img/HCoin.png" style="height:30px;vertical-align: middle;"> HyCoin</span>
                        </div>
                        <div class="col-sm-3">
                          <div class="progress" style="height:10px">
                            <div class="progress-bar bg-secondary" style="width:100%;height:10px"></div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <span>1 HC</span>
                        </div>
                        <div class="col-sm-2">
                          <span>U$D 5</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row stats cht">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-4">
                          <span style="vertical-align: middle;"><img src="./assets/img/Vip.svg" style="height:30px;vertical-align: middle;"> Vip básico</span>
                        </div>
                        <div class="col-sm-3">
                          <div class="progress" style="height:10px">
                            <div class="progress-bar bg-primary" style="width:100%;height:10px"></div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <span>1 mes</span>
                        </div>
                        <div class="col-sm-2">
                          <span>$ 5</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row stats cht">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-4">
                          <span style="vertical-align: middle;"><img src="./assets/img/Vip.svg" style="height:30px;vertical-align: middle;"> Vip mega</span>
                        </div>
                        <div class="col-sm-3">
                          <div class="progress" style="height:10px">
                            <div class="progress-bar bg-warning" style="width:100%;height:10px"></div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <span>1 mes</span>
                        </div>
                        <div class="col-sm-2">
                          <span>$ 10</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row stats cht">
                <div class="col-sm-12">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-4">
                          <span style="vertical-align: middle;"><img src="./assets/img/Vip.svg" style="height:30px;vertical-align: middle;"> Vip ultra</span>
                        </div>
                        <div class="col-sm-3">
                          <div class="progress" style="height:10px">
                            <div class="progress-bar bg-danger" style="width:100%;height:10px"></div>
                          </div>
                        </div>
                        <div class="col-sm-3">
                          <span>1 mes</span>
                        </div>
                        <div class="col-sm-2">
                          <span>$ 20</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
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