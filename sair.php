<?php
session_destroy();
session_start();

$_SESSION['msg'] = "Deslogado com sucesso!";

header("location: index.php");


?>