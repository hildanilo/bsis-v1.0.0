<?php
session_start();

//notificacao de salvamento e erro////////////////////////////////////
function mensagens($msg,$tipo){
	if($tipo == "su"){
		echo '<div class="alert alert-warning alert-dismissible" role="alert" style="margin-top:15px !important;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$msg.'</div>';
	}elseif($tipo == "er"){
		echo '<div class="alert alert-danger alert-dismissible" role="alert" style="margin-top:15px !important;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$msg.'</div>';
	}
}

function mensagem_ficha($msg,$tipo){
	if($tipo == "su"){
		echo '<div class="alert alert-info alert-dismissible" role="alert" style="margin-top:15px !important;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$msg.'<a href="fichademoveispdf" target="_blank"  class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-floppy-disk"></span> Baixar PDF</a></div>
		  ';
	}
}

function mensagem_ficha_assist($msg,$tipo){
	if($tipo == "su"){
		echo '<div class="alert alert-info alert-dismissible" role="alert" style="margin-top:15px !important;">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.$msg.'<a href="fichademoveisassistpdf" target="_blank"  class="btn btn-default btn-sm">
          <span class="glyphicon glyphicon-floppy-disk"></span> Baixar PDF</a></div>
		  ';
	}
}

//cadastro de cliente salvar/////////////////////////////

function cadastrocliente($conexao,$cpf,$nome,$endereco,$numero,$complemento,$cep,$bairro,$cidade,$estado,$telefone,$celular,$email,$caixa,$filho1,$datafilho1,$filho2,$datafilho2,$filho3,$datafilho3){

$query="SELECT * FROM clientes WHERE cpf=:cpf";
$result=$conexao->prepare($query);
$result->bindParam(':cpf',$cpf,PDO::PARAM_STR);
$result->execute();
$num = $result->rowCount();

if($num){
	$error = "Esse cliente ja foi cadastrado";
	mensagens($error,"er");
	header("Refresh:1.5; url=cadastrocliente");
	}
else{
$q = "insert into clientes (cpf,datadecadastro,horadecadastro,nome,endereco,numero,complemento,cep,bairro,cidade,estado,telefone,celular,email,caixa,filhonome1,datafilhonome1,filhonome2,datafilhonome2,filhonome3,datafilhonome3) values('$cpf',now(),now(),'$nome','$endereco','$numero','$complemento','$cep','$bairro','$cidade','$estado','$telefone','$celular','$email','$caixa','$filho1','$datafilho1','$filho2','$datafilho2','$filho3','$datafilho3')";
$result = $conexao->prepare($q);
$result->execute();
$n = $result->rowCount();
	if($n){
		$msg = "Cliente cadastro com sucesso";
		mensagens($msg,"su");
		header("Refresh:1.5; url=cadastrocliente");
		}
	}
};

// Cadastro de cliente editar////////////////////////
function cadastroclienteeditar($conexao,$idclient,$cpf,$nome,$endereco,$numero,$complemento,$cep,$bairro,$cidade,$estado,$telefone,$celular,$email,$caixa,$filho1,$datafilho1,$filho2,$datafilho2,$filho3,$datafilho3){
	$q = "update clientes set  cpf='$cpf',nome='$nome',sobrenome='$sobrenome',endereco='$endereco',numero='$numero',complemento='$complemento',cep='$cep',bairro='$bairro',cidade='$cidade',estado='$estado',telefone='$telefone',celular='$celular',email='$email',filhonome1='$filho1',datafilhonome1='$datafilho1',filhonome2='$filho2',datafilhonome2='$datafilho2',filhonome3='$filho3',datafilhonome3='$datafilho3' WHERE id_cliente= '$idclient'";
	$result = $conexao->prepare($q);
	$result->execute();
	$n = $result->rowCount();
	if($n){
		$msg = "Cliente Editado com sucesso";
		mensagens($msg,"su");
		header("Refresh:1.5; url=cadastroclienteditar");
		}
	}
	


//cadastrar produtos
function cadastrarProdutos($conexao,$codigo,$descricao,$cores,$grupo,$marca,$valor,$valorm,$valormt){
$q = "INSERT INTO produtos (codigo,descricao,cores,grupo,marca,valor,valormontagem,valormontagem_2,datadecadastro)VALUE ('$codigo','$descricao','$cores','$grupo','$marca','$valor','$valorm','$valormt',now())";
$result = $conexao->prepare($q);
$result->execute();
$n = $result->rowCount();
	if($n){
		$msg = "Produto cadastrado com sucesso";
		mensagens($msg,"su");
		header("Refresh:1.5; url=cadastroprodutos");
		}
	}

//editar produtos
function editarProdutos($conexao,$codigo,$descricao,$cores,$grupo,$marca,$valor,$valorm,$valormt){
$que = "update produtos set  codigo='$codigo',descricao='$descricao',valor='$valor',cores='$cores',grupo='$grupo',marca='$marca',valormontagem='$valorm',valormontagem_2='$valormt' WHERE codigo = '$codigo'";
$result = $conexao->prepare($que);
$result->execute();
$n = $result->rowCount();
	if($n){
		$msg = "Produto editado com sucesso";
		mensagens($msg,"su");
		header("Refresh:1.5; url=cadastroprodutoseditar.php?codigo='$codigo'");
		}
	}

function cadastroUsuario($conexao,$nome,$sobrenome,$cargo,$estadoc,$sexo,$endereco,$numero,$complemento,$bairro,$cep,$telefone,$celular,$estado,$cidade,$escolaridade,$cpf,$datanasc,$rg,$datarg,$estadoemissor_rg,$ctps,$datactps,$estadoemissor_ctps,$pis,$dataad,$dataadmissao,$salario,$datademissao,$transporte,$valortrans,$login,$senha,$email,$usario){

$query="SELECT * FROM usuarios WHERE cpf=:cpf";
$result=$conexao->prepare($query);
$result->bindParam(':cpf',$cpf,PDO::PARAM_STR);
$result->execute();
$num = $result->rowCount();

if($num){
	$error = "Esse usuario ja foi cadastrado";
	mensagens($error,"er");
	header("Refresh:1.5; url=usuarios");
	}
else{
$q = "insert into usuarios () values()";
$result = $conexao->prepare($q);
$result->execute();
$n = $result->rowCount();
	if($n){
		$msg = "Cliente cadastro com sucesso";
		mensagens($msg,"su");
		header("Refresh:1.5; url=cadastrocliente");
		}
	}
};

//Criar ficha de moveis//////////////////

