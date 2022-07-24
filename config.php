<?php

define('HOST', '127.0.0.1:3307');
define('USER', 'root');
define('PASS', 'Lucas@0316963');
define('BASE', 'mydb');


$conexao = mysqli_connect(HOST, USER, PASS, BASE);

function mostra_data($data) {
  $d = explode('-', $data);
  $escreve = $d[2] ."/" .$d[1] ."/" .$d[0];
 return $escreve;
}
