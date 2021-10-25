<?php
setlocale(LC_TIME,"pt-br");
use Mova\Model\Mensagem;
use Slim\Slim;

require_once("vendor/autoload.php");

$app = new Slim();

$app->config('debug',true);

$app->get('/', function (){
    $Mensagem = new Mensagem();
    echo $Mensagem->geraMensagem("15/11/2021");
});

$app->run();