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
					<li><a class="nav_a" onclick="verCarrito()"><i class="bi bi-cart"></i> <?php echo $cantidad ?></a></li>
					<li><a class="nav_a" href="<?php echo base_url() ?>"><img src="img/logo.png" class="logo-img"></a></li>

					<li><a class="nav_a" onclick="revisar_pedido()">Mi pedido</a></li>
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
		<h2>Estos son tus productos seleccionados!</h2>
	</div>
	<br>
</div>
<div class="container">
	<div class="row">
		<div class="col-4 col-sm-6">
			<div class="card">
				<div class="card-body">
					<button class="btn btn-outline-primary" onclick="catalogo()">Ir a la Tienda</button>
					<button class="btn btn-outline-success" onclick="realizar_pedido()">Confirmar</button>
					<button class="btn btn-outline-danger" onclick="cancelar_pedido()">Cancelar</button>
					<div class="">
						<br>
						<label style="font-weight: bold;">Total Pedido</label>
						<p type="number">$ <?php echo number_format($this->cart->total()); ?></p>
					</div>

				</div>
			</div>
		</div>

		<div class="col-8 col-sm-6">
			<div class="row">

				<?php if ($this->cart->contents() == 0) : ?>
					<p class="black-text">No Hay productos seleccionados!</p>
				<?php else : ?>
					<?php $a = 0;
					foreach ($this->cart->contents() as $fila) : ?>
						<div class="col">
							<div class="card" style="width: 20vh;">
								<?php if ($producto == 0) : ?>
									<p class="black-text">No Hay Productos almacenados!</p>
								<?php else : ?>
									<?php $a = 0;
									foreach ($producto as $fila2) : ?>
										<?php if ($fila2->id == $fila['id']) : ?>
											<img src="uploads/<?php echo $fila2->img ?>" class="img-producto">
										<?php else : ?>
										<?php endif; ?>
									<?php $a++;
									endforeach; ?>
								<?php endif; ?>
								<div class="card-body">
									<input type="text" hidden id='rowid<?php echo $fila['rowid'] ?>'>
									<label><span style="font-weight: bold;">Cantidad:</span> <?php echo $fila['qty'] ?></label>
									<label><span style="font-weight: bold;">Valor</span> $ <?php echo number_format($fila['price']) ?></label>
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
