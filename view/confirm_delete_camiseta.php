<div class="row">
	<form class="form" action="index.php?controller=camiseta&action=delete" method="POST">
		<input type="hidden" name="id" value="<?php echo $dataToView["data"]["id"]; ?>" />
		<div class="alert alert-warning">
			<b>¿Confirma que desitja eliminar aquesta camiseta?</b>
			<i><?php echo $dataToView["data"]["nom"]; ?></i>
		</div>
		<input type="submit" value="Eliminar" class="btn btn-danger"/>
		<a class="btn btn-outline-success" href="index.php?controller=camiseta&action=list">Cancelar</a>
	</form>
</div>