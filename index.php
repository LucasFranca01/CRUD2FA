<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tela de login</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
  
</body>

<?php

session_start();

if (isset($_SESSION['msg'])){

echo $_SESSION['msg'];

session_destroy();
}

?>


<div class="container">
  <center><h2>Tela de login</h2></center>
  <form action="valida.php" method="POST">
    <div class="form-group">
      <input type="text" class="form-control" id="email" placeholder="Insira seu login" name="login">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pwd" placeholder="Insira sua senha " name="senha">
    </div>
    <button type="submit" class="btn btn-success">Confirmar</button>
   <a href="cadastro.php" class="btn btn-warning">Cadastre-se</a>.
  <a href="apresentacao.php" class="btn btn-info">Informações do desenvolvedor
  </form> 
  

  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="umd/popper.min.js"></script>
  <script src="bootstrap.min.js"></script>

</body>

