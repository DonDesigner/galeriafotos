<?php

require_once 'funcoes.php';



loadCSS('style');
loadJS('jquery');
loadModulo('teste', 'inicio');



$user = new usuarios();

echo "<br><br>FINAL.....!";