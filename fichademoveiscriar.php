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
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
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
  
    <title>Bsis</title>

<script>
/* fun��o de formata��o do formulario */
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
		include "in/conecta.inc";
		$cpf=$_POST['cpf'];
		$data = date("d/m/Y");

		//selecionando dados da tabela
		$sql=mysqli_query($conn,"select id_cliente,cpf,nome,endereco,numero,complemento,cep,bairro,cidade,estado,telefone,celular,email from clientes where cpf='$cpf'");
		// transforma os dados em string onde possa ser lido
		$row=mysqli_fetch_array($sql);
		if($row){
		$_SESSION['id_cliente']=$row['id_cliente'];
		$_SESSION['cpf']=$row['cpf']."";
		$_SESSION['nome']=$row['nome']."";
		$_SESSION['endereco']=$row['endereco']."";
		$_SESSION['numero']=$row['numero']."";
		$_SESSION['complemento']=$row['complemento']."";
		$_SESSION['cep']=$row['cep']."";
		$_SESSION['bairro']=$row['bairro']."";
		$_SESSION['cidade']=$row['cidade']."";
		$_SESSION['estado']=$row['estado']."";
		$_SESSION['telefone']=$row['telefone']."";
		$_SESSION['celular']=$row['celular']."";
		$_SESSION['email']=$row['email']."";
	
}
		if(isset($_POST['enviarFicha'])){
			$idcliente=$_SESSION['id_cliente'];
			$loja=$_POST['loja'];
			$montador = $_POST['montador'];
			$quant[0]=$_POST['quant'];
			$quant[1]=$_POST['quant2'];
			$quant[2]=$_POST['quant3'];
			$quant[3]=$_POST['quant4'];
			$produtos[0]=$_POST['cod_cor'];
			$produtos[1]=$_POST['cod_cor2'];
			$produtos[2]=$_POST['cod_cor3'];
			$produtos[3]=$_POST['cod_cor4'];
			$acrescimo=$_POST['acrescimo'];
			$pedido=$_POST['pedido'];
			$_SESSION['pedido_loja']=$pedido;
			$entrega=$_POST['entrega'];
			$_SESSION['dataentrega_loja']=$entrega;
			$entrega=date("Y-m-d",strtotime(str_replace('/','-',$entrega)));
			$montagem=$_POST['montagem'];
			$_SESSION['datamontagem_loja']=$montagem;
			$montagem=date("Y-m-d",strtotime(str_replace('/','-',$montagem)));
			$tsmg=$_POST['tsmg'];
			$tsmg=strtoupper($tsmg);
			$_SESSION['obs']=$tsmg;
			moveiscriar($conn,$conexao,$idcliente,$loja,$quant,$produtos,$acrescimo,$montador,$pedido,$entrega,$montagem,$tsmg);
		}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 margin-top">
			<div class="panel panel-success">
				<div class="panel-heading">Ficha de Moveis</div>
					<div class="panel-body">
					<fieldset>
							<legend>Dados do cliente </legend>
								<div id= "nficha">Número Montagem:</div>
								<div>ID:<?php echo $_SESSION['id_cliente']?> 
								CPF:<?php echo $_SESSION['cpf']?> </div>
								<p><strong>Nome completo:</strong> <?php echo $_SESSION['nome'];?></p>
								<p><strong>Endereço:</strong> <?php echo $_SESSION['endereco']?>
								<strong>N:</strong> <?php echo $_SESSION['numero']?><br>
								<strong>Complento:</strong><?php  echo $_SESSION['complemento'] ?></p>
								<p><strong>CEP:</strong><?php echo $_SESSION['cep']?><br>
								<p><strong>Bairro:</strong> <?php echo $_SESSION['bairro']?><br>
								<strong>Cidade:</strong>  <?php echo $_SESSION['cidade'] ?><br>
								<strong>Estado:</strong> <?php  echo $_SESSION['estado']?></p>
								<p><strong>Tel:</strong> <?php echo $_SESSION['telefone'] ?><br>
								<strong>Cel:</strong> <?php  echo $_SESSION['celular']?></p>
								<p><strong>E-mail:</strong> <?php echo $_SESSION['email'] ?></p>
						</fieldset>	
					<fieldset>
						<legend>Descrição do Pedido</legend>
						<form action="" method="post">
							<label>Quantidade</label>
							<label>Produto</label>
							<div class="form-group">
								<div class="form-inline" class="col-md-2">
									<input type="text" size="2" maxlength="2"name="quant" placeholder="Quant." onkeypress="return maskKeyPress(event)" class="form-control"/>
									<select name="produto" id="produto" class="form-control">
										<option value=""></option>
										<?php
											// consulta ao banco e resulta
											$sql= mysqli_query($conn,"select DISTINCT descricao from produtos  order by descricao");
											while ($resp = mysqli_fetch_assoc($sql)) {	
													utf8_encode($rep['descricao']);
													echo '<option value="'.$resp['descricao'].'">'.$resp['descricao'].'</option>';
											}
										?>
									</select>
									<select name="cod_cor" id="cod_cor" class="form-control">
										<option value="">-- Escolha uma cor --</option>		
										<script type="text/javascript">
											// execu��o jquery e ajax para resultado de cores de acordo com produto selecionado
										$(function(){
											$('#produto').change(function(){
												if( $(this).val() ) {
													$('#cod_cor').hide();
													$('.carregando').show();
													$.getJSON('consultarcor.php?search=',{produto: $(this).val(), ajax: 'true'}, function(j){
														var options = '<option value=""></option>';	
														for (var i = 0; i < j.length; i++) {
															options += '<option value="' + j[i].idproduto + '">' + j[i].cor + '</option>';
														}	
														$('#cod_cor').html(options).show();
														$('.carregando').hide();
													});
													} else {
														$('#cod_cor').html('<option value="">-- Escolha um estado --</option>');
													}
											});
										});
										</script>
									</select>
								</div>
								<div class="form-inline" class="col-md-2">
									<input type="text" size="2" maxlength="2"name="quant2" placeholder="Quant." onkeypress="return maskKeyPress(event)" class="form-control"/>
									<select name="produto2" id="produto2" class="form-control">
										<option value=""></option>
									<?php
										// consulta ao banco e resulta
										$sql= mysqli_query($conn,"select DISTINCT descricao from produtos  order by descricao");
										while ($resp = mysqli_fetch_assoc($sql)) {	
											utf8_encode($rep['descricao']);
											echo '<option value="'.$resp['descricao'].'">'.$resp['descricao'].'</option>';
										}
									?>
									</select>
									<select name="cod_cor2" id="cod_cor2" class="form-control">
										<option value="">-- Escolha uma cor --</option>	
										<script type="text/javascript">
											// execu��o jquery e ajax para resultado de cores de acordo com produto selecionado
											$(function(){
												$('#produto2').change(function(){
													if( $(this).val() ) {
														$('#cod_cor2').hide();
														$('.carregando').show();
														$.getJSON('consultarcor2.php?search=',{produto2: $(this).val(), ajax: 'true'}, function(j){
														var options = '<option value=""></option>';	
														for (var i = 0; i < j.length; i++) {
															options += '<option value="' + j[i].idprodutoo + '">' + j[i].coro + '</option>';
														}	
														$('#cod_cor2').html(options).show();
														$('.carregando').hide();
														});
														} else {
															$('#cod_cor2').html('<option value="">-- Escolha um estado --</option>');
														}
												});
											});
									</script>
									</select>
								</div>
								<div class="form-inline" class="col-md-2">
									<input type="text" size="2" maxlength="2" name="quant3" placeholder="Quant." onkeypress="return maskKeyPress(event)" class="form-control"/>
									<select name="produto3" id="produto3" class="form-control">
										<option value=""></option>
									<?php
											// consulta ao banco e resulta
										$sql= mysqli_query($conn,"select DISTINCT descricao from produtos  order by descricao");
										while ($resp = mysqli_fetch_assoc($sql)) {	
											utf8_encode($rep['descricao']);
											echo '<option value="'.$resp['descricao'].'">'.$resp['descricao'].'</option>';
										}
									?>
									</select>
									<select name="cod_cor3" id="cod_cor3" class="form-control">
										<option value="">-- Escolha uma cor --</option>		
										<script type="text/javascript">
											// execu��o jquery e ajax para resultado de cores de acordo com produto selecionado
											$(function(){
												$('#produto3').change(function(){
													if( $(this).val() ) {
														$('#cod_cor3').hide();
														$('.carregando').show();
														$.getJSON('consultarcor3.php?search=',{produto3: $(this).val(), ajax: 'true'}, function(j){
														var options = '<option value=""></option>';	
														for (var i = 0; i < j.length; i++) {
															options += '<option value="' + j[i].idprodut + '">' + j[i].cr + '</option>';
														}	
														$('#cod_cor3').html(options).show();
														$('.carregando').hide();
														});
													} else {
														$('#cod_cor3').html('<option value="">-- Escolha um estado --</option>');
													}
													});
											});
										</script>
									</select>
								</div>
								<div class="form-inline" class="col-md-2">
									<input type="text" size="2" maxlength="2"name="quant4" placeholder="Quant." onkeypress="return maskKeyPress(event)" class="form-control"/>
									<select name="produto4" id="produto4" class="form-control">
										<option value=""></option>
									<?php
											// consulta ao banco e resulta
											$sql= mysqli_query($conn,"select DISTINCT descricao from produtos  order by descricao");
											while ($resp = mysqli_fetch_assoc($sql)) {	
													$rep['descricao'];
													echo '<option value="'.$resp['descricao'].'">'.$resp['descricao'].'</option>';
											}
									?>
									</select>
									<select name="cod_cor4" id="cod_cor4" class="form-control">
										<option value="">-- Escolha uma cor --</option>
										<script type="text/javascript">
												// execu��o jquery e ajax para resultado de cores de acordo com produto selecionado
											$(function(){
												$('#produto4').change(function(){
													if( $(this).val() ) {
														$('#cod_cor4').hide();
														$('.carregando').show();
														$.getJSON('consultarcor4.php?search=',{produto4: $(this).val(), ajax: 'true'}, function(j){
														var options = '<option value=""></option>';	
															for (var i = 0; i < j.length; i++) {
																options += '<option value="' + j[i].idprdut + '">' + j[i].ccr + '</option>';
															}	
															$('#cod_cor4').html(options).show();
															$('.carregando').hide();
														});
													} else {
													$('#cod_cor4').html('<option value="">-- Escolha um estado --</option>');35
													}
												});
											});
										</script>
									</select>
								</div>
							</div>
							<div class="form-inline">
								<label>Codigo Pedido</label>
									<input type="text" required="required" name="pedido"  size="9" maxlength="9" placeholder="numeros"class="form-control"//>
							</div>
							<div class="form-inline">
									<label>Acrescimo</label> 
								<select list="porcent"  required="required" name="acrescimo"class="form-control">
									<option value="0.00">0%</option>
									<option value="0.15">15%</option>
									<option value="0.30">30%</option>
								</select>	
							</div>
							<div class="form-inline">
								<label>Loja(*)</label>

									<select name="loja"   class="form-control">
										<option value=""></option>
									<?php
									// consulta ao banco e resulta
										$sql= mysqli_query($conn,"select loja from lojas order by loja");
										while ($resp = mysqli_fetch_assoc($sql)) {	
											utf8_encode($rep['loja']);
										echo '<option value="'.$resp['loja'].'">'.$resp['loja'].'</option>';
											}
									?></select>
							</div>
							
							<div class="form-inline">
								<label>Montador(*)</label>

									<select name="montador" class="form-control" required="required">
									<?php
									// consulta ao banco e resulta
										$sql= mysqli_query($conn,"select * from montadores order by nome_montador");
										while ($resp = mysqli_fetch_assoc($sql)) {		
										echo '<option value="'.$resp['id-montador'].'">'.$resp['nome_montador'].'</option>';
											}
									?></select>
							</div>
							<div class="form-inline" class="col-md-2">
							<label>Data de entrega</label>
								<input type="text"  id="datepicker"name="entrega" class="form-control" value="<?php echo $data;?>">
							<label>Previsão de Montagem</label>
								<input type="text" id="datepicker2" name="montagem" class="form-control" value="<?php echo $data;?>">
							</div>
							<label>Observações:</label>
								<textarea name="tsmg" id="cmsg" cols="60" rows="5" placeholder="Escreva aqui observações gerais sobre Montagem"  style="text-transform:uppercase;"class="form-control"></textarea>
								<div id="aviso"><p>(*)Campo obrigatorio</p></div>
								<input type="submit" name="enviarFicha" value="Salvar" class="btn btn-success"/>
						</form>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>