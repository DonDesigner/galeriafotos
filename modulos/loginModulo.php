<?php

switch ($tela){
    case 'login':
        incluirPagina('login');
        break;
    default:
        echo 'tela não encontrada';
        break;
}