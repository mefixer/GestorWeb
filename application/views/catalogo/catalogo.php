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
					<li><a class="nav_a" href="<?php echo base_url() ?>"><img class="logo-img" src="img/logo.png"></a></li>
					<li><a class="nav_a" onclick="revisar_pedido()">Mi pedido</a></li>
				</ul>
			</div>
		</div>
	</nav>
</div>
<div class="carrucel">
	<br>
	<br>
</div>
<div class="container baja">
	<div class="row">
		<div class="col">
			<h2>En nuestra tienda encontrarás variedad de tecitos!</h2>
			<br>
		</div>
	</div>
	<div class="row ">
		<div class="container">
			<div class="row">
			<?php if ($producto == 0) : ?>
				<p class="black-text">No Hay Productos almacenados!</p>
			<?php else : ?>
				<?php $a = 0;
				foreach ($producto as $fila) : ?>
					<div class="col">
						<div class="card catalogo">
							<img class="img-producto" src="uploads/<?php echo $fila->img ?>">
							<div class="card-body">
								<h5 class="h5-producto"><?php echo $fila->name ?></h5>
								<p class="p-producto"><?php echo $fila->description ?></p>
								<p class="p-producto" type="number">$ <?php echo number_format($fila->price) ?> </p>
								<a class="btn btn-tienda" id="addpedido<?php echo $a ?>" onclick="addProductCart(<?php echo $fila->id ?>)">Agregar</a>

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
