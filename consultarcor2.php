<?php
include "in/conecta.inc";

 if(isset($_GET['produto2'])){
 $q =$_GET['produto2'];
 }

$x = mysqli_query($conn,"select `id_produto`,`cores` from `produtos` where descricao ='$q'" );
$cor = array();
while ( $row = mysqli_fetch_assoc( $x ) ) {
		$cor[] = array(
			'idprodutoo'  => $row['id_produto'],
			'coro'       => $row['cores'],
		);
	}
echo( json_encode( $cor ) );
?>

