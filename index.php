<?php
setlocale(LC_TIME,"pt-br");
use Mova\Model\Mensagem;
use Slim\Slim;

require_once("vendor/autoload.php");

$app = new Slim();

$app->config('debug',true);

$Mensagem = new Mensagem();
echo $Mensagem->geraMensagem("15/11/2021");