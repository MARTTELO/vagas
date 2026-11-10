<main>
    <h2 class="mt-3"><?= htmlspecialchars($formTitle ?? 'Excluir Vaga', ENT_QUOTES, 'UTF-8') ?></h2>
    <form method="post">
        <div class="form-group bg-danger p-3 mb-3 text-light">
            <p class="text-center mb-0" style="font-size: 20px;">
                Tem certeza que deseja excluir a vaga
                <strong><?= htmlspecialchars($objVaga->titulo ?? '', ENT_QUOTES, 'UTF-8') ?></strong>?
            </p>
        </div>

        <input type="hidden" name="titulo" value="<?= htmlspecialchars($objVaga->titulo ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="descricao" value="<?= htmlspecialchars($objVaga->descricao ?? '', ENT_QUOTES, 'UTF-8') ?>">
        <input type="hidden" name="ativo" value="<?= htmlspecialchars($objVaga->ativo ?? '', ENT_QUOTES, 'UTF-8') ?>">

        <div class="form-group">
            <a href="index.php" class="btn btn-success">Cancelar e voltar</a>

            <button type="submit" class="btn btn-danger ml-3">
                <?= htmlspecialchars($submitLabel ?? 'Confirmar exclusão', ENT_QUOTES, 'UTF-8') ?>
            </button>
        </div>
    </form>
</main>