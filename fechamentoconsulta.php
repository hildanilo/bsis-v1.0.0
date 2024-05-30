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

	<meta charset="UTF-8"/>
	<title>bsis</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1, minimun-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script>
	$(':checkbox').checkboxpicker();
	</script>
	<script>
								$('#input-1').checkboxpicker({
								html: true,
								offLabel: '<span class='glyphicon glyphicon-remove'>',
								onLabel: '<span class='glyphicon glyphicon-ok'>'
									});
								</script>
</head>
<body>

<?php
        include "in/header.php";
	$loja = $_POST['lojamontar'];
	$montador= $_POST['montador'];
?>	
	
<?php
	if(isset($_POST['enviarFrech'])){					
		$fech = $_POST['st'];
		$lojal = $_POST['loja'];
		$montadorr = $_POST['montadorr'];
		$data_atual = date("Y-m-d");
		$_SESSION['data_atual']=$data_atual;
					
		fechamentoGravar($conn,$conexao,$lojal,$montadorr,$fech,$data_atual);
	}
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 margin-top">
			<div class="panel panel-success">
				<div class="panel-heading">Pagamento Montador</div>
				<div class="panel-body">
					<form action="" method="post">
						<input type="" name="loja" value="<?php echo $loja?>">
						<input type="" name="montadorr" value="<?php echo $montador?>">
						<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" class="table table-hover">
						
							<thead>
								<tr>
									<th>NUMERO</th>
									<th>CLIENTE</th>
									<th>VALOR</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							<?php
								switch($loja){
									
									case 'Guarulhos 1':
									$x=mysqli_query($conn,"SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_guarulhos1`.`id_controle`,`ficha_de_moveis_guarulhos1`.`valor-total-controle` FROM `ficha_de_moveis_guarulhos1` join `clientes` on `id_cliente` = `id-cliente`  WHERE status ='CONCLUIDO' ");
									while($resp=mysqli_fetch_array($x)){
										$numero=$resp['id_controle'];
										$cliente=$resp['nome'];
										$valor=$resp['valor-total-controle'];
										echo 
										"<tr>
											<td> $numero </td>
											<td> $cliente</td>
											<td> $valor </td>
											<td>
											<input name='st[]'value= '$numero'id='input-1' type='checkbox' >
											</td>
										</tr>";
									}
									break;
									
									case 'Guarulhos 2':
									$x=mysqli_query($conn,"SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_guarulhos2`.`id_controle`,`ficha_de_moveis_guarulhos2`.`valor-total-controle` FROM `ficha_de_moveis_guarulhos2` join `clientes` on `id_cliente` = `id-cliente`  WHERE status ='CONCLUIDO' ");
									while($resp=mysqli_fetch_array($x)){
										$numero=$resp['id_controle'];
										$cliente=$resp['nome'];
										$valor=$resp['valor-total-controle'];
										echo 
										"<tr>
											<td> $numero </td>
											<td> $cliente</td>
											<td> $valor </td>
											<td>
											<input name='st[]'value= '$numero'id='input-1' type='checkbox' >
											</td>
										</tr>";
									}
									break;
									
									case 'Sao Bernardo':
									
									$x=mysqli_query($conn,"SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_sao_bernardo`.`id_controle`,`ficha_de_moveis_sao_bernardo`.`valor-total-controle` FROM `ficha_de_moveis_sao_bernardo` join `clientes` on `id_cliente` = `id-cliente`  WHERE `status` ='CONCLUIDO' AND `id-montador` ='$montador'");
									while($resp=mysqli_fetch_array($x)){
										$numero=$resp['id_controle'];
										$cliente=$resp['nome'];
										$valor=$resp['valor-total-controle'];
										echo 
										"<tr>
											<td> $numero </td>
											<td> $cliente</td>
											<td> $valor </td>
											<td>
											<input name='st[]'value= '$numero'id='input-1' type='checkbox' >
											</td>
										</tr>";
									}
									break;
									
									case 'Santo Andre':
									
									$x=mysqli_query($conn,"SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_santo_andre`.`id_controle`,`ficha_de_moveis_santo_andre`.`valor-total-controle` FROM `ficha_de_moveis_santo_andre` join `clientes` on `id_cliente` = `id-cliente`  WHERE `status` ='CONCLUIDO' AND `id-montador` ='$montador'");
									while($resp=mysqli_fetch_array($x)){
										$numero=$resp['id_controle'];
										$cliente=$resp['nome'];
										$valor=$resp['valor-total-controle'];
										echo 
										"<tr>
											<td> $numero </td>
											<td> $cliente</td>
											<td> $valor </td>
											<td>
											<input name='st[]'value= '$numero'id='input-1' type='checkbox' >
											</td>
										</tr>";
									}
									break;
									
									case 'Maua':
									
									$x=mysqli_query($conn,"SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_maua`.`id_controle`,`ficha_de_moveis_maua`.`valor-total-controle` FROM `ficha_de_moveis_maua` join `clientes` on `id_cliente` = `id-cliente`  WHERE `status` ='CONCLUIDO' AND `id-montador` ='$montador'");
									while($resp=mysqli_fetch_array($x)){
										$numero=$resp['id_controle'];
										$cliente=$resp['nome'];
										$valor=$resp['valor-total-controle'];
										echo 
										"<tr>
											<td> $numero </td>
											<td> $cliente</td>
											<td> $valor </td>
											<td>
											<input name='st[]'value= '$numero'id='input-1' type='checkbox' >
											</td>
										</tr>";
									}
									break;
								
									case 'Penha':
								
									$x=mysqli_query($conn,"SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_penha`.`id_controle`,`ficha_de_moveis_sao_bernardo`.`valor-total-controle` FROM `ficha_de_moveis_sao_bernardo` join `clientes` on `id_cliente` = `id-cliente`  WHERE status ='CONCLUIDO' AND id-montador ='$montador' ");
									while($resp=mysqli_fetch_array($x)){
										$numero=$resp['id_controle'];
										$cliente=$resp['nome'];
										
										$valor=$resp['valor-total-controle'];
										echo 
										"<tr>
											<td> $numero </td>
											<td> $cliente</td>
											<td> $valor </td>
											<td>
											<input name='st[]'value= '$numero'id='input-1' type='checkbox' >
											</td>
										</tr>";
									}
									break;
									
									default:
								}
								
							?>
							</tbody>
						</table>
						<input type="submit" name="enviarFrech" value="Criar" class="btn btn-success">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>	
</body>
</html>