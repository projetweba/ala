<?php
	include_once "../config.php";
	class wishlistC
	{
		function ajouterWishlist($id_produit)
		{
		$id_utilisateur=1;
		
		$sql="insert into wishlist (id_utilisateur,id_prod) values (:id_utilisateur , :id_produit )";
		$db = config::getConnexion();
		try
		{
		
        $req=$db->prepare($sql);
		$req->bindvalue(':id_utilisateur',$id_utilisateur);
		$req->bindvalue(':id_produit',$id_produit);
            $req->execute();
           
        }
        catch (Exception $e)
		{
            echo 'Erreur: '.$e->getMessage();
        }
		}

		function supprimerproduit($id_utilisateur)
		{
			$id_utilisateur=1;
			$sql = "DELETE FROM wishlist WHERE id_utilisateur= :id_utilisateur";
			$db = config::getConnexion();
			
			try
			{
				$req=$db->prepare($sql);
				$req->bindvalue(':id_utilisateur',$id_utilisateur);
				$req->execute();
			}
			catch (Exception $e)
			{
				die('Erreur: '.$e->getMessage());
			}
		}

		function afficherWishlists($id_utilisateur)
		{
		
			$sql="SElECT * From Wishlist where id_utilisateur=1";
			
			$db = config::getConnexion();
			try{
			$liste=$db->query($sql);
			return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}
		
		function rechercherWishlists($id_utilisateur)
		{
		$id_utilisateur=1;
		$sql="SELECT * from Wishlist where id_utilisateur=$id_utilisateur";
		$db = config::getConnexion();
			try
			{
			$liste=$db->query($sql);
			return $liste;
			}
			catch (Exception $e)
			{
				die('Erreur: '.$e->getMessage());
			}
		}
		function validerWishlist($id_produit)
	{
		$id_utilisateur=1;
		$qte=1;
		$sql="insert into panier (id_utilisateur,id_produit,qte) values (:id_utilisateur , :id_produit , :qte)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		$req->bindvalue(':id_utilisateur',$id_utilisateur);
		$req->bindvalue(':id_produit',$id_produit);
		$req->bindvalue(':qte',$qte);
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	}
?>