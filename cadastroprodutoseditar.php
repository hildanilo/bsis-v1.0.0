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
  
  <script>
        function BlockKeybord()
        {
            if(window.event) // IE
            {
                if((event.keyCode < 48) || (event.keyCode > 57))
                {
                    event.returnValue = false;
                }
            }
            else if(e.which) // Netscape/Firefox/Opera
            {
                if((event.which < 48) || (event.which > 57))
                {
                    event.returnValue = false;
                }
            }


        }

        function troca(str,strsai,strentra)
        {
            while(str.indexOf(strsai)>-1)
            {
                str = str.replace(strsai,strentra);
            }
            return str;
        }

        function FormataMoeda(campo,tammax,teclapres,caracter)
        {
            if(teclapres == null || teclapres == "undefined")
            {
                var tecla = -1;
            }
            else
            {
                var tecla = teclapres.keyCode;
            }

            if(caracter == null || caracter == "undefined")
            {
                caracter = ".";
            }

            vr = campo.value;
            if(caracter != "")
            {
                vr = troca(vr,caracter,"");
            }
            vr = troca(vr,"/","");
            vr = troca(vr,",","");
            vr = troca(vr,".","");

            tam = vr.length;
            if(tecla > 0)
            {
                if(tam < tammax && tecla != 8)
                {
                    tam = vr.length + 1;
                }

                if(tecla == 8)
                {
                    tam = tam - 1;
                }
            }
            if(tecla == -1 || tecla == 8 || tecla >= 48 && tecla <= 57 || tecla >= 96 && tecla <= 105)
            {
                if(tam <= 2)
                {
                    campo.value = vr;
                }
                if((tam > 2) && (tam <= 5))
                {
                    campo.value = vr.substr(0, tam - 2) + '.' + vr.substr(tam - 2, tam);
                }
                if((tam >= 6) && (tam <= 8))
                {
                    campo.value = vr.substr(0, tam - 5) + caracter + vr.substr(tam - 5, 3) + '.' + vr.substr(tam - 2, tam);
                }
                if((tam >= 9) && (tam <= 11))
                {
                    campo.value = vr.substr(0, tam - 8) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + '.' + vr.substr(tam - 2, tam);
                }
                if((tam >= 12) && (tam <= 14))
                {
                    campo.value = vr.substr(0, tam - 11) + caracter + vr.substr(tam - 11, 3) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + '.' + vr.substr(tam - 2, tam);
                }
                if((tam >= 15) && (tam <= 17))
                {
                    campo.value = vr.substr(0, tam - 14) + caracter + vr.substr(tam - 14, 3) + caracter + vr.substr(tam - 11, 3) + caracter + vr.substr(tam - 8, 3) + caracter + vr.substr(tam - 5, 3) + '.' + vr.substr(tam - 2, tam);
                }
            }
        }

        function maskKeyPress(objEvent)
        {
            var iKeyCode;

            if(window.event) // IE
            {
                iKeyCode = objEvent.keyCode;
                if(iKeyCode>=48 && iKeyCode<=57) return true;
                return false;
            }
            else if(e.which) // Netscape/Firefox/Opera
            {
                iKeyCode = objEvent.which;
                if(iKeyCode>=48 && iKeyCode<=57) return true;
                return false;
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
				<?php
				$cod = $_GET["codigo"];
				
			$query="SELECT * FROM produtos WHERE codigo = $cod";
			$result=$conexao->prepare($query);
			$result->execute();
			 while($all_user = $result->fetch(PDO::FETCH_ASSOC)){
                      $cod = $all_user['codigo'];
                      $desc= $all_user['descricao'];
                      $mar = $all_user['marca'];
                      $val = $all_user['valor'];
					  $grup = $all_user['grupo'];
					  $cor= $all_user['cores'];
                      $valt = $all_user['valormontagem'];
					  $valmt = $all_user['valormontagem_2'];
			 }
				if(isset($_POST['editProdutos'])){
				$codigo= $_POST['codigo'];
				$descricao = $_POST['descricao'];
				$cores = $_POST['cor'];
				$grupo = $_POST['grupo'];
				$marca = $_POST['marca'];
				$valor = $_POST['valor'];
				$valorm = $_POST['valorm'];
				$valormt = $_POST['valormt'];
				
				editarProdutos($conexao,$codigo,$descricao,$cores,$grupo,$marca,$valor,$valorm,$valormt);
				}
				?>
				<form action= "" method="post">
					<div class="form-group">
						<div class="form-inline" class="col-xs-12">
							<label>Codigo</label>
							<input type="text" value="<?php echo $cod;?>" name="codigo"size='14' maxlength="14" placeholder="Codigo" style="text-transform:uppercase;" class="form-control">
							<label>Descrição</label>
							<input type="text" value="<?php echo $desc;?>"  name="descricao"size='50' maxlength="50" placeholder="Descrição" style="text-transform:uppercase;" class="form-control">
							<label>Cores</label>
							<input type="text" name="cor" value="<?php echo $cor?>" style="text-transform:uppercase;" class="form-control">
							<label>Grupo</label>
							<select name="grupo" class="form-control">
							<option value="<?php echo $grup?>"><?php echo $grup?></option>
							<option value="">----------</option>
							<?php
							$sql= mysqli_query($conn,"select tipo from grupodeprodutos order by tipo");
							while ($resp = mysqli_fetch_array($sql)) {
		 
							$group=$resp['tipo'];
		
							echo "<option value='$group'>$group</option>";
							}
  
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="form-inline" class="col-xs-12">
							<label>Marca</label>
								<input type="text" value="<?php echo $mar?>"  name="marca"size='20' maxlength="20" placeholder="Marca" style="text-transform:uppercase;" class="form-control"/>
							<label>Preço</label>
								<input type="text" value="<?php echo $val?>"  name="valor"size='20' maxlength="20" placeholder="Preço" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" class="form-control">
									
						</div>
					</div>
					<div class="form-group">
						<div class="form-inline" class="col-xs-12">
							<fieldset>
								<legend>Campos Exclusivos para Moveis</legend>
									<label>Valor de Montagem</label>
									<input type="text"  value="<?php echo $valt?>" name="valorm"size='6'maxlength="6" placeholder="Valor" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" class="form-control"/>
									<label>Valor de Montagem 2</label>
									<input type="text"  value="<?php echo $valmt?>" name="valormt"size='6'maxlength="6" onkeydown="FormataMoeda(this,10,event)" onkeypress="return maskKeyPress(event)" class="form-control"/>
							</fieldset>
						<input type="submit" name="editProdutos" value="Salvar" class="btn btn-success"/>	
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>