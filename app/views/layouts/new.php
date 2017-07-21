<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title><?php echo $title ?></title>
  <link href="/public/css/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="/public/css/style.crush.css">
  <!-- Убрать crush и добавить это <link href="/public/css/style.css" rel="stylesheet">-->
</head>
<body>

  <div class="container-fluid">
    <div class="row">
      <div class="hidden-lg hidden-md col-sm-1 col-xs-2 header p-0">
        <a href="#menu" class="menu-link">
          <span></span>
        </a>

        <div class="menu">
          <ul>
            <li>
              <a href="#">Пункт 1</a>
            </li>
            <li>
              <a href="#">Пункт 2</a>
            </li>
            <li>
              <a href="#">Пункт 3</a>
            </li>
            <li>
              <a href="#">Пункт 4</a>
            </li>
            <li>
              <a href="#">Пункт 5</a>
            </li>
            <li>
              <a href="#">Пункт 6</a>
            </li>
          </ul>
        </div>
      </div>
      <div style="padding: 6px" class="col-md-2 col-sm-10 col-xs-8 col-md-offset-1 logo">
        <div class="text-center">
          <a class="logo-text" href="/">
            <img src="/public/images/f.png">abiCMS</a>
        </div>
      </div>

      <div class="hidden-lg hidden-md col-sm-1 col-xs-2 header text-center">
          <a href="/user/register"><img src="/public/images/key.png"></a>
      </div>

      <div style = "padding: 21px" class="col-md-8 hidden-xs hidden-sm header">g</div>
    </div>
  </div>

<?php $this->
fenom->display('/'.$this->route['controller'] . '/' . $this->tpl . '.tpl', $data); 
  ?>
<script src="/public/js/jquery.js"></script>
<script src="/public/js/menu.js" type="text/javascript"></script>
</body>
</html>