<?php
include "conecta.inc";
// Criação da sessão
session_start();

//login de acesso consulta
	$doc=$_POST["login"];
	$senha = sha1(trim(strip_tags($_POST['senha'])));
	$try= mysqli_query($conn,"select * from usuarios where login='$doc' and senha='$senha'");
	$cont=mysqli_num_rows($try);
	$st=mysqli_query($conn,"select * from usuarios where login='$doc'");
	$result=mysqli_fetch_array($st);
	
	$_SESSION['usuario'] = $result['nome'].'';
	$_SESSION['nivel'] = $result['nivel'].'';
	$_SESSION['loja'] = $result['id_loja'].'';
	$_SESSION['cargo'] = $result['cargo'].'';
	$liberado= $result['status'].'';
	if($liberado =="1"){
		if($cont){
	
			header("Location:../home"); exit;
		}
		else{
			header("Location:../index"); exit;
		}
	}
	else{
		header("Location:../index"); exit;
	}
//direcionamento 
	







