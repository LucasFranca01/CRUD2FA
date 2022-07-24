<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alteração de cadastro</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>Alterar Dados</title>
</head>
<body>

<?php

require_once("config.php");

$id = $_GET['id'] ?? '';

$sql = "SELECT * FROM usuario WHERE USU_ID = $id";

$dados = mysqli_query($conexao, $sql);

$linha = mysqli_fetch_assoc($dados);

?>
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Cadastro</h1>
        <form action="editar_script.php" method="POST">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome completo</label>
            <input type="nome" class="form-control" name="nome" required value="<?php echo  $linha['USU_NOME']; ?>">
          </div>
          <div class="mb-3">
            <label for="date" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" name="datanasc" value="<?php echo  $linha['USU_DATANASC']; ?>">
          </div>
          <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="number" class="form-control" name="cpf" value="<?php echo  $linha['USU_CPF']; ?>">
          </div>
          <div class="mb-3">
            <label for="celular" class="form-label">Telefone celular</label>
            <input type="number" class="form-control" name="celular" value="<?php echo  $linha['USU_CELULAR']; ?>">
          </div>
          <div class="mb-3">
            <label for="fixo" class="form-label">Telefone Fixo</label>
            <input type="number" class="form-control" name="fixo" value="<?php echo  $linha['USU_FIXO']; ?>">
          </div>
          <div class="mb-3">
            <label for="Endereço" class="form-label">Endereço</label>
            <input type="text" class="form-control" name="endereco" value="<?php echo  $linha['USU_ENDEREÇO']; ?>">
          </div>
          <div class="mb-3">
            <label for="nomemae" class="form-label">Nome da Mãe</label>
            <input type="text" class="form-control" name="nomemae" value="<?php echo  $linha['USU_NOMEMAE']; ?>">
          </div>
          <div class="mb-3">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" value="<?php echo  $linha['USU_LOGIN']; ?>">
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha" value="<?php echo  $linha['USU_SENHA']; ?>">
          </div>
          <div class="mb-3">
            <input type="submit" class="btn btn-success" value="Enviar" value="salvaralteracoes">
            <input type="hidden" name="id" value="<?php echo  $linha['USU_ID']; ?>">
            
          </div>
        </form>
        <a href="index.php" class="btn btn-primary">Voltar para o início</a>
        <a href="pesquisa.php" class="btn btn-secondary">Voltar à pesquisa.</a>
      </div>
    </div>
  </div>



  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="umd/popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</body>

</html>