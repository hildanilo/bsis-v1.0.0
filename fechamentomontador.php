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
</head>
<body>

<?php
        include"in/header.php";	
	?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 margin-top">
			<div class="panel panel-success">
				<div class="panel-heading">Pagamento Montagem</div>
				<div class="panel-body">
					<form action= "fechamentoconsulta" method="post">
						<div class="form-group">
							<div class="form-inline" class="col-xs-12">	
								<label>Loja</label>
								<select name="lojamontar"  class="form-control">
									<option value=""></option>
									<?php
									// consulta ao banco e resulta
									$sql= mysqli_query($conn,"select loja from lojas order by loja");
									while ($resp = mysqli_fetch_assoc($sql)) {	
										$rep['loja'];
										echo '<option value="'.$resp['loja'].'">'.$resp['loja'].'</option>';
									}
									?>
								</select>
								<label>Montador</label>
								<select name="montador" class="form-control">
									<option value=""></option>
									<?php
									// consulta ao banco e resulta
									$s= mysqli_query($conn,"select * from montadores order by nome_montador");
									while ($r = mysqli_fetch_assoc($s)) {
										$r['id-montador'];
										utf8_encode($r['none_montador']);
										echo '<option value="'.$r['id-montador'].'">'.$r['nome_montador'].'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="Enviar" value="Criar" class="btn btn-success"/>
						</div>
					</form>
				</div>
			</div>
			<div class="panel panel-success">
				<div class="panel-heading">Pagamento Assistência</div>
				<div class="panel-body">
					<form action= "fechamentoassist" method="post">
						<div class="form-group">
							<div class="form-inline" class="col-xs-12">	
								<label>Loja</label>
								<select name="lojamontar"  class="form-control">
									<option value=""></option>
									<?php
									// consulta ao banco e resulta
									$sql= mysqli_query($conn,"select loja from lojas order by loja");
									while ($resp = mysqli_fetch_assoc($sql)) {	
										$rep['loja'];
										echo '<option value="'.$resp['loja'].'">'.$resp['loja'].'</option>';
									}
									?>
								</select>
								<label>Montador</label>
								<select name="mont" class="form-control">
									<option value=""></option>
									<?php
									// consulta ao banco e resulta
									$s= mysqli_query($conn,"select * from montadores order by nome_montador");
									while ($r = mysqli_fetch_assoc($s)) {
										$r['id-montador'];
										$r['none_montador'];
										echo '<option value="'.$r['id-montador'].'">'.$r['nome_montador'].'</option>';
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="Enviar" value="Criar" class="btn btn-success"/>
						</div>
					</form>
			</div>
		</div>
		<div class="panel panel-success">
				<div class="panel-heading">Consulta de fechamentos</div>
				<div class="panel-body">
					<form action= "fechamentopago" method="post">
						<div class="form-group">
							<div class="form-inline" class="col-xs-12">	
								<label>Loja</label>
								<select name="lojamontar"  class="form-control">
									<option value=""></option>
									<?php
									// consulta ao banco e resulta
									$sql= mysqli_query($conn,"select loja from lojas order by loja");
									while ($resp = mysqli_fetch_assoc($sql)) {	
										$rep['loja'];
										echo '<option value="'.$resp['loja'].'">'.$resp['loja'].'</option>';
									}
									?>
								</select>
								<label>De</label>
								<input name="de" name= "" class="form-control">
								<label>Até</label>
								<input name="ate" name= "" class="form-control">
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="Enviar" value="Criar" class="btn btn-success"/>
						</div>
					</form>
					</div>
				</div>
	</div>
</div>
</body>
</html>