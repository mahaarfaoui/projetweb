<?PHP
	include "../config.php";
	require_once '../model/panier.php';

	class panierC {
		
		
		function ajouterpanier($panier){
			$sql="INSERT INTO panier (name,price,image) 
			VALUES (:name,:price,:image)";
			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'name' => $panier->getname(),
					'image' => $panier->getimage(),
					'price' => $panier->getprice(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		function countPanier()
    {
        try
        {
            $db = config::getConnexion();
            $sql = "SELECT COUNT(*) FROM tbl_product";
            $num = $db->query($sql)->fetchColumn();
            return $num;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
		
		function affpanier(){
			
			$sql="SELECT * FROM panier";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimerpanier($id){
			$sql="DELETE FROM panier WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
		function modifierpanier($panier, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE panier SET 
						name = :name, 
						price = :price,
						image = :image,
						 
					WHERE id = :id'
				);
				$query->execute([
					'name' => $panier->getname(),
					'image' => $panier->getimage(),
					'price' => $panier->getprice(),

					'id' => $id
				]);
				echo $query->rowCount() . " Record Updated successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recupererpanier($id){
			$sql="SELECT * from panier where id=$id";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$user=$query->fetch();
				return $user;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}

		
	}

?>