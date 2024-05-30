<?php
ob_start();
session_start();

?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
	<title>bsis</title>
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1, minimun-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-2.2.2.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  
<script>
</script>
 
</head>
<body>
<?php
        include"in/header.php";	
	?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12 margin-top">
			<div class="panel panel-success">
				<div class="panel-heading">Cadastrar</div>
					<div class="panel-body">
						<form action= "" method="post">
							<div class="form-group">
								<legend>Auditoria de Loja</legend>
								<label>Loja</label>
									<select>
									<?php
									$query="SELECT cod-loja,loja FROM lojas";
									$result=$conexao->prepare($query);
									$result->execute();
									while($all_user = $result->fetch(PDO::FETCH_ASSOC)){
										$cod=$all_user[''];
										$loja=$all_user[''];
									
									echo"<option value='$cod''>$loja</option>";
									
									}
									?>
									</select>
									
								<label>Loja precisa e alguma manutenção no predio<label>
									
									<input name='st[]'value= '$numero'id='input-1' type='checkbox' >Sim<input type="text">
									<input name='st[]'value= '$numero'id='input-1' type='checkbox' >Não
									
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
