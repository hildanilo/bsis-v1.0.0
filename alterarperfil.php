<?php
include "in/conecta.inc";
session_start();
$usuario= $_SESSION['usuario'];
$senha= sha1(trim(strip_tags($_POST["atual"])));
$pass=  sha1(trim(strip_tags($_POST["nova"])));

if($senha!=$pass){
	$s=mysqli_query($conn,"select*from usuarios where nome ='$usuario'");
	}
else{
	echo "Não foi possivel alterar senha";
	}
	
$row=mysqli_fetch_array($s);
$senhaatual=$row['senha'];
if($senha=$senhaatual){	
	$u=mysqli_query($conn,"update usuarios set senha='$pass' where nome ='$usuario'");
	header("Location:index.php"); exit;
}
?>