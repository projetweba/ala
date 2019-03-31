<?PHP
include "../core/wishlistC.php";
$wishlistC=new wishlistC();

	$wishlistC->supprimerproduit(1);
	header('Location: afficherwishlist.php');


?>