function moveiscriar($conn,$conexao,$idcliente,$loja,$quant,$produtos,$acrescimo,$montador,$pedido,$entrega,$montagem,$tsmg){

//Limpar Array vazios
$quant = array_filter($quant);
$produtos = array_filter($produtos);


//coleta todos os dados dos produtos selecionados

$query.= "select * from produtos where";
foreach($produtos as $prod) {
    $query.= " id_produto ='$prod' or";
}

$query = rtrim($query, 'or');
$x = mysqli_query($conn,$query );

while($prt=mysqli_fetch_array($x)){ 
    $idproduto[]=$prt['id_produto'];
    $codigo[]=$prt['codigo'];
    $descricao[]=$prt['descricao'];
    $cor[]=$prt['cores'];
    $marca[]=$prt['marca'];
	$valorm[]=$prt['valormontagem'];
    $valormt[]=$prt['valormontagem_2'];		
}

$m=mysqli_query($conn,"select `nome_montador` from `montadores` where `id-montador` = '$montador'");
	$rw= mysqli_fetch_array($m);
	$mon= $rw['nome_montador'];
	$_SESSION['montador']=$mon;
	
//consulta a loja e guarda seus dados
$cloja=mysqli_query($conn,"select*from lojas where loja= '$loja'");
	$row= mysqli_fetch_array($cloja);
	
if($row){
	$_SESSION['id_loja']=$row['id_loja']."";
	$_SESSION['loja']=$row['loja']."";
	$_SESSION['endereco_loja']=$row['endereco']."";
	$_SESSION['numero_loja']=$row['numero']."";
	$_SESSION['cep_loja']=$row['cep']."";
	$_SESSION['bairro_loja']=$row['bairro']."";
	$_SESSION['cidade_loja']=$row['cidade']."";
	$_SESSION['estado_loja']=$row['estado']."";
	$_SESSION['telefone_loja']=$row['telefone']."";
	$_SESSION['email_loja']=$row['email']."";	
	}

//Inicio da execução de codigo em Guarulhos 1
switch($loja){
////////////////////////////////////////////////////////////////////////////////////////////////
case 'Guarulhos 1':	

//consulta e conta maior id existente se resultado for nulo considera o valor 0
$control=mysqli_query($conn,"select ifnull(max(id_controle),0)from ficha_de_moveis_guarulhos1");
$controll=mysqli_fetch_row($control);

$ct=$controll[0];
$ct++;
$_SESSION['controll_loja']=$ct;
$_SESSION['table']='ficha_de_moveis_guarulhos1';


$qtd = count($quant);
for ($d = 0; $d < $qtd; $d++){
$vlm[] = $quant[$d] * $valorm[$d];
$vlt[] = $quant[$d] * $valormt[$d];
}
//calculos de inserção
$soma=array_sum($vlt);
$acresc=$soma*$acrescimo;
$totalfinal=$soma+$acresc;

//prepara a inserção de dados sql
$quantidade = count($quant);
for ($q = 0; $q < $quantidade; $q++){
	$idproduto[$q];
	
	$qu.="INSERT INTO  `ficha_de_moveis_guarulhos1` (  `id_controle` ,`id-montador`,  `id_pedido` ,  `id-cliente` ,  `quantidade`, `id-produto` ,`valormontagem`,`valoracrescimo`, `valor-total` , `valor-total-controle` , `dataentrega`,`datamontagem`,`obs` ,`status`,`data_aprovado`,`data_criacao`,`hora_criacao`) values ('$ct','$montador','$pedido','$idcliente','$quant[$q]','$idproduto[$q]','$valormt[$q]','$acrescimo','$acresc','$totalfinal','$entrega','$montagem','$tsmg','APROVADO',now(),now(),now());";
	
}

$p=mysqli_multi_query( $conn,$qu);
$msg = "Ficha criada com sucesso. Se desejar o PDF dela click abaixo.";
		mensagem_ficha($msg,"su");
break;
///////////////////////////////////////////////////////////////////////////////////////////////
case 'Guarulhos 2':
	
//consulta e conta maior id existente se resultado for nulo considera o valor 0
$control=mysqli_query($conn,"select ifnull(max(id_controle),0)from ficha_de_moveis_guarulhos2");
$cci=mysqli_fetch_row($control);

$ct=$cci[0];
$ct++;
$_SESSION['controll_loja']=$ct;
$_SESSION['table']='ficha_de_moveis_guarulhos2';

//calculos de inserção
$qtd = count($quant);
for ($d = 0; $d < $qtd; $d++){
$vlm[] = $quant[$d] * $valorm[$d];
$vlt[] = $quant[$d] * $valormt[$d];
}
//calculos de inserção
$soma=array_sum($vlt);
$acresc=$soma*$acrescimo;
$totalfinal=$soma+$acresc;

//prepara a inserção de dados sql
$quantidade = count($quant);

for ($q = 0; $q < $quantidade; $q++){
	$idproduto[$q];
	
	$qu.="INSERT INTO  `ficha_de_moveis_guarulhos2` (  `id_controle` ,`id-montador`,  `id_pedido` ,  `id-cliente` ,  `quantidade`, `id-produto` ,`valormontagem`,`valoracrescimo`, `valor-total` , `valor-total-controle` , `dataentrega`,`datamontagem`,`obs` ,`status`,`data_aprovado`,`data_criacao`,`hora_criacao`) values ('$ct','$montador','$pedido','$idcliente','$quant[$q]','$idproduto[$q]','$valormt[$q]','$acrescimo','$acresc','$totalfinal','$entrega','$montagem','$tsmg','APROVADO',now(),now(),now());";

}
$p=mysqli_multi_query( $conn,$qu);
$msg = "Ficha criada com sucesso. Se desejar o PDF dela click abaixo.";
		mensagem_ficha($msg,"su");
break;

///////////////////////////////////////////////////////////////////////////////////////////////////
case 'Sao Bernardo':
//consulta e conta maior id existente se resultado for nulo considera o valor 0
$control=mysqli_query($conn,"select ifnull(max(id_controle),0)from ficha_de_moveis_sao_bernardo");
$cci=mysqli_fetch_row($control);

$ct=$cci[0];
$ct++;
$_SESSION['controll_loja']=$ct;
$_SESSION['table']='ficha_de_moveis_sao_bernardo';

//calculos de inserção
$qtd = count($quant);
for ($d = 0; $d < $qtd; $d++){
$vlm[] = $quant[$d] * $valorm[$d];
$vlt[] = $quant[$d] * $valormt[$d];
}
//calculos de inserção
$soma=array_sum($vlm);
$acresc=$soma*$acrescimo;
$totalfinal=$soma+$acresc;

//prepara a inserção de dados sql
$quantidade = count($quant);

for ($q = 0; $q < $quantidade; $q++){
	$produtos[$q];
	
	$qu.="INSERT INTO  `ficha_de_moveis_sao_bernardo` (  `id_controle` ,`id-montador`,  `id_pedido` ,  `id-cliente` ,  `quantidade`, `id-produto` ,`valormontagem`,`valoracrescimo`, `valor-total` , `valor-total-controle` , `dataentrega`,`datamontagem`,`obs` ,`status`,`data_aprovado`,`data_criacao`,`hora_criacao`) values ('$ct','$montador','$pedido','$idcliente','$quant[$q]','$idproduto[$q]','$valorm[$q]','$acrescimo','$acresc','$totalfinal','$entrega','$montagem','$tsmg','APROVADO',now(),now(),now());";

}
$p=mysqli_multi_query( $conn,$qu);
$msg = "Ficha criada com sucesso. Se desejar o PDF dela click abaixo.";
		mensagem_ficha($msg,"su");
break;

//////////////////////////////////////////////////////////////////////////////////////////////////

case 'Maua':
//consulta e conta maior id existente se resultado for nulo considera o valor 0
$control=mysqli_query($conn,"select ifnull(max(id_controle),0)from ficha_de_moveis_maua");
$cci=mysqli_fetch_row($control);

$ct=$cci[0];
$ct++;
$_SESSION['controll_loja']=$ct;
$_SESSION['table']='ficha_de_moveis_maua';

//calculos de inserção
$qtd = count($quant);
for ($d = 0; $d < $qtd; $d++){
$vlm[] = $quant[$d] * $valorm[$d];
$vlt[] = $quant[$d] * $valormt[$d];
}
//calculos de inserção
$soma=array_sum($vlm);
$acresc=$soma*$acrescimo;
$totalfinal=$soma+$acresc;

//prepara a inserção de dados sql
$quantidade = count($quant);

for ($q = 0; $q < $quantidade; $q++){
	$produtos[$q];
	
	$qu.="INSERT INTO  `ficha_de_moveis_maua` (  `id_controle` ,`id-montador`,  `id_pedido` ,  `id-cliente` ,  `quantidade`, `id-produto` ,`valormontagem`,`valoracrescimo`, `valor-total` , `valor-total-controle` , `dataentrega`,`datamontagem`,`obs` ,`status`,`data_aprovado`,`data_criacao`,`hora_criacao`) values ('$ct','$montador','$pedido','$idcliente','$quant[$q]','$idproduto[$q]','$valorm[$q]','$acrescimo','$acresc','$totalfinal','$entrega','$montagem','$tsmg','APROVADO',now(),now(),now());";

}
$p=mysqli_multi_query( $conn,$qu);
$msg = "Ficha criada com sucesso. Se desejar o PDF dela click abaixo.";
		mensagem_ficha($msg,"su");
break;
//////////////////////////////////////////////////////////////////////////////////////////////////
case 'Santo Andre':
//consulta e conta maior id existente se resultado for nulo considera o valor 0
$control=mysqli_query($conn,"select ifnull(max(id_controle),0)from ficha_de_moveis_santo_andre");
$cci=mysqli_fetch_row($control);

$ct=$cci[0];
$ct++;
$_SESSION['controll_loja']=$ct;
$_SESSION['table']='ficha_de_moveis_santo_andre';

//calculos de inserção
$qtd = count($quant);
for ($d = 0; $d < $qtd; $d++){
$vlm[] = $quant[$d] * $valorm[$d];
$vlt[] = $quant[$d] * $valormt[$d];
}
//calculos de inserção
$soma=array_sum($vlm);
$acresc=$soma*$acrescimo;
$totalfinal=$soma+$acresc;

//prepara a inserção de dados sql
$quantidade = count($quant);

for ($q = 0; $q < $quantidade; $q++){
	$produtos[$q];
	
	$qu.="INSERT INTO  `ficha_de_moveis_santo_andre` (  `id_controle` ,`id-montador`,  `id_pedido` ,  `id-cliente` ,  `quantidade`, `id-produto` ,`valormontagem`,`valoracrescimo`, `valor-total` , `valor-total-controle` , `dataentrega`,`datamontagem`,`obs` ,`status`,`data_aprovado`,`data_criacao`,`hora_criacao`) values ('$ct','$montador','$pedido','$idcliente','$quant[$q]','$idproduto[$q]','$valorm[$q]','$acrescimo','$acresc','$totalfinal','$entrega','$montagem','$tsmg','APROVADO',now(),now(),now());";

}
$p=mysqli_multi_query( $conn,$qu);
$msg = "Ficha criada com sucesso. Se desejar o PDF dela click abaixo.";
		mensagem_ficha($msg,"su");
break;


////////////////////////////////////////////////////////////////////////////////////////////////////

case 'Penha':	

//consulta e conta maior id existente se resultado for nulo considera o valor 0
$control=mysqli_query($conn,"select ifnull(max(id_controle),0)from ficha_de_moveis_penha");
$controll=mysqli_fetch_row($control);

$ct=$controll[0];
$ct++;
$_SESSION['controll_loja']=$ct;
$_SESSION['table']='ficha_de_moveis_penha';

//calculos de inserção
$qtd = count($quant);
for ($d = 0; $d < $qtd; $d++){
$vlm[] = $quant[$d] * $valorm[$d];
$vlt[] = $quant[$d] * $valormt[$d];
}
//calculos de inserção
$soma=array_sum($vlt);
$acresc=$soma*$acrescimo;
$totalfinal=$soma+$acresc;

//prepara a inserção de dados sql
$quantidade = count($quant);
for ($q = 0; $q < $quantidade; $q++){
	$idproduto[$q];
	
	$qu.="INSERT INTO  `ficha_de_moveis_penha`  (  `id_controle` ,`id-montador`,  `id_pedido` ,  `id-cliente` ,  `quantidade`, `id-produto` ,`valormontagem`,`valoracrescimo`, `valor-total` , `valor-total-controle` , `dataentrega`,`datamontagem`,`obs` ,`status`,`data_aprovado`,`data_criacao`,`hora_criacao`) values ('$ct','$montador','$pedido','$idcliente','$quant[$q]','$idproduto[$q]','$valorm[$q]','$acrescimo','$acresc','$totalfinal','$entrega','$montagem','$tsmg','APROVADO',now(),now(),now());";
	
}

$p=mysqli_multi_query( $conn,$qu);
$msg = "Ficha criada com sucesso. Se desejar o PDF dela click abaixo.";
		mensagem_ficha($msg,"su");
break;
///////////////////////////////////////////////////////////////////////////////////////////////

default:
$error = "Não foi possivel criar ficha,a pagina vai ser recarregada.Tente novamente ou entre em contato o suporte do sistema.";
	mensagens($error,"er");
header("Location: fichademoveiscriar");
}
}

