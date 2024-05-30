<?php
session_start();
include('fpdf/fpdf.php');
include('in/conexao.php');
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();
/* Header*/
/*loja*/
$controle= $_GET["codigo"];
$loja= $_GET["loja"];
switch($loja){
	case 'Guarulhos 1':
		$table = "`ficha_de_moveis_guarulhos1`";
		$selecloja = $conexao->prepare ("SELECT * FROM lojas WHERE id_loja = '5'");
		$selecloja->execute();
		$sql = $selecloja->fetch(PDO::FETCH_ASSOC);
		$nomeloja = $sql['loja'];
		$endereco = $sql['endereco'];
		$numero = $sql['numero'];
		$bairro = $sql['bairro'];
		$cep = $sql['cep'];
		$cidade = $sql['cidade'];
		$estado = $sql['estado'];
		$telefone = $sql['telefone'];
		$email = $sql['email'];
		
		$prod = $conexao->prepare ("SELECT `clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`cep`,`clientes`.`complemento`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,".$table.".`id_pedido`,".$table.".`dataentrega`,".$table.".`datamontagem`,`montadores`.`nome_montador` FROM `clientes` JOIN".$table."  ON   ".$table.".`id-cliente` =`clientes`.`id_cliente` JOIN `montadores` on `montadores`.`id-montador`= ".$table.".`id-montador`  WHERE ".$table.".id_controle = '".$controle."'");
		$prod->execute();
		$pr = $prod->fetch(PDO::FETCH_ASSOC);
		$cpf = $pr['cpf'];
		$nome_cliente = $pr['nome'];
		$endereco_cliente = $pr['endereco'];
		$numero_cliente = $pr['numero'];
		$complemento_cliente = $pr['completo'];
		$bairro_cliente = $pr['bairro'];
		$cidade_cliente = $pr ['cidade'];
		$estado_cliente = $pr ['estado'];
		$cep_cliente = $pr['cep'];
		$telefone_cliente = $pr ['telefone'];
		$celular_cliente = $pr ['celular'];
		$email_cliente = $pr ['email'];
		$datamontagem = $pr['datamontagem'];
		$dataentrega = $pr['dataentrega'];
		$montador = $pr['nome_montador'];
		$pedido = $pr['id_pedido'];
		
	break;
	case 'Guarulhos 2':
		$table = "`ficha_de_moveis_guarulhos2`";
		$selecloja = $conexao->prepare ("SELECT * FROM lojas WHERE id_loja = '2'");
		$selecloja->execute();
		$sql = $selecloja->fetch(PDO::FETCH_ASSOC);
		$nomeloja = $sql['loja'];
		$endereco = $sql['endereco'];
		$numero = $sql['numero'];
		$bairro = $sql['bairro'];
		$cep = $sql['cep'];
		$cidade = $sql['cidade'];
		$estado = $sql['estado'];
		$telefone = $sql['telefone'];
		$email = $sql['email'];
		
		$prod = $conexao->prepare ("SELECT `clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`cep`,`clientes`.`complemento`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,".$table.".`id_pedido`,".$table.".`dataentrega`,".$table.".`datamontagem`,`montadores`.`nome_montador` FROM `clientes` JOIN".$table."  ON   ".$table.".`id-cliente` =`clientes`.`id_cliente` JOIN `montadores` on `montadores`.`id-montador`= ".$table.".`id-montador`  WHERE ".$table.".id_controle = '".$controle."'");
		$prod->execute();
		$pr = $prod->fetch(PDO::FETCH_ASSOC);
		$cpf = $pr['cpf'];
		$nome_cliente = $pr['nome'];
		$endereco_cliente = $pr['endereco'];
		$numero_cliente = $pr['numero'];
		$complemento_cliente = $pr['completo'];
		$bairro_cliente = $pr['bairro'];
		$cidade_cliente = $pr ['cidade'];
		$estado_cliente = $pr ['estado'];
		$cep_cliente = $pr['cep'];
		$telefone_cliente = $pr ['telefone'];
		$celular_cliente = $pr ['celular'];
		$email_cliente = $pr ['email'];
		$datamontagem = $pr['datamontagem'];
		$dataentrega = $pr['dataentrega'];
		$montador = $pr['nome_montador'];
		$pedido = $pr['id_pedido'];
	break;
	case 'Santo Andre':
		$table = "`ficha_de_moveis_santo_andre`";
		$selecloja = $conexao->prepare ("SELECT * FROM lojas WHERE id_loja = '4'");
		$selecloja->execute();
		$sql = $selecloja->fetch(PDO::FETCH_ASSOC);
		$nomeloja = $sql['loja'];
		$endereco = $sql['endereco'];
		$numero = $sql['numero'];
		$bairro = $sql['bairro'];
		$cep = $sql['cep'];
		$cidade = $sql['cidade'];
		$estado = $sql['estado'];
		$telefone = $sql['telefone'];
		$email = $sql['email'];
		
		$prod = $conexao->prepare ("SELECT `clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`cep`,`clientes`.`complemento`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,".$table.".`id_pedido`,".$table.".`dataentrega`,".$table.".`datamontagem`,`montadores`.`nome_montador` FROM `clientes` JOIN".$table."  ON   ".$table.".`id-cliente` =`clientes`.`id_cliente` JOIN `montadores` on `montadores`.`id-montador`= ".$table.".`id-montador`  WHERE ".$table.".id_controle = '".$controle."'");
		$prod->execute();
		$pr = $prod->fetch(PDO::FETCH_ASSOC);
		$cpf = $pr['cpf'];
		$nome_cliente = $pr['nome'];
		$endereco_cliente = $pr['endereco'];
		$numero_cliente = $pr['numero'];
		$complemento_cliente = $pr['completo'];
		$bairro_cliente = $pr['bairro'];
		$cidade_cliente = $pr ['cidade'];
		$estado_cliente = $pr ['estado'];
		$cep_cliente = $pr['cep'];
		$telefone_cliente = $pr ['telefone'];
		$celular_cliente = $pr ['celular'];
		$email_cliente = $pr ['email'];
		$datamontagem = $pr['datamontagem'];
		$dataentrega = $pr['dataentrega'];
		$montador = $pr['nome_montador'];
		$pedido = $pr['id_pedido'];
	break;
	case 'Sao Bernardo':
		$table = "`ficha_de_moveis_sao_bernardo`";
		$selecloja = $conexao->prepare ("SELECT * FROM lojas WHERE id_loja = '3'");
		$selecloja->execute();
		$sql = $selecloja->fetch(PDO::FETCH_ASSOC);
		$nomeloja = $sql['loja'];
		$endereco = $sql['endereco'];
		$numero = $sql['numero'];
		$bairro = $sql['bairro'];
		$cep = $sql['cep'];
		$cidade = $sql['cidade'];
		$estado = $sql['estado'];
		$telefone = $sql['telefone'];
		$email = $sql['email'];
		
		$prod = $conexao->prepare ("SELECT `clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`cep`,`clientes`.`complemento`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,".$table.".`id_pedido`,".$table.".`dataentrega`,".$table.".`datamontagem`,`montadores`.`nome_montador` FROM `clientes` JOIN".$table."  ON   ".$table.".`id-cliente` =`clientes`.`id_cliente` JOIN `montadores` on `montadores`.`id-montador`= ".$table.".`id-montador`  WHERE ".$table.".id_controle = '".$controle."'");
		$prod->execute();
		$pr = $prod->fetch(PDO::FETCH_ASSOC);
		$cpf = $pr['cpf'];
		$nome_cliente = $pr['nome'];
		$endereco_cliente = $pr['endereco'];
		$numero_cliente = $pr['numero'];
		$complemento_cliente = $pr['completo'];
		$bairro_cliente = $pr['bairro'];
		$cidade_cliente = $pr ['cidade'];
		$estado_cliente = $pr ['estado'];
		$cep_cliente = $pr['cep'];
		$telefone_cliente = $pr ['telefone'];
		$celular_cliente = $pr ['celular'];
		$email_cliente = $pr ['email'];
		$datamontagem = $pr['datamontagem'];
		$dataentrega = $pr['dataentrega'];
		$montador = $pr['nome_montador'];
		$pedido = $pr['id_pedido'];
	break;
	case 'Maua':
		$table = "`ficha_de_moveis_maua`";
		$selecloja = $conexao->prepare ("SELECT * FROM lojas WHERE id_loja = '13'");
		$selecloja->execute();
		$sql = $selecloja->fetch(PDO::FETCH_ASSOC);
		$nomeloja = $sql['loja'];
		$endereco = $sql['endereco'];
		$numero = $sql['numero'];
		$bairro = $sql['bairro'];
		$cep = $sql['cep'];
		$cidade = $sql['cidade'];
		$estado = $sql['estado'];
		$telefone = $sql['telefone'];
		$email = $sql['email'];
		
		$prod = $conexao->prepare ("SELECT `clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`cep`,`clientes`.`complemento`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,".$table.".`id_pedido`,".$table.".`dataentrega`,".$table.".`datamontagem`,`montadores`.`nome_montador` FROM `clientes` JOIN".$table."  ON   ".$table.".`id-cliente` =`clientes`.`id_cliente` JOIN `montadores` on `montadores`.`id-montador`= ".$table.".`id-montador`  WHERE ".$table.".id_controle = '".$controle."'");
		$prod->execute();
		$pr = $prod->fetch(PDO::FETCH_ASSOC);
		$cpf = $pr['cpf'];
		$nome_cliente = $pr['nome'];
		$endereco_cliente = $pr['endereco'];
		$numero_cliente = $pr['numero'];
		$complemento_cliente = $pr['completo'];
		$bairro_cliente = $pr['bairro'];
		$cidade_cliente = $pr ['cidade'];
		$estado_cliente = $pr ['estado'];
		$cep_cliente = $pr['cep'];
		$telefone_cliente = $pr ['telefone'];
		$celular_cliente = $pr ['celular'];
		$email_cliente = $pr ['email'];
		$datamontagem = $pr['datamontagem'];
		$dataentrega = $pr['dataentrega'];
		$montador = $pr['nome_montador'];
		$pedido = $pr['id_pedido'];
	break;
	case 'Penha':
		$table = "`ficha_de_moveis_guarulhos1`";
		$selecloja = $conexao->prepare ("SELECT * FROM lojas WHERE id_loja = '6'");
		$selecloja->execute();
		$sql = $selecloja->fetch(PDO::FETCH_ASSOC);
		$nomeloja = $sql['loja'];
		$endereco = $sql['endereco'];
		$numero = $sql['numero'];
		$bairro = $sql['bairro'];
		$cep = $sql['cep'];
		$cidade = $sql['cidade'];
		$estado = $sql['estado'];
		$telefone = $sql['telefone'];
		$email = $sql['email'];
		
		$prod = $conexao->prepare ("SELECT `clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`cep`,`clientes`.`complemento`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,".$table.".`id_pedido`,".$table.".`dataentrega`,".$table.".`datamontagem`,`montadores`.`nome_montador` FROM `clientes` JOIN".$table."  ON   ".$table.".`id-cliente` =`clientes`.`id_cliente` JOIN `montadores` on `montadores`.`id-montador`= ".$table.".`id-montador`  WHERE ".$table.".id_controle = '".$controle."'");
		$prod->execute();
		$pr = $prod->fetch(PDO::FETCH_ASSOC);
		$cpf = $pr['cpf'];
		$nome_cliente = $pr['nome'];
		$endereco_cliente = $pr['endereco'];
		$numero_cliente = $pr['numero'];
		$complemento_cliente = $pr['completo'];
		$bairro_cliente = $pr['bairro'];
		$cidade_cliente = $pr ['cidade'];
		$estado_cliente = $pr ['estado'];
		$cep_cliente = $pr['cep'];
		$telefone_cliente = $pr ['telefone'];
		$celular_cliente = $pr ['celular'];
		$email_cliente = $pr ['email'];
		$datamontagem = $pr['datamontagem'];
		$dataentrega = $pr['dataentrega'];
		$montador = $pr['nome_montador'];
		$pedido = $pr['id_pedido'];
	break;
	default:
}
$pdf->Image('imagens/baixinhopretobranco.png' , 10 ,8, 40);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(50);
$pdf->Cell(11,5, 'Loja:',0,0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(25,5,$nomeloja,0,0);
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(18,5, 'Endereço:',0,0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(42,5, $endereco,0,0);
$pdf->Cell(5,5, $numero,0,0);
$pdf->Cell(20,5, $bairro ,0,0);
$pdf->Cell(20,5,$cep,0,0);
$pdf->Cell(25,5, $cidade,0,0);
$pdf->Cell(5,5, $estado,0,0);
$pdf->Ln(5);
$pdf->Cell(50);
$pdf->SetFont('Arial','B',9);
$pdf->Cell(18,5, 'Telefone:',0,0);
$pdf->SetFont('Arial','',9);
$pdf->Cell(25,5, $telefone,0,0);
$pdf->Cell(25,5,$email,0,0);
$pdf->SetFont('Arial','B',11);
$pdf->Cell(75);
$pdf->Cell(15,7, 'Pedido', 1,0,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(15,7,$pedido, 1,0,'C');
$pdf->SetFont('Arial','B',11);
$pdf->Cell(20,7, 'Controle', 1,0,'C');
$pdf->SetFont('Arial','',11);
$pdf->Cell(25,7, $controle, 1,0,'C');
$pdf->Line(0,30,300,30);
$pdf->Ln(15);
/* Header Fim*/

/* Cliente */
$pdf->SetFont('Arial','B',10);
$pdf->Cell(9,5, 'CPF:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(30,5,$cpf, 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(12,5, 'Nome:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,5,$nome_cliente, 0,0);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(102);
$pdf->Cell(30,7, 'Entregue', 1,0);
$dataentrega;
$dataentrega =date("d-m-Y",strtotime(str_replace('/','-',$dataentrega)));
$pdf->Cell(27,7,$dataentrega, 1,0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(18,5, 'Endereço:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(90,5,$endereco_cliente, 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,5, 'Numero:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,5,$numero_cliente, 0,0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(25,5,'Complemento:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(18,5,$complemento_cliente, 0,0);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(150);
$pdf->Cell(50,7, 'Prazo de Montagem', 1,0);
$datamontagem;
$datamontagem =date("d-m-Y",strtotime(str_replace('/','-',$datamontagem)));
$pdf->SetTextColor(50,205,50);
$pdf->Cell(27,7,$datamontagem, 1,0);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,5, 'CEP:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(20,5,$cep_cliente, 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(12,5, 'Bairro:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(40,5,$bairro_cliente, 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,5, 'Cidade:', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(60,5,$cidade_cliente, 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15,5, 'Estado: ', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(7,5, $estado_cliente, 0,0);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(16,5, 'Telefone: ', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(30,5,$telefone_cliente, 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(14,5, 'Celular: ', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(30,5,$celular_cliente, 0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(12,5, 'E-mail: ', 0,0);
$pdf->SetFont('Arial','',10);
$pdf->Cell(18,5, $email_cliente, 0,0);
$pdf->Ln(10);
/* Cliente fim */
/* Table */
$pdf->SetFont('Arial','B',10);
$pdf->Cell(18,5, 'Codigo', 1,0,'C');
$pdf->Cell(15,5, 'Quant', 1,0,'C');
$pdf->Cell(80,5, 'Descrição', 1,0,'C');
$pdf->Cell(30,5, 'Cor', 1,0,'C');
$pdf->Cell(30,5, 'Marca', 1,0,'C');
$pdf->Ln(5);
/* Dados inseridos com while */
$pdf->SetFont('Arial','',10);
$prod_check = $conexao->prepare ("select `produtos`.`codigo`,`produtos`.`descricao`,`produtos`.`cores`,`produtos`.`marca`, ".$table.".`quantidade`,".$table.".`obs` from `produtos` join ".$table."  on   ".$table.".`id-produto` =`produtos`.`id_produto` where ".$table.".id_controle = '".$controle."'");
$prod_check->execute();
while ($row = $prod_check->fetch(PDO::FETCH_ASSOC)){
$cod = $row ['codigo'];
$quant = $row ['quantidade'];
$desc = $row ['descricao'];
$cor = $row ['cores'];
$marca = $row ['marca'];				
$pdf->Cell(18,5,$cod, 1,0,'C');
$pdf->Cell(15,5,$quant, 1,0,'C');
$pdf->Cell(80,5, $desc, 1,0,'C');
$pdf->Cell(30,5, $cor, 1,0,'C');
$pdf->Cell(30,5, $marca, 1,0,'C');
$pdf->Ln(5);
}
$obs = $row ['obs'];
$pdf->Ln(15);
$pdf->SetFont('Arial','',10);
$pdf->Write(5,'Observaçoes:');
$pdf->SetFont('Arial','',16);
$pdf->SetTextColor(255,0,0);
$pdf->Write(5,$obs);
$pdf->SetTextColor(0,0,0);
$pdf->Ln(10);	
$pdf->SetFont('Arial','',10);
$pdf->Write(5,'Montador Responsavel: ');
$pdf->Write(5, $montador);
$pdf->Ln(10);
$pdf->Write(5,'Cliente - Ass______________________________________________ Data____/_______/______');
$pdf->Ln(10);
$pdf->SetFont('Arial','',6);
$pdf->Write(5,'Ao comprar no Lojão do Baixinho, você conta com uma equipe de montadores especialmente preparada para lhe garantir comodidade e satisfação. Nas cidades onde atuamos, a montagem de móveis é feita gratuitamente conforme disponibilidade do montador de cada região. Para que sua montagem ocorra sem nenhum contratempo, informamos que os montadores não se responsabilizam em transportar a mercadoria de um local para outro. Os montadores seguem padrões de montagem estabelecidos pela fábrica e NÃO são autorizados a alterar as características do produto como acrescentar furações, serrar, etc. A alteração dessas características podem ocasionar perda de Garantia de Fábrica.');
/* Footer*/
$pdf->Output();