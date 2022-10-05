<?php $cantidad = 0 ?>
<?php $data = $this->cart->contents(); ?>
<?php $t = 0; ?>
<?php foreach ($data as $fil4) : ?>
	<?php $cantidad += $fil4['qty'] ?>
<?php $t++;
endforeach; ?>
<div class="cover">
	<nav class="navbar">
		<div class="content-fluid">
			<div class="nav">
				<ul>
					<li><a class="nav_a" onclick="catalogo()"> Tienda</a></li>
					<li><a class="nav_a" onclick="verCarrito()"><i class="bi bi-cart"></i> <?php echo $cantidad ?></span></a><span></li>
					<li><a class="nav_a" href="<?php echo base_url() ?>"><img src="img/logo.png" class="logo-img"></a></li>
					<li><a class="nav_a" onclick="revisar_pedido()"> Mi pedido</a></li>
				</ul>
			</div>
		</div>
	</nav>
</div>
<div class="catalogo">
	<br>
</div>

<div class="container">
	<div class="row">
		<div class="col-4 col-sm-12">
			<div class="card">
				<div class="card-body">
					<div class="mb-3">
						<label for="nombre_pedido" class="form-label">Nombre</label>
						<input type="text" class="form-control" id="nombre_pedido">
					</div>
					<div class="mb-3">
						<label for="apellido_pedido" class="form-label">Apellido</label>
						<input type="text" class="form-control" id="apellido_pedido">
					</div>
					<div class="mb-3">
						<label for="direc_pedido" class="form-label">Direccion</label>
						<textarea class="form-control" id="direc_pedido" rows="2"></textarea>
					</div>
					<div class="mb-3">
						<label for="email_pedido" class="form-label">Email</label>
						<input type="email" class="form-control" id="email_pedido">
					</div>
					<div class="mb-3">
						<label for="cel_pedido" class="form-label">+569</label>
						<input type="email" class="form-control" required maxlength="8" id="cel_pedido">
					</div>
				</div>
			</div>
		</div>
		<div class="col-8 col-sm-12">
			<div class="card">
				<div class="card-body">
					<h4>Para continuar con tu pedido necesitamos algunos datos de ti: </h4>
					<br>
					<button class="btn btn-outline-success" id="btn_pedido" onclick="generar_solicitud()">Generar Solicitud</button>
					<button class="btn btn-outline-danger" id="btn_pedido" onclick="cancelar_pedido()">Cancelar</button>
					<button class="btn"><span style="font-weight: bold;">Total Pedido</span> $ <?php echo number_format($this->cart->total()); ?>.</button>
				</div>
			</div>
			<br>
			<div class="row">
				<?php if ($this->cart->contents() == 0) : ?>
					<p>No Hay productos seleccionados!</p>
				<?php else : ?>
					<?php $a = 0;
					foreach ($this->cart->contents() as $fila) : ?>
						<div class="col">
							<div class="card" style="width: 16rem;">
								<?php if ($producto == 0) : ?>
									<!-- aqui preguntamos por los productos para extraer la imagen y verla en el carro -->
									<p class="black-text">No Hay Productos almacenados!</p>
								<?php else : ?>
									<?php $a = 0;
									foreach ($producto as $fila2) : ?>
										<!-- asignamos la variable para poder recorrer el arreglo y asi poder verificar si el id del producto  para mostrar su imagen -->
										<?php if ($fila2->id == $fila['id']) : ?>
											<img src="uploads/<?php echo $fila2->img ?>" style="width: 100%;">
										<?php else : ?>
										<?php endif; ?>
									<?php $a++;
									endforeach; ?>
								<?php endif; ?>
								<div class="card-body">
									<h4 class="card-title"><?php echo $fila2->name ?></h4>
									<label><span style="font-weight: bold;">Cantidad: </span><?php echo $fila['qty'] ?></label>
									<label><span style="font-weight: bold;">Valor: </span> $ <?php echo number_format($fila['price']) ?></label>
								</div>
							</div>
						</div>
					<?php $a++;
					endforeach; ?>
				<?php endif; ?>

			</div>
		</div>

	</div>

</div>
