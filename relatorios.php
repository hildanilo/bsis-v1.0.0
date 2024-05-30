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
  $( function() {
    $( "#datepicker3" ).datepicker({dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terè¡§,'Quarta','Quinta','Sexta','Sâ£¡do'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sâ¢§,'Dom'],
    monthNames: ['Janeiro','Fevereiro','Marè¯§,'Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Pró¸©­o',
    prevText: 'Anterior'});
  } );
  </script>
  <script>
  $( function() {
    $( "#datepicker4" ).datepicker({dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terè¡§,'Quarta','Quinta','Sexta','Sâ£¡do'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sâ¢§,'Dom'],
    monthNames: ['Janeiro','Fevereiro','Marè¯§,'Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Pró¸©­o',
    prevText: 'Anterior'});
  } );
  </script>
  
</head>
<body>

<?php
        include"in/header.php";	
	?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 margin-top">
			<div class="panel panel-success">
				<div class="panel-heading">Relatorio de produtos</div>
				<div class="panel-body">
					<form action= "" method="post">
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
								<input name="" id="datepicker" class="form-control"/>
								<label>AtÃ©</label>
								<input name="" id="datepicker2" class="form-control"/>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="Enviar" value="Criar" class="btn btn-success"/>
						</div>
					</form>
				</div>
			</div>
			<div class="panel panel-success">
				<div class="panel-heading">Graficos</div>
				<div class="panel-body">
					<form action= "" method="post">
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
								<label>Tipo</label>
								<select name="tipo" class="form-control">
									<option value=""></option>
									<option value="montagens_assist_charts">Pizza Montagens e AssistÃªncia</option>
								</select>
								<label>De</label>
								<input name="" id="datepicker3" class="form-control"/>
								<label>AtÃ©</label>
								<input name="" id="datepicker4" class="form-control"/>
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