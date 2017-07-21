<?php

require 'Z:/home/localhost/www/core/libs/peteboere-css-crush-9dc087f/CssCrush.php';

csscrush_set('options', ['minify' => false]);

echo csscrush_tag('Z:/home/localhost/www/public/css/style.css');

?>