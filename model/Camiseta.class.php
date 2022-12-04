<?php 
class Camiseta {

	private $table = 'camisetes';
	private $conection;

	public function __construct() {
	}

	/* Set conection */
	public function getConection(){
		$dbObj = new Db();
		$this->conection = $dbObj->conection;
	}

	/* Get all camisetes */
	public function getCamisetes(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get camisetea by id */
	public function getCamisetaById($id){
		if(is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	/* Save camiseta */
	public function save($param){
		$this->getConection();

		/* Set default values */
		$nom = $descripcio = "";
		$id = 0;
		$preu = 0;

		/* Check if exists */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
			$actualCamiseta = $this->getCamisetaById($param["id"]);
			if(isset($actualCamiseta["id"])){
				$exists = true;	
				/* Actual values */
				$id = $param["id"];
				$nom = $actualCamiseta["nom"];
				$descripcio = $actualCamiseta["descripcio"];
				$preu = $actualCamiseta["preu"];
			}
		}

		/* Received values */
		if(isset($param["id"])) $id = $param["id"];
		if(isset($param["nom"])) $nom = $param["nom"];
		if(isset($param["descripcio"])) $descripcio = $param["descripcio"];
		if(isset($param["preu"])) $preu = $param["preu"];

		/* Database operations */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET id=?, nom=?, descripcio=?, preu=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$id, $nom, $descripcio, $preu]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (id, nom, descripcio, preu) values(?, ?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$id, $nom, $descripcio, $preu]);
			$id = $this->conection->lastInsertId();
		}	
		return $id;	
	}

	/* Delete camiseta by id */
	public function deleteCamisetaById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}
}
?>