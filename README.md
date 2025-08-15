# Atividade_padaria

Explicação do Código – Sistema da Padaria Bumba Meu Pão

Esse sistema foi feito em **PHP** e **MySQL** para gerenciar **produtos** da padaria. Ele permite **cadastrar, listar, editar e excluir** produtos de forma simples e rápida.



Como o sistema funciona

1. db.php
   É o arquivo responsável por conectar o PHP ao banco de dados MySQL.
   Nele você informa:

    Host (geralmente `localhost`)
    Usuário do MySQL (padrão `root`)
    Senha (em branco no XAMPP por padrão)
    Nome do banco (`atividades padaria`)

2. index.php
   É a página inicial do sistema.
   Ela mostra dois botões:

   Cadastrar Produto → leva para a página de cadastro.
   Ver Produtos → leva para a listagem de produtos.

3. create.php
   É a página para cadastrar um novo produto.
   Contém um formulário onde você informa:

    Nome do produto
    Descrição
    Preço
    Quantidade em estoque
    ID do usuário responsável pelo produto
     Ao enviar o formulário, os dados são gravados no banco de dados.

4. read.php
   É a página que mostra todos os produtos cadastrados.
   Exibe uma tabela com:

    ID
    Nome
    Descrição
    Preço
    Quantidade
    ID do usuário responsável
     Também possui botões para Editar ou Excluir um produto.

5. update.php
   É a página para editar um produto existente.
   Ao abrir, carrega os dados atuais do produto no formulário para alteração.
   Ao salvar, atualiza o banco de dados.

6. delete.php
   É a página que remove um produto do banco de dados.
   Após excluir, redireciona para a lista de produtos.



 Fluxo de uso do sistema

1. Entre no index.php.
2. Clique em Cadastrar Produto para adicionar um novo.
3. Use Ver Produtos para listar todos.
4. Na listagem, você pode editar ou excluir qualquer produto.
5. Sempre há botões para voltar para a página anterior ou para o início.

