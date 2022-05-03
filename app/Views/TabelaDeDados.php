<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Tabela</title>

    <script>
        function confirma() {
            if (!confirm('Desejar excluir o registro?')) {
                return false;
            }
            return true;
        }
    </script>
</head>

<body>
    <div class="container mt-5">
        <?php echo anchor(base_url('TabelaDeDados/novoCadastro'), 'Cadastrar novos dados', ['class' => 'btn btn-success mb-4 mt-2']) ?>
        <h2 class="text-center mb-4">Tabela de Dados Cadastrados</h2>    
            <?php if(!empty($dados) && is_array($dados)) : ?>
                <table class="table mb-5">
                    <tr>
                        <th>ID</th>
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Ações</th>
                    </tr>
                    <?php foreach ($dados as $dado) : ?>
                        <tr>
                            <td><?php echo $dado['id'] ?></td>
                            <td><img height="60" src="<?php echo $dado['img'] ?>" alt="" class=""></td>
                            <td><?php echo $dado['nome'] ?></td>
                            <td><?php echo $dado['endereco'] ?></td>
                            <td>
                                <?php echo anchor('TabelaDeDados/editar/' . $dado['id'], 'Editar') ?>
                                 -
                                <?php echo anchor('TabelaDeDados/delete/' . $dado['id'], 'Excluir', ['onclick' => 'return confirma()']) ?> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>Nenhum dado cadastrado </p>
            <?php endif; ?>
        </div>
</body>
</html>

