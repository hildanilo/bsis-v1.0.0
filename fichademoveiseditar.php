<?php
include "in/conecta.inc";
ob_start();
session_start();
$nivel='1';
	if($_SESSION['nivel']<>$nivel){
		header("Location: home.php"); exit; // Redireciona o visitante
		}
?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link rel="icon" type="image/png" href="imagens/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  <script type="text/javascript" src="js/estilo.js"></script>
	
    <title>Bsis</title>

	<script>
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'});
  } );
  </script>
	
  <script>
  $( function() {
    $( "#datepicker2" ).datepicker({dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior'});
  } );
  </script>

<script>
/* função de formatação do formulario */
	function formatar(mascara, documento){
 	 var i = documento.value.length;
 	 var saida = mascara.substring(0,1);
  	var texto = mascara.substring(i)
  
  	if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  	}  
	}
</script>
</head>
<body>
		<?php
        include"in/header.php";
		$id=$_GET['codigo'];
		$loja=$_GET['loja'];
		$_SESSION['id_controle']=$id;
		//selecionando dados da tabela
		switch($loja){
			case'Guarulhos 1':
			$pront = "ficha_de_moveis_guarulhos1";
			$query="SELECT `clientes`.`id_cliente`,`clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`complemento`,`clientes`.`cep`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,`$pront`.`id_controle`,`$pront`.`valoracrescimo`,`$pront`.`id_pedido`,`$pront`.`id-montador`,`montadores`.`nome_montador`,`$pront`.`quantidade` ,`$pront`.`id-produto` ,`$pront`.`datamontagem`, `$pront`.`dataentrega`, `$pront`.`obs`,`produtos`.`descricao`,`produtos`.`cores` from `clientes` join `$pront` on  `clientes`.`id_cliente` = `$pront`.`id-cliente` join  `produtos` on `produtos`.`id_produto` = `$pront`.`id-produto`  join `montadores` on `montadores`.`id-montador` = `$pront`.`id-montador` where `$pront`.`id_controle` = '$id'";
			
			$sql=mysqli_query($conn,$query);
		// transforma os dados em string onde possa ser lido
		while($row=mysqli_fetch_array($sql)){
			$idprodutoanterior[]=$row['id-produto'];
			$quantidade[]=$row['quantidade'];
			$desc[]=$row['descricao'];
			$cor[]=$row['cores'];
			$idmontador = $row['id-montador'];
			$montador = $row['nome_montador'];
			$valoracrescimo = $row['valoracrescimo'];
			
			$_SESSION['id_cliente']=$row['id_cliente'];
			$_SESSION['cpf']=$row['cpf'];
			$_SESSION['nome']=$row['nome'];
			$_SESSION['sobrenome']=$row['sobrenome']."";
			$_SESSION['endereco']=$row['endereco']."";
			$_SESSION['numero']=$row['numero']."";
			$_SESSION['complemento']=$row['complemento']."";
			$_SESSION['cep']=$row['cep']."";
			$_SESSION['bairro']=$row['bairro']."";
			$_SESSION['cidade']=$row['cidade']."";
			$_SESSION['estado']=$row['estado']."";
			$_SESSION['telefone']=$row['telefone']."";
			$_SESSION['celular']=$row['celular']."";
			$_SESSION['email']=$row['email']."";
		
			$pedido=$row['id_pedido'];
			$datemontagem = $row['datamontagem'];
			$datamontagem = date("d-m-Y",strtotime(str_replace('/','-',$datemontagem)));
			$dateentrega = $row['dataentrega'];
			$dataentrega = date("d-m-Y",strtotime(str_replace('/','-',$dateentrega)));
			$obs = $row['obs'];
			$valoracrescimo = $row['valoracrescimo'];
			$id = $row['id_controle'];
		}
		
			break;
			
			case'Guarulhos 2':
			$pront = "ficha_de_moveis_guarulhos2";
			$query="SELECT `clientes`.`id_cliente`,`clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`complemento`,`clientes`.`cep`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,`$pront`.`id_controle`,`$pront`.`valoracrescimo`,`$pront`.`id_pedido`,`$pront`.`id-montador`,`montadores`.`nome_montador`,`$pront`.`quantidade` ,`$pront`.`id-produto` ,`$pront`.`datamontagem`, `$pront`.`dataentrega`, `$pront`.`obs`,`produtos`.`descricao`,`produtos`.`cores` from `clientes` join `$pront` on  `clientes`.`id_cliente` = `$pront`.`id-cliente` join  `produtos` on `produtos`.`id_produto` = `$pront`.`id-produto`  join `montadores` on `montadores`.`id-montador` = `$pront`.`id-montador` where `$pront`.`id_controle` = '$id'";
			
			$sql=mysqli_query($conn,$query);
		// transforma os dados em string onde possa ser lido
		while($row=mysqli_fetch_array($sql)){
			$idprodutoanterior[]=$row['id-produto'];
			$quantidade[]=$row['quantidade'];
			$desc[]=$row['descricao'];
			$cor[]=$row['cores'];
			$idmontador = $row['id-montador'];
			$montador = $row['nome_montador'];
			$valoracrescimo = $row['valoracrescimo'];
			
			$_SESSION['id_cliente']=$row['id_cliente'];
			$_SESSION['cpf']=$row['cpf'];
			$_SESSION['nome']=$row['nome'];
			$_SESSION['sobrenome']=$row['sobrenome']."";
			$_SESSION['endereco']=$row['endereco']."";
			$_SESSION['numero']=$row['numero']."";
			$_SESSION['complemento']=$row['complemento']."";
			$_SESSION['cep']=$row['cep']."";
			$_SESSION['bairro']=$row['bairro']."";
			$_SESSION['cidade']=$row['cidade']."";
			$_SESSION['estado']=$row['estado']."";
			$_SESSION['telefone']=$row['telefone']."";
			$_SESSION['celular']=$row['celular']."";
			$_SESSION['email']=$row['email']."";
		
			$pedido=$row['id_pedido'];
			$datemontagem = $row['datamontagem'];
			$datamontagem = date("d-m-Y",strtotime(str_replace('/','-',$datemontagem)));
			$dateentrega = $row['dataentrega'];
			$dataentrega = date("d-m-Y",strtotime(str_replace('/','-',$dateentrega)));
			$obs = $row['obs'];
			$valoracrescimo = $row['valoracrescimo'];
			$id = $row['id_controle'];
		}
			break;
			
			case'Santo Andre':
			$pront = "ficha_de_moveis_santo_andre";
			$query="SELECT `clientes`.`id_cliente`,`clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`complemento`,`clientes`.`cep`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,`$pront`.`id_controle`,`$pront`.`valoracrescimo`,`$pront`.`id_pedido`,`$pront`.`id-montador`,`montadores`.`nome_montador`,`$pront`.`quantidade` ,`$pront`.`id-produto` ,`$pront`.`datamontagem`, `$pront`.`dataentrega`, `$pront`.`obs`,`produtos`.`descricao`,`produtos`.`cores` from `clientes` join `$pront` on  `clientes`.`id_cliente` = `$pront`.`id-cliente` join  `produtos` on `produtos`.`id_produto` = `$pront`.`id-produto`  join `montadores` on `montadores`.`id-montador` = `$pront`.`id-montador` where `$pront`.`id_controle` = '$id'";
			
			$sql=mysqli_query($conn,$query);
		// transforma os dados em string onde possa ser lido
		while($row=mysqli_fetch_array($sql)){
			$idprodutoanterior[]=$row['id-produto'];
			$quantidade[]=$row['quantidade'];
			$desc[]=$row['descricao'];
			$cor[]=$row['cores'];
			$idmontador = $row['id-montador'];
			$montador = $row['nome_montador'];
			$valoracrescimo = $row['valoracrescimo'];
			
			$_SESSION['id_cliente']=$row['id_cliente'];
			$_SESSION['cpf']=$row['cpf'];
			$_SESSION['nome']=$row['nome'];
			$_SESSION['sobrenome']=$row['sobrenome']."";
			$_SESSION['endereco']=$row['endereco']."";
			$_SESSION['numero']=$row['numero']."";
			$_SESSION['complemento']=$row['complemento']."";
			$_SESSION['cep']=$row['cep']."";
			$_SESSION['bairro']=$row['bairro']."";
			$_SESSION['cidade']=$row['cidade']."";
			$_SESSION['estado']=$row['estado']."";
			$_SESSION['telefone']=$row['telefone']."";
			$_SESSION['celular']=$row['celular']."";
			$_SESSION['email']=$row['email']."";
		
			$pedido=$row['id_pedido'];
			$datemontagem = $row['datamontagem'];
			$datamontagem = date("d-m-Y",strtotime(str_replace('/','-',$datemontagem)));
			$dateentrega = $row['dataentrega'];
			$dataentrega = date("d-m-Y",strtotime(str_replace('/','-',$dateentrega)));
			$obs = $row['obs'];
			$valoracrescimo = $row['valoracrescimo'];
			$id = $row['id_controle'];
		}
			break;
			
			case'Sao Bernardo':
			$pront = "ficha_de_moveis_sao_bernardo";
			$query="SELECT `clientes`.`id_cliente`,`clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`complemento`,`clientes`.`cep`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,`$pront`.`id_controle`,`$pront`.`valoracrescimo`,`$pront`.`id_pedido`,`$pront`.`id-montador`,`montadores`.`nome_montador`,`$pront`.`quantidade` ,`$pront`.`id-produto` ,`$pront`.`datamontagem`, `$pront`.`dataentrega`, `$pront`.`obs`,`produtos`.`descricao`,`produtos`.`cores` from `clientes` join `$pront` on  `clientes`.`id_cliente` = `$pront`.`id-cliente` join  `produtos` on `produtos`.`id_produto` = `$pront`.`id-produto`  join `montadores` on `montadores`.`id-montador` = `$pront`.`id-montador` where `$pront`.`id_controle` = '$id'";
			
			$sql=mysqli_query($conn,$query);
		// transforma os dados em string onde possa ser lido
		while($row=mysqli_fetch_array($sql)){
			$idprodutoanterior[]=$row['id-produto'];
			$quantidade[]=$row['quantidade'];
			$desc[]=$row['descricao'];
			$cor[]=$row['cores'];
			$idmontador = $row['id-montador'];
			$montador = $row['nome_montador'];
			$valoracrescimo = $row['valoracrescimo'];
			
			$_SESSION['id_cliente']=$row['id_cliente'];
			$_SESSION['cpf']=$row['cpf'];
			$_SESSION['nome']=$row['nome'];
			$_SESSION['sobrenome']=$row['sobrenome']."";
			$_SESSION['endereco']=$row['endereco']."";
			$_SESSION['numero']=$row['numero']."";
			$_SESSION['complemento']=$row['complemento']."";
			$_SESSION['cep']=$row['cep']."";
			$_SESSION['bairro']=$row['bairro']."";
			$_SESSION['cidade']=$row['cidade']."";
			$_SESSION['estado']=$row['estado']."";
			$_SESSION['telefone']=$row['telefone']."";
			$_SESSION['celular']=$row['celular']."";
			$_SESSION['email']=$row['email']."";
		
			$pedido=$row['id_pedido'];
			$datemontagem = $row['datamontagem'];
			$datamontagem = date("d-m-Y",strtotime(str_replace('/','-',$datemontagem)));
			$dateentrega = $row['dataentrega'];
			$dataentrega = date("d-m-Y",strtotime(str_replace('/','-',$dateentrega)));
			$obs = $row['obs'];
			$valoracrescimo = $row['valoracrescimo'];
			$id = $row['id_controle'];
		}
			break;
			
			case'Maua':
			$pront = "ficha_de_moveis_maua";
			$query="SELECT `clientes`.`id_cliente`,`clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`complemento`,`clientes`.`cep`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,`$pront`.`id_controle`,`$pront`.`valoracrescimo`,`$pront`.`id_pedido`,`$pront`.`id-montador`,`montadores`.`nome_montador`,`$pront`.`quantidade` ,`$pront`.`id-produto` ,`$pront`.`datamontagem`, `$pront`.`dataentrega`, `$pront`.`obs`,`produtos`.`descricao`,`produtos`.`cores` from `clientes` join `$pront` on  `clientes`.`id_cliente` = `$pront`.`id-cliente` join  `produtos` on `produtos`.`id_produto` = `$pront`.`id-produto`  join `montadores` on `montadores`.`id-montador` = `$pront`.`id-montador` where `$pront`.`id_controle` = '$id'";
			
			$sql=mysqli_query($conn,$query);
		// transforma os dados em string onde possa ser lido
		while($row=mysqli_fetch_array($sql)){
			$idprodutoanterior[]=$row['id-produto'];
			$quantidade[]=$row['quantidade'];
			$desc[]=$row['descricao'];
			$cor[]=$row['cores'];
			$idmontador = $row['id-montador'];
			$montador = $row['nome_montador'];
			$valoracrescimo = $row['valoracrescimo'];
			
			$_SESSION['id_cliente']=$row['id_cliente'];
			$_SESSION['cpf']=$row['cpf'];
			$_SESSION['nome']=$row['nome'];
			$_SESSION['sobrenome']=$row['sobrenome']."";
			$_SESSION['endereco']=$row['endereco']."";
			$_SESSION['numero']=$row['numero']."";
			$_SESSION['complemento']=$row['complemento']."";
			$_SESSION['cep']=$row['cep']."";
			$_SESSION['bairro']=$row['bairro']."";
			$_SESSION['cidade']=$row['cidade']."";
			$_SESSION['estado']=$row['estado']."";
			$_SESSION['telefone']=$row['telefone']."";
			$_SESSION['celular']=$row['celular']."";
			$_SESSION['email']=$row['email']."";
		
			$pedido=$row['id_pedido'];
			$datemontagem = $row['datamontagem'];
			$datamontagem = date("d-m-Y",strtotime(str_replace('/','-',$datemontagem)));
			$dateentrega = $row['dataentrega'];
			$dataentrega = date("d-m-Y",strtotime(str_replace('/','-',$dateentrega)));
			$obs = $row['obs'];
			$valoracrescimo = $row['valoracrescimo'];
			$id = $row['id_controle'];
		}
			break;
			
			case 'Penha':
			$pront = "ficha_de_moveis_penha";
			$query="SELECT `clientes`.`id_cliente`,`clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`complemento`,`clientes`.`cep`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,`$pront`.`id_controle`,`$pront`.`id_pedido`,`$pront`.`quantidade` ,`$pront`.`id-produto` ,`$pront`.`datamontagem`, `$pront`.`dataentrega`, `$pront`.`obs`,`produtos`.`descricao`,`produtos`.`cores` from `clientes` join `$pront` on  `clientes`.`id_cliente` = `$pront`.`id-cliente` join  `produtos` on `produtos`.`id_produto` = `$pront`.`id-produto` where `$pront`.`id_controle` = '$id'";
			
			$sql=mysqli_query($conn,$query);
		// transforma os dados em string onde possa ser lido
		while($row=mysqli_fetch_array($sql)){
			$idprodutoanterior[]=$row['id-produto'];
			$quantidade[]=$row['quantidade'];
			$desc[]=$row['descricao'];
			$cor[]=$row['cores'];
			$idmontador = $row[''];
			$idmontador = $row[''];
			
			$_SESSION['id_cliente']=$row['id_cliente'];
			$_SESSION['cpf']=$row['cpf'];
			$_SESSION['nome']=$row['nome'];
			$_SESSION['sobrenome']=$row['sobrenome']."";
			$_SESSION['endereco']=$row['endereco']."";
			$_SESSION['numero']=$row['numero']."";
			$_SESSION['complemento']=$row['complemento']."";
			$_SESSION['cep']=$row['cep']."";
			$_SESSION['bairro']=$row['bairro']."";
			$_SESSION['cidade']=$row['cidade']."";
			$_SESSION['estado']=$row['estado']."";
			$_SESSION['telefone']=$row['telefone']."";
			$_SESSION['celular']=$row['celular']."";
			$_SESSION['email']=$row['email']."";
		
			$pedido=$row['id_pedido'];
			$datemontagem = $row['datamontagem'];
			$datamontagem = date("d-m-Y",strtotime(str_replace('/','-',$datemontagem)));
			$dateentrega = $row['dataentrega'];
			$dataentrega = date("d-m-Y",strtotime(str_replace('/','-',$dateentrega)));
			$obs = $row['obs'];
			$valoracrescimo = $row['valoracrescimo'];
			$id = $row['id_controle'];
		}
			break;
			
			default:
		}
			
		if(isset($_POST['enviarFicha'])){
			$idprodutoanterior;
			$idcontrole= $_POST['idcontrole'];
			$idcliente=$_SESSION['id_cliente'];
			$loja=$_POST['loja'];
			$montador = $_POST['montador'];
			$quant[0]=$_POST['quant0'];
			$quant[1]=$_POST['quant1'];
			$quant[2]=$_POST['quant2'];
			$quant[3]=$_POST['quant3'];
			$produtos[0]=$_POST['cod_cor'];
			$produtos[1]=$_POST['cod_cor2'];
			$produtos[2]=$_POST['cod_cor3'];
			$produtos[3]=$_POST['cod_cor4'];
			$acrescimo=$_POST['acrescimo'];
			$pedido=$_POST['pedido'];
			$_SESSION['pedido_loja']=$pedido;
			$entrega=$_POST['entrega'];
			$_SESSION['dataentrega_loja']=$entrega;
			$entrega=date("Y-m-d",strtotime(str_replace('-','/',$entrega)));
			$montagem=$_POST['montagem'];
			$_SESSION['datamontagem_loja']=$montagem;
			$montagem=date("Y-m-d",strtotime(str_replace('-','/',$montagem)));
			$tsmg=$_POST['tsmg'];
			$tsmg= strtoupper($tsmg);
			$_SESSION['obs']=$tsmg;
			moveiseditar($conn,$conexao,$idcontrole,$idcliente,$loja,$quant,$idprodutoanterior,$produtos,$montador,$acrescimo,$pedido,$entrega,$montagem,$tsmg);
			
		}
		?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 margin-top">
			<div class="panel panel-success">
				<div class="panel-heading">Ficha de Moveis</div>
					<div class="panel-body">
					<form action="" method="post">
						<fieldset>
							<legend>Dados do cliente </legend>
								
								<p><strong>ID Montagem:</strong><?php echo"<input type='text' name='idcontrole' value='$id' readonly='readonly'>";?> <strong>Loja:</strong> <?php echo "<input type='text' name='loja' value='$loja' readonly='readonly'>";?></p>
								<p><strong>ID Cliente:</strong><?php echo $_SESSION['id_cliente'];?> 
								<strong>CPF:</strong><?php echo $_SESSION['cpf']?> </p>
								<p><strong>Nome completo:</strong> <?php echo $_SESSION['nome'];?></p>
								<p><strong>EndereÃ§o:</strong> <?php echo $_SESSION['endereco']?>
								<strong>N:</strong> <?php echo $_SESSION['numero']?><br>
								<strong>Complento:</strong><?php  echo $_SESSION['complemento'] ?></p>
								<p><strong>CEP:</strong><?php echo $_SESSION['cep']?><br>
								<p><strong>Bairro:</strong> <?php echo $_SESSION['bairro']?><br>
								<strong>Cidade:</strong>  <?php echo $_SESSION['cidade'] ?><br>
								<strong>Estado:</strong> <?php  echo $_SESSION['estado']?></p>
								<p><strong>Tel:</strong> <?php echo $_SESSION['telefone'] ?><br>
								<strong>Cel:</strong> <?php  echo $_SESSION['celular']?></p>
								<p><strong>E-mail:</strong> <?php echo $_SESSION['email'] ?></p>
							
						</fieldset>		

<fieldset><legend>DescriÃ§Ã£o do Pedido</legend>
<label>Quantidade</label>

<form class="form-group">
<label>Produto</label>
<div class="form-inline" class="col-md-2">
<input type="text" size="2" maxlength="2"name="quant0" onkeypress="return maskKeyPress(event)" class="form-control" value="<?php echo $quantidade[0]; ?>">

<select name="produto" id="produto" class="form-control">
	<option value="<?php echo $desc[0]; ?>"><?php echo $desc[0]; ?></option>
<?php
// consulta ao banco e resulta
	$sql= mysqli_query($conn,"select DISTINCT descricao from produtos  order by descricao");
	while ($resp = mysqli_fetch_assoc($sql)) {	
	     utf8_encode($rep['descricao']);
		echo '<option value="'.$resp['descricao'].'">'.$resp['descricao'].'</option>';
    }
	?></select>
	
	<select name="cod_cor" id="cod_cor" class="form-control">
			<option value="<?php echo $idprodutoanterior[0];?>"><?php echo $cor[0];?></option>		
    <script type="text/javascript">
		// execução jquery e ajax para resultado de cores de acordo com produto selecionado
		$(function(){
	$('#produto').change(function(){
		if( $(this).val() ) {
			$('#cod_cor').hide();
			$('.carregando').show();
			$.getJSON('consultarcor.php?search=',{produto: $(this).val(), ajax: 'true'}, function(j){
				var options = '<option value=""></option>';	
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].idproduto + '">' + j[i].cor + '</option>';
				}	
				$('#cod_cor').html(options).show();
				$('.carregando').hide();
			});
		} else {
			$('#cod_cor').html('<option value="">-- Escolha um estado --</option>');
		}
	});
});
		</script>
        </select>