function moveiseditar($conn,$conexao,$idcontrole,$idcliente,$loja,$quant,$idprodutoanterior,$produtos,$montador,$acrescimo,$pedido,$entrega,$montagem,$tsmg){
	
	
	$quant = array_filter ($quant);
	$produtos = array_filter ($produtos);
	
	$m=mysqli_query($conn,"select `nome_montador` from `montadores` where `id-montador` = '$montador'");
	$rw= mysqli_fetch_array($m);
	$mon= $rw['nome_montador'];
	$_SESSION['montador']=$mon;
	
	$cloja=mysqli_query($conn,"select*from lojas where loja= '$loja'");
	$row= mysqli_fetch_array($cloja);
	
	if($row){
		$_SESSION['id_loja']=$row['id_loja']."";
		$_SESSION['loja']=$row['loja']."";
		$_SESSION['endereco_loja']=$row['endereco']."";
		$_SESSION['numero_loja']=$row['numero']."";
		$_SESSION['cep_loja']=$row['cep']."";
		$_SESSION['bairro_loja']=$row['bairro']."";
		$_SESSION['cidade_loja']=$row['cidade']."";
		$_SESSION['estado_loja']=$row['estado']."";
		$_SESSION['telefone_loja']=$row['telefone']."";
		$_SESSION['email_loja']=$row['email']."";	
	}
	
	$_SESSION['controll_loja']=$idcontrole;
	$_SESSION['table']='ficha_de_moveis_sao_bernardo';
	
	switch($loja){
		case 'Guarulhos 1':
			$result = array_diff($produtos, $idprodutoanterior);
				
				$_SESSION['controll_loja']= $idcontrole;
				$_SESSION['table']="ficha_de_moveis_guarulhos1";
				
				//coleta todos os dados dos produtos selecionados

				$query.= "select * from produtos where";
				foreach($produtos as $prod) {
				$query.= " id_produto ='$prod' or";
				}

				$query = rtrim($query, 'or');
				$x = mysqli_query($conn,$query );

				while($prt=mysqli_fetch_array($x)){ 
					$idproduto[]=$prt['id_produto'];
					$codigo[]=$prt['codigo'];
					$descricao[]=$prt['descricao'];
					$cor[]=$prt['cores'];
					$marca[]=$prt['marca'];
					$valorm[]=$prt['valormontagem'];
					$valormt[]=$prt['valormontagem_2'];	
				}
				$soma=array_sum($valormt);
				$acresc=$soma*$acrescimo;
				$totalfinal=$soma+$acresc;
		
				$quantidade = count($quant);
				for ($q = 0; $q < $quantidade; $q++){
					$produtos[$q];
	
					$qu.="UPDATE `ficha_de_moveis_guarulhos1` SET `quantidade`='$quant[$q]' ,`id-produto`='$idproduto[$q]' ,`valormontagem`='$valormt[$q]' ,`valor-total`='$acresc' ,`valor-total-controle`='$totalfinal' ,`id-cliente`='$idcliente',`valoracrescimo`='$acrescimo', `id_pedido`='$pedido',`dataentrega`='$entrega' ,`datamontagem`='$montagem',`obs`='$tsmg' ,`id-montador` = '$montador' WHERE `id_controle`= '$idcontrole' AND `id-produto`='$idprodutoanterior[$q]';";
				}
				$p=mysqli_multi_query( $conn,$qu);
		
				if($p){
					$msg = "Ficha editada com sucesso. Se desejar o PDF dela click abaixo.";
					mensagem_ficha($msg,"su");
	
				}
		break;
		
		case 'Guarulhos 2':
			$result = array_diff($produtos, $idprodutoanterior);
				
				$_SESSION['controll_loja']= $idcontrole;
				$_SESSION['table']="ficha_de_moveis_guarulhos2";
				
				//coleta todos os dados dos produtos selecionados

				$query.= "select * from produtos where";
				foreach($produtos as $prod) {
				$query.= " id_produto ='$prod' or";
				}

				$query = rtrim($query, 'or');
				$x = mysqli_query($conn,$query );

				while($prt=mysqli_fetch_array($x)){ 
					$idproduto[]=$prt['id_produto'];
					$codigo[]=$prt['codigo'];
					$descricao[]=$prt['descricao'];
					$cor[]=$prt['cores'];
					$marca[]=$prt['marca'];
					$valorm[]=$prt['valormontagem'];
					$valormt[]=$prt['valormontagem_2'];	
				}
				$soma=array_sum($valormt);
				$acresc=$soma*$acrescimo;
				$totalfinal=$soma+$acresc;
		
				$quantidade = count($quant);
				for ($q = 0; $q < $quantidade; $q++){
					$produtos[$q];
	
					$qu.="UPDATE `ficha_de_moveis_guarulhos2` SET `quantidade`='$quant[$q]' ,`id-produto`='$idproduto[$q]' ,`valormontagem`='$valormt[$q]' ,`valor-total`='$acresc' ,`valor-total-controle`='$totalfinal' ,`id-cliente`='$idcliente',`valoracrescimo`='$acrescimo', `id_pedido`='$pedido',`dataentrega`='$entrega' ,`datamontagem`='$montagem',`obs`='$tsmg' ,`id-montador` = '$montador' WHERE `id_controle`= '$idcontrole' AND `id-produto`='$idprodutoanterior[$q]';";
				}
				$p=mysqli_multi_query( $conn,$qu);
		
				if($p){
					$msg = "Ficha editada com sucesso. Se desejar o PDF dela click abaixo.";
					mensagem_ficha($msg,"su");
	
				}
		break;
			
		case 'Sao Bernardo':
				$result = array_diff($produtos, $idprodutoanterior);
				
				$_SESSION['controll_loja']= $idcontrole;
				$_SESSION['table']="ficha_de_moveis_sao_bernardo";
				
				//coleta todos os dados dos produtos selecionados

				$query.= "select * from produtos where";
				foreach($produtos as $prod) {
				$query.= " id_produto ='$prod' or";
				}

				$query = rtrim($query, 'or');
				$x = mysqli_query($conn,$query );

				while($prt=mysqli_fetch_array($x)){ 
					$idproduto[]=$prt['id_produto'];
					$codigo[]=$prt['codigo'];
					$descricao[]=$prt['descricao'];
					$cor[]=$prt['cores'];
					$marca[]=$prt['marca'];
					$valorm[]=$prt['valormontagem'];
					$valormt[]=$prt['valormontagem_2'];	
				}
				$soma=array_sum($valorm);
				$acresc=$soma*$acrescimo;
				$totalfinal=$soma+$acresc;
		
				$quantidade = count($quant);
				for ($q = 0; $q < $quantidade; $q++){
					$produtos[$q];
	
					$qu.="UPDATE `ficha_de_moveis_sao_bernardo` SET `quantidade`='$quant[$q]' ,`id-produto`='$idproduto[$q]' ,`valormontagem`='$valorm[$q]' ,`valor-total`='$acresc' ,`valor-total-controle`='$totalfinal' ,`id-cliente`='$idcliente',`valoracrescimo`='$acrescimo', `id_pedido`='$pedido',`dataentrega`='$entrega' ,`datamontagem`='$montagem',`obs`='$tsmg' ,`id-montador` = '$montador' WHERE `id_controle`= '$idcontrole' AND `id-produto`='$idprodutoanterior[$q]';";
				}
				$p=mysqli_multi_query( $conn,$qu);
		
				if($p){
					$msg = "Ficha editada com sucesso. Se desejar o PDF dela click abaixo.";
					mensagem_ficha($msg,"su");
	
				}
		break;
				
		case 'Maua':
				//coleta todos os dados dos produtos selecionados
				$result = array_diff($produtos, $idprodutoanterior);
				$_SESSION['controll_loja']= $idcontrole;
				$_SESSION['table']="ficha_de_moveis_maua";
				
				If($result){
					$qd.= "select * from produtos where";
					foreach($result as $qdr) {
					$qd.= " id_produto ='$qdr' or";
					}
				
					$qd = rtrim($qd, 'or');
				
					$d = mysqli_query($conn,$qd );
				
					while($prtt=mysqli_fetch_array($d)){ 
						$idpr[]=$prtt['id_produto'];
						$cod[]=$prtt['codigo'];
						$desc[]=$prtt['descricao'];
						$crt[]=$prtt['cores'];
						$mar[]=$prtt['marca'];
						$valrm[]=$prtt['valormontagem'];
						$valrmt[]=$prtt['valormontagem_2'];
					}
					$st=array_sum($valrm);
					$acresct=$st*$acr;
					$totlend=$st+$acresct;
		
					$result = count($result);
					for ($q = 0; $q < $result; $q++){
						$idpr[$q];
	
						$qrt=" INSERT INTO`ficha_de_moveis_maua`(`id_controle`,`id-montador` ,  `id_pedido` ,  `id-cliente` ,  `quantidade`, `id-produto`,`valormontagem`,`valoracrescimo`,`valor-total`,`valor-total-controle`,`dataentrega`,`datamontagem`,`obs` ,`status`,`data_aprovado`,`data_criacao`,`hora_criacao`)VALUES ('$idcontrole','$montador','$pedido','$idcliente','$quant[$q]','$idpr[$q]','$valrm[$q]','$acr','$acresct','$totlend','$entrega','$montagem','$tsmg','APROVADO',now(),now(),now());";
						print_r($qrt);
					}
				
					$p=mysqli_multi_query( $conn,$qrt);
				
				}
				//edita produto que não existia e o existente.
				
				
				// edita produto ja existente
				
				$query.= "select * from produtos where";
				foreach($produtos as $prod) {
				$query.= " id_produto ='$prod' or";
				}

				$query = rtrim($query, 'or');
				$x = mysqli_query($conn,$query );

				while($prt=mysqli_fetch_array($x)){ 
					$idproduto[]=$prt['id_produto'];
					$codigo[]=$prt['codigo'];
					$descricao[]=$prt['descricao'];
					$cor[]=$prt['cores'];
					$marca[]=$prt['marca'];
					$valorm[]=$prt['valormontagem'];
					$valormt[]=$prt['valormontagem_2'];
					
				}
				$soma=array_sum($valorm);
				print_r($soma);
				$acresc=$soma*$acrescimo;
				$totalfinal=$soma+$acresc;
		
				$quantidade = count($quant);
				for ($q = 0; $q < $quantidade; $q++){
					$produtos[$q];
	
					$qu.="UPDATE `ficha_de_moveis_maua` SET `quantidade`='$quant[$q]' ,`id-produto`='$idproduto[$q]' ,`valormontagem`='$valorm[$q]' ,`valor-total`='$acresc' ,`valor-total-controle`='$totalfinal' ,`id-cliente`='$idcliente',`valoracrescimo`='$acrescimo', `id_pedido`='$pedido',`dataentrega`='$entrega' ,`datamontagem`='$montagem',`obs`='$tsmg' ,`id-montador` = '$montador',`status`='APROVADO' WHERE `id_controle`= '$idcontrole' AND `id-produto`='$idprodutoanterior[$q]';";
				}
				$p=mysqli_multi_query( $conn,$qu);
		
				if($p){
					$msg = "Ficha editada com sucesso. Se desejar o PDF dela click abaixo.";
					mensagem_ficha($msg,"su");
	
				}
				break;
		case 'Santo Andre':
				//coleta todos os dados dos produtos selecionados
				$result = array_diff($produtos, $idprodutoanterior);
				$_SESSION['controll_loja']= $idcontrole;
				$_SESSION['table']="ficha_de_moveis_santo_andre";
				
				If($result){
					$qd.= "select * from produtos where";
					foreach($result as $qdr) {
					$qd.= " id_produto ='$qdr' or";
					}
				
					$qd = rtrim($qd, 'or');
				
					$d = mysqli_query($conn,$qd );
				
					while($prtt=mysqli_fetch_array($d)){ 
						$idpr[]=$prtt['id_produto'];
						$cod[]=$prtt['codigo'];
						$desc[]=$prtt['descricao'];
						$crt[]=$prtt['cores'];
						$mar[]=$prtt['marca'];
						$valrm[]=$prtt['valormontagem'];
						$valrmt[]=$prtt['valormontagem_2'];
					}
					$st=array_sum($valrm);
					$acresct=$st*$acr;
					$totlend=$st+$acresct;
		
					$result = count($result);
					for ($q = 0; $q < $result; $q++){
						$idpr[$q];
	
						$qrt=" INSERT INTO`ficha_de_moveis_santo_andre`(`id_controle`,`id-montador` ,  `id_pedido` ,  `id-cliente` ,  `quantidade`, `id-produto`,`valormontagem`,`valoracrescimo`,`valor-total`,`valor-total-controle`,`dataentrega`,`datamontagem`,`obs` ,`status`,`data_aprovado`,`data_criacao`,`hora_criacao`)VALUES ('$idcontrole','$montador','$pedido','$idcliente','$quant[$q]','$idpr[$q]','$valrm[$q]','$acr','$acresct','$totlend','$entrega','$montagem','$tsmg','APROVADO',now(),now(),now());";
						print_r($qrt);
					}
				
					$p=mysqli_multi_query( $conn,$qrt);
				
				}
				//edita produto que não existia e o existente.
				
				
				// edita produto ja existente
				
				$query.= "select * from produtos where";
				foreach($produtos as $prod) {
				$query.= " id_produto ='$prod' or";
				}

				$query = rtrim($query, 'or');
				$x = mysqli_query($conn,$query );

				while($prt=mysqli_fetch_array($x)){ 
					$idproduto[]=$prt['id_produto'];
					$codigo[]=$prt['codigo'];
					$descricao[]=$prt['descricao'];
					$cor[]=$prt['cores'];
					$marca[]=$prt['marca'];
					$valorm[]=$prt['valormontagem'];
					$valormt[]=$prt['valormontagem_2'];
					
				}
				$soma=array_sum($valorm);
				print_r($soma);
				$acresc=$soma*$acrescimo;
				$totalfinal=$soma+$acresc;
		
				$quantidade = count($quant);
				for ($q = 0; $q < $quantidade; $q++){
					$produtos[$q];
	
					$qu.="UPDATE `ficha_de_moveis_santo_andre` SET `quantidade`='$quant[$q]' ,`id-produto`='$idproduto[$q]' ,`valormontagem`='$valorm[$q]' ,`valor-total`='$acresc' ,`valor-total-controle`='$totalfinal' ,`id-cliente`='$idcliente',`valoracrescimo`='$acrescimo', `id_pedido`='$pedido',`dataentrega`='$entrega' ,`datamontagem`='$montagem',`obs`='$tsmg' ,`id-montador` = '$montador',`status`='APROVADO' WHERE `id_controle`= '$idcontrole' AND `id-produto`='$idprodutoanterior[$q]';";
				}
				$p=mysqli_multi_query( $conn,$qu);
		
				if($p){
					$msg = "Ficha editada com sucesso. Se desejar o PDF dela click abaixo.";
					mensagem_ficha($msg,"su");
	
				}
			break;
				
			case 'Penha':
				$result = array_diff($produtos, $idprodutoanterior);
				
				//coleta todos os dados dos produtos selecionados

				$query.= "select * from produtos where";
				foreach($produtos as $prod) {
				$query.= " id_produto ='$prod' or";
				}

				$query = rtrim($query, 'or');
				$x = mysqli_query($conn,$query );

				while($prt=mysqli_fetch_array($x)){ 
					$idproduto[]=$prt['id_produto'];
					$codigo[]=$prt['codigo'];
					$descricao[]=$prt['descricao'];
					$cor[]=$prt['cores'];
					$marca[]=$prt['marca'];
					$valorm[]=$prt['valormontagem'];
					$valormt[]=$prt['valormontagem_2'];	
				}
				$soma=array_sum($valorm);
				$acresc=$soma*$acrescimo;
				$totalfinal=$soma+$acresc;
		
				$quantidade = count($quant);
				for ($q = 0; $q < $quantidade; $q++){
					$produtos[$q];
	
					$qu.="UPDATE `ficha_de_moveis_penha` SET `quantidade`='$quant[$q]' ,`id-produto`='$idproduto[$q]' ,`valormontagem`='$valorm[$q]' ,`valor-total`='$acresc' ,`valor-total-controle`='$totalfinal' ,`id-cliente`='$idcliente',`valoracrescimo`='$acrescimo', `id_pedido`='$pedido',`dataentrega`='$entrega' ,`datamontagem`='$montagem'  ,`obs`='$tsmg' ,`id-montador` = '$montador' WHERE `id_controle`= '$idcontrole' AND `id-produto`='$idprodutoanterior[$q]';";

				}
				$p=mysqli_multi_query( $conn,$qu);
		
				if($p){
					$msg = "Ficha editada com sucesso. Se desejar o PDF dela click abaixo.";
					mensagem_ficha($msg,"su");
	
				}
				break;
				
			}
}

