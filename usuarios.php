<?php
include "in/conecta.inc";
session_start();
$nivel='1';
	if($_SESSION['nivel']<>$nivel){
		header("Location: home.php"); exit; // Redireciona o visitante
		}
?>

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
  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.3.js"></script>
  <script src=" https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable();
} );
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
					<a href="cadastrousuario" class="btn btn-default btn-sm">
					<span class="glyphicon glyphicon-file">Novo</span>
					</a>
					<a href="" class="btn btn-default btn-sm">
					<span class="glyphicon glyphicon-file">Demitidos</span>
					</a>
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%" class="table table-hover">
							<thead>
								<tr>
									<th>ID</th>
									<th>NOME</th>
									<th>LOJA</th>
									<th></th>
								</tr>
							</thead>
								<tbody>
        <?php
			$query="SELECT `usuarios`.`id_usuario`,`usuarios`.`nome`,.`usuarios`.`cargo`,`lojas`.`loja`FROM `lojas` JOIN `usuarios` on `lojas`.`id_loja` = `usuarios`.`id_loja` WHERE `usuarios`.`status`='1'";
			$result=$conexao->prepare($query);
			$result->execute();
			 while($all_user = $result->fetch(PDO::FETCH_ASSOC)){
                      $id = $all_user['id_usuario'];
                      $nome = $all_user['nome'];
                      $loja = $all_user['loja'];
					  
			echo"
			
				<tr>
					<td>$id</td>
					<td>$nome</td>
					<td>$loja</td>
					<td><a class='btn btn-default btn-sm' href='cadastroclienteditar.php?codigo=$id'><span class='glyphicon glyphicon-pencil'></span></a>
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