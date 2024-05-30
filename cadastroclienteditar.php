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
  <script src="//code.jquery.com/jquery-2.2.2.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
  
  <script>
	$(document).ready(function() {

            function limpa_formul�rio_cep() {
                // Limpa valores do formul�rio de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova vari�vel "cep" somente com d�gitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Express�o regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...")
                        $("#bairro").val("...")
                        $("#cidade").val("...")
                        $("#uf").val("...")
                        $("#ibge").val("...")

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado n�o foi encontrado.
                                limpa_formul�rio_cep();
                                alert("CEP n�o encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep � inv�lido.
                        limpa_formul�rio_cep();
                        alert("Formato de CEP inv�lido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formul�rio.
                    limpa_formul�rio_cep();
                }
            });
        });
	
  $( function() {
    $( "#datepicker" ).datepicker({dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Ter�a','Quarta','Quinta','Sexta','S�bado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','S�b','Dom'],
    monthNames: ['Janeiro','Fevereiro','Mar�o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Pr�ximo',
    prevText: 'Anterior'});
  } );
  </script>
  <script>
  $( function() {
    $( "#datepicker2" ).datepicker({dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Ter�a','Quarta','Quinta','Sexta','S�bado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','S�b','Dom'],
    monthNames: ['Janeiro','Fevereiro','Mar�o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Pr�ximo',
     prevText: 'Anterior'});
  } );
</script>
<script>
  $( function() {
    $( "#datepicker3" ).datepicker({dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Ter�a','Quarta','Quinta','Sexta','S�bado'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','S�b','Dom'],
    monthNames: ['Janeiro','Fevereiro','Mar�o','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Pr�ximo',
     prevText: 'Anterior'});
  } );
  </script>
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
	?>
<div class="container-fluid">
<div class="row">
<div class="col-md-12 margin-top">
	<div class="panel panel-success">
    <div class="panel-heading">Cadastrar</div>
    	<div class="panel-body">
        <?php
		
		$cod= $_GET['codigo'];
		$query="SELECT * FROM clientes WHERE id_cliente=:cod";
		$result=$conexao->prepare($query);
		$result->bindParam(':cod',$cod,PDO::PARAM_STR);
		$result->execute();
		$all = $result->fetch(PDO::FETCH_ASSOC);
			$idcliente= $all['id_cliente'];
			$cpf= $all['cpf'];
			$nome= $all['nome'];
			$nome=strtoupper($nome);
			$endereco= $all['endereco'];
			$endereco=strtoupper($endereco);
			$numero= $all['numero'];
			$complemento= $all['complemento'];
			$complemento=strtoupper($complemento);
			$cep= $all['cep'];
			$bairro= $all['bairro'];
			$bairro=strtoupper($bairro);
			$cidt= $all['cidade'];
			$cidt=strtoupper($cidade);
			$estado= $all['estado'];
			$estado=strtoupper($estado);
			$telefone= $all['telefone'];
			$celular= $all['celular'];
			$email= $all['email'];
			$filho1= $all['filhonome1'];
			$filho1=strtoupper($filho1);
			$datafilho1= $all['datafilhonome1'];
			#muda o padr�o de data � indespensavel para o mysql ler os dados
			$datafilho1= date("d-m-Y",strtotime(str_replace('/','-',$datafilho1)));
			$filho2= $all['filhonome2'];
			$filho2=strtoupper($filho2);
			$datafilho2= $all['datafilhonome2'];
			#muda o padr�o de data � indespensavel para o mysql ler os dados
			$datafilho2= date("d-m-Y",strtotime(str_replace('/','-',$datafilho2)));
			$filho3= $all['filhonome3'];
			$filho3=strtoupper($filho3);
			$datafilho3= $all['datafilhonome2'];
			#muda o padr�o de data � indespensavel para o mysql ler os dados
			$datafilho3= date("d-m-Y",strtotime(str_replace('/','-',$datafilho3)));
		
		
		
        if(isset($_POST['editarCard'])){
			$idclient=$idcliente;
            $cpf=$_POST['cpf'];
			$nome=$_POST['nome'];
			$nome=strtoupper($nome);
			$endereco=$_POST['endereco'];
			$endereco=strtoupper($endereco);
			$numero=$_POST['n'];
			$complemento=$_POST['complemento'];
			$complemento=strtoupper($complemento);
			$cep=$_POST['cep'];
			$bairro=$_POST['bairro'];
			$bairro=strtoupper($bairro);
			$cidade=$_POST['cidade'];
			$cidade=strtoupper($cidade);
			$estado=$_POST['estado'];
			$estado=strtoupper($estado);
			$telefone=$_POST['telefone'];
			$celular=$_POST['celular'];
			$email=$_POST['email'];
			$caixa=$_SESSION['usuario'];
			$caixa=strtoupper($caixa);
			$filho1=$_POST['filho1'];
			$filho1=strtoupper($filho1);
			$datafilho1=$_POST['datafilho1'];
			#muda o padr�o de data � indespensavel para o mysql ler os dados
			$datafilho1= date("Y-m-d",strtotime(str_replace('/','-',$datafilho1)));
			$filho2=$_POST['filho2'];
			$filho2=strtoupper($filho2);
			$datafilho2=$_POST['datafilho2'];
			#muda o padr�o de data � indespensavel para o mysql ler os dados
			$datafilho2= date("Y-m-d",strtotime(str_replace('/','-',$datafilho2)));
			$filho3=$_POST['filho3'];
			$filho3=strtoupper($filho3);
			$datafilho3=$_POST['datafilho3'];
			#muda o padr�o de data � indespensavel para o mysql ler os dados
			$datafilho3= date("Y-m-d",strtotime(str_replace('/','-',$datafilho3)));
            cadastroclienteeditar($conexao,$idclient,$cpf,$nome,$endereco,$numero,$complemento,$cep,$bairro,$cidade,$estado,$telefone,$celular,$email,$caixa,$filho1,$datafilho1,$filho2,$datafilho2,$filho3,$datafilho3);
            }
		?>
      	<form action= "" method="post">
        	<div class="form-group">
            <div class="form-inline" class="col-xs-12">
            <label>CPF</label>
            <input type="text" name="cpf"size='14' maxlength="14" required="required" placeholder="CPF" value='<?php echo $cpf;?>'  OnKeyPress="formatar('###.###.###-##', this)" style="text-transform:uppercase;" class="form-control">
            <label>Nome Completo</label>
            <input type="text" name="nome"size='50' required="required" maxlength="" placeholder="Nome" style="text-transform:uppercase;" value='<?php echo $nome;?>' class="form-control">
            </div>
            </div>
            <div class="form-group">
            <div class="form-inline" class="col-xs-4">
            <label>Endere�o</label>
            <input type="text" name="endereco"size='80' required="required"maxlength="80" placeholder="Rua, Av., Alameda ..etc" style="text-transform:uppercase;" value='<?php echo $endereco;?>' class="form-control"/>
            <label>N</label>
            <input type="text" name="n"size='6'maxlength="6" required="required" placeholder="N" value='<?php echo $numero;?>'class="form-control">
            <label>Complemento</label>
            <input  type="text" name="complemento"size='20'maxlength="20" placeholder="Apt., Bloco " style="text-transform:uppercase;" value='<?php echo $complemento;?>'class="form-control">
          </div>
          </div>
          <div class="form-group">
          <div class="form-inline">
            <label>CEP</label>
            <input type="text"  name="cep"size='9' maxlength="9" required="required" placeholder="CEP" OnKeyPress="formatar('#####-###', this)" value='<?php echo $cep;?>' class="form-control">
          <label>Bairro</label>
          <input type="text" name="bairro"size='20' required="required" maxlength="20" placeholder="Bairro" style="text-transform:uppercase;"  value='<?php echo $bairro;?>'class="form-control">
          <label>Cidade</label>
          <select name="cidade" class="form-control">
		  <option value="<?php echo $cidt;?>"><?php echo $cidt;?></option>
		  <option>----------</option>
			<?php
				$query="SELECT nome FROM cidades WHERE cod_estados='26'";
				$result=$conexao->prepare($query);
				$result->execute();
				while($all_user = $result->fetch(PDO::FETCH_ASSOC)){
				$cid= $all_user['nome'];
				
				echo "<option value='$cid'>$cid</option>";
				}
			?>
		  </select>
          <label>Estado</label>
          <select name="estado" class="form-control">
          <option value="SP">SP</option>
          </select>
          </div>
          </div>
          <div class="form-group">
          <div class="form-inline">
          <label>Telefone</label>
          <input type="text" required="required" name="telefone"size="12" maxlength="12" placeholder="##-####-####"  OnKeyPress="formatar('##-####-####', this)" value='<?php echo $telefone;?>' class="form-control">
          <label>Celular</label>
          <input type="text"  required="required" name="celular"size="13" maxlength="13" placeholder="##-#####-####" OnKeyPress="formatar('##-#####-####', this)" value='<?php echo $celular;?>' class="form-control">
          <label>Email</label>
          <input type="email" name="email"placeholder="E-mail" style="text-transform:uppercase;" value='<?php echo $email;?>'class="form-control"/>
          </div>
          </div>
		<div class="form-group">
		<div class="container">
		<button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Filhos</button>
  <div id="demo" class="collapse" >
  <div class="form-group">
 	<div class="form-inline">
  		<label>Filho</label>
  		<input type="text" name="filho1"size='50' maxlength="50" placeholder="Nome Completo" style="text-transform:uppercase;" value='<?php echo $filho1;?>' class="form-control"/>
  		<label>Data de Nascimento ou previsto</label>
  		<input type="text" name="datafilho1"id="datepicker" value='<?php echo $datafilho1;?>' class="form-control">
  	</div>
    </div>
    <div class="form-group">
  	<div class="form-inline">
  		<label>Filho</label>
  		<input type="text" name="filho2"size='50' maxlength="50" placeholder="Nome Completo" style="text-transform:uppercase;" value='<?php echo $filho1;?>' class="form-control"/>
  		<label>Data de Nascimento ou previsto</label>
  		<input type="text" name="datafilho2" id="datepicker2" value='<?php echo $datafilho2;?>' class="form-control">
  	</div>
    </div>
  	<div class="form-inline">
  		<label>Filho</label>
  		<input type="text" name="filho3"size='50' maxlength="50" placeholder="Nome Completo" style="text-transform:uppercase;"  value='<?php echo $filho1;?>' class="form-control"/>
  		<label>Data de Nascimento ou previsto</label>
  		<input type="text" name="datafilho3" id="datepicker3" value='<?php echo $datafilho3;?>' class="form-control">
  	</div>
 </div>
</div>
</div>
		<div class="form-group">
		<input type="submit" name="editarCard" value="Editar" class="btn btn-success">
        </div>
        </form>
      </div>
    </div>
</div>
</div>
</div>
</body>
</html>