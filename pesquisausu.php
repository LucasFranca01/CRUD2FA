<?php

use FontLib\EOT\Header;

session_start();

if ($_SESSION['situaçao'] == "Usuário comum conectado!") {


?>
  <!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Usuário Comum</title>
  </head>

  <body>
    <table class="table table-dark table-hover">
      <thead>
        <div class="container">
          <div class="row">
            <div class="col">
              <center>
                <h1>Visualização e/ou alteração de dados.</h1>
              </center>
              <form action="editar_script.php" method="POST">
                <div class="mb-3">
                  <label for="nome" class="form-label">Nome completo</label>
                  <input type="nome" class="form-control" name="nome" required value=<?php echo    $_SESSION['nome']; ?>>
                </div>
                <div class="mb-3">
                  <label for="date" class="form-label">Data de Nascimento</label>
                  <input type="date" class="form-control" name="datanasc" value=<?php echo  $_SESSION['nasc']; ?>>
                </div>
                <div class="mb-3">
                  <label for="cpf" class="form-label">CPF</label>
                  <input type="number" class="form-control" name="cpf" value=<?php echo   $_SESSION['cpf']; ?>>
                </div>
                <div class="mb-3">
                  <label for="celular" class="form-label">Telefone celular</label>
                  <input type="number" class="form-control" name="celular" value=<?php echo   $_SESSION['cell']; ?>>
                </div>
                <div class="mb-3">
                  <label for="fixo" class="form-label">Telefone Fixo</label>
                  <input type="number" class="form-control" name="fixo" value=<?php echo   $_SESSION['fixo']; ?>>
                </div>
                <div class="mb-3">
                  <label for="Endereço" class="form-label">Endereço</label>
                  <input type="text" class="form-control" name="endereco" value=<?php echo  $_SESSION['endereco']; ?>>
                </div>
                <div class="mb-3">
                  <label for="nomemae" class="form-label">Nome da Mãe</label>
                  <input type="text" class="form-control" name="nomemae" value=<?php echo $_SESSION['mae']; ?>>
                </div>
                <div class="mb-3">
                  <label for="login" class="form-label">Login</label>
                  <input type="text" class="form-control" name="login" value=<?php echo   $_SESSION['login']; ?>>
                </div>
                <div class="mb-3">
                  <label for="senha" class="form-label">Senha</label>
                  <input type="password" class="form-control" name="senha" value=<?php echo  $_SESSION['senha']; ?>>
                </div>
                <div class="mb-3">
                  <input type="submit" class="btn btn-success" value="Enviar" value="salvaralteracoes">
                  <input type="hidden" name="id" value=<?php echo   $_SESSION['id']; ?>>
                  <input type="submit" value="Deletar" class="btn btn-danger" name="deletardados">
                </div>
              </form>
              <a href="sair.php" class="btn btn-secondary">Deslogar</a>
          

            </div>
          </div>
        </div>

      </thead>
      <tbody>



  </body>

  </html>

<?php

} else {
  session_destroy();
  session_start();
  $_SESSION['msg'] = "Página não encontrada!";
  Header("location: index.php");
}

?>