function moveisassistencia($conn,$conexao,$idcontrole,$idcliente,$loja,$montador,$produtos,$assist,$entrega,$assistencia,$acrescimo,$vlassist){
	switch($loja){
		
		case'Guarulhos 1':
			
			$control=mysqli_query($conn,"select ifnull(max(id_assist),0)from assistencia_guarulhos1");
			$controll=mysqli_fetch_row($control);

			$ct=$controll[0];
			$ct++;
			$_SESSION['controll_loja']=$ct;
			$_SESSION['table']='assistencia_guarulhos1';
				
			$ac = $vlassist*$acrescimo;
			$ass = $vlassist + $ac;
			
			$prod = count($produtos);
			for ($t= 0; $t < $prod; $t++){
				$produtos[$t];
				$qu.= "INSERT INTO `assistencia_guarulhos1`(`id_assist`, `id_controle`,`id_montador`, `id-cliente`, `id-produto`, `valorassistencia`, `acrescimo`, `valor-total`, `dataentrega`, `vencimento_assistencia`, `desc_assist`, `status`, `data_aprovado`, `data_criacao`, `hora_criacao`) VALUES('$ct','$idcontrole','$montador','$idcliente','$produtos[$t]','$vlassist','$acrescimo','$ass','$entrega','$assistencia','$assist[$t]','APROVADO',now(),now(),now());";
			}
			$p=mysqli_multi_query($conn,$qu);
			if($p){
				$msg = "Ficha encaminhada com sucesso";
				mensagem_ficha_assist($msg,"su");
			}
			break;
		
		case'Guarulhos 2':
			
			$control=mysqli_query($conn,"select ifnull(max(id_assist),0)from assistencia_guarulhos2");
			$controll=mysqli_fetch_row($control);

			$ct=$controll[0];
			$ct++;
			$_SESSION['controll_loja']=$ct;
			$_SESSION['table']='assistencia_guarulhos2';
				
			$ac = $vlassist*$acrescimo;
			$ass = $vlassist + $ac;
			$prod = count($produtos);


			for ($t = 0; $t < $prod; $t++){
				$produtos[$t];
				$qu.= "INSERT INTO `assistencia_guarulhos2`(`id_assist`, `id_controle`,`id_montador`, `id-cliente`, `id-produto`, `valorassistencia`, `acrescimo`, `valor-total`, `dataentrega`, `vencimento_assistencia`, `desc_assist`, `status`, `data_aprovado`, `data_criacao`, `hora_criacao`) VALUES('$ct','$idcontrole','$montador','$idcliente','$produtos[$t]','$vlassist','$acrescimo','$ass','$entrega','$assistencia','$assist[$t]','APROVADO',now(),now(),now());";
			}
			
			$p=mysqli_multi_query($conn,$qu);
			if($p){
				$msg = "Ficha encaminhada com sucesso";
				mensagem_ficha_assist($msg,"su");
			}
			break;
		
		case'Santo Andre':
			
			$control=mysqli_query($conn,"select ifnull(max(id_assist),0)from assistencia_santo_andre");
			$controll=mysqli_fetch_row($control);

			$ct=$controll[0];
			$ct++;
			$_SESSION['controll_loja']=$ct;
			$_SESSION['table']='assistencia_santo_andre';
				
			$ac = $vlassist*$acrescimo;
			$ass = $vlassist + $ac;
			$prod = count($produtos);


			for ($t = 0; $t < $prod; $t++){
				$produtos[$q];
				$qu.= "INSERT INTO `assistencia_santo_andre`(`id_assist`, `id_controle`,`id_montador`, `id-cliente`, `id-produto`, `valorassistencia`, `acrescimo`, `valor-total`, `dataentrega`, `vencimento_assistencia`, `desc_assist`, `status`, `data_aprovado`, `data_criacao`, `hora_criacao`) VALUES('$ct','$idcontrole','$montador','$idcliente','$produtos[$t]','$vlassist','$acrescimo','$ass','$entrega','$assistencia','$assist[$t]','APROVADO',now(),now(),now());";
			}
			
			$p=mysqli_multi_query($conn,$qu);
			if($p){
				$msg = "Ficha encaminhada com sucesso";
				mensagem_ficha_assist($msg,"su");
			}
			break;
		
		case'Maua':
			
			$control=mysqli_query($conn,"select ifnull(max(id_assist),0)from assistencia_maua");
			$controll=mysqli_fetch_row($control);

			$ct=$controll[0];
			$ct++;
			$_SESSION['controll_loja']=$ct;
			$_SESSION['table']='assistencia_maua';
				
			$ac = $vlassist*$acrescimo;
			$ass = $vlassist + $ac;
			$prod = count($produtos);


			for ($t= 0; $t < $prod; $t++){
				$produtos[$t];
				$qu.= "INSERT INTO `assistencia_maua`(`id_assist`, `id_controle`,`id_montador`, `id-cliente`, `id-produto`, `valorassistencia`, `acrescimo`, `valor-total`, `dataentrega`, `vencimento_assistencia`, `desc_assist`, `status`, `data_aprovado`, `data_criacao`, `hora_criacao`) VALUES('$ct','$idcontrole','$montador','$idcliente','$produtos[$t]','$vlassist','$acrescimo','$ass','$entrega','$assistencia','$assist[$t]','APROVADO',now(),now(),now());";
			}
			
			$p=mysqli_multi_query($conn,$qu);
			if($p){
				$msg = "Ficha encaminhada com sucesso";
				mensagem_ficha_assist($msg,"su");
			}
			break;
			
		case'Sao Bernardo':
			
			$control=mysqli_query($conn,"select ifnull(max(id_assist),0)from assistencia_sao_bernardo");
			$controll=mysqli_fetch_row($control);

			$ct=$controll[0];
			$ct++;
			$_SESSION['controll_loja']=$ct;
			$_SESSION['table']='assistencia_sao_bernardo';
				
			$ac = $vlassist*$acrescimo;
			$ass = $vlassist + $ac;
			$prod = count($produtos);


			for ($t = 0; $t < $prod; $t++){
				$produtos[$t];
				$qu.= "INSERT INTO `assistencia_sao_bernardo`(`id_assist`, `id_controle`,`id_montador`, `id-cliente`, `id-produto`, `valorassistencia`, `acrescimo`, `valor-total`, `dataentrega`, `vencimento_assistencia`, `desc_assist`, `status`, `data_aprovado`, `data_criacao`, `hora_criacao`) VALUES('$ct','$idcontrole','$montador','$idcliente','$produtos[$q]','$vlassist','$acrescimo','$ass','$entrega','$assistencia','$assist[$t]','APROVADO',now(),now(),now());";
			}
			
			$p=mysqli_multi_query($conn,$qu);
			if($p){
				$msg = "Ficha encaminhada com sucesso";
				mensagem_ficha_assist($msg,"su");
			}
			break;
			
		case'Penha':
			
			$control=mysqli_query($conn,"select ifnull(max(id_assist),0)from assistencia_penha");
			$controll=mysqli_fetch_row($control);

			$ct=$controll[0];
			$ct++;
			$_SESSION['controll_loja']=$ct;
			$_SESSION['table']='assistencia_penha';
				
			$ac = $vlassist*$acrescimo;
			$ass = $vlassist + $ac;
			$prod = count($produtos);
			for ($t = 0; $t < $prod; $t++){
				$produtos[$t];
				$qu.= "INSERT INTO `assistencia_penha`(`id_assist`, `id_controle`,`id_montador`, `id-cliente`, `id-produto`, `valorassistencia`, `acrescimo`, `valor-total`, `dataentrega`, `vencimento_assistencia`, `desc_assist`, `status`, `data_aprovado`, `data_criacao`, `hora_criacao`) VALUES('$ct','$idcontrole','$montador','$idcliente','$produtos[$t]','$vlassist','$acrescimo','$ass','$entrega','$assistencia','$assist[$t]','APROVADO',now(),now(),now());";
			}
			
			$p=mysqli_multi_query($conn,$qu);
			if($p){
				$msg = "Ficha encaminhada com sucesso";
				mensagem_ficha_assist($msg,"su");
			}
			break;
		default:
	}
}

