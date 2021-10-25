<?php
setlocale(LC_ALL,"pt-br.utf8");

use Mova\Page;
use Mova\Model\Mensagem;
use Slim\Slim;

require_once("vendor/autoload.php");

$app = new Slim();

$app->config('debug',true);

$app->get('/', function (){

    $Mensagem = new Mensagem();

    $page = new Page([
        "header"=>false,
        "footer"=>false
    ]);

    $page->setTpl("index", [
        "sMensagem"=>$Mensagem->geraMensagem(date("d/m/Y"))
    ]);

});

$app->post('/mensagem', function (){
    $Mensagem = new Mensagem();
    echo $Mensagem->geraMensagem(date($_POST['Data']));
});

$app->run();