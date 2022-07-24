
<!----Tela do 2FA, que gera de maneira semi aleatória um formulário---->
<?php
//Esta tela criar um formulário aleatório para fazer a 2FA.
session_start();
if($_SESSION['situaçao'] = "Validado"){ 

$aleatorio = rand(1, 5);
///comando que recebe este valor,gerando um formulário aleatório.
    switch ($aleatorio):
        case 1:
            
    
            echo '<span class="padding-bottom--10">Insira os 3 ULTIMOS Digitos do CPF Cadastrado</span><br>';
            echo '<form id="stripe-login" method="post" action="verifica2fa.php">';
            echo "<input type='text' name='cpf3U'>";
            echo '<br>';
            echo "<input type='submit'  name='btn2FA' value='Verificar'>";
            echo "</form>";
           

            break;
        case 2:
         
            echo '<span class="padding-bottom--10">Insira os 3 PRIMEIROS Digitos do CPF Cadastrado</span><br>';
            echo '<form id="stripe-login" method="post" action="verifica2fa.php">';
            echo "<input type='text' name='cpf3P'>";
            echo '<br>';
            echo "<input type='submit'  name='btn2FA' value='Verificar'>";
            echo "</form>";
    

            break;
        case 3:
   

            echo '<span class="padding-bottom--10">Insira o Celular Cadastrado</span><br>';
            echo '<form id="stripe-login" method="post" action="verifica2fa.php">';
            echo "<input type='text' name='celular'>";
            echo '<br>';
            echo "<input type='submit'  name='btn2FA' value='Verificar'>";
            echo "</form>";

            break;
        case 4:
      
            echo '<span class="padding-bottom--10">Insira o Nome da Mãe Conforme foi Preenchido no Cadastro</span><br>';
            echo '<form id="stripe-login" method="post" action="verifica2fa.php">';
            echo "<input type='text' name='mae'>";
            echo '<br>';
            echo "<input type='submit'  name='btn2FA' value='Verificar'>";
            echo "</form>";

            break;
        case 5:
    
            echo '<span class="padding-bottom--10">Insira a sua Data de Nascimento Cadastrada</span><br>';
            echo '<form id="stripe-login" method="post" action="verifica2fa.php">';
            echo "<input type='date' name='nasc'>";
            echo '<br>';
            echo "<input type='submit'   max='9999-12-31' name='btn2FA' value='Verificar'>";
            echo "</form>";

            break;
    endswitch;


}
else{
    session_destroy();
    session_start();
    $_SESSION['msg'] = "Página não encontrada!";
    Header("location: index.php");

}
?>