<div class="form-inline" class="col-md-2">
<input type="text" size="2" maxlength="2"name="quant1" onkeypress="return maskKeyPress(event)" class="form-control" value="<?php echo $quantidade[1]?>">
<select name="produto2" id="produto2" class="form-control">
	<option value="<?php echo $desc[1]?>"><?php echo $desc[1]; ?></option>
<?php
// consulta ao banco e resulta
	$sql= mysqli_query($conn,"select DISTINCT descricao from produtos  order by descricao");
	while ($resp = mysqli_fetch_assoc($sql)) {	
	     utf8_encode($rep['descricao']);
		echo '<option value="'.$resp['descricao'].'">'.$resp['descricao'].'</option>';
    }
	?></select>
	<select name="cod_cor2" id="cod_cor2" class="form-control">
			<option value="<?php echo $idprodutoanterior[1]?>"><?php echo $cor[1]?></option>
   	
    <script type="text/javascript">
		// execução jquery e ajax para resultado de cores de acordo com produto selecionado
		$(function(){
	$('#produto2').change(function(){
		if( $(this).val() ) {
			$('#cod_cor2').hide();
			$('.carregando').show();
			$.getJSON('consultarcor2.php?search=',{produto2: $(this).val(), ajax: 'true'}, function(j){
				var options = '<option value=""></option>';	
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].idprodutoo + '">' + j[i].coro + '</option>';
				}	
				$('#cod_cor2').html(options).show();
				$('.carregando').hide();
			});
		} else {
			$('#cod_cor2').html('<option value="">-- Escolha um estado --</option>');
		}
	});
});
		</script>
        </select>
