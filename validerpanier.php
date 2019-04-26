<?php 
include "../core/panierC.php";
require_once "../core/employeC.php";
$panierC=new panierC();
$panier1C=new panierC();
$listePaniers=$panier1C->afficherpaniers($_POST['id_utilisateur']);
$produit=NULL;
$db = config::getConnexion();
foreach($db->query('SELECT MAX(id_commande) FROM commande') as $row) {
				$max=$row['MAX(id_commande)'];
				}
				$id_ligne=$max+1;
				
				
function checkInput($data)
						{
							$data = trim($data);
							$data = stripslashes($data);
							$data = htmlspecialchars($data);
							return $data;
						}
foreach($listePaniers as $row)
		{
			
			$produit=$row['id_produit'];
			$qte=$row['qte'];
			
			// function trouve prod par id
			
					 $reference=$row['id_produit'];
					
					 $id = checkInput($reference);
					
					 $db = config::getConnexion();

					 $statement = $db->prepare("SELECT * FROM produit WHERE reference= ?");
					$statement->execute(array($id));
					$item = $statement->fetch();
					$titre = $item['nom'];

					
			//end of function
			$prix=$item['prix']*$row['qte'];
			$panierC->ajouterligne($id_ligne,$produit,$qte,$prix);
			
			
		}
		
$panierC->validerpanier($_POST['id_utilisateur'],$id_ligne);
		 
		 //envoi mail
		 $db = config::getConnexion();
					$statement = $db->prepare("SELECT * FROM produit WHERE reference= ?");
					$statement->execute(array($id));
					$item = $statement->fetch();
		 // $to = "alaeddinne.ghribi@esprit.tn";
         
		 // $subject = "Zanimo : commande";
         
         // $message = "<h1>Votre commande a ete envoye avec succes.</h1>";
         // $message .= "<b>Un mail va etre envoye lorsque ... .</b>";
         
         // $header = "From:alaeddinne.ghribi@esprit.tn \r\n";
         // $header .= "Cc:alaeddinne.ghribi@esprit.tn \r\n";
         // $header .= "MIME-Version: 1.0\r\n";
         // $header .= "Content-type: text/html\r\n";
         
         // $retval = mail ($to,$subject,$message,$header);
	
	header('Location: afficherpanier.php');


