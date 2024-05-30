<?php
include "in/conecta.inc";

 if(isset($_GET['produto4'])){
 $q =$_GET['produto4'];
 }

$x = mysqli_query($conn,"select `id_produto`,`cores` from `produtos` where descricao ='$q'" );
$cor = array();
while ( $row = mysqli_fetch_assoc( $x ) ) {
		$cor[] = array(
			'idprdut'  => $row['id_produto'],
			'ccr'       => $row['cores'],
		);
	}
echo( json_encode( $cor ) );
?>