</div>
<div class="form-inline" class="col-md-2">
<input type="text" size="2" maxlength="2"name="quant2" onkeypress="return maskKeyPress(event)" class="form-control" value="<?php echo $quantidade[2]; ?>">
<select name="produto3" id="produto3" class="form-control">
	<option value="<?php echo $desc[2];?>"></option>
<?php
// consulta ao banco e resulta
	$sql= mysqli_query($conn,"select DISTINCT descricao from produtos  order by descricao");
	while ($resp = mysqli_fetch_assoc($sql)) {	
	     utf8_encode($rep['descricao']);
		echo '<option value="'.$resp['descricao'].'">'.$resp['descricao'].'</option>';
    }
	?></select>
	<select name="cod_cor3" id="cod_cor3" class="form-control">
			<option value="<?php echo $idprodutoanterior[2]?>"><?php echo $cor[2];?></option>

    <script type="text/javascript">
		// execução jquery e ajax para resultado de cores de acordo com produto selecionado
		$(function(){
	$('#produto3').change(function(){
		if( $(this).val() ) {
			$('#cod_cor3').hide();
			$('.carregando').show();
			$.getJSON('consultarcor3.php?search=',{produto3: $(this).val(), ajax: 'true'}, function(j){
				var options = '<option value=""></option>';	
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].idprodut + '">' + j[i].cr + '</option>';
				}	
				$('#cod_cor3').html(options).show();
				$('.carregando').hide();
			});
		} else {
			$('#cod_cor3').html('<option value="">-- Escolha um estado --</option>');
		}
	});
});
		</script>
        </select>
