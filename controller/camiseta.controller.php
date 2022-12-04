<?php 
require_once ('./autoloadModel.php');

class camisetaController{
	public $page_title;
	public $view;

	public function __construct() {
		$this->view = 'list_camiseta';
		$this->page_title = '';
		$this->camisetaObj = new Camiseta();
	}

	/* List all camisetes */
	public function list(){
		$this->page_title = 'Llistat de camisetes';
		return $this->camisetaObj->getCamisetes();
	}

	/* Load camiseta for edit */
	public function edit($id = null){
		$this->page_title = 'Editar camiseta';
		$this->view = 'edit_camiseta';
		/* Id can from get param or method param */
		if(isset($_GET["id"])) $id = $_GET["id"];
		return $this->camisetaObj->getCamisetaById($id);
	}

	/* Create or update camiseta */
	public function save(){
		$this->view = 'edit_camiseta';
		$this->page_title = 'Guardar camiseta';
		$id = $this->camisetaObj->save($_POST);
		$result = $this->camisetaObj->getCamisetaById($id);
		$_GET["response"] = true;
		return $result;
	}

	/* Confirm to delete */
	public function confirmDelete(){
		$this->page_title = 'Eliminar camiseta';
		$this->view = 'confirm_delete_camiseta';
		return $this->camisetaObj->getCamisetaById($_GET["id"]);
	}

	/* Delete */
	public function delete(){
		$this->page_title = 'Listado de camiseta';
		$this->view = 'delete_camiseta';
		return $this->camisetaObj->deleteCamisetaById($_POST["id"]);
	}
}
?>