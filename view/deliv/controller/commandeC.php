<?PHP
	include "../config.php";
	require_once '../model/comd.php';

	class commandC {
		public function listcommand()
    {
        $sql = "SELECT * FROM command";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
	function countCommand()
    {
        try
        {
            $db = config::getConnexion();
            $sql = "SELECT COUNT(*) FROM command";
            $num = $db->query($sql)->fetchColumn();
            return $num;
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
		function ajoutercommand($command){
			$sql = "INSERT INTO `command`(`id`, `name`, `number`, `address`, `dateoford`,  `email`, `pay`, `city`, `state`, `pin`) 
			VALUES (:name, :number, :address, :dateoford, :email, :pay, :city, :state, :pin)";

			$db = config::getConnexion();
			try{
				$query = $db->prepare($sql);
			
				$query->execute([
					'name' => $command->getname(),
					'ord' => $command->getord(),
					'number' => $command->getnumber(),
					'address' => $command->getaddress(), 
                    'dateoford' => $command->getdateoford(),
					'email' => $command->getemail(),
					'pay' => $command->getpay(),
					'city' => $command->getcity(),
					'state' => $command->getstate(),
					'pin' => $command->getpin(),
				]);			
			}
			catch (Exception $e){
				echo 'Erreur: '.$e->getMessage();
			}			
		}
		
		function affcommand(){
			
			$sql="SELECT * FROM command";
			$db = config::getConnexion();
			try{
				$liste = $db->query($sql);
				return $liste;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}	
		}

		function supprimercommand($id){
			$sql="DELETE FROM command WHERE id= :id";
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
		function modifiercommand($command, $id){
			try {
				$db = config::getConnexion();
				$query = $db->prepare(
					'UPDATE command SET 
						name = :name, 
						number = :number,
						address = :address,
						dateoford = :dateoford,
						 email = :email,
						 pay = :pay,
						 city = :city,
						 state = :state,
						 pin = :pin
					WHERE id = :id'
				);
				$query->execute([
					'name' => $command->getname(),
					'ord' => $command->getord(),
					'number' => $command->getnumber(),
					'address' => $command->getaddress(), 
                    'dateoford' => $command->getdateoford(),
					'email' => $command->getemail(),
					'pay' => $command->getpay(),
					'city' => $command->getcity(),
					'state' => $command->getstate(),
					'pin' => $command->getpin(),

					'id' => $id
				]);
				echo $query->rowCount() . " Records Updated successfully <br>";
			} catch (PDOException $e) {
				$e->getMessage();
			}
		}
		function recuperercommand($id){
			$sql="SELECT * from command where id=$id";
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