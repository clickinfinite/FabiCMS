<!DOCTYPE HTML>

<html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <title><?php echo ($title) ?? 'DEFAULT'; ?></title>
        <link rel="stylesheet" href="/public/css/style.css">
</head>

<body>
    <header>
        <div class = 'flex-container'>
            <a href='/' class = 'header-link-1'><img src = '/public/images/phone.png'><img src = '/public/images/k.png' /></a>
            <a href='/' class = 'header-link-1'><img src = '/public/images/phone.png'><img src = '/public/images/k.png' /></a>
            <a href='/' class = 'header-link-2'><img src = '/public/images/reg.png' /></a>
        </div>
        
    </header> 
   
  <?php $this->fenom->display('/'.$this->route['controller'] . '/' . $this->tpl . '.tpl', $data); 
 
  ?>
</body>

</html>
