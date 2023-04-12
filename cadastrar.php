<?php
require __DIR__."/vendor/autoload.php";

use \App\Entidade\Vaga;

if(isset($_POST['titulo'],$_POST['descricao'],$_POST['ativo'])){
     $obVaga = new Vaga;
     $obVaga->titulo = $_POST['titulo'];
     $obVaga->descricao = $_POST['descricao'];
     $obVaga->ativo = $_POST['ativo'];
     $obVaga->cadastra();

     header('location: index.php?status=success');
     exit;

     
}

include __DIR__. "/includs/header.php";
include __DIR__. "/includs/formulario.php";