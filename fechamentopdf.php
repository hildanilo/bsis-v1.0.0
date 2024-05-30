<?php
session_start();
include('fpdf/fpdf.php');
$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
/* Header*/
/*loja*/
$pdf->Image('imagens/baixinhopretobranco.png' , 10 ,8, 40);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(50);
$pdf->Cell(11,5, 'Loja:',0,0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(25,5,$_SESSION['loja'],0,0);
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(18,5, 'Endereço:',0,0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(42,5, $_SESSION['endereco_loja'],0,0);
$pdf->Cell(5,5, $_SESSION['numero_loja'],0,0);
$pdf->Cell(20,5, $_SESSION['bairro_loja'],0,0);
$pdf->Cell(25,5, $_SESSION['cidade_loja'],0,0);
$pdf->Cell(5,5, $_SESSION['estado_loja'],0,0);
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(18,5, 'Telefone:',0,0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(25,5, $_SESSION['telefone_loja'],0,0);
$pdf->Cell(25,5, $_SESSION['email_loja'],0,0);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(35);
$pdf->Cell(20,7, 'Numero', 1,0,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(25,7, $_SESSION['controle'], 1,0,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Line(0,30,300,30);
$pdf->Ln(15);
/* Header Fim*/
/* Table */
$pdf->SetFont('Arial','B',10);
$pdf->Cell(20,5, 'Controle', 1,0,'C');
$pdf->Cell(120,5, 'Cliente', 1,0,'C');
$pdf->Cell(20,5, 'Valor', 1,0,'C');
$pdf->Ln(5);
/* Dados inseridos com while */
$pdf->SetFont('Arial','',10);
include('in/conexao.php');
$prod_check = $conexao->prepare ("SELECT DISTINCT `clientes`.`nome`, ".$_SESSION['fecht'].".`id_controle` ,".$_SESSION['fecht'].".`valor-total-controle` FROM ".$_SESSION['fecht']." join `clientes`  on   `id-cliente` = `id_cliente` where ".$_SESSION['fecht'].".id_fechamento = '".$_SESSION['controle']."'");
$prod_check->execute();
while ($row = $prod_check->fetch(PDO::FETCH_ASSOC)){

$cod = $row ['id_controle'];
$nome = $row ['nome'];
$sobrenome = $row ['sobrenome'];
$nome.=$sobrenome;
$valor = $row ['valor-total-controle'];
$valor= number_format($valor,2,",",".");	
$total += $valor;
$pdf->Cell(20,5,$cod, 1,0,'C');
$pdf->Cell(120,5,$nome, 1,0,'C');
$pdf->Cell(20,5, $valor, 1,0,'C');
$pdf->Ln(5);
};
$pdf->Ln(5);
$pdf->Cell(100);
$total =
$total= number_format($total,2,",",".");
$pdf->Cell(30,5, Total, 1,0,'C');
$pdf->Cell(30,5, $total, 1,0,'C');
$pdf->Ln(10);
$pdf->SetFont('Arial','',10);
$pdf->Write(5,$_SESSION['montador']);
$pdf->Write(5,' Declaro ter recibido do GRUPO LOJÃO DO BAIXINHO a importância acima mencionada. Referente aos serviços prestados como Montador de Movéis até a Presente data. Data____/_______/______ Ass______________________________________________  ');
$pdf->Ln(10);
$pdf->SetFont('Arial','',6);
/* Footer*/
$date = date("Y-m-d");
/*session_destroy();
unset( $_SESSION );*/
$pdf->Output();