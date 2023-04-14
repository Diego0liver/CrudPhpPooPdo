<?php
require __DIR__."/vendor/autoload.php";

use\App\Entidade\Vaga;

$vagas = Vaga::getVagas();

include __DIR__. "/includs/header.php";
include __DIR__. "/includs/listagem.php";