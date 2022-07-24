<?php

require_once("config.php");

session_start();




if (empty($_POST['nome']) && empty($_POST['senha'])) {
  $_SESSION["msg"] = "Tá vazio";
  header("location: index.php");
} else {
  $login = $_POST['login'];
  $senha = $_POST['senha'];
  $sql = "SELECT * FROM usuario WHERE USU_LOGIN ='$login' limit 1";
  $resultado = mysqli_query($conexao, $sql);
  $dados =mysqli_fetch_array($resultado);

  if(isset($dados['USU_SENHA'])){
    if(password_verify($senha,$dados['USU_SENHA'])){
      $_SESSION['senha'] = $dados['USU_SENHA'];
      $_SESSION['perfilid'] = $dados['PERFIL_ID'];
      $_SESSION['id'] = $dados['USU_ID'];
      $_SESSION['nome'] = $dados['USU_NOME'];
      $_SESSION['nasc'] = $dados['USU_DATANASC'];
      $_SESSION['login'] = $dados['USU_LOGIN'];
      $_SESSION['mae'] = $dados['USU_NOMEMAE'];
      $_SESSION['cpf'] = $dados['USU_CPF'];
      $_SESSION['cell'] = $dados['USU_CELULAR'];
      $_SESSION['fixo'] = $dados['USU_FIXO'];
      $_SESSION['endereco'] = $dados['USU_ENDEREÇO'];
      $_SESSION['status'] = $dados['STATUS_ID'];
    
      $_SESSION['situaçao'] = "Validado";
      
    
    
    
      if($_SESSION['status'] == 'I'){
        $_SESSION['msg'] = "Usuário excluído do banco de dados";
    
      header("location: index.php");    
    
    
    
    } elseif  ($_SESSION['status'] == 'A') { 
      header("location: pesquisausu.php");  
        header("location: verificacao.php");
    
    
      }
      

  }

  else {
    session_destroy();
    session_start();
    $_SESSION['msg'] = "Senha incorreta!";
    header("location: index.php");

  }

 } else {
    echo "este usuario não existe no banco de dados";
    echo "<br>";
    echo "<a href='cadastro.php'>Clique aqui para se cadastrar</a>";
    echo "<br>";
    echo "<a href='index.php'>Voltar à tela principal.</a>";
  }

}


?>