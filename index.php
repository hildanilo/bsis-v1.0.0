<!doctype html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>bsis</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-xs-6 col-md-4"></div>
<div class="col-md-4 margin-top">
	<div class="panel panel-default">
    <div class="panel-heading">Login</div>
    	<div class="panel-body">
    	<form method="post" action="in/login.php">
          	<div class="form-group">
            	<label for="exampleInputEmail1">Login</label>
            	<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Login" name="login">
          	</div>
          	<div class="form-group">
            	<label for="exampleInputPassword1">Senha</label>
            	<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="senha">
          	</div>
            <div class="form-group">
    			<a href="esqueci-senha.php" style="color:#1B9425"><label>Esqueci minha senha</label></a>
  			</div>
          <input type="submit"  value="Acessar" class="btn btn-default">
        </form>
        </div>
    </div>
</div>
</div>
</div>

</body>
</html>