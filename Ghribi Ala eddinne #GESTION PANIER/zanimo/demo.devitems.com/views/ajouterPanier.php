<?PHP
include "../core/panierC.php";
include "../entities/panier.php";
if(is_int($_POST['qte'])==false)
	{
		header('Location: affichererreur1.php');
		die;
	}
$panier1=new panier($_POST['id_produit'],$_POST['qte']);
$panier1C=new panierC();
$panier1C->ajouterPanier($_POST['id_produit'],$_POST['qte']);
header('Location: afficherpanier.php');
?>