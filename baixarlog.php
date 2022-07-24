
<?php
///------------------------------Tela que transforma o os dados do BD em um PDF----------------------///
include_once("dompdf/autoload.inc.php");
include_once("config.php");


$html = '<table border=1';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>logID</th>';
$html .= '<th>Hora de Acesso</th>';
$html .= '<th>Método de Acesso</th>';
$html .= '<th>Status do Acesso</th>';
$html .= '<th>login do Usuário</th>';
;

$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

$result_transacoes = "SELECT usuario.*, registro_user.* FROM registro_user, usuario where usuario.USU_ID=registro_user.USU_ID order by logID DESC";
$resultado_trasacoes = mysqli_query($conexao, $result_transacoes);
while ($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)) {
	$html .= '<tr><td>' . $row_transacoes['logID'] . "</td>";
	$html .= '<td>' . $row_transacoes['acessHORA'] . "</td>";
	$html .= '<td>' . $row_transacoes['acessMETODO'] . "</td>";
	$html .= '<td>' . $row_transacoes['acessSTA'] . "</td>";
	$html .= '<td>' . $row_transacoes['USU_LOGIN'] . "</td>";
	"</tr>";
	
}

$html .= '</tbody>';
$html .= '</table';


//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader


//Criando a Instancia
$dompdf = new DOMPDF();

// Carrega seu HTML
$dompdf->load_html('
			<h1 style="text-align: center;">Telecall Registros de Acesso</h1>
			' . $html . '
		');

//Renderizar o html
$dompdf->render();

//Exibibir a página
$dompdf->stream(
	"logs_telecall.pdf",
	array(
		"Attachment" => false //Para realizar o download somente alterar para true
	)
);
?>