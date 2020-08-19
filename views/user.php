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
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu2">Ni puta idea</a>
          </li>
        </ul>

        <div class="tab-content block">
          <div class="tab-pane container active" id="home">
            <div class="row stats">
              <div class="col-sm-12">
                <div class="row text-center">
                  <div class="col-sm-4">
                    <h1 class="price"><span class="cur">U$D</span><?=$data["userData"]["bank"]?></h1>
                    <span class="sub-price">Débito/Crédito</span>
                  </div>
                  <div class="col-sm-4">
                  </div>
                  <div class="col-sm-4">
                    <h1 class="price"><span class="cur">U$D</span><?=$data["userData"]["money"]?></h1>
                    <span class="sub-price">Efectivo</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="tab-pane container fade stats" id="menu1">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
          </div>

          <div class="tab-pane container fade stats" id="menu2">
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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