<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?= htmlspecialchars($formTitle ?? 'Cadastrar Vaga', ENT_QUOTES, 'UTF-8') ?></h2>
    <form method="post">
        <div class="form-group">
            <label for="titulo"> Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo"
                value="<?= htmlspecialchars($objVaga->titulo ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
        </div>
        <div class="form-group">
            <label for="descricao"> Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="5" required><?= htmlspecialchars($objVaga->descricao ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
        </div>
        <div class="form-group">
            <label for="status"> Status</label>
            <div>
                <div class="form-check form-check-inline">
                    <label for="ativo" class="form-control">
                        <input type="radio" name="ativo" value="s" <?= ($objVaga->ativo ?? 's') === 's' ? 'checked' : '' ?>> Ativo
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-control">
                        <input type="radio" name="ativo" value="n" <?= ($objVaga->ativo ?? '') === 'n' ? 'checked' : '' ?>> Inativo
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success mt-3"><?= htmlspecialchars($submitLabel ?? 'Enviar', ENT_QUOTES, 'UTF-8') ?></button>
        </div>
    </form>
</main>