</div>
<div class="form-inline" class="col-md-2">
<input type="text" size="2" maxlength="2"name="quant3"onkeypress="return maskKeyPress(event)" class="form-control"value="<?php echo $quantidade[3];?>">
<select name="produto4" id="produto4" class="form-control">
	<option value="<?php echo $desc[4]; ?>"></option>
<?php
// consulta ao banco e resulta
	$sql= mysqli_query($conn,"select DISTINCT descricao from produtos  order by descricao");
	while ($resp = mysqli_fetch_assoc($sql)) {	
	     utf8_encode($rep['descricao']);
		echo '<option value="'.$resp['descricao'].'">'.$resp['descricao'].'</option>';
    }
	?></select>
	<select name="cod_cor4" id="cod_cor4" class="form-control">
			<option value="<?php echo $idprodutoanterior[3];?>"><?php echo $cor[3];?></option>
	
    <script type="text/javascript">
		// execução jquery e ajax para resultado de cores de acordo com produto selecionado
		$(function(){
	$('#produto4').change(function(){
		if( $(this).val() ) {
			$('#cod_cor4').hide();
			$('.carregando').show();
			$.getJSON('consultarcor4.php?search=',{produto4: $(this).val(), ajax: 'true'}, function(j){
				var options = '<option value=""></option>';	
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].idprdut + '">' + j[i].ccr + '</option>';
				}	
				$('#cod_cor4').html(options).show();
				$('.carregando').hide();
			});
		} else {
			$('#cod_cor4').html('<option value="">-- Escolha um estado --</option>');35
		}
	});
});
		</script>
        </select>