function alterarStatus($conn,$conexao,$mudar,$loja,$controle){
	if($mudar == 'EXECUTANDO'){
				$logdata = "data_executando";
			}
			elseif($mudar == 'CONCLUIDO'){
				$logdata = "data_concluido";
			}
			elseif($mudar == 'CANCELADO'){
				$logdata = "data_cancelamento";
			}
			elseif($mudar == 'SEM MONTAGEM'){
				$logdata = "data_sem_montagem";
			}
	switch($loja){
		case 'Guarulhos 1':
			$q = "update ficha_de_moveis_guarulhos1 set status = '$mudar',$logdata = now() where id_controle = '$controle' ";
			$result = $conexao->prepare($q);
			$result->execute();
			$n = $result->rowCount();
			if($n){
				$msg = "Ficha encaminhada com sucesso";
				mensagens($msg,"su");
			}
		break;
		
		case 'Guarulhos 2':
			$q = "update ficha_de_moveis_guarulhos2 set status = '$mudar',$logdata = now() where id_controle = '$controle' ";
			$result = $conexao->prepare($q);
			$result->execute();
			$n = $result->rowCount();
			if($n){
				$msg = "Ficha encaminhada com sucesso";
				mensagens($msg,"su");
			}
		break;
		
		case 'Santo Andre':
			$q = "update ficha_de_moveis_santo_andre set status = '$mudar',$logdata = now() where id_controle = '$controle' ";
			$result = $conexao->prepare($q);
			$result->execute();
			$n = $result->rowCount();
			if($n){
				$msg = "Ficha encaminhada com sucesso";
				mensagens($msg,"su");
			}
		break;
		
		case 'Sao Bernardo':	
			$q = "update ficha_de_moveis_sao_bernardo set status = '$mudar', $logdata = now() where id_controle = '$controle' ";
			$result = $conexao->prepare($q);
			$result->execute();
			$n = $result->rowCount();
			if($n){
				$msg = "Ficha encaminhada com sucesso";
				mensagens($msg,"su");
			}
		break;
		case 'Penha':	
			$q = "update ficha_de_moveis_penha set status = '$mudar', $logdata = now() where id_controle = '$controle' ";
			$result = $conexao->prepare($q);
			$result->execute();
			$n = $result->rowCount();
			if($n){
				$msg = "Ficha encaminhada com sucesso";
				mensagens($msg,"su");
			}
		break;
		
		case 'Maua':	
			$q = "update ficha_de_moveis_maua set status = '$mudar', $logdata = now() where id_controle = '$controle' ";
			$result = $conexao->prepare($q);
			$result->execute();
			$n = $result->rowCount();
			if($n){
				$msg = "Ficha encaminhada com sucesso";
				mensagens($msg,"su");
			}
		break;
		
		default:
	}
}

function alterarStatusassist($conn,$conexao,$mudar_status,$loja,$controle){
	if($mudar_status == 'EXECUTANDO'){
				$logdata = "data_executando";
			}
			elseif($mudar_status == 'CONCLUIDO'){
				$logdata = "data_concluido";
			}
			elseif($mudar_status == 'CANCELADO'){
				$logdata = "data_cancelamento";
			}
			elseif($mudar_status == 'SEM MONTAGEM'){
				$logdata = "data_sem_montagem";
			}
	switch($loja){
		case 'Guarulhos 1':
			$q = " UPDATE assistencia_guarulhos1 set status = '$mudar_status',$logdata = now() where id_assist = '$controle' ";
			$result = $conexao->prepare($q);
			$result->execute();
			$n = $result->rowCount();
			if($n){
				$msg = "Ficha encaminhada com sucesso";
				mensagens($msg,"su");
			}
		break;
		
		case 'Guarulhos 2':
			$q = " UPDATE assistencia_guarulhos2 set status = '$mudar_status',$logdata = now() where id_assist = '$controle' ";
			$result = $conexao->prepare($q);
			$result->execute();
			$n = $result->rowCount();
			if($n){
				$msg = "Ficha encaminhada com sucesso";
				mensagens($msg,"su");
			}
		break;
		
		case 'Santo Andre':
			$q = " UPDATE assistencia_santo_andre set status = '$mudar_status',$logdata = now() where id_assist = '$controle' ";
			$result = $conexao->prepare($q);
			$result->execute();
			$n = $result->rowCount();
			if($n){
				$msg = "Ficha encaminhada com sucesso";
				mensagens($msg,"su");
			}
		break;
		
		case 'Sao Bernardo':	
			$q = "update assistencia_sao_bernardo set status = '$mudar_status', $logdata = now() where id_assist = '$controle' ";
			$result = $conexao->prepare($q);
			$result->execute();
			$n = $result->rowCount();
			if($n){
				$msg = "Ficha encaminhada com sucesso";
				mensagens($msg,"su");
			}
		break;
		case 'Penha':	
			$q = "update assistencia_penha set status = '$mudar_status', $logdata = now() where id_assist = '$controle' ";
			$result = $conexao->prepare($q);
			$result->execute();
			$n = $result->rowCount();
			if($n){
				$msg = "Ficha encaminhada com sucesso";
				mensagens($msg,"su");
			}
		break;
		
		case 'Maua':	
			$q = "update assistencia_moveis_maua set status = '$mudar_status', $logdata = now() where id_assist = '$controle' ";
			$result = $conexao->prepare($q);
			$result->execute();
			$n = $result->rowCount();
			if($n){
				$msg = "Ficha encaminhada com sucesso";
				mensagens($msg,"su");
			}
		break;
		
		default:
	}
}

