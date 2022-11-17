<div class="row">
	<div class="col-md-12 text-right">
		<a href="index.php?controller=camiseta&action=edit" class="btn btn-outline-primary">Crear camiseta</a>
		<div class="col-3">
				<a href="view/carreto.php" class="btn btn-outline-primary">Carreto</a>
			</div>
		<hr/>
		
	</div>
	<?php
	if(count($dataToView["data"])>0){
		foreach($dataToView["data"] as $camiseta){
			?>
			
			<div class="col-md-3 col-12">
				<div class="card-body border border-secondary rounded">
				<img class="card-img-top" src="img/<?php echo $camiseta['id']; ?>.jpg" alt="Imatge camiseta">
				
					<h5 class="card-title"><?php echo $camiseta['id']; ?></h5>
					<h5 class="card-title"><?php echo $camiseta['nom']; ?></h5>
					<div class="card-text"><?php echo nl2br($camiseta['descripcio']); ?></div>
					<h5 class="card-title"><?php echo $camiseta['preu']; ?></h5>
					<hr class="mt-1"/>
					<a href="index.php?controller=camiseta&action=edit&id=<?php echo $camiseta['id']; ?>" class="btn btn-primary">Editar</a>
					<a href="index.php?controller=camiseta&action=confirmDelete&id=<?php echo $camiseta['id']; ?>" class="btn btn-danger">Eliminar</a>
				</div>
			</div>
			<?php
		}
	}else{
		?>
		<div class="alert alert-info">
			Actualment no existeixen camisetes.
		</div>
		<?php
	}
	?>
</div>