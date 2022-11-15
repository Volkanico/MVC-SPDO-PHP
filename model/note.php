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

	/* Get all notes */
	public function getCamisetes(){
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table;
		$stmt = $this->conection->prepare($sql);
		$stmt->execute();

		return $stmt->fetchAll();
	}

	/* Get note by id */
	public function getCamisetaById($id){
		if(is_null($id)) return false;
		$this->getConection();
		$sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		$stmt->execute([$id]);

		return $stmt->fetch();
	}

	/* Save note */
	public function save($param){
		$this->getConection();

		/* Set default values */
		$nom = $descripcio = "";

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
			}
		}

		/* Received values */
		if(isset($param["nom"])) $nom = $param["nom"];
		if(isset($param["descripcio"])) $descripcio = $param["descripcio"];

		/* Database operations */
		if($exists){
			$sql = "UPDATE ".$this->table. " SET nom=?, descripcio=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$nom, $descripcio, $id]);
		}else{
			$sql = "INSERT INTO ".$this->table. " (nom, descripcio) values(?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$nom, $descripcio]);
			$id = $this->conection->lastInsertId();
		}	

		return $id;	

	}

	/* Delete note by id */
	public function deleteCamisetaById($id){
		$this->getConection();
		$sql = "DELETE FROM ".$this->table. " WHERE id = ?";
		$stmt = $this->conection->prepare($sql);
		return $stmt->execute([$id]);
	}

}

?>