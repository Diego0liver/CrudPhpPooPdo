<?php
require __DIR__."/vendor/autoload.php";


use \App\Entidade\Vaga;

if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header('location: index.php?status=error');
    exit;
}

$obVaga = Vaga::getVagaId($_GET['id']);

if(isset($_POST['excluir'])){
     $obVaga->excluir();
     header('location: index.php?status=success');
     exit;   
}

include __DIR__. "/includs/header.php";
include __DIR__. "/includs/apagar.php";