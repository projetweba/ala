<?PHP
include "../config.php";
class panierC {
						 //$id_utilisateur,$produit
	function ajouterPanier($id_produit,$qte){
		
		
		$id_utilisateur=1;
		
		$sql="insert into panier (id_utilisateur,id_produit,qte) values (:id_utilisateur , :id_produit ,:qte)";
		$db = config::getConnexion();
		try
		{
		
        $req=$db->prepare($sql);
		$req->bindvalue(':id_utilisateur',$id_utilisateur);
		$req->bindvalue(':id_produit',$id_produit);
		$req->bindvalue(':qte',$qte);
            $req->execute();
           
        }
        catch (Exception $e)
		{
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
							//$id_utilisateur
	function afficherpaniers($id_utilisateur)
	{
														//$id_utilisateur
		$sql="SElECT * From Panier where id_utilisateur=1";
		
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
							//$id_utilisateur
	function supprimerProduit($id_produit)
	{
		$sql="DELETE FROM Panier where id_produit= :id_produit";
		$db = config::getConnexion();
        
		try
		{
			$req=$db->prepare($sql);
			$req->bindValue(':id_produit',$id_produit);
            $req->execute();
        }
        catch (Exception $e)
		{
            die('Erreur: '.$e->getMessage());
        }
	}
	function supprimerPanier($id_utilisateur)
	{
		$sql="DELETE FROM Panier where id_utilisateur= :id_utilisateur";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindparam(':id_utilisateur',$id_utilisateur);
		try
		{
            $req->execute();
        }
        catch (Exception $e)
		{
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListepaniers($id_utilisateur){
		$id_utilisateur=1;
		$sql="SELECT * from panier where id_utilisateur=$id_utilisateur";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function validerpanier($produit)
	{
		$date=date("Y/m/d");
		$id_utilisateur=1;
		
		$sql="insert into commande (id_utilisateur,tabAchats) values (:id_utilisateur , :tabAchats)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		$req->bindvalue(':id_utilisateur',$id_utilisateur);
		$req->bindparam(':tabAchats',$produit);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
}

?>