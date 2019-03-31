<?php 
include "../core/panierC.php";
$panierC=new panierC();
$panier1C=new panierC();
$listePaniers=$panier1C->afficherpaniers(1);
$produit=NULL;
$k=0;
foreach($listePaniers as $row)
		{
			$temp_produit=$row['id_produit'];
			$produit=" ".$produit." et ID produit : ".$temp_produit;
			$k=$k+1;
		}
	if($k!=0)
	{
		$produit=strip_tags($produit);
		$panierC->validerpanier($produit);
	}
	
if (isset($_POST["validerpanier"]) and $k!=0){	
	header('Location: afficherpanier.php');
}
else if($k==0)
{
	header('Location: affichererreur.php');
	die;
}

else{echo "non marcher";}