</div>
<div class="form-inline">
<label>Codigo Pedido</label>
<input type="text" required="required" name="pedido"  size="9" maxlength="9" class="form-control" value="<?php echo $pedido;?>">
</div>
<div class="form-inline">
<label>Acrescimo</label> 
<select name="acrescimo"class="form-control">
<?php if($valoracrescimo){ echo "<option value='$valoracrescimo'>$valoracrescimo</option>";}?>
	<option value="0.0">0%</option>
	<option value="0.15">15%</option>
	<option value="0.30">30%</option>
</select>
</div>

<div class="form-inline">
								<label>Montador(*)</label>

									<select name="montador" class="form-control">
							
									<?php echo '<option value='.$idmonatador.'>'.$montador.'</option>';
									
									// consulta ao banco e resulta
										$sql= mysqli_query($conn,"select * from montadores order by nome_montador");
										while ($resp = mysqli_fetch_assoc($sql)) {		
										echo '<option value="'.$resp['id-montador'].'">'.$resp['nome_montador'].'</option>';
											}
									?></select>
							</div>

<div class="form-inline">
<label>Data de entrega</label>
<input type="text"  id="datepicker" name="entrega" class="form-control" value='<?php echo $dataentrega;?>'>
</div>
<div class="form-inline">
<label>PrevisÃ£o de Montagem</label>
<input type="text"  id="datepicker2" name="montagem" class="form-control" value='<?php echo $datamontagem;?>'>
</div>
<div class="form-inline">
<label>ObservaÃ§Ãµes:</label>
<textarea name="tsmg" id="cmsg" cols="60" rows="5" placeholder="Escreva aqui observaÃ§Ãµes gerais sobre Montagem" style="text-transform:uppercase;" class="form-control" ><?php echo $obs;?></textarea>
</div>
<div id="aviso"><p>(*)Campo obrigatorio</p></div>
<input type="submit"id="botao" name="enviarFicha" value="Editar" class="btn btn-success"/>
<a  href="#"class="btn btn-primary">Voltar</a>
													</form>
</form>
</fieldset>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>