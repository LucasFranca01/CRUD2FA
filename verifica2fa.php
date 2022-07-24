
<?php
session_start();
include_once("config.php");

if($_SESSION['situaçao'] == "Validado"){




$btn2FA = filter_input(INPUT_POST, 'btn2FA', FILTER_SANITIZE_STRING);
if ($btn2FA) {

    $cpf3U = filter_input(INPUT_POST, 'cpf3U', FILTER_SANITIZE_STRING);
    $cpf3P = filter_input(INPUT_POST, 'cpf3P', FILTER_SANITIZE_STRING);
    $cell = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_STRING);
    $mae = filter_input(INPUT_POST, 'mae', FILTER_SANITIZE_STRING);
    $nasc = filter_input(INPUT_POST, 'nasc', FILTER_SANITIZE_STRING);
    $iduser = $_SESSION['id'];

    $v2 = array($cpf3U, $cpf3P, $cell, $mae, $nasc);



    $rowCPF3P = substr($_SESSION['cpf'], 0, 3);
    $rowCPF3U = substr($_SESSION['cpf'], -3);
    if (isset($mae)) {
        if ($mae === $_SESSION['mae']) {
            $sql = "INSERT INTO registro_user(acessHORA,acessMETODO,acessSTA,USU_ID) values('" . date('d-m-Y H:i:s') . "','Nome da Mãe','ON','" . $iduser . "')";
            $resultRegistro = mysqli_query($conexao, $sql);
        } else {
            $sql = "INSERT INTO registro_user(acessHORA,acessMETODO,acessSTA,USU_ID) values('" . date('d-m-Y H:i:s') . "','Nome da Mãe','OFF','" . $iduser . "')";
            $resultRegistro = mysqli_query($conexao, $sql);
            session_destroy();
            session_start();
            $_SESSION['msg'] = "Verificação de Duas Etapas Falhou! Tente Logar Novamente";
          var_dump($mae, $_SESSION['mae']);
        }
    }
    if (isset($nasc)) {
        if ($nasc === $_SESSION['nasc']) {
            $sql = "INSERT INTO registro_user(acessHORA,acessMETODO,acessSTA,USU_ID) values('" . date('d-m-Y H:i:s') . "','Data de Nascimento','ON','" . $iduser . "')";
            $resultRegistro = mysqli_query($conexao, $sql);
        } else {
            $sql = "INSERT INTO registro_user(acessHORA,acessMETODO,acessSTA,USU_ID) values('" . date('d-m-Y H:i:s') . "','Data de Nascimento','OFF','" . $iduser . "')";
            $resultRegistro = mysqli_query($conexao, $sql);
            session_destroy();
            session_start();
            $_SESSION['msg'] = "Verificação de Duas Etapas Falhou! Tente Logar Novamente";
            header("Location:index.php");
        }
    }
    if (isset($cell)) {
        if ($cell === $_SESSION['cell']) {
            $sql = "INSERT INTO registro_user(acessHORA,acessMETODO,acessSTA,USU_ID) values('" . date('d-m-Y H:i:s') . "','Celular','ON','" . $iduser . "')";
            $resultRegistro = mysqli_query($conexao, $sql);
        } else {
            $sql = "INSERT INTO registro_user(acessHORA,acessMETODO,acessSTA,USU_ID) values('" . date('d-m-Y H:i:s') . "','Celular','OFF','" . $iduser . "')";
            $resultRegistro = mysqli_query($conexao, $sql);
            session_destroy();
            session_start();
            $_SESSION['msg'] = "Verificação de Duas Etapas Falhou! Tente Logar Novamente";
            header("Location:index.php");
        }
    }
    if (isset($cpf3P)) {
        if ($cpf3P === $rowCPF3P) {
            $sql = "INSERT INTO registro_user(acessHORA,acessMETODO,acessSTA,USU_ID) values('" . date('d-m-Y H:i:s') . "','3 Primeiros Digitos do CPF','ON','" . $iduser . "')";
            $resultRegistro = mysqli_query($conexao, $sql);
        } else {
            $sql = "INSERT INTO registro_user(acessHORA,acessMETODO,acessSTA,USU_ID) values('" . date('d-m-Y H:i:s') . "','3 Primeiros Digitos do CPF','OFF', '" . $iduser . "')";
            $resultRegistro = mysqli_query($conexao, $sql);
            session_destroy();
            session_start();
            $_SESSION['msg'] = "Verificação de Duas Etapas Falhou! Tente Logar Novamente";
            header("Location:index.php");
        }
    }
    if (isset($cpf3U)) {
        if ($cpf3U === $rowCPF3U) {
            $sql = "INSERT INTO registro_user(acessHORA,acessMETODO,acessSTA,USU_ID) values('" . date('d-m-Y H:i:s') . "','3 Ultimos Digitos do CPF','ON','" . $iduser . "')";
            $resultRegistro = mysqli_query($conexao, $sql);
        } else {
            $sql = "INSERT INTO registro_user(acessHORA,acessMETODO,acessSTA,USU_ID) values('" . date('d-m-Y H:i:s') . "','3 Ultimos Digitos do CPF','OFF','" . $iduser . "')";
            $resultRegistro = mysqli_query($conexao, $sql);
            session_destroy();
            session_start();
            $_SESSION['msg'] = "Verificação de Duas Etapas Falhou! Tente Logar Novamente";
            header("Location:index.php");
        }
    }
}
if($_SESSION['perfilid'] == "a"){
    $_SESSION['situaçao'] = "Administrador Conectado!";
    header("Location: pesquisa.php");
} else if ($_SESSION['perfilid'] == "c"){
     $_SESSION['situaçao'] = "Usuário comum conectado!";
    header("Location: pesquisausu.php");
}
}

else{
    session_destroy();
    session_start();
    $_SESSION['msg'] = "Página não encontrada!";
    Header("location: index.php");

}

?>