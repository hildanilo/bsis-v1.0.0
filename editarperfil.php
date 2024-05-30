<?php
include "in/conecta.inc";
session_start();
?>
<html lang="pt-br">
<!DOCTYPE html>

<html lang="pt-br">
<head>
	<meta charset="UTF-8"/>
	<title>bsis</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
        include"in/header.php";	
	?>
<div class="container-fluid">
<div class="row">
<div class="col-md-8 margin-top">
	<div class="panel panel-success">
    <div class="panel-heading">Cadastrar</div>
    	<div class="panel-body">
      	<form action= "alterarperfil" method="post">
        	<div class="form-group">
            <label>Senha atual</label>
            <input type="password"  name="atual" required="required" placeholder="Senha Atual" class="form-control">
          <label>Nova senha</label>
          <input type="password" name="nova" required="required" placeholder="Nova senha" class="form-control"/>
          </div> 
			<div class="form-group">
			<input type="submit" name="enviarCad" value="Cadastar" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
</div>
</div>
</div>
</body>
</html>