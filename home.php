<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1, minimun-scale=1">
	<meta http-equiv="refresh" content="30">
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
	<script>
  $(document).ready(function() {
    $('#ex').DataTable();
} );
</script>
	<title>Bsis</title>
</head>
<body>
	<?php
        include"in/header.php";
	?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 margin-top">
			<div class="panel panel-success">
				<div class="panel-heading">Montagens Atrasadas</div>
					<div class="panel-body">
						<table id="ex" class="table table-striped table-bordered" cellspacing="0" width="100%" class="table table-hover">
							<thead>
								<tr>
									<th>NUMERO</th>
									<th>LOJA</th>
									<th>CLIENTE</th>
									<th>DATA VENCIDA</th>
								</tr>
							</thead>
						<tbody>
							<?php
							$x=mysqli_query($conn,"SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_sao_bernardo`.`id_controle`,`ficha_de_moveis_sao_bernardo`.`datamontagem` FROM `ficha_de_moveis_sao_bernardo` join `clientes` on `id_cliente` = `id-cliente` WHERE  `status` !=  'CONCLUIDO' AND  `status` !=  'PAGO' AND `status` != 'CANCELADO' AND  `datamontagem` < CURDATE( )");
									while($resp= mysqli_fetch_array($x)){
										$numero=$resp['id_controle'];
										$cliente=$resp['nome'];
										$cliente = utf8_encode($cliente); 
										$data=$resp['datamontagem'];
										echo 
										"
										<tr>
											<td>$numero</td>
											<td>São Bernardo</td>
											<td>$cliente</td>
											<td>$data</td>
										</tr>
										";
									}
							$c=mysqli_query($conn,"SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_santo_andre`.`id_controle`,`ficha_de_moveis_santo_andre`.`datamontagem` FROM `ficha_de_moveis_santo_andre` join `clientes` on `id_cliente` = `id-cliente` WHERE  `status` !=  'CONCLUIDO' AND  `status` !=  'PAGO' AND `status` != 'CANCELADO' AND  `datamontagem` < CURDATE( )");
								while($respt= mysqli_fetch_array($c)){
										$numero=$respt['id_controle'];
										$cliente=$respt['nome'];
										$data=$respt['datamontagem'];
										echo 
										"
										<tr>
											<td>$numero</td>
											<td>Santo Andre</td>
											<td>$cliente</td>
											<td>$data</td>
										</tr>
										";
									}
							$b=mysqli_query($conn,"SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_maua`.`id_controle`,`ficha_de_moveis_maua`.`datamontagem` FROM `ficha_de_moveis_maua` join `clientes` on `id_cliente` = `id-cliente` WHERE  `status` !=  'CONCLUIDO' AND  `status` !=  'PAGO' AND `status` != 'CANCELADO' AND  `datamontagem` < CURDATE( )");
								while($rest= mysqli_fetch_array($b)){
										$numero=$rest['id_controle'];
										$cliente=$rest['nome'];
										$data=$rest['datamontagem'];
										echo 
										"
										<tr>
											<td>$numero</td>
											<td>Maua</td>
											<td>$cliente</td>
											<td>$data</td>
										</tr>
										";
									}
							$m=mysqli_query($conn,"SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_guarulhos1`.`id_controle`,`ficha_de_moveis_guarulhos1`.`datamontagem` FROM `ficha_de_moveis_guarulhos1` join `clientes` on `id_cliente` = `id-cliente` WHERE  `status` !=  'CONCLUIDO' AND  `status` !=  'PAGO' AND `status` != 'CANCELADO' AND  `datamontagem` < CURDATE( )");
								while($res= mysqli_fetch_array($m)){
										$numero=$res['id_controle'];
										$cliente=$res['nome'];
										$data=$res['datamontagem'];
										echo 
										"
										<tr>
											<td>$numero</td>
											<td>Guarulhos 1</td>
											<td>$cliente</td>
											<td>$data</td>
										</tr>
										";
									}
							$n=mysqli_query($conn,"SELECT DISTINCT `clientes`.`nome`,`ficha_de_moveis_guarulhos2`.`id_controle`,`ficha_de_moveis_guarulhos2`.`datamontagem` FROM `ficha_de_moveis_guarulhos2` join `clientes` on `id_cliente` = `id-cliente` WHERE  `status` !=  'CONCLUIDO' AND  `status` !=  'PAGO' AND `status` != 'CANCELADO' AND  `datamontagem` < CURDATE( )");
								while($resttp= mysqli_fetch_array($n)){
										$numero=$resttp['id_controle'];
										$cliente=$resttp['nome'];
										$data=$resttp['datamontagem'];
										echo 
										"
										<tr>
											<td>$numero</td>
											<td>Guarulhos 2</td>
											<td>$cliente</td>
											<td>$data</td>
										</tr>
										";
									}		
							
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>