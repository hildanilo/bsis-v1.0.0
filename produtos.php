<?php
ob_start();
session_start();

?>
<!DOCTYPE html>

<html lang="pt-br">
<head>
	<title>bsis</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0,maximum-scale=1, minimun-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
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
    $('#ex').DataTable();
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
    <div class="panel-heading">Produtos</div>
    	<div class="panel-body">
				<a href="cadastroprodutos" class="btn btn-default btn-sm">
				<span class="glyphicon glyphicon-file">Novo
				</span>
				</a>
			<table  id="ex" class="table table-striped table-bordered" cellspacing="0" width="100%" class="table table-hover">
			<thead>
				<tr>
					<th>CODIGO</th>
					<th>DESCRICAO</th>
					<th>MARCA</th>
					<th>MONTAGEM 1</th>
					<th>MONTAGEM 2</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
        <?php
			$query="SELECT * FROM produtos";
			$result=$conexao->prepare($query);
			$result->execute();
			 while($all_user = $result->fetch(PDO::FETCH_ASSOC)){
                      $cod = $all_user['codigo'];
                      $descricao= $all_user['descricao'];
                      $marca = $all_user['marca'];
                      $valorm = $all_user['valormontagem'];
                      $valormt = $all_user['valormontagem_2'];
					  
			echo"
			
				<tr>
					<td>$cod</td>
					<td>$descricao</td>
					<td>$marca</td>
					<td>$valorm</td>
					<td>$valormt</td>
					<td><a class='btn btn-default btn-sm' href='cadastroprodutoseditar.php?codigo=$cod'><span class='glyphicon glyphicon-pencil'></span></a>
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