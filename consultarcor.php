<?php
include "in/conecta.inc";

 if(isset($_GET['produto'])){
 $q =$_GET['produto'];
 }

$x = mysqli_query($conn,"select `id_produto`,`cores` from `produtos` where descricao ='$q'" );
$cor = array();
while ( $row = mysqli_fetch_assoc( $x ) ) {
		$cor[] = array(
			'idproduto'  => $row['id_produto'],
			'cor'       => $row['cores'],
		);
	}
echo( json_encode( $cor ) );
?>

