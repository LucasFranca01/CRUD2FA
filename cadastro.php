<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cadastro</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>Cadastro</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Cadastro</h1>
        <form action="cadastro_script.php" method="POST">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome completo</label>
            <input type="nome" class="form-control" name="nome" required>
          </div>
          <div class="mb-3">
            <label for="datanasc" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" name="datanasc">
          </div>
          <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="number" class="form-control" name="cpf">
          </div>
          <div class="mb-3">
            <label for="celular" class="form-label">Telefone celular</label>
            <input type="number" class="form-control" name="celular">
          </div>
          <div class="mb-3">
            <label for="fixo" class="form-label">Telefone Fixo</label>
            <input type="number" class="form-control" name="fixo">
          </div>
          <div class="mb-3">
            <label for="Endereço" class="form-label">Endereço</label>
            <input type="text" class="form-control" name="endereco">
          </div>
          <div class="mb-3">
            <label for="nomemae" class="form-label">Nome da Mãe</label>
            <input type="text" class="form-control" name="nomemae">
          </div>
          <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" name="login">
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha">
          </div>
          <div class="mb-3">
            <input type="submit" class="btn btn-success" value="Enviar">
         
          </div>
              <a href="index.php" class="btn btn-primary">Voltar para o início</a>
      </div>
    </div>
  </div>
  </form>


  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="umd/popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</body>

</html>