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
	<link rel="icon" type="image/png" href="imagens/favicon.png">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	
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
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 margin-top">
			<div class="panel panel-success">
			<div class="panel-heading">Moveis</div>
				<div class="panel-body">
					<fieldset><legend>Criar Ficha de moveis</legend>
					<div class="form-group">
						<div class="form-inline" class="col-xs-12">
							<form  action="fichademoveiscriar" method="post">
								<label>CPF</label>
								<input type="text" name="cpf"size='14' maxlength="14" placeholder="CPF"value='' OnKeyPress="formatar('###.###.###-##', this)" class="form-control"/></p>
								<input type="submit"id="botao" name="botaoo" value="Criar" class="btn btn-success"/>
								</form>
					</fieldset>
					
<fieldset><legend>Criar Assistencia de Moveis</legend>
<form action="fichademoveiscriarassitencia.php" method="get">
<div class="form-inline" class="col-xs-4">
<label>Controle</label>
<input type="text" name="controle"size='14' maxlength="14" placeholder="Controle" value='' OnKeyPress="formatar('#############', this)" class="form-control"/></p>
<label>Nome</label>
<input type="text" name="nome"size='14' placeholder="NOME" maxlength="14" class="form-control"/></p>
<label>Loja*</label>
         <select name="loja" id="loja" placeholder="LOJA" class="form-control">
		<option value=""></option>
		<?php
// consulta ao banco e resulta
		$sql= mysqli_query($conn,"select loja from lojas order by loja");
		while ($resp = mysqli_fetch_assoc($sql)) {	
	     	$rep['loja'];
		echo '<option value="'.$resp['loja'].'">'.$resp['loja'].'</option>';
    }
		?></select>
   </p>
</div>
<div id="aviso"><p>(*)Campo obrigatorio</p></div>
<input type="submit"id="botao" name="botaoo" value="Consultar" class="btn btn-success"/>
</form>
</fieldset>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>