<?php
include "in/conecta.inc";
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
			$pront = "assistencia_guarulhos1";
			$c="SELECT `clientes`.`id_cliente`,`clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`complemento`,`clientes`.`cep`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,`$pront`.`id_controle`,`$pront`.`id_assist`,`$pront`.`id-produto` ,`$pront`.`vencimento_assistencia`, `$pront`.`dataentrega`, `$pront`.`desc_assist`,`produtos`.`descricao`,`produtos`.`cores` from `clientes` join `$pront` on  `clientes`.`id_cliente` = `$pront`.`id-cliente` join  `produtos` on `produtos`.`id_produto` = `$pront`.`id-produto` WHERE `$pront`.`id_assist` = '$id'";
			
			$sql=mysqli_query($conn,$c);
			while($row=mysqli_fetch_array($sql)){
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
		
				$idprodutoanterior[]=$row['id-produto'];
				$pedido=$row['id_pedido'];
				$quantidade[]=$row['quantidade'];
				$desc[]=$row['descricao']."";
				$cor[]=$row['cores']."";
				$vlmont[]=$row['valormontagem']."";
				$vlmont2[]=$row['valormontagem_2']."";
		
				$datamontagem= $row['vencimento_assistencia']."";
				$datamontagem=date("d-m-Y",strtotime(str_replace('/','-',$datamontagem)));
				$dataentrega= $row['dataentrega']."";
				$dataentrega=date("d-m-Y",strtotime(str_replace('/','-',$dataentrega)));
				$obs = $row['desc_assist']."";
				$valoracrescimo = $row['valoracrescimo']."";
				$id=$row['id_controle'];
				$assist=$row['id_assist'];
			
			}
			break;
			
			case'Guarulhos 2':
			$pront = "assistencia_guarulhos2";
			
			$c="SELECT `clientes`.`id_cliente`,`clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`complemento`,`clientes`.`cep`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,`$pront`.`id_controle`,`$pront`.`id_pedido`,`$pront`.`quantidade` ,`$pront`.`id-produto` ,`$pront`.`datamontagem`, `$pront`.`dataentrega`, `$pront`.`obs`,`produtos`.`descricao`,`produtos`.`cores`,`produtos`.`` from `clientes` join `$pront` on  `clientes`.`id_cliente` = `$pront`.`id-cliente` join  `produtos` on `produtos`.`id_produto` = `$pront`.`id-produto` WHERE `$pront`.`id_controle` = '$id'";
		
			$sql=mysqli_query($conn,$c);
			
			while($row=mysqli_fetch_array($sql)){
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
		
				$idprodutoanterior[]=$row['id-produto'];
				$pedido=$row['id_pedido'];
				$quantidade[]=$row['quantidade'];
				$desc[]=$row['descricao']."";
				$cor[]=$row['cores']."";
				$vlmont[]=$row['valormontagem']."";
		
				$datamontagem= $row['datamontagem']."";
				$datamontagem=date("d-m-Y",strtotime(str_replace('/','-',$datamontagem)));
				$dataentrega= $row['dataentrega']."";
				$dataentrega=date("d-m-Y",strtotime(str_replace('/','-',$dataentrega)));
				$obs = $row['obs']."";
				$valoracrescimo = $row['valoracrescimo']."";
				$id=$row['id_controle'];
			
			}
			
			break;
			
			case'Sao Bernardo':
			$pront = "assistencia_sao_bernardo";
			
			$c="SELECT `clientes`.`id_cliente`,`clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`complemento`,`clientes`.`cep`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,`$pront`.`id_controle`,`$pront`.`id_pedido`,`$pront`.`quantidade` ,`$pront`.`id-produto` ,`$pront`.`datamontagem`, `$pront`.`dataentrega`, `$pront`.`obs`,`produtos`.`descricao`,`produtos`.`cores`,`produtos`.`` from `clientes` join `$pront` on  `clientes`.`id_cliente` = `$pront`.`id-cliente` join  `produtos` on `produtos`.`id_produto` = `$pront`.`id-produto` WHERE `$pront`.`id_controle` = '$id'";
			
			$sql=mysqli_query($conn,$c);
			
			
			while($row=mysqli_fetch_array($sql)){
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
		
				$idprodutoanterior[]=$row['id-produto'];
				$pedido=$row['id_pedido'];
				$quantidade[]=$row['quantidade'];
				$desc[]=$row['descricao']."";
				$cor[]=$row['cores']."";
				$vlmont[]=$row['valormontagem']."";
		
				$datamontagem= $row['datamontagem']."";
				$datamontagem=date("d-m-Y",strtotime(str_replace('/','-',$datamontagem)));
				$dataentrega= $row['dataentrega']."";
				$dataentrega=date("d-m-Y",strtotime(str_replace('/','-',$dataentrega)));
				$obs = $row['obs']."";
				$valoracrescimo = $row['valoracrescimo']."";
				$id=$row['id_controle'];
			
			}
			break;
			
			case'Maua':
			$pront = "assistencia_maua";
			
			$c="SELECT `clientes`.`id_cliente`,`clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`complemento`,`clientes`.`cep`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,`$pront`.`id_controle`,`$pront`.`id_pedido`,`$pront`.`quantidade` ,`$pront`.`id-produto` ,`$pront`.`datamontagem`, `$pront`.`dataentrega`, `$pront`.`obs`,`produtos`.`descricao`,`produtos`.`cores`,`produtos`.`` from `clientes` join `$pront` on  `clientes`.`id_cliente` = `$pront`.`id-cliente` join  `produtos` on `produtos`.`id_produto` = `$pront`.`id-produto` WHERE `$pront`.`id_controle` = '$id'";

			$sql=mysqli_query($conn,$c);
			
			while($row=mysqli_fetch_array($sql)){
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
		
				$idprodutoanterior[]=$row['id-produto'];
				$pedido=$row['id_pedido'];
				$quantidade[]=$row['quantidade'];
				$desc[]=$row['descricao']."";
				$cor[]=$row['cores']."";
				$vlmont[]=$row['valormontagem']."";
		
				$datamontagem= $row['datamontagem']."";
				$datamontagem=date("d-m-Y",strtotime(str_replace('/','-',$datamontagem)));
				$dataentrega= $row['dataentrega']."";
				$dataentrega=date("d-m-Y",strtotime(str_replace('/','-',$dataentrega)));
				$obs = $row['obs']."";
				$valoracrescimo = $row['valoracrescimo']."";
				$id=$row['id_controle'];
			
			}
			break;
			
			case 'Penha':
			$pront = "assistencia_penha";
			$c="SELECT `clientes`.`id_cliente`,`clientes`.`cpf`,`clientes`.`nome`,`clientes`.`endereco`,`clientes`.`numero`,`clientes`.`complemento`,`clientes`.`cep`,`clientes`.`bairro`,`clientes`.`cidade`,`clientes`.`estado`,`clientes`.`telefone`,`clientes`.`celular`,`clientes`.`email`,`$pront`.`id_controle`,`$pront`.`id_pedido`,`$pront`.`quantidade` ,`$pront`.`id-produto` ,`$pront`.`datamontagem`, `$pront`.`dataentrega`, `$pront`.`obs`,`produtos`.`descricao`,`produtos`.`cores`,`produtos`.`` from `clientes` join `$pront` on  `clientes`.`id_cliente` = `$pront`.`id-cliente` join  `produtos` on `produtos`.`id_produto` = `$pront`.`id-produto` WHERE `$pront`.`id_controle` = '$id'";
			$sql=mysqli_query($conn,$c);
			while($row=mysqli_fetch_array($sql)){
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
		
				$idprodutoanterior[]=$row['id-produto'];
				$pedido=$row['id_pedido'];
				$quantidade[]=$row['quantidade'];
				$desc[]=$row['descricao']."";
				$cor[]=$row['cores']."";
				$vlmont=$row['valormontagem_2']."";
				
				$datamontagem= $row['datamontagem']."";
				$datamontagem=date("d-m-Y",strtotime(str_replace('/','-',$datamontagem)));
				$dataentrega= $row['dataentrega']."";
				$dataentrega=date("d-m-Y",strtotime(str_replace('/','-',$dataentrega)));
				$obs = $row['obs']."";
				$valoracrescimo = $row['valoracrescimo']."";
				$id=$row['id_controle'];
			
			}
			
			default:
		}
		
		// Insere os dados em variaveis
		
		if(isset($_POST['enviarFicha'])){
			$idcontrole=$_POST['idcontrole'];
			$loja=$_POST['loja'];
			$montador['montador'];
			$idcliente=$_SESSION['id_cliente'];
			$produtos=$_POST['idproduto'];
			$assist=$_POST['asst'];
			$vlassist= $_POST['vlassist'];
			$acrescimo = $_POST['acrescimo'];
			$_SESSION['pedido_loja']=$pedido;
			$entrega=$_POST['entrega'];
			$_SESSION['dataentrega_loja']=$entrega;
			$entrega=date("Y-m-d",strtotime(str_replace('-','/',$entrega)));
			$assistencia=$_POST['assistencia'];
			$_SESSION['datamontagem_loja']=$assistencia;
			$assistencia=date("Y-m-d",strtotime(str_replace('-','/',$assistencia)));

			moveisassistencia($conn,$conexao,$idcontrole,$idcliente,$loja,$montador,$produtos,$assist,$entrega,$assistencia,$acrescimo,$vlassist);	
		}
		?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 margin-top">
			<div class="panel panel-success">
				<div class="panel-heading">Ficha de Moveis</div>
					<div class="panel-body">
					<form action="" method="post">
						<fieldset>
							<legend>Dados do cliente </legend>
								
								<p><strong>ID Montagem:</strong><?php echo"<input type='text' name='idcontrole' value='$id' readonly='readonly'>";?> <strong>ID AssistÃªncias:</strong><?php echo"<input type='text' name='idcontrole' value='$assist' readonly='readonly'>";?><strong>Loja:</strong> <?php echo "<input type='text' name='loja' value='$loja' readonly='readonly'>";?></p>
								<p><strong>ID Cliente:</strong><?php echo $_SESSION['id_cliente'];?>&nbsp; 
								<strong>CPF:</strong><?php echo $_SESSION['cpf']?> </p>
								<p><strong>Nome completo:</strong> <?php echo $_SESSION['nome']; echo $_SESSION['sobrenome'];?></p>
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

						<fieldset>
							<legend>DescriÃ§Ã£o do Pedido</legend>
					
							<div class="form-group">
								<div class="form-inline" class="col-md-2">
									<input  type="text" value="<?php echo $desc[0];?>" name="produto" id="produto" readonly="readonly" class="form-control">
									<input  type="text" value="<?php echo $cor[0];?>" name="cod_cor" id="cod_cor" readonly="readonly" class="form-control">	
									<input name="idproduto[]" value= "<?php echo $idprodutoanterior[0];?>" type="checkbox" onchange="assist1();">	
									<input size="50" type="text" value ="<?php echo$obs[0];?>" name="asst[]" class="form-control" style="text-transform:uppercase;">
								</div>
	
								<div class="form-inline" class="col-md-2">
									<input type="text" value="<?php echo $desc[1];?>"name="produto2" id="produto2" class="form-control" readonly="readonly">
									<input type="text" value="<?php echo $cor[1];?>" name="cod_cor2" id="cod_cor2" class="form-control"readonly="readonly">
									<input name="idproduto[]" value= "<?php echo $idprodutoanterior[1];?>" type="checkbox" onchange="assist2();">
									<input size="50" type="text" value ="<?php echo $obs[1];?>" name="asst[]" class="form-control" style="text-transform:uppercase;">
									
								</div>

								<div class="form-inline" class="col-md-2">
									<input type="text" value="<?php echo $desc[2];?>"name="produto3" id="produto3" class="form-control" readonly="readonly">
									<input type="text" value="<?php echo $cor[2];?>" name="cod_cor3" id="cod_cor3" class="form-control" readonly="readonly">
									<input name="idproduto[]" value= "<?php echo $idprodutoanterior[2];?>" type="checkbox" onchange="assist3();">
									<input size="50" type="text" value ="<?php echo $obs[2];?>" name="asst[]" class="form-control" style="text-transform:uppercase;">
								</div>

								<div class="form-inline" class="col-md-2">
									<input type="text" value="<?php echo $desc[3]; ?>" name="produto4" id="produto4" class="form-control" readonly="readonly">
									<input type="text" value="<?php echo $cor[3];?>" name="cod_cor4" id="cod_cor4" class="form-control" readonly="readonly">
									<input name="idproduto[]" value= "<?php echo $idprodutoanterior[3];?>" type="checkbox" onchange="assist4();">
									<input size="50" type="text" value ="<?php echo $obs[3];?>" name="asst[]" class="form-control" style="text-transform:uppercase;">
								</div>
							</div>
								<div class="form-inline">
								<label>Montador(*)</label>

									<select name="montador" class="form-control">
										<option value=""></option>
									<?php
									// consulta ao banco e resulta
										$sql= mysqli_query($conn,"select * from montadores order by nome_montador");
										while ($resp = mysqli_fetch_assoc($sql)) {		
										echo '<option value="'.$resp['id-montador'].'">'.$resp['nome_montador'].'</option>';
											}
									?></select>
								</div>
								<div class="form-inline">
								<label>Valor de AssistÃªncia</label>
									<select class="form-control" name="vlassist">
										<option value="15.00">15,00</option>
										<option value="20.00">20,00</option>
									</select>
								</div>
								<div class="form-inline">
									<label>Acrescimo</label> 
									<select list="porcent" name="acrescimo"class=	"form-control">
										<option value="0.00">0%</option>
										<option value="0.15">15%</option>
										<option value="0.30">30%</option>
									</select>	
								</div>
								<div class="form-inline">
									<label>Data de Montagem</label>
									<input type="text" name="entrega" class="form-control" value='<?php echo $dataentrega;?>' readonly="readonly">
								</div>
								<div class="form-inline">
									<label>PrevisÃ£o de AssistÃªncia </label>
									<input type="text" id="datepicker2" name="assistencia" class="form-control">
								</div>
									<input type="submit" name="enviarFicha" value="Criar" class="btn btn-success"/>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>