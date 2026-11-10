# WDEV Vagas

![Capa do projeto WDEV Vagas](assets/capa-vagas.svg)

Aplicação web simples para cadastro e gerenciamento de vagas, desenvolvida em PHP com programação orientada a objetos.

## Funcionalidades

- Listagem de vagas com título, descrição, situação e data.
- Cadastro de vagas com título, descrição e status ativo/inativo.
- Edição de uma vaga existente; a data é atualizada ao salvar.
- Exclusão com tela de confirmação e opção para cancelar e voltar.
- Mensagens de sucesso ou erro e estado vazio quando não há vagas cadastradas.

## Tecnologias

- **PHP 8.0+** — aplicação e lógica de negócio.
- **MySQL** — persistência dos dados.
- **PDO** — conexão e execução de consultas.
- **Composer** — autoload de classes com PSR-4 (`App\\`).
- **Bootstrap 4.5.2**, HTML e JavaScript — interface.

O CSS e as bibliotecas JavaScript do Bootstrap são carregados por CDN, portanto a interface precisa de acesso à internet para carregá-los.

## Requisitos

- PHP 8.0 ou superior, com as extensões `PDO` e `pdo_mysql`.
- MySQL 5.7+ ou MariaDB compatível.
- Composer 2.
- Apache (por exemplo, XAMPP) ou o servidor embutido do PHP.

## Instalação local

1. Clone ou baixe o projeto e entre na pasta:

   ```bash
   git clone <URL-DO-REPOSITORIO>
   cd vagas
   ```

2. Instale as dependências e gere o autoloader do Composer:

   ```bash
   composer install
   ```

3. Crie o banco e a tabela importando [`database/schema.sql`](database/schema.sql). Por exemplo:

   ```bash
   mysql -u root < database/schema.sql
   ```

   Também é possível importar o arquivo pelo phpMyAdmin.

4. Configure a conexão em [`app/Db/Database.php`](app/Db/Database.php), ajustando `HOST`, `NAME`, `USER` e `PASS` para o seu ambiente.

   Os valores que vêm no projeto (`localhost`, banco `wdev_vagas`, usuário `root` e senha vazia) são apenas a configuração local padrão do XAMPP. Não use essas credenciais em produção e não versione credenciais reais.

5. Inicie o projeto:

   - **XAMPP:** coloque a pasta `vagas` em `htdocs` e acesse `http://localhost/vagas/`.
   - **Servidor embutido do PHP:** execute na raiz do projeto:

     ```bash
     php -S localhost:8000
     ```

     Depois acesse `http://localhost:8000/`.

## Estrutura do projeto

```text
app/
  Db/Database.php       # Conexão e operações de banco
  Entity/Vaga.php       # Entidade e operações de vagas
  javascript/           # JavaScript da interface
database/
  schema.sql            # Esquema inicial do MySQL
includes/               # Cabeçalho, rodapé, formulários e listagem
cadastrar.php           # Cadastro
editar.php              # Edição
excluir.php             # Confirmação e exclusão
index.php               # Listagem inicial
```

## Observações

- Este projeto é uma aplicação didática e não inclui autenticação ou autorização de usuários.
- Antes de publicar em produção, configure credenciais seguras e revise as validações e proteções apropriadas para o ambiente.

## Licença

Este projeto está licenciado sob a [Licença MIT](LICENSE).
