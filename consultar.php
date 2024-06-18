<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/exemplo_banco_de_dados/controller/pessoaController.php';
    //indica onde o arquivo deve buscar informações
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tela de Consulta</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Consulta</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Celular</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $pessoaController = new PessoaController();
                    //cria o objeto pessoaControler de PessoaControler
                    $pessoas = $pessoaController->listar();
                    //pessoas é recebe a função listar
                    foreach($pessoas as $pessoa) {
                        echo "<th>" . $pessoa['nome'] . "</th>";
                        echo "<th>" . $pessoa['telefone'] . "</th>";
                        echo "<th>" . $pessoa['celular'] . "</th>";
                        //exibe as informações em uma tabela com foreach passando o vetor para todas as pessoas
                    }
                ?>
                <th><a href="editar.php?id=<?php echo $pessoa['id']; ?>"></th>
            </tbody>
        </table>
    </div>
</body>
</html>