function fechamentoGravar($conn,$conexao,$lojal,$montadorr,$fech,$data_atual){
	
	switch ($lojal){
			
		case'Guarulhos 1':
				
			$qut ="SELECT * FROM `montadores` WHERE `id-montador` = '$montadorr'";
			$consulta = $conexao->prepare($qut);
			$consulta->execute();
			$ltu = $consulta->fetch(PDO::FETCH_ASSOC);
			$nomemotard = $ltu['nome_montador']."";
			$sobremotard = $ltu['sobrenome']."";
			$nomemotard .= " ";
			$nomemotard .= $sobremotard;
			$_SESSION['montador']=$nomemotard;
			
			
			$qr = "select ifnull(max(id_controle),0)from fechamento_guarulhos1";
			$lvl=mysqli_query($conn,$qr);
			$lv=mysqli_fetch_row($lvl);
			$c= $lv[0];
			$c++;
			$_SESSION['controle']= $c;
			
			$q.= "UPDATE ficha_de_moveis_guarulhos1 SET id_fechamento ='$c',status = 'PAGO',data_pago = now() WHERE "; 
			
			foreach($fech as $fecht) {
				$q.= " `id_controle` ='$fecht' or";
			}
			$q = rtrim($q, 'or');
			$consulta = $conexao->prepare($q);
			$consulta->execute();
			
			$qui = "SELECT DISTINCT `id_controle`, `valor-total-controle` FROM ficha_de_moveis_guarulhos1 WHERE id_fechamento = '$c'";
			$consulta = $conexao->prepare($qui);
			$consulta->execute();
			 while($vlu = $consulta->fetch(PDO::FETCH_ASSOC)){
				 $fechamentovl += $vlu['valor-total-controle'];
			 }
			 
			 
			
			$qri = "INSERT INTO fechamento_guarulhos1 (id_controle,id_montador,data_emissao,valor) VALUE ('$c','$montadorr',now(),'$fechamentovl')";
			$consulta = $conexao->prepare($qri);
			$consulta->execute();
			
			$query = "SELECT * FROM lojas WHERE id_loja = 1";
			$consulta = $conexao->prepare($query);
			$consulta->execute();
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);

				$id_loja= $linha['id_loja'];
				$endereco_loja= $linha['endereco'];
				$_SESSION['endereco_loja']=$endereco_loja;
				$numero_loja= $linha['numero'];
				$_SESSION['numero_loja']=$numero_loja;
				$cep_loja= $linha['cep'];
				$_SESSION['bairro_loja']=$cep_loja;
				$cidade_loja= $linha['cidade'];
				$_SESSION['cidade_loja']=$cidade_loja;
				$estado_loja= $linha['estado'];
				$_SESSION['estado_loja']=$estado_loja;
				$telefone_loja= $linha['telefone'];
				$_SESSION['telefone_loja']=$telefone_loja;
				$email_loja= $linha['email'];
				$_SESSION['email_loja']=$email_loja;

			$_SESSION['fecht']="`ficha_de_moveis_guarulhos1`";

			if($consulta){
				header("Location: fechamentopdf");
			}
		break;
		
		case'Guarulhos 2':
				
			$qut ="SELECT * FROM `montadores` WHERE `id-montador` = '$montadorr'";
			$consulta = $conexao->prepare($qut);
			$consulta->execute();
			$ltu = $consulta->fetch(PDO::FETCH_ASSOC);
			$nomemotard = $ltu['nome_montador']."";
			$sobremotard = $ltu['sobrenome']."";
			$nomemotard .= " ";
			$nomemotard .= $sobremotard;
			$_SESSION['montador']=$nomemotard;
			
			
			$qr = "select ifnull(max(id_controle),0)from fechamento_guarulhos2";
			$lvl=mysqli_query($conn,$qr);
			$lv=mysqli_fetch_row($lvl);
			$c= $lv[0];
			$c++;
			$_SESSION['controle']= $c;
			
			$q.= "UPDATE ficha_de_moveis_guarulhos2 SET id_fechamento ='$c',status = 'PAGO',data_pago = now() WHERE "; 
			
			foreach($fech as $fecht) {
				$q.= " `id_controle` ='$fecht' or";
			}
			$q = rtrim($q, 'or');
			$consulta = $conexao->prepare($q);
			$consulta->execute();
			
			$qui = "SELECT DISTINCT `id_controle`, `valor-total-controle` FROM ficha_de_moveis_guarulhos2 WHERE id_fechamento = '$c'";
			$consulta = $conexao->prepare($qui);
			$consulta->execute();
			 while($vlu = $consulta->fetch(PDO::FETCH_ASSOC)){
				 $fechamentovl += $vlu['valor-total-controle'];
			 }
			 
			 
			
			$qri = "INSERT INTO fechamento_guarulhos2 (id_controle,id_montador,data_emissao,valor) VALUE ('$c','$montadorr',now(),'$fechamentovl')";
			$consulta = $conexao->prepare($qri);
			$consulta->execute();
			
			$query = "SELECT * FROM lojas WHERE id_loja = 2";
			$consulta = $conexao->prepare($query);
			$consulta->execute();
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);

				$id_loja= $linha['id_loja'];
				$endereco_loja= $linha['endereco'];
				$_SESSION['endereco_loja']=$endereco_loja;
				$numero_loja= $linha['numero'];
				$_SESSION['numero_loja']=$numero_loja;
				$cep_loja= $linha['cep'];
				$_SESSION['bairro_loja']=$cep_loja;
				$cidade_loja= $linha['cidade'];
				$_SESSION['cidade_loja']=$cidade_loja;
				$estado_loja= $linha['estado'];
				$_SESSION['estado_loja']=$estado_loja;
				$telefone_loja= $linha['telefone'];
				$_SESSION['telefone_loja']=$telefone_loja;
				$email_loja= $linha['email'];
				$_SESSION['email_loja']=$email_loja;

			$_SESSION['fecht']="`ficha_de_moveis_guarulhos2`";

			if($consulta){
				header("Location: fechamentopdf");
			}
		break;
		
		case'Sao Bernardo':
			
			$qut ="SELECT * FROM `montadores` WHERE `id-montador` = '$montadorr'";
			$consulta = $conexao->prepare($qut);
			$consulta->execute();
			$ltu = $consulta->fetch(PDO::FETCH_ASSOC);
			$nomemotard = $ltu['nome_montador']."";
			$sobremotard = $ltu['sobrenome']."";
			$nomemotard .= " ";
			$nomemotard .= $sobremotard;
			$_SESSION['montador']=$nomemotard;
			
			
			$qr = "select ifnull(max(id_controle),0)from fechamento_sao_bernardo";
			$lvl=mysqli_query($conn,$qr);
			$lv=mysqli_fetch_row($lvl);
			$c= $lv[0];
			$c++;
			$_SESSION['controle']= $c;
			
			$q.= "UPDATE ficha_de_moveis_sao_bernardo SET id_fechamento ='$c',status = 'PAGO',data_pago = now() WHERE "; 
			
			foreach($fech as $fecht) {
				$q.= " `id_controle` ='$fecht' or";
			}
			$q = rtrim($q, 'or');
			$consulta = $conexao->prepare($q);
			$consulta->execute();
			
			$qui = "SELECT DISTINCT `id_controle`, `valor-total-controle` FROM ficha_de_moveis_sao_bernardo WHERE id_fechamento = '$c'";
			$consulta = $conexao->prepare($qui);
			$consulta->execute();
			 while($vlu = $consulta->fetch(PDO::FETCH_ASSOC)){
				 $fechamentovl += $vlu['valor-total-controle'];
			 }
			 
			 
			
			$qri = "INSERT INTO fechamento_sao_bernardo (id_controle,id_montador,data_emissao,valor) VALUE ('$c','$montadorr',now(),'$fechamentovl')";
			$consulta = $conexao->prepare($qri);
			$consulta->execute();
			
			$query = "SELECT * FROM lojas WHERE id_loja = 3";
			$consulta = $conexao->prepare($query);
			$consulta->execute();
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);

				$id_loja= $linha['id_loja'];
				$endereco_loja= $linha['endereco'];
				$_SESSION['endereco_loja']=$endereco_loja;
				$numero_loja= $linha['numero'];
				$_SESSION['numero_loja']=$numero_loja;
				$cep_loja= $linha['cep'];
				$_SESSION['bairro_loja']=$cep_loja;
				$cidade_loja= $linha['cidade'];
				$_SESSION['cidade_loja']=$cidade_loja;
				$estado_loja= $linha['estado'];
				$_SESSION['estado_loja']=$estado_loja;
				$telefone_loja= $linha['telefone'];
				$_SESSION['telefone_loja']=$telefone_loja;
				$email_loja= $linha['email'];
				$_SESSION['email_loja']=$email_loja;

			$_SESSION['fecht']="`ficha_de_moveis_sao_bernardo`";

			if($consulta){
				header("Location: fechamentopdf");
			}
		break;
		
		case'Santo Andre':
			
			$qut ="SELECT * FROM `montadores` WHERE `id-montador` = '$montadorr'";
			$consulta = $conexao->prepare($qut);
			$consulta->execute();
			$ltu = $consulta->fetch(PDO::FETCH_ASSOC);
			$nomemotard = $ltu['nome_montador']."";
			$sobremotard = $ltu['sobrenome']."";
			$nomemotard .= " ";
			$nomemotard .= $sobremotard;
			$_SESSION['montador']=$nomemotard;
			
			
			$qr = "select ifnull(max(id_controle),0)from fechamento_santo_andre";
			$lvl=mysqli_query($conn,$qr);
			$lv=mysqli_fetch_row($lvl);
			$c= $lv[0];
			$c++;
			$_SESSION['controle']= $c;
			
			$q.= "UPDATE ficha_de_moveis_santo_andre SET id_fechamento ='$c',status = 'PAGO',data_pago = now() WHERE "; 
			
			foreach($fech as $fecht) {
				$q.= " `id_controle` ='$fecht' or";
			}
			$q = rtrim($q, 'or');
			$consulta = $conexao->prepare($q);
			$consulta->execute();
			
			$qui = "SELECT DISTINCT `id_controle`, `valor-total-controle` FROM ficha_de_moveis_santo_andre WHERE id_fechamento = '$c'";
			$consulta = $conexao->prepare($qui);
			$consulta->execute();
			 while($vlu = $consulta->fetch(PDO::FETCH_ASSOC)){
				 $fechamentovl += $vlu['valor-total-controle'];
			 }
			 
			 
			
			$qri = "INSERT INTO fechamento_santo_andre (id_controle,id_montador,data_emissao,valor) VALUE ('$c','$montadorr',now(),'$fechamentovl')";
			$consulta = $conexao->prepare($qri);
			$consulta->execute();
			
			$query = "SELECT * FROM lojas WHERE id_loja = 4";
			$consulta = $conexao->prepare($query);
			$consulta->execute();
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);

				$id_loja= $linha['id_loja'];
				$endereco_loja= $linha['endereco'];
				$_SESSION['endereco_loja']=$endereco_loja;
				$numero_loja= $linha['numero'];
				$_SESSION['numero_loja']=$numero_loja;
				$cep_loja= $linha['cep'];
				$_SESSION['bairro_loja']=$cep_loja;
				$cidade_loja= $linha['cidade'];
				$_SESSION['cidade_loja']=$cidade_loja;
				$estado_loja= $linha['estado'];
				$_SESSION['estado_loja']=$estado_loja;
				$telefone_loja= $linha['telefone'];
				$_SESSION['telefone_loja']=$telefone_loja;
				$email_loja= $linha['email'];
				$_SESSION['email_loja']=$email_loja;

			$_SESSION['fecht']="`ficha_de_moveis_santo_andre`";

			if($consulta){
				header("Location: fechamentopdf");
			}
		break;
		
		case'Maua':
			
			$qut ="SELECT * FROM `montadores` WHERE `id-montador` = '$montadorr'";
			$consulta = $conexao->prepare($qut);
			$consulta->execute();
			$ltu = $consulta->fetch(PDO::FETCH_ASSOC);
			$nomemotard = $ltu['nome_montador']."";
			$sobremotard = $ltu['sobrenome']."";
			$nomemotard .= " ";
			$nomemotard .= $sobremotard;
			$_SESSION['montador']=$nomemotard;
			
			
			$qr = "select ifnull(max(id_controle),0)from fechamento_maua";
			$lvl=mysqli_query($conn,$qr);
			$lv=mysqli_fetch_row($lvl);
			$c= $lv[0];
			$c++;
			$_SESSION['controle']= $c;
			
			$q.= "UPDATE ficha_de_moveis_maua SET id_fechamento ='$c',status = 'PAGO',data_pago = now() WHERE "; 
			
			foreach($fech as $fecht) {
				$q.= " `id_controle` ='$fecht' or";
			}
			$q = rtrim($q, 'or');
			$consulta = $conexao->prepare($q);
			$consulta->execute();
			
			$qui = "SELECT DISTINCT `id_controle`,`valor-total-controle` FROM ficha_de_moveis_maua WHERE id_fechamento = '$c'";
			$consulta = $conexao->prepare($qui);
			$consulta->execute();
			 while($vlu = $consulta->fetch(PDO::FETCH_ASSOC)){
				 $fechamentovl = $vlu['valor-total-controle'];
				 $fechamentotl += $fechamentovl;
			 }
			
			$qri = "INSERT INTO fechamento_maua (id_controle,id_montador,data_emissao,valor) VALUE ('$c','$montadorr',now(),'$fechamentotl')";
			$consulta = $conexao->prepare($qri);
			$consulta->execute();
			
			$query = "SELECT * FROM lojas WHERE id_loja = 13";
			$consulta = $conexao->prepare($query);
			$consulta->execute();
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);

				$id_loja= $linha['id_loja'];
				$endereco_loja= $linha['endereco'];
				$_SESSION['endereco_loja']=$endereco_loja;
				$numero_loja= $linha['numero'];
				$_SESSION['numero_loja']=$numero_loja;
				$cep_loja= $linha['cep'];
				$_SESSION['bairro_loja']=$cep_loja;
				$cidade_loja= $linha['cidade'];
				$_SESSION['cidade_loja']=$cidade_loja;
				$estado_loja= $linha['estado'];
				$_SESSION['estado_loja']=$estado_loja;
				$telefone_loja= $linha['telefone'];
				$_SESSION['telefone_loja']=$telefone_loja;
				$email_loja= $linha['email'];
				$_SESSION['email_loja']=$email_loja;

			$_SESSION['fecht']="`ficha_de_moveis_maua`";

			if($consulta){
				header("Location: fechamentopdf");
			}
		break;
		
		case'Penha':
				
			$qut ="SELECT * FROM `montadores` WHERE `id-montador` = '$montadorr'";
			$consulta = $conexao->prepare($qut);
			$consulta->execute();
			$ltu = $consulta->fetch(PDO::FETCH_ASSOC);
			$nomemotard = $ltu['nome_montador']."";
			$sobremotard = $ltu['sobrenome']."";
			$nomemotard .= " ";
			$nomemotard .= $sobremotard;
			$_SESSION['montador']=$nomemotard;
			
			
			$qr = "select ifnull(max(id_controle),0)from fechamento_penha";
			$lvl=mysqli_query($conn,$qr);
			$lv=mysqli_fetch_row($lvl);
			$c= $lv[0];
			$c++;
			$_SESSION['controle']= $c;
			
			$q.= "UPDATE ficha_de_moveis_penha SET id_fechamento ='$c',status = 'PAGO',data_pago = now() WHERE "; 
			
			foreach($fech as $fecht) {
				$q.= " `id_controle` ='$fecht' or";
			}
			$q = rtrim($q, 'or');
			$consulta = $conexao->prepare($q);
			$consulta->execute();
			
			$qui = "SELECT DISTINCT `id_controle`,`valor-total-controle` FROM ficha_de_moveis_penha WHERE id_fechamento = '$c'";
			$consulta = $conexao->prepare($qui);
			$consulta->execute();
			 while($vlu = $consulta->fetch(PDO::FETCH_ASSOC)){
				 $fechamentovl = $vlu['valor-total-controle'];
				 $fechamentotl += $fechamentovl;
			 }
			
			$qri = "INSERT INTO fechamento_penha (id_controle,id_montador,data_emissao,valor) VALUE ('$c','$montadorr',now(),'$fechamentotl')";
			$consulta = $conexao->prepare($qri);
			$consulta->execute();
			
			$query = "SELECT * FROM lojas WHERE id_loja = 6";
			$consulta = $conexao->prepare($query);
			$consulta->execute();
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);

				$id_loja= $linha['id_loja'];
				$endereco_loja= $linha['endereco'];
				$_SESSION['endereco_loja']=$endereco_loja;
				$numero_loja= $linha['numero'];
				$_SESSION['numero_loja']=$numero_loja;
				$cep_loja= $linha['cep'];
				$_SESSION['bairro_loja']=$cep_loja;
				$cidade_loja= $linha['cidade'];
				$_SESSION['cidade_loja']=$cidade_loja;
				$estado_loja= $linha['estado'];
				$_SESSION['estado_loja']=$estado_loja;
				$telefone_loja= $linha['telefone'];
				$_SESSION['telefone_loja']=$telefone_loja;
				$email_loja= $linha['email'];
				$_SESSION['email_loja']=$email_loja;

			$_SESSION['fecht']="`ficha_de_moveis_penha`";

			if($consulta){
				header("Location: fechamentopdf");
			}
		break;
		default:
}
}

