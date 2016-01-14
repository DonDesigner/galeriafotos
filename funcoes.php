<?php

require_once 'config.php';
require_once BASE . '/classes/autoload.php';

/**
 * 
 * @param type $modulo
 * @param type $tela
 */
function loadModulo($modulo, $tela){
    if(file_exists(MODULOSPATH . $modulo . 'Modulo.php'))
    {
        require_once MODULOSPATH . $modulo . 'Modulo.php';        
    } else {
      die('Modulo <br>' . $modulo . 'Modulo.php</br> inexistente');  
    }
}

/**
 * 
 * @param type $arquivo
 * @param type $media
 */
function loadCSS($arquivo, $media='screen'){
    $cssfile = CSSPATH . $arquivo . '.css';    
    if(file_exists($cssfile))
    {        
        echo '<link rel="stylesheet" type="text/css" href="' . $cssfile . '" media="' . $media . '"/>';
    } else {
        die('Arquivo CSS não esncontrado em: <b>' . $cssfile . '</b>');
    }
}


/**
 * 
 * @param type $arquivo
 */
function loadJS($arquivo){
    $jsfile = JSPATH . $arquivo. '.js';
    if (file_exists($jsfile))
    {
        echo '<script type="text/javascript" src="'. $jsfile .'"></script>';
    } else {
        die('Arquivo JS não esncontrado em: <b>' . $jsfile . '</b>');
    }    
}
