<?php
include "in/conecta.inc";
session_start();
?>

<?php
$caixa= $_POST['caixa'];
$datade=$_POST['datade'];
#muda o padrão de data é indespensavel para o mysql ler os dados
$datade= date("Y-m-d",strtotime(str_replace('/','-',$datade)));
$dataate=$_POST['dataate'];
#muda o padrão de data é indespensavel para o mysql ler os dados
$dataate= date("Y-m-d",strtotime(str_replace('/','-',$dataate)));

$x=mysqli_query($conn,"SELECT COUNT(caixa) FROM clientes WHERE caixa = '$caixa' AND datadecadastro BETWEEN '$datade' AND '$dataate'");
$resp=mysqli_fetch_row($x);
	$c=$resp[0];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>bsis</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
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
<div class="col-md-8 margin-top">
<div class="col-md-4 margin-top">
<div class="panel panel-success">
<div class="panel-heading">Consultas</div>
<div class="panel-body">
<?php	
echo "$caixa fez $c cadastros";
?>
</div>
</div>
</div>
</div>
</body>
</html>				
