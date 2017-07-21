<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Bootstrap 101 Template</title>

  <!-- Bootstrap -->

  <link href="/public/css/css/bootstrap.css" rel="stylesheet">
  <link href="/public/css/style.css" rel="stylesheet">

</head>
<body>

  <header>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand logo" href="/">FabiCMS</a>
        </div>
      </div><!-- /.container-fluid -->
    </nav>
  </header>



  <?php $this->fenom->display('/'.$this->route['controller'] . '/' . $this->tpl . '.tpl', $data); 
  ?>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="/public/css/js/bootstrap.min.js"></script>
</body>
</html>