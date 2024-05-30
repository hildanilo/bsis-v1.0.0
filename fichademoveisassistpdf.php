<?php
session_start();
include('fpdf/fpdf.php');
$pdf = new FPDF('L','mm','A4');
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
$pdf->Cell(75);
$pdf->Cell(18,7, 'Controle', 1,0,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(15,7, $_SESSION['pedido_loja'], 1,0,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(25,7, 'Assistência', 1,0,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(25,7, $_SESSION['controll_loja'], 1,0,'C');
$pdf->Line(0,30,300,30);
$pdf->Ln(15);
/* Header Fim*/
/* Cliente */
$pdf->SetFont('Arial','B',10);
$pdf->Cell(9,5, 'CPF:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(30,5, $_SESSION['cpf'], 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(12,5, 'Nome:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,5, $_SESSION['nome'], 0,0);
$pdf->Cell(20,5, $_SESSION['sobrenome'], 0,0);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(82);
$pdf->Cell(30,7, 'Montado', 1,0);
$_SESSION['dataentrega_loja'];
$_SESSION['dataentrega_loja'] =date("d-m-Y",strtotime(str_replace('/','-',$_SESSION['dataentrega_loja'])));
$pdf->Cell(27,7, $_SESSION['dataentrega_loja'], 1,0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(18,5, 'Endereço:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(100,5, $_SESSION['endereco'], 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,5, 'Numero:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,5, $_SESSION['numero'], 0,0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,5,'Complemento:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(18,5,  $_SESSION['complemento'], 0,0);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(150);
$pdf->Cell(50,7, 'Prazo Assistência', 1,0);
$_SESSION['datamontagem_loja'];
$_SESSION['datamontagem_loja'] =date("d-m-Y",strtotime(str_replace('/','-',$_SESSION['datamontagem_loja'])));
$pdf->Cell(27,7, $_SESSION['datamontagem_loja'], 1,0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,5, 'CEP:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,5, $_SESSION['cep'], 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(12,5, 'Bairro:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,5, $_SESSION['bairro'], 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,5, 'Cidade:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,5, $_SESSION['cidade'], 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,5, 'Estado:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(7,5, $_SESSION['estado'], 0,0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(16,5, 'Telefone:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(30,5, $_SESSION['telefone'], 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(14,5, 'Celular:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(30,5, $_SESSION['celular'], 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(12,5, 'E-mail', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(18,5, $_SESSION['email'], 0,0);
$pdf->Ln(10);
/* Cliente fim */
/* Table */
$pdf->SetFont('Arial','B',10);
$pdf->Cell(18,5, 'Codigo', 1,0,'C');
$pdf->Cell(80,5, 'Descrição', 1,0,'C');
$pdf->Cell(30,5, 'Cor', 1,0,'C');
$pdf->Cell(30,5, 'Marca', 1,0,'C');
$pdf->Cell(30,5, 'Ocorrência', 1,0,'C');
$pdf->Ln(5);
/* Dados inseridos com while */
$pdf->SetFont('Arial','',10);
include('in/conexao.php');
$prod_check = $conexao->prepare ("select `produtos`.`codigo`,`produtos`.`descricao`,`produtos`.`cores`,`produtos`.`marca`,".$_SESSION['table'].".desc_assist from `produtos` join ".$_SESSION['table']."  on   ".$_SESSION['table'].".`id-produto` =`produtos`.`id_produto` where ".$_SESSION['table'].".id_assist = '".$_SESSION['controll_loja']."'");
$prod_check->execute();
while ($row = $prod_check->fetch(PDO::FETCH_ASSOC)){
$cod = $row ['codigo'];
$desc = $row ['descricao'];
$cor = $row ['cores'];
$marca = $row ['marca'];
$ocorr = $row ['desc_assist'];				
$pdf->Cell(18,5,$cod, 1,0,'C');
$pdf->Cell(80,5, $desc, 1,0,'C');
$pdf->Cell(30,5, $cor, 1,0,'C');
$pdf->Cell(30,5, $marca, 1,0,'C');
$pdf->Cell(30,5, $ocorr, 1,0,'C');
$pdf->Ln(5);
}
;
$pdf->Ln(15);
$pdf->SetFont('Arial','',10);
$pdf->Write(5,'Ass______________________________________________ Data____/_______/______');
$pdf->Ln(10);
$pdf->SetFont('Arial','',6);
/* Footer*/
$pdf->Output();