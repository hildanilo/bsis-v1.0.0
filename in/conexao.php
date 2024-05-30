<?php
	try{
			$conexao = new PDO('mysql:host=localhost;dbname=ideia751_bsis', 'ideia751_bsis', 'Cs=MG$6a;h@$');
			$conexao->exec("set names utf8");
			$conexao ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(PDOException $erro){
			var_dump('ERROR '.$erro->getMessage());
		}
?>