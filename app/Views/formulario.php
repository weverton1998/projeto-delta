<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Formulário</title>
</head>

<body>
    <div class="container mt-5">
        <h3 class="mt-3 mb-5">
            <?php echo $titulo; ?>
        </h3>

        <?php echo form_open_multipart($acao) ?>
        <div class="form-group mb-3">
            <label for="nome">Nome</label>
            <input type="text" required="required" value="<?php echo isset($dado['nome']) ? $dado['nome'] : '' ?>" name="nome" id="nome" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="endereco">Endereço</label>
            <input type="text" required="required" value="<?php echo isset($dado['endereco']) ? $dado['endereco'] : '' ?>" name="endereco" id="endereco" class="form-control">
        </div>
        <div class="form-group mb-3">
            <label for="img"> Foto </label><br/>
            <img height="180" src="<?php echo isset($dado['img']) ? '/'. $dado['img'] : '' ?>" alt="" class="mt-3"><br>
            <input type="file" class="mt-3" required="required" accept="image/JPEG" name="img">   
        </div>
        <input type="submit" value="Salvar" class="btn btn-primary mt-3">
        <input type="hidden" name="id" value="<?php echo isset($dado['id']) ? $dado['id'] : '' ?>">
        <?php echo form_close(); ?>
    </div>
</body>

</html>

