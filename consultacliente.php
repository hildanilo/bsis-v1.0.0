<?php
include "in/conecta.inc";
session_start();
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
</head>
<body>
<?php
        include"in/header.php";	
	?>
<div class="container-fluid">
<div class="row">
<div class="col-md-8 margin-top">
	<div class="panel panel-success">
    <div class="panel-heading">Consultas</div>
    	<div class="panel-body">
      	<form action= "consultaclientedb.php" method="post">
        	<div class="form-inline">
            <label>Caixa</label>
            <select name="caixa" class="form-control"/>
			<?php
			$id=$_SESSION['loja'];
			if($id==="1"){
				$sql= mysqli_query($conn,"select nome from usuarios order by nome");
				while ($resp = mysqli_fetch_array($sql)) {
		 
		 		$group=$resp['nome'];
		
        		echo "<option value='$group'>$group</option>";
				
			}
			}
			else{
				$sql= mysqli_query($conn,"select nome from usuarios Where id_loja='$id' order by nome");
				while ($resp = mysqli_fetch_array($sql)) {
		 
		 		$group=$resp['nome'];
		
        		echo "<option value='$group'>$group</option>";
    		}
			}
			
			$data= date("d","m","Y");
			?>
            </select>
            <label>De</label>
            <input type="text" id="datepicker" class="form-control"name="datade" value="<?php echo$data;?>">
            <label>Até</label>
            <input type="text" id="datepicker2" class="form-control"name="dataate" value="<?php echo $data;?>">
			<div class="form-group">
			<input type="submit"  value="Consultar" class="btn btn-success">
          </div>
        </form>
      </div>
    </div>
</div>
</div>
</div>
</body>
</html>