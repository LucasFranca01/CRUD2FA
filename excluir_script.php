<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exclusão de Cadastro</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>Exclusão de Cadastro</title>
</head>

<body>
  <div class="container">
    <div class="row">

      <?php

      require_once("config.php");

      $id = $_POST['id'];
      $nome = $_POST['nome'];


      $sql = "UPDATE usuario SET STATUS_ID = 'I' WHERE USU_ID = '$id'";

      mysqli_query($conexao, $sql);

      if ($sql) {
        echo "<br>";
        echo "$nome excluído com sucesso!";
      } else {
        echo "$nome NÃO foi excluído";
      }

      ?>
      <br>
      <a href="cadastro.php" class="btn btn-primary">Voltar</a>
      <a href="pesquisa.php" class="btn btn-secondary">Voltar à tela de pesquisa</a>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="umd/popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</body>

</html>