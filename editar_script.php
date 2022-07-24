<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Alteração de Cadastro</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>Alteração de Cadastro</title>
</head>

<body>
  <div class="container">
    <div class="row">

      <?php
    session_start();
    if($_SESSION['situaçao'] = "Usuário comum conectado!" OR $_SESSION['situaçao'] = "Administrador conectado!"){
      require_once("config.php");

      $id = $_POST['id'];
      $nome = $_POST['nome'];
      $datanasc = $_POST['datanasc'];
      $cpf = $_POST['cpf'];
      $celular = $_POST['celular'];
      $fixo = $_POST['fixo'];
      $endereco = $_POST['endereco'];
      $nomemae = $_POST['nomemae'];
      $login = $_POST['login'];
      $senha = $_POST['senha'];

      if(isset($_POST['deletardados'])){
        $sql = "UPDATE usuario SET STATUS_ID = 'I' WHERE USU_ID = '$id'";
        $resultado = mysqli_query($conexao, $sql);
        $_SESSION['msg'] = "Usuário excluído do banco de dados";
          header("location: index.php"); 
      
      }
        

      $sql = "UPDATE usuario 
      SET USU_NOME = '$nome',  USU_DATANASC = '$datanasc', USU_CPF = '$cpf', USU_CELULAR = '$celular', USU_FIXO = '$fixo', USU_ENDEREÇO = '$endereco', USU_NOMEMAE = '$nomemae', USU_LOGIN = '$login', USU_SENHA = '$senha'
      WHERE USU_ID = '$id'";

      mysqli_query($conexao, $sql);

      if ($sql) {
        echo "<br>";
        echo "$nome alterado com sucesso!";
      } else {
        echo "$nome NÃO foi alterado com sucesso!";
      }
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