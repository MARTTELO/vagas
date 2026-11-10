<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Entity\Vaga;

if (!isset($_GET['id']) || !ctype_digit((string) $_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

//cnsulta a vaga
$objVaga = Vaga::getVaga($_GET['id']);

//valida se a vaga existe
if (!($objVaga instanceof Vaga)) {
    header('location: index.php?status=error');
    exit;
}

//valida se o post foi enviado
if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
    $objVaga->titulo = $_POST['titulo'];
    $objVaga->descricao = $_POST['descricao'];
    $objVaga->ativo = $_POST['ativo'];
    $objVaga->excluir();

    header('location: index.php?status=success');
    exit;
}

//
$formTitle = 'Excluir Vaga';
$submitLabel = 'Confirmar exclusão';

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmar-exclusao.php';
include __DIR__ . '/includes/footer.php';
