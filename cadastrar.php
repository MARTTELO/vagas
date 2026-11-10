<?php

use App\Entity\Vaga;

require_once __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Cadastrar Vaga');
$vaga = new Vaga();

if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
    $vaga->titulo = $_POST['titulo'];
    $vaga->descricao = $_POST['descricao'];
    $vaga->ativo = $_POST['ativo'];
    $vaga->cadastrar();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