function fechamentoGravarAssist($conn,$conexao,$lojal,$montadorr,$fech,$data_atual){
	
	switch ($lojal){
			
		case'Guarulhos 1':
				
			$qut ="SELECT * FROM `montadores` WHERE `id-montador` = '$montadorr'";
			$consulta = $conexao->prepare($qut);
			$consulta->execute();
			$ltu = $consulta->fetch(PDO::FETCH_ASSOC);
			$nomemotard = $ltu['nome_montador']."";
			$nomemotard .= " ";
			$_SESSION['montador']=$nomemotard;
			
			
			$qr = "select ifnull(max(id_controle),0)from fas1";
			$lvl=mysqli_query($conn,$qr);
			$lv=mysqli_fetch_row($lvl);
			$c= $lv[0];
			$c++;
			$_SESSION['controle']= $c;
			
			$q.= "UPDATE ssistencia_guarulhos1 SET id_fechamento ='$c',status = 'PAGO',data_pago = now() WHERE "; 
			
			foreach($fech as $fecht) {
				$q.= " `id_controle` ='$fecht' or";
			}
			$q = rtrim($q, 'or');
			$consulta = $conexao->prepare($q);
			$consulta->execute();
			
			$qui = "SELECT DISTINCT `id_controle`, `valor-total-controle` FROM assistencia_guarulhos1 WHERE id_fechamento = '$c'";
			$consulta = $conexao->prepare($qui);
			$consulta->execute();
			 while($vlu = $consulta->fetch(PDO::FETCH_ASSOC)){
				 $fechamentovl += $vlu['valor-total-controle'];
			 }
			 
			 
			
			$qri = "INSERT INTO fas1 (id_controle,id_montador,data_emissao,valor) VALUE ('$c','$montadorr',now(),'$fechamentovl')";
			$consulta = $conexao->prepare($qri);
			$consulta->execute();
			
			$query = "SELECT * FROM lojas WHERE id_loja = 5";
			$consulta = $conexao->prepare($query);
			$consulta->execute();
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);

				$id_loja= $linha['id_loja'];
				$endereco_loja= $linha['endereco'];
				$_SESSION['endereco_loja']=$endereco_loja;
				$numero_loja= $linha['numero'];
				$_SESSION['numero_loja']=$numero_loja;
				$cep_loja= $linha['cep'];
				$_SESSION['bairro_loja']=$cep_loja;
				$cidade_loja= $linha['cidade'];
				$_SESSION['cidade_loja']=$cidade_loja;
				$estado_loja= $linha['estado'];
				$_SESSION['estado_loja']=$estado_loja;
				$telefone_loja= $linha['telefone'];
				$_SESSION['telefone_loja']=$telefone_loja;
				$email_loja= $linha['email'];
				$_SESSION['email_loja']=$email_loja;

			$_SESSION['fecht']="`assistencia_guarulhos1`";

			if($consulta){
				header("Location: fechamentoassistpdf");
			}
		break;
		
		case'Guarulhos 2':
				
			$qut ="SELECT * FROM `montadores` WHERE `id-montador` = '$montadorr'";
			$consulta = $conexao->prepare($qut);
			$consulta->execute();
			$ltu = $consulta->fetch(PDO::FETCH_ASSOC);
			$nomemotard = $ltu['nome_montador']."";
			$nomemotard .= " ";
			$_SESSION['montador']=$nomemotard;
			
			
			$qr = "select ifnull(max(id_controle),0)from fas2";
			$lvl=mysqli_query($conn,$qr);
			$lv=mysqli_fetch_row($lvl);
			$c= $lv[0];
			$c++;
			$_SESSION['controle']= $c;
			
			$q.= "UPDATE assistencia_guarulhos2 SET id_fechamento ='$c',status = 'PAGO',data_pago = now() WHERE "; 
			
			foreach($fech as $fecht) {
				$q.= " `id_controle` ='$fecht' or";
			}
			$q = rtrim($q, 'or');
			$consulta = $conexao->prepare($q);
			$consulta->execute();
			
			$qui = "SELECT DISTINCT `id_controle`, `valor-total-controle` FROM assistencia_guarulhos2 WHERE id_fechamento = '$c'";
			$consulta = $conexao->prepare($qui);
			$consulta->execute();
			 while($vlu = $consulta->fetch(PDO::FETCH_ASSOC)){
				 $fechamentovl += $vlu['valor-total-controle'];
			 }
			 
			 
			
			$qri = "INSERT INTO fas2 (id_controle,id_montador,data_emissao,valor) VALUE ('$c','$montadorr',now(),'$fechamentovl')";
			$consulta = $conexao->prepare($qri);
			$consulta->execute();
			
			$query = "SELECT * FROM lojas WHERE id_loja = 2";
			$consulta = $conexao->prepare($query);
			$consulta->execute();
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);

				$id_loja= $linha['id_loja'];
				$endereco_loja= $linha['endereco'];
				$_SESSION['endereco_loja']=$endereco_loja;
				$numero_loja= $linha['numero'];
				$_SESSION['numero_loja']=$numero_loja;
				$cep_loja= $linha['cep'];
				$_SESSION['bairro_loja']=$cep_loja;
				$cidade_loja= $linha['cidade'];
				$_SESSION['cidade_loja']=$cidade_loja;
				$estado_loja= $linha['estado'];
				$_SESSION['estado_loja']=$estado_loja;
				$telefone_loja= $linha['telefone'];
				$_SESSION['telefone_loja']=$telefone_loja;
				$email_loja= $linha['email'];
				$_SESSION['email_loja']=$email_loja;

			$_SESSION['fecht']="`assistencia_guarulhos2`";

			if($consulta){
				header("Location: fechamentoassistpdf");
			}
		break;
		
		case'Sao Bernardo':
			
			$qut ="SELECT * FROM `montadores` WHERE `id-montador` = '$montadorr'";
			$consulta = $conexao->prepare($qut);
			$consulta->execute();
			$ltu = $consulta->fetch(PDO::FETCH_ASSOC);
			$nomemotard = $ltu['nome_montador']."";
			$nomemotard .= " ";
			$_SESSION['montador']=$nomemotard;
			
			
			$qr = "select ifnull(max(id_controle),0)from fas3";
			$lvl=mysqli_query($conn,$qr);
			$lv=mysqli_fetch_row($lvl);
			$c= $lv[0];
			$c++;
			$_SESSION['controle']= $c;
			
			$q.= "UPDATE assistencia_sao_bernardo SET id_fechamento ='$c',status = 'PAGO',data_pago = now() WHERE "; 
			
			foreach($fech as $fecht) {
				$q.= " `id_controle` ='$fecht' or";
			}
			$q = rtrim($q, 'or');
			$consulta = $conexao->prepare($q);
			$consulta->execute();
			
			$qui = "SELECT DISTINCT `id_controle`, `valor-total-controle` FROM assistencia_sao_bernardo WHERE id_fechamento = '$c'";
			$consulta = $conexao->prepare($qui);
			$consulta->execute();
			 while($vlu = $consulta->fetch(PDO::FETCH_ASSOC)){
				 $fechamentovl += $vlu['valor-total-controle'];
			 }
			 
			 
			
			$qri = "INSERT INTO fas3 (id_controle,id_montador,data_emissao,valor) VALUE ('$c','$montadorr',now(),'$fechamentovl')";
			$consulta = $conexao->prepare($qri);
			$consulta->execute();
			
			$query = "SELECT * FROM lojas WHERE id_loja = 3";
			$consulta = $conexao->prepare($query);
			$consulta->execute();
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);

				$id_loja= $linha['id_loja'];
				$endereco_loja= $linha['endereco'];
				$_SESSION['endereco_loja']=$endereco_loja;
				$numero_loja= $linha['numero'];
				$_SESSION['numero_loja']=$numero_loja;
				$cep_loja= $linha['cep'];
				$_SESSION['bairro_loja']=$cep_loja;
				$cidade_loja= $linha['cidade'];
				$_SESSION['cidade_loja']=$cidade_loja;
				$estado_loja= $linha['estado'];
				$_SESSION['estado_loja']=$estado_loja;
				$telefone_loja= $linha['telefone'];
				$_SESSION['telefone_loja']=$telefone_loja;
				$email_loja= $linha['email'];
				$_SESSION['email_loja']=$email_loja;

			$_SESSION['fecht']="`assistencia_sao_bernardo`";

			if($consulta){
				header("Location: fechamentoassistpdf");
			}
		break;
		
		case'Maua':
			
			$qut ="SELECT * FROM `montadores` WHERE `id-montador` = '$montadorr'";
			$consulta = $conexao->prepare($qut);
			$consulta->execute();
			$ltu = $consulta->fetch(PDO::FETCH_ASSOC);
			$nomemotard = $ltu['nome_montador']."";
			$nomemotard .= " ";
			$_SESSION['montador']=$nomemotard;
			
			
			$qr = "select ifnull(max(id_controle),0)from fas4";
			$lvl=mysqli_query($conn,$qr);
			$lv=mysqli_fetch_row($lvl);
			$c= $lv[0];
			$c++;
			$_SESSION['controle']= $c;
			
			$q.= "UPDATE assistencia_maua SET id_fechamento ='$c',status = 'PAGO',data_pago = now() WHERE "; 
			
			foreach($fech as $fecht) {
				$q.= " `id_controle` ='$fecht' or";
			}
			$q = rtrim($q, 'or');
			$consulta = $conexao->prepare($q);
			$consulta->execute();
			
			$qui = "SELECT DISTINCT `id_controle`,`valor-total-controle` FROM assistencia_maua WHERE id_fechamento = '$c'";
			$consulta = $conexao->prepare($qui);
			$consulta->execute();
			 while($vlu = $consulta->fetch(PDO::FETCH_ASSOC)){
				 $fechamentovl = $vlu['valor-total-controle'];
				 $fechamentotl += $fechamentovl;
			 }
			
			$qri = "INSERT INTO fas4 (id_controle,id_montador,data_emissao,valor) VALUE ('$c','$montadorr',now(),'$fechamentotl')";
			$consulta = $conexao->prepare($qri);
			$consulta->execute();
			
			$query = "SELECT * FROM lojas WHERE id_loja = 13";
			$consulta = $conexao->prepare($query);
			$consulta->execute();
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);

				$id_loja= $linha['id_loja'];
				$endereco_loja= $linha['endereco'];
				$_SESSION['endereco_loja']=$endereco_loja;
				$numero_loja= $linha['numero'];
				$_SESSION['numero_loja']=$numero_loja;
				$cep_loja= $linha['cep'];
				$_SESSION['bairro_loja']=$cep_loja;
				$cidade_loja= $linha['cidade'];
				$_SESSION['cidade_loja']=$cidade_loja;
				$estado_loja= $linha['estado'];
				$_SESSION['estado_loja']=$estado_loja;
				$telefone_loja= $linha['telefone'];
				$_SESSION['telefone_loja']=$telefone_loja;
				$email_loja= $linha['email'];
				$_SESSION['email_loja']=$email_loja;

			$_SESSION['fecht']="`assistencia_maua`";

			if($consulta){
				header("Location: fechamentoassistpdf");
			}
		break;
		
		case'Santo Andre':
			
			$qut ="SELECT * FROM `montadores` WHERE `id-montador` = '$montadorr'";
			$consulta = $conexao->prepare($qut);
			$consulta->execute();
			$ltu = $consulta->fetch(PDO::FETCH_ASSOC);
			$nomemotard = $ltu['nome_montador']."";
			$nomemotard .= " ";
			$_SESSION['montador']=$nomemotard;
			
			
			$qr = "select ifnull(max(id_controle),0)from fas5";
			$lvl=mysqli_query($conn,$qr);
			$lv=mysqli_fetch_row($lvl);
			$c= $lv[0];
			$c++;
			$_SESSION['controle']= $c;
			
			$q.= "UPDATE assistencia_santo_andre SET id_fechamento ='$c',status = 'PAGO',data_pago = now() WHERE "; 
			
			foreach($fech as $fecht) {
				$q.= " `id_controle` ='$fecht' or";
			}
			$q = rtrim($q, 'or');
			$consulta = $conexao->prepare($q);
			$consulta->execute();
			
			$qui = "SELECT DISTINCT `id_controle`,`valor-total-controle` FROM assistencia_santo_andre WHERE id_fechamento = '$c'";
			$consulta = $conexao->prepare($qui);
			$consulta->execute();
			 while($vlu = $consulta->fetch(PDO::FETCH_ASSOC)){
				 $fechamentovl = $vlu['valor-total-controle'];
				 $fechamentotl += $fechamentovl;
			 }
			
			$qri = "INSERT INTO fas4 (id_controle,id_montador,data_emissao,valor) VALUE ('$c','$montadorr',now(),'$fechamentotl')";
			$consulta = $conexao->prepare($qri);
			$consulta->execute();
			
			$query = "SELECT * FROM lojas WHERE id_loja = 13";
			$consulta = $conexao->prepare($query);
			$consulta->execute();
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);

				$id_loja= $linha['id_loja'];
				$endereco_loja= $linha['endereco'];
				$_SESSION['endereco_loja']=$endereco_loja;
				$numero_loja= $linha['numero'];
				$_SESSION['numero_loja']=$numero_loja;
				$cep_loja= $linha['cep'];
				$_SESSION['bairro_loja']=$cep_loja;
				$cidade_loja= $linha['cidade'];
				$_SESSION['cidade_loja']=$cidade_loja;
				$estado_loja= $linha['estado'];
				$_SESSION['estado_loja']=$estado_loja;
				$telefone_loja= $linha['telefone'];
				$_SESSION['telefone_loja']=$telefone_loja;
				$email_loja= $linha['email'];
				$_SESSION['email_loja']=$email_loja;

			$_SESSION['fecht']="`assistencia_santo_andre`";

			if($consulta){
				header("Location: fechamentoassistpdf");
			}
		break;
		
		case'Penha':
				
			$qut ="SELECT * FROM `montadores` WHERE `id-montador` = '$montadorr'";
			$consulta = $conexao->prepare($qut);
			$consulta->execute();
			$ltu = $consulta->fetch(PDO::FETCH_ASSOC);
			$nomemotard = $ltu['nome_montador']."";
			$nomemotard .= " ";
			$_SESSION['montador']=$nomemotard;
			
			
			$qr = "select ifnull(max(id_controle),0)from fas6";
			$lvl=mysqli_query($conn,$qr);
			$lv=mysqli_fetch_row($lvl);
			$c= $lv[0];
			$c++;
			$_SESSION['controle']= $c;
			
			$q.= "UPDATE assistencia_penha SET id_fechamento ='$c',status = 'PAGO',data_pago = now() WHERE "; 
			
			foreach($fech as $fecht) {
				$q.= " `id_controle` ='$fecht' or";
			}
			$q = rtrim($q, 'or');
			$consulta = $conexao->prepare($q);
			$consulta->execute();
			
			$qui = "SELECT DISTINCT `id_controle`,`valor-total-controle` FROM assistencia_penha WHERE id_fechamento = '$c'";
			$consulta = $conexao->prepare($qui);
			$consulta->execute();
			 while($vlu = $consulta->fetch(PDO::FETCH_ASSOC)){
				 $fechamentovl = $vlu['valor-total-controle'];
				 $fechamentotl += $fechamentovl;
			 }
			
			$qri = "INSERT INTO fas6 (id_controle,id_montador,data_emissao,valor) VALUE ('$c','$montadorr',now(),'$fechamentotl')";
			$consulta = $conexao->prepare($qri);
			$consulta->execute();
			
			$query = "SELECT * FROM lojas WHERE id_loja = 6";
			$consulta = $conexao->prepare($query);
			$consulta->execute();
			$linha = $consulta->fetch(PDO::FETCH_ASSOC);

				$id_loja= $linha['id_loja'];
				$endereco_loja= $linha['endereco'];
				$_SESSION['endereco_loja']=$endereco_loja;
				$numero_loja= $linha['numero'];
				$_SESSION['numero_loja']=$numero_loja;
				$cep_loja= $linha['cep'];
				$_SESSION['bairro_loja']=$cep_loja;
				$cidade_loja= $linha['cidade'];
				$_SESSION['cidade_loja']=$cidade_loja;
				$estado_loja= $linha['estado'];
				$_SESSION['estado_loja']=$estado_loja;
				$telefone_loja= $linha['telefone'];
				$_SESSION['telefone_loja']=$telefone_loja;
				$email_loja= $linha['email'];
				$_SESSION['email_loja']=$email_loja;

			$_SESSION['fecht']="`assistencia_penha`";

			if($consulta){
				header("Location: fechamentoassistpdf");
			}
		break;
		default:
}
}
?>