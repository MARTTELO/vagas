<?php
$mensagem = '';
if (isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'success':

            $mensagem = '<div id="meuAlerta" class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Ação realizada com sucesso!</strong> Sua mensagem foi enviada com sucesso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
            break;
        case 'error':
            $mensagem = '<div id="meuAlerta" class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Erro!</strong> Ocorreu um erro ao tentar executar a ação.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

            break;
    }
}
$resultados = '';
foreach (($vagas ?? []) as $vaga) {
    $resultados .= '<tr>
                        <td>' . $vaga->id . '</td>
                        <td>' . $vaga->titulo . '</td>
                        <td>' . $vaga->descricao . '</td>
                        <td>' . ($vaga->ativo == 's' ? 'Ativo' : 'Inativo') . '</td>
                        <td>' . date('d/m/Y à\s H:i:s', strtotime($vaga->data)) . '</td>
                        <td>
                            <a href="editar.php?id=' . $vaga->id . '">
                                <button class="btn btn-primary">Editar</button>
                            </a>

                            <a href="excluir.php?id=' . $vaga->id . '">
                                <button class="btn btn-danger">Excluir</button>
                            </a>

                        </td>

                    </tr>';
}

$resultados = strlen($resultados) ? $resultados : '<tr>
                                                <td colspan="6" class="text-center">Nenhuma vaga encontrada</td>
                                            </tr>';
?>
<main>


    <?= $mensagem ?>

    <section>
        <a href="cadastrar.php">
            <button class="btn btn-success">Nova Vaga</button>
        </a>
    </section>

    <table class="table bg-light mt-3">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Título</th>
                <th scope="col">Descrição</th>
                <th scope="col">Ativo</th>
                <th scope="col">Data</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?= $resultados ?>
        </tbody>
    </table>
</main>
</tbody>
</main>