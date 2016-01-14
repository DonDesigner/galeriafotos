<?php

function __autoload($classe)
{
    $baseClass = dirname(__FILE__);
    $classe = str_replace("..", '',$classe);
    require_once $baseClass . '/' . $classe . '.class.php';
}
