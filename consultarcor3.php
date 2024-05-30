<?php
include "in/conecta.inc";

 if(isset($_GET['produto3'])){
 $q =$_GET['produto3'];
 }

$x = mysqli_query($conn,"select `id_produto`,`cores` from `produtos` where descricao ='$q'" );
$cor = array();
while ( $row = mysqli_fetch_assoc( $x ) ) {
		$cor[] = array(
			'idprodut'  => $row['id_produto'],
			'cr'       => $row['cores'],
		);
	}
echo( json_encode( $cor ) );
?>

