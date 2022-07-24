<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pesquisar</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
  <?php

session_start();

  if($_SESSION['situaçao'] == "Administrador Conectado!"){
    


  $pesquisa = $_POST['busca'] ?? '';

  require_once("config.php");

  $sql = "SELECT * FROM usuario WHERE USU_NOME LIKE '%$pesquisa%' AND STATUS_ID = 'A'";

  $dados = mysqli_query($conexao, $sql);

  ?>



  <div class="container">
    <div class="row">
      <center>
        <h2>Pesquisar</h2>
      </center>
      <div class="col">
        <nav class="navbar bg-light">
          <div class="container-fluid">
            <form class="d-flex" role="search" action="pesquisa.php" method="POST">
              <input class="form-control me-2" type="search" autofocus placeholder="Nome" aria-label="Search" name="busca">
              <button class="btn btn-primary" type="submit">Pesquisar</button>
              <a href="sair.php" class="btn btn-secondary">Deslogar</a>
              <a href="baixarlog.php" class="btn btn-warning">Logs</a>
            </form>
          </div>
        </nav>
        </form>
      </div>
      </nav>
      <table class="table table-dark table-hover">
        <thead>
          <th scope="col">Nome</th>
          <th scope="col">Data de Nascimento</th>
          <th scope="col">CPF</th>
          <th scope="col">Telefone Celular</th>
          <th scope="col">Telefone Fixo</th>
          <th scope="col">Endereço</th>
          <th scope="col">Nome da Mãe</th>
          <th scope="col">Login</th>
          <th scope="col">Senha</th>
          <th scope="col">Funções</th>
        </thead>
        <tbody>
          <?php

          while ($linha = mysqli_fetch_assoc($dados)) {
            $id = $linha['USU_ID'];
            $nome = $linha['USU_NOME'];
            $datanasc = $linha['USU_DATANASC'];
            $CPF = $linha['USU_CPF'];
            $celular = $linha['USU_CELULAR'];
            $fixo = $linha['USU_FIXO'];
            $endereco = $linha['USU_ENDEREÇO'];
            $nomemae = $linha['USU_NOMEMAE'];
            $login = $linha['USU_LOGIN'];
            $senha = $linha['USU_SENHA'];
            $datanasc = mostra_data($datanasc);
            echo "<tr>
                      <th scope = 'row'>$nome</th>
                      <td>$datanasc</td>
                      <td>$CPF</td>
                      <td>$celular</td>
                      <td>$fixo</td>
                      <td>$endereco</td>
                      <td>$nomemae</td>
                      <td>$login</td>
                      <td>$senha</td>
                      <td> 
                      <a href='editar.php?id=$id' class='btn btn-success btn-sm'> Editar </a>
                      
                      <a href='#' class='btn btn-danger btn-sm' data-bs-toggle='modal' data-bs-target='#confirma' onclick=" . '"'  . "get_data('$id', '$nome')" . '"' . "> Excluir </a>
                      </td>
                </tr>";
          }
        }
        else{
          session_destroy();
          session_start();
          $_SESSION['msg'] = "Página não encontrada!";
          Header("location: index.php");
      
      }

          ?>


        </tbody>
      </table>
    </div>
  </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Excluir usuário</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="excluir_script.php" method="POST">
            <p>Você quer realmente excluir este usuário</p>
            <b id="usuário">Nome da pessoa</b>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
          <input type="hidden" name="id" id="USU_NOME" value="">
          <input type="hidden" name="nome" id="usuário1" value="">
          <input type="submit" class="btn btn-danger" value="Sim">
          </form>
        </div>
      </div>
    </div>
  </div>
        

  <script type="text/javascript">
    function get_data(id, nome) {
      document.getElementById("usuário").innerHTML = nome;
      document.getElementById("USU_NOME").value = id;
      document.getElementById("usuário1").value = nome;

    }
    
  </script>

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="umd/popper.min.js"></script>
  <script src="bootstrap.min.js"></script>

</body>

</html>