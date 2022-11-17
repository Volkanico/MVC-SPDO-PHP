<?php
$nom = $descripcio = "";
 $id = 0;
$preu = 0;
if(isset($dataToView["data"]["id"])) $id = $dataToView["data"]["id"];
if(isset($dataToView["data"]["nom"])) $title = $dataToView["data"]["nom"];
if(isset($dataToView["data"]["descripcio"])) $descripcio = $dataToView["data"]["descripcio"];
if(isset($dataToView["data"]["preu"])) $preu = $dataToView["data"]["preu"];
?>
<div class="row">
	<?php
	if(isset($_GET["response"]) and $_GET["response"] === true){
		?>
		<div class="alert alert-success">
			Operación realizada correctamente. <a href="index.php?controller=camiseta&action=list">Volver al listado</a>
		</div>
		<?php
	}
	?>
	<form class="form" action="index.php?controller=camiseta&action=save" method="POST">
		
		<div class="form-group">
			<label>Nom</label>
			<input class="form-control" type="text" name="nom" value="<?php echo $nom; ?>" />
		</div>
		<div class="form-group mb-2">
			<label>Descripcio</label>
			<textarea class="form-control" style="white-space: pre-wrap;" name="descripcio"><?php echo $descripcio; ?></textarea>
		</div>
		<label>Preu</label>
		<input type="number" name="preu" value="<?php echo $preu; ?>" />
		<input type="submit" value="Guardar" class="btn btn-primary"/>
		<a class="btn btn-outline-danger" href="index.php?controller=camiseta&action=list">Cancelar</a>
	</form>
</div>