<?php

require_once 'funcoes.php';

loadCSS('style');
loadJS('jquery');
loadModulo('teste', 'inicio');

$user = new usuarios();
if ($user->inserir(array(
    "nome_usuario"=>"Luiz Felipe", 
    "email_usuario"=>"lfdfgmail.com",
    "senha_usuario"=>"5555")));
{
    echo "Usuario Cadastrado com sucesso!!";
}


/*
if($user->atualizar(array(
    "nome_usuario" => "Melissa",
    "email_usuario"=>"cao@mail.com"),
    "id_usuario=5"));
{
    echo "Usuário atualizado com suceso!!";
}
*/

echo "<br><br>FINAL.....!";