<?php

require_once 'funcoes.php';

loadCSS('style');
loadJS('jquery');
loadModulo('teste', 'inicio');


$user = new usuarios();


/*
$user->inserir(
                array(
                    "nome_usuario"=>"Thor", 
                    "email_usuario"=>"cao@cmail.com",
                    "senha_usuario"=>"77777"
                     )
                );

    echo "Usuario Cadastrado com sucesso!!";
 */

/*
$user->atualizar(
                array(
                    "nome_usuario" => "Thor Batista",
                    "email_usuario"=>"cao@supercao.com",
                    )
                , "id_usuario=4");

if($user->linhas > 0)
{
    echo "<br>Usuário atualizado com suceso!!";
} else {
    echo "<br>Nada foi alterado";
}
 */

/*
$user->deletar("id_usuario=3");

if($user->linhas > 0)
{
    echo "Usuario Apagado com sucesso!";
} else {
    echo "Não foi possivel apagar o usuario";
}
  */

$lista = $user->ler();

foreach ($lista as $user){
    echo "<br>" . $user['email_usuario'];
}




echo "<br><br>FINAL.....!";