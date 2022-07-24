<!doctype html>
<html lang="en">

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

      <?php

      require_once("config.php");

      $nome = $_POST['nome'];
      $datanasc = $_POST['datanasc'];
      $cpf = $_POST['cpf'];
      $celular = $_POST['celular'];
      $fixo = $_POST['fixo'];
      $endereco = $_POST['endereco'];
      $nomemae = $_POST['nomemae'];
      $login = $_POST['login'];
      $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
      $sql = "INSERT INTO usuario (USU_NOME, USU_DATANASC, USU_CPF, USU_CELULAR, USU_FIXO, USU_ENDEREÇO, USU_NOMEMAE, USU_LOGIN, USU_SENHA, PERFIL_ID, STATUS_ID) VALUES ('$nome', '$datanasc', '$cpf', '$celular', '$fixo', '$endereco', '$nomemae', '$login', '$senha', 'c', 'A')";

      $resultado = mysqli_query($conexao, $sql);

      if ($resultado) {
        echo "<br>";
        echo "$nome cadastrado com sucesso!";
      } else {
        echo "$nome não foi cadastrado com sucesso. Tente novamente.";
      }

      ?>
      <br>
      <a href="cadastro.php" class="btn btn-primary">Voltar</a>
    </div>
  </div>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="umd/popper.min.js"></script>
  <script src="bootstrap.min.js"></script>
</body>

</html>