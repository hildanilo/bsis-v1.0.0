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
		<div class="col-md-12 margin-top">
			<div class="panel panel-success">
				<div class="panel-heading">Cadastrar</div>
					<div class="panel-body">
						<form action= "" method="post">
							<div class="form-group">
								<fieldset><legend>Dados Pessoais</legend>
									<div class="form-inline" class="col-xs-12">
										<label>Nome</label>
											<input type="text" name="nome"size='20' maxlength="20" placeholder="Nome" style="text-transform:uppercase;" class="form-control">
										<label>Sobrenome</label>
											<input type="text" name="sobrenome"size='50' maxlength="50" placeholder="Sobrenome" style="text-transform:uppercase;" class="form-control">
										<label>Cargo</label>
											<select name="cargo" id="cargo" class="form-control">
												<option value="GERENTE">Gerente(a)</option>
												<option value="SUPERVISOR">Supervisor(a)</option>
												<option value="CAIXA">Caixa(a)</option>
												<option value="VENDEDOR">Vendedor(a)</option>
											</select>
							
										<label>Estado Civil</label>
											<select name="estadoc" id="estadoc" class="form-control">
												<option value="SOLTEIRO">Solteiro(a)</option>
												<option value="FEMININO">Casado(a)</option>
												<option value="FEMININO">Divorciado(a)</option>
											</select>
									</div>
							</div>
							<div class="form-group">
								<div class="form-inline" class="col-xs-12">
									<label>Sexo</label>
										<select name="sexo" id="sexo" class="form-control">
											<option value="MASCULINO">Masculino</option>
											<option value="FEMININO">Feminino</option>
										</select>
									<label>Endereço</label>
										<input type="text" name="endereco"size='20' maxlength="20" placeholder="Nome" style="text-transform:uppercase;" class="form-control">
									<label>Numero</label>
										<input type="text" name="numero"size='8' maxlength="8" placeholder="Nome" style="text-transform:uppercase;" class="form-control">
									<label>Complemento</label>
										<input type="text" name="complementoi"size='20' maxlength="20" placeholder="Complemento" style="text-transform:uppercase;" class="form-control">
									<label>Bairro</label>
										<input type="text" name="bairro"size='20' maxlength="20" placeholder="Bairro" style="text-transform:uppercase;" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="form-inline" class="col-xs-12">
									<label>CEP</label>
										<input type="text" name="cep"size='9' maxlength="9" placeholder="CEP" style="text-transform:uppercase;" class="form-control">
								
									<label>Telefone</label>
										<input type="text" name="telefone"size='15' maxlength="15" placeholder="Telefone" style="text-transform:uppercase;"class="form-control">
									<label>Celular</label>
										<input type="text" name="celular"size='16' maxlength="16" placeholder="Celular" style="text-transform:uppercase;"class="form-control">
									<label>Estado</label>
										<select class="form-control">
											<option value=""></option>
										</select>
									<label>Cidade</label>
										<select class="form-control">
											<option value="ENSINO FUNDAMENTAL">Ensino fundamental</option>
											<option value="ENSINO MEDIO">Ensino Medio</option>
											<option value="UNIVERSITARIO">Universitario</option>
										</select>
								
									<labeL>Escolaridade</label>
										<select class="form-control">
											<option value="ENSINO FUNDAMENTAL">Ensino fundamental</option>
											<option value="ENSINO MEDIO">Ensino Medio</option>
											<option value="UNIVERSITARIO">Universitario</option>
										</select>
							</fieldset>
								</div>
							</div>
							
								<fieldset>
									<legend>Documentos</legend>
							<div class="form-group">
								<div class="form-inline" class="col-xs-12">
										<label>CPF</label>
											<input type="text" name="cpf"size='14' maxlength="14" placeholder="CPF"value='' onkeypress='return SomenteNumero(event)' OnKeyPress="formatar('###.###.###-##', this)"class="form-control">
										<label>Data de Nascimento</label> 	
											<input type="date" name="datanasc"class="form-control">
										<label>RG</label>
											<input type="text" name="rg"size='14' maxlength="14" placeholder="RG"value='' onkeypress='return SomenteNumero(event)' OnKeyPress="formatar('###.###.###-##', this)"class="form-control">
										<label>Data e Emissão/label>
											<input type="date" name="datarg"size='14'value=''class="form-control">
										<label>Estado Emissor</label>
											<select class="form-control">
												<option value=""></option>
											</select>
								</div>
							</div>
							<div class="form-group">
								<div class="form-inline" class="col-xs-12">
										<label>Carteira Prossional</label>
											<input type="text" name="ctps"size='14' maxlength="14" placeholder="CPF"value='' onkeypress='return SomenteNumero(event)' OnKeyPress="formatar('###.###.###-##', this)"class="form-control">
										<label>Data de Emissão</label>
											<input type="date" name="datactps"class="form-control">
										<label>Estado Emissor</label>
										
											<select class="form-control">
												<option value=""></option>
											</select>
										<label>PIS</label>
											<input type="text" name="pis"size='14' maxlength="14" placeholder="PIS"value='' onkeypress='return SomenteNumero(event)' OnKeyPress="formatar('###.###.###-##', this)"class="form-control">
								</div>
							</div>
								</fieldset>
								<fieldset>
							<div class="form-group">
								<div class="form-inline" class="col-xs-12">
									<legend>Dados de Contratação</legend>
										<label>Empresa Registrado</label>
											<select class="form-control">
												<option value=""></option>
											</select>
										<label>Data de Admissão</label>
											<input type="date" name="dataad"size='14'value=''class="form-control">
										<label>Salario</label>
											<input type="text" name="valor"size='20' maxlength="20" placeholder="Preço" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)"class="form-control">
								</div>
							</div>
							<div class="form-group">
								<div class="form-inline" class="col-xs-12">
										<label>Data de Demissão</label>
											<input type="date" name="datadm"size='14'value=''class="form-control">
										*Atenção prencher esse campo torna o cadastro um arquivo morto.
								</div>
							</div>	
								</fieldset>
								<fieldset>
							
							<div class="form-group">
								<div class="form-inline" class="col-xs-12">
									<legend>Vale Transporte</legend>
										<label>Tipo</label>
											<select class="form-control">
												<option value="ONIBUS">Onibus</option>
												<option value="METRO">Metro</option>
												<option value="TREM">Trem</option>
												<option value="INTERMUNICIPAL">Intermunicipal</option>
											</select>
											
										<label>Valor</label>
											<input type="text" name="valor"size='20' maxlength="20" placeholder="Preço" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)"class="form-control">
								</div>
							</div>
								</fieldset>
								<fieldset>
							<div class="form-group">
								<div class="form-inline" class="col-xs-12">
									<legend>Acesso ao sistema</legend>
										<Label>Login</label>
											<input type="text" name="login"size='30'maxlength="30" placeholder="login"class="form-control">
										<label>Senha</label>
											<input type="password" name="senha"size='20'maxlength="20" placeholder="Senha"class="form-control">
										<label>Email</label>
											<input type="password" name="senha2"size='20'maxlength="20" placeholder="Senha"class="form-control">
										<label>Tipo de Usuario</label>
											<select name="usuario" class="form-control">
												<option value="Master">Master</option>
												<option value="Administrativo">Administrativo</option>
												<option value="Operador">Operador</option>
												<option value="Gerente">Gerente</option>
											</select>
								</div>
							</div>			
								</fieldset>
								<input type='submit'id='botao' name='botaoo' value='Salvar'/ class="form-control">
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>