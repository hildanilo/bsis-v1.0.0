<?php
include"in/conecta.inc";
include "in/conexao.php";
include "in/function.php";
if (empty($_SESSION['usuario'])) {
	header("Location: index"); exit;
}
?>

 <nav class="navbar navbar-inverse navbar-static-top">
	<div class="container-fluid">
	
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target="#mainNavBar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href ="home" class="navbar-brand"><img src="imagens/baixinhologo.png" style="width: 110px; height: 31px;></img></a>
		</div>
		<div class ="collapse navbar-collapse" id ="mainNavBar">
		<?php if($_SESSION['nivel'] == 1){ ?>
        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Moveis<span class="caret"></span></a>
            	<ul class="dropdown-menu">
            		<li><a href="fichademoveis">Criar</a></li>
					<li><a href="fichaconsulta">Consulta</a></li>
            		<li><a href="fechamentomontador" target="_blank">Fechamento</a></li>
					<li><a href="relatorios">Relatorios</a></li>
            	</ul>
            </li>
        </ul>
		<?php }?>
		<ul class = "nav navbar-nav navbar-left">
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastro<b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a href="cliente">Cliente</a></li>
				<?php if($_SESSION['nivel'] == 1){ ?>
				<li><a href="produtos">Produtos</a></li>
				<?php } ?>
			</ul>
			</li>
		</ul>
		<?php if($_SESSION['nivel'] == 1){ ?>
        <ul class="nav navbar-nav navbar-left">
            <li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Recursos Humanos<span class="caret"></span></a>
            	<ul class="dropdown-menu">
            		<li><a href="usuarios">Criar Cadastro</a></li>
					<li><a href="usuarios">Ocorrencias</a></li>
            	</ul>
            </li>
        </ul>
		<?php }?>
		<ul class = "nav navbar-nav navbar-left">
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Consulta<span class="caret"></span></a>
			<ul class="dropdown-menu">
				<li><a href="fichademoveisconsultaloja">Andamento Montagem</a></li>
				<li><a href="consultacliente">Total Clientes</a></li>
			</ul>
			</li>
		</ul>
		<ul class = "nav navbar-nav navbar-left">
			<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Auditoria<span class="caret"></span></a>
			<ul class="dropdown-menu">
			<?php if($_SESSION['nivel'] == 1){ ?>
				<li><a href="#">Loja</a></li>
			<?php } ?>
			</ul>
			</li>
		</ul>
		<ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
				<a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['usuario'] ?> <span class="caret"></span></a>
					<ul class="dropdown-menu">
            		<li><a href="editarperfil">Editar</a></li>
            		<li><a href="logout">Sair</a></li>
            	</ul>
            </li>
        </ul>
		</div>
	</div>
 </nav>