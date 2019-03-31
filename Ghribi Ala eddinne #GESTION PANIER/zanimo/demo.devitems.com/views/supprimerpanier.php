<?PHP
include "../core/panierC.php";
$panierC=new panierC();

	$panierC->supprimerPanier(1);
	header('Location: afficherpanier.php');


?>