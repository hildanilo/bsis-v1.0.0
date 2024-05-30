<?php
include "in/conecta.inc";
session_start();
$nivel='1';
	if($_SESSION['nivel']<>$nivel){
		header("Location: home.php"); exit; // Redireciona o visitante
		}
	
	$controle= $_GET["controle"];
	$_SESSION['n']=$controle;
	$nome= $_GET["nome"];
	$loja= $_GET["loja"];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
<!--Boostrap
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/1.12.4jquery.min.js"></script>
  <script src="js/3.3.7bootstrap.min.js"></script>-->
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
<!--jqueri-->  
  <link rel="stylesheet" href="css/1.12.0jquery-ui.css">
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/1.12.0jquery-ui.js"></script>
 <!--folha de estilo auxiliar-->   
  <script type="text/javascript" src="js/estilo.js"></script>
  
<!--Tabela responsive com boostrap e jquery-->   
  <link rel="stylesheet" type="text/css" href="css/dataTables.bootstrap.min.css">
  <script src="js/jquery-1.12.3.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap.min.js"></script>
  
	
    <title>Bsis</title>
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
?>
<script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
  </script>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 margin-top">
			<div class="panel panel-success">
				<div class="panel-heading">Ficha de Moveis</div>
					<div class="panel-body">
					<form action= "" method="post">
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" class="table table-hover">
							<thead>
								<tr>			
									<td>Controle</td>
									<td>Pedido</td>
									<td>Loja</td>
									<td>Clientes</td>
									<td>Data Maxima de Montagem</td>
									<td>Status</td>
									<td></td>
								</tr>
						
							</thead>
							<tbody>
								
								<?php
								if($controle){
									switch($loja) {

										case 'Guarulhos 1':
										$query =("SELECT DISTINCT `clientes`.`nome`, `ficha_de_moveis_guarulhos1`.`id_controle` ,`ficha_de_moveis_guarulhos1`.`id_pedido` `ficha_de_moveis_guarulhos1`.`valor-total-controle`,`ficha_de_moveis_guarulhos1`.`datamontagem`,`ficha_de_moveis_guarulhos1`.`status` from `clientes` join `ficha_de_moveis_guarulhos1`  on   `clientes`.`id_cliente` = `ficha_de_moveis_guarulhos1`.`id-cliente` where `ficha_de_moveis_guarulhos1`.id_controle = '$controle'");
											$sql=mysqli_query($conn,$query);
											while($row= mysqli_fetch_array($sql)){
												$numero= $row['id_controle'];
												$pedido= $row['id_pedido'];
												$cliente= $row['nome'];
												$data= $row['datamontagem'];
												$data= date("d-m-Y",strtotime(str_replace('/','-',$data)));
												$status = $row['status'];
												echo"
													<tr>
													<td>$numero</td>
													<td>$loja</td>
													<td>$cliente</td>
													<td>$data</td>
													<td>$status</td>
													</tr>";
											}
										break;
										case 'Sao Bernardo':
										$query =("SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_sao_bernardo`.`id_controle` ,`ficha_de_moveis_sao_bernardo`.`id_pedido` `ficha_de_moveis_sao_bernardo`.`valor-total-controle`,`ficha_de_moveis_sao_bernardo`.`datamontagem`,`ficha_de_moveis_sao_bernardo`.`status` from `clientes` join `ficha_de_moveis_sao_bernardo`  on   `clientes`.`id_cliente` = `ficha_de_moveis_sao_bernardo`.`id-cliente` where `ficha_de_moveis_sao_bernardo`.id_controle = '$controle'");
											$sql=mysqli_query($conn,$query);
											while($row= mysqli_fetch_array($sql)){
												$numero= $row['id_controle'];
												$pedido= $row['id_pedido'];
												$cliente= $row['nome'];
												$data= $row['datamontagem'];
												$data= date("d-m-Y",strtotime(str_replace('/','-',$data)));
												$status = $row['status'];
												echo"
													<tr>
													<td>$numero</td>
													<td>$loja</td>
													<td>$cliente</td>
													<td>$data</td>
													<td>$status</td>
													</tr>";
											}
										break;
									}
								}
								elseif($loja){
									switch($loja){
								
										case 'Guarulhos 1':

											$query="SELECT DISTINCT `clientes`.`nome`, `ficha_de_moveis_guarulhos1`.`id_controle` , `ficha_de_moveis_guarulhos1`.`valor-total-controle`,`ficha_de_moveis_guarulhos1`.`datamontagem`, `ficha_de_moveis_guarulhos1`.`status` from `clientes` join `ficha_de_moveis_guarulhos1` on `clientes`.`id_cliente` = `ficha_de_moveis_guarulhos1`.`id-cliente`";
											$sql=mysqli_query($conn,$query);
											while($row= mysqli_fetch_array($sql)){
												$numero = $row['id_controle'];
												$cliente = $row['nome'];
												$data = $row['datamontagem'];
												$data = date("d-m-Y",strtotime(str_replace('/','-',$data)));
												$status = $row['status'];
												
												echo"	
													<tr>
													<td>$numero</td>
													<td>$loja</td>
													<td>$cliente</td>
													<td>$data</td>
													<td>$status</td>
													</tr>";
											}
										break;
										case 'Sao Bernardo':

											$query="SELECT DISTINCT`clientes`.`nome`, `ficha_de_moveis_sao_bernardo`.`id_controle` ,`ficha_de_moveis_sao_bernardo`.`id_pedido`, `ficha_de_moveis_sao_bernardo`.`valor-total-controle`,`ficha_de_moveis_sao_bernardo`.`datamontagem`,`ficha_de_moveis_sao_bernardo`.`status` from `clientes` join `ficha_de_moveis_sao_bernardo` on `clientes`.`id_cliente` = `ficha_de_moveis_sao_bernardo`.`id-cliente`WHERE  `ficha_de_moveis_sao_bernardo`.`status`= 'EXECUTANDO' or `ficha_de_moveis_sao_bernardo`.`status`= 'APROVADO' or`ficha_de_moveis_sao_bernardo`.`status`= 'CONCLUIDO' ";
											$sql=mysqli_query($conn,$query);
											while($row= mysqli_fetch_array($sql)){
												$numero = $row['id_controle'];
												$pedido = $row['id_pedido'];
												$cliente = $row['nome'];
												$data = $row['datamontagem'];
												$data = date("d-m-Y",strtotime(str_replace('/','-',$data)));
												$status = $row['status'];
												
												echo"	
													<tr>
													<td>$numero</td>
													<td>$pedido</td>
													<td>$loja</td>
													<td>$cliente</td>
													<td>$data</td>
													<td>$status</td>
													</tr>";
											}
										break;
										
										case 'Guarulhos 1':

											$query="SELECT DISTINCT `clientes`.`nome`, `ficha_de_moveis_guarulhos1`.`id_controle` , `ficha_de_moveis_guarulhos1`.`valor-total-controle`,`ficha_de_moveis_guarulhos1`.`datamontagem`, `ficha_de_moveis_guarulhos1`.`status` from `clientes` join `ficha_de_moveis_guarulhos1` on `clientes`.`id_cliente` = `ficha_de_moveis_guarulhos1`.`id-cliente`";
											$sql=mysqli_query($conn,$query);
											while($row= mysqli_fetch_array($sql)){
												$numero = $row['id_controle'];
												$cliente = $row['nome'];
												$data = $row['datamontagem'];
												$data = date("d-m-Y",strtotime(str_replace('/','-',$data)));
												$status = $row['status'];
												
												echo"	
													<tr>
													<td>$numero</td>
													<td>$loja</td>
													<td>$cliente</td>
													<td>$data</td>
													<td>$status</td>
													</tr>";
											}
										break;
										
										case 'Maua':

											$query="SELECT DISTINCT`clientes`.`nome`, `ficha_de_moveis_maua`.`id_controle` ,`ficha_de_moveis_maua`.`id_pedido`, `ficha_de_moveis_maua`.`valor-total-controle`,`ficha_de_moveis_maua`.`datamontagem`,`ficha_de_moveis_maua`.`status` from `clientes` join `ficha_de_moveis_maua` on `clientes`.`id_cliente` = `ficha_de_moveis_maua`.`id-cliente`WHERE  `ficha_de_moveis_maua`.`status`= 'EXECUTANDO' or `ficha_de_moveis_maua`.`status`= 'APROVADO' or`ficha_de_moveis_maua`.`status`= 'CONCLUIDO' ";
											$sql=mysqli_query($conn,$query);
											while($row= mysqli_fetch_array($sql)){
												$numero = $row['id_controle'];
												$pedido = $row['id_pedido'];
												$cliente = $row['nome'];
												$data = $row['datamontagem'];
												$data = date("d-m-Y",strtotime(str_replace('/','-',$data)));
												$status = $row['status'];
												
												echo"	
													<tr>
													<td>$numero</td>
													<td>$pedido</td>
													<td>$loja</td>
													<td>$cliente</td>
													<td>$data</td>
													<td>$status</td>
													</tr>";
											}
										break;
										
										case 'Penha':

											$query="SELECT DISTINCT`clientes`.`nome`, `ficha_de_moveis_penha`.`id_controle` ,`ficha_de_moveis_penha`.`id_pedido`, `ficha_de_moveis_penha`.`valor-total-controle`,`ficha_de_moveis_penha`.`datamontagem`,`ficha_de_moveis_penha`.`status` from `clientes` join `ficha_de_moveis_penha` on `clientes`.`id_cliente` = `ficha_de_moveis_penha`.`id-cliente`WHERE  `ficha_de_moveis_penha`.`status`= 'EXECUTANDO' or `ficha_de_moveis_penha`.`status`= 'APROVADO' or`ficha_de_moveis_penha`.`status`= 'CONCLUIDO' ";
											$sql=mysqli_query($conn,$query);
											while($row= mysqli_fetch_array($sql)){
												$numero = $row['id_controle'];
												$pedido = $row['id_pedido'];
												$cliente = $row['nome'];
												$data = $row['datamontagem'];
												$data = date("d-m-Y",strtotime(str_replace('/','-',$data)));
												$status = $row['status'];
												
												echo"	
													<tr>
													<td>$numero</td>
													<td>$pedido</td>
													<td>$loja</td>
													<td>$cliente</td>
													<td>$data</td>
													<td>$status</td>
													</tr>";
											}
										break;
									}
									
								}
								elseif($nome){
									$sql= mysqli_query($coon,"select id_cliente from clientes where nome = $nome%'");
									$row= mysqli_fetch_array($sql);
									$idcliente[]=$row['id_cliente'];
									
									switch($loja){
										case 'Guarulhos 1':
											$query =("SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_guarulhos1`.`id_controle` , `ficha_de_moveis_guarulhos1`.`valor-total-controle`,`ficha_de_moveis_guarulhos1`.`datamontagem`, `ficha_de_moveis_guarulhos1`.`status` from `clientes` join `ficha_de_moveis_guarulhos1` on `clientes`.`id_cliente` = `ficha_de_moveis_guarulhos1`.`id-cliente` WHERE `ficha_de_moveis_guarulhos1`.`id-cliente` ");
											$sql=mysqli_query($conn,$query);
											while($row= mysqli_fetch_array($sql)){
												$numero= $row['id_controle'];
												$cliente= $row['nome'];
												$valor= $row['valor-total-controle'];
												$data= $row['datamontagem'];
												$data= date("d-m-Y",strtotime(str_replace('/','-',$data)));
												$status = $row['status'];
												echo"	
													<tr>
													<form action= '' method='post'>
													<td><input type='text' name='numero' value='$numero' readonly='readonly' size='5'></td>
													<td>$loja</td>
													<td>$cliente</td>
													<td>$valor</td>
													<td>$data</td>
													<td>
													<select class='form-control' name='statusm'>
													<option value ='$status'>$status</option>
													<option value=''>----------</option>
													<option value='APROVADO'>APROVADO</option>
													<option value='EXECUTANDO'>EXECUTANDO</option>
													<option value='CONCLUIDO'>CONCLUIDO</option>
													<option value='CANCELADO'>CANCELADO</option>
													</select></td>
													<td>
													<button type='submit' name='md' class='btn btn-primary'><i class='glyphicon glyphicon-ok'></i>&ensp;Montar</button>
													</form>
													<a class='btn btn-default btn-sm' href='fichademoveiseditar.php?codigo=$numero&loja=$loja'><span class='glyphicon glyphicon-pencil'></span></a>
													</td>
													</tr>
													";
												}
										break;
										case 'Sao Bernardo':

											$query="SELECT DISTINCT`clientes`.`nome`,`ficha_de_moveis_sao_bernardo`.`id_controle` , `ficha_de_moveis_sao_bernardo`.`valor-total-controle`,`ficha_de_moveis_sao_bernardo`.`datamontagem`,`ficha_de_moveis_sao_bernardo`.`status` from `clientes` join `ficha_de_moveis_sao_bernardo` on `clientes`.`id_cliente` = `ficha_de_moveis_sao_bernardo`.`id-cliente`";
											$sql=mysqli_query($conn,$query);
											while($row= mysqli_fetch_array($sql)){
												$numero= $row['id_controle'];
												$cliente= $row['nome'];
												$valor= $row['valor-total-controle'];
												$data= $row['datamontagem'];
												$data= date("d-m-Y",strtotime(str_replace('/','-',$data)));
												$status = $row['status'];
												echo"	
													<tr>
													<form action= '' method='post'>
													<td><input type='text' name='numero' value='$numero' readonly='readonly' size='5'></td>
													<td>$loja</td>
													<td>$cliente</td>
													<td>$valor</td>
													<td>$data</td>
													<td>
													<select class='form-control' name='statusm'>
													<option value ='$status'>$status</option>
													<option value=''>----------</option>
													<option value='APROVADO'>APROVADO</option>
													<option value='EXECUTANDO'>EXECUTANDO</option>
													<option value='CONCLUIDO'>CONCLUIDO</option>
													<option value='CANCELADO'>CANCELADO</option>
													</select></td>
													<td>
													<button type='submit' name='md' class='btn btn-primary'><i class='glyphicon glyphicon-ok'></i>&ensp;Montar</button>
													</form>
													<a class='btn btn-default btn-sm' href='fichademoveiseditar.php?codigo=$numero&loja=$loja'><span class='glyphicon glyphicon-pencil'></span></a>
													</td>
													</tr>
													";
											}
										break;
									}
								}
								?>
								
							</tbody>
						</table>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>