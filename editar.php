<?php

require_once __DIR__ . '/vendor/autoload.php';

use App\Entity\Vaga;

if (!isset($_GET['id']) || !ctype_digit((string) $_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

$objVaga = Vaga::getVaga($_GET['id']);
if (!($objVaga instanceof Vaga)) {
    header('location: index.php?status=error');
    exit;
}

if (isset($_POST['titulo'], $_POST['descricao'], $_POST['ativo'])) {
    $objVaga->titulo = $_POST['titulo'];
    $objVaga->descricao = $_POST['descricao'];
    $objVaga->ativo = $_POST['ativo'];
    $objVaga->editar();

    header('location: index.php?status=success');
    exit;
}

$formTitle = 'Editar Vaga';
$submitLabel = 'Salvar alterações';

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/formulario.php';
include __DIR__ . '/includes/footer.php';
