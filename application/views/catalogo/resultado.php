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

<div class="catalogo">
	<br>

	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="row">

					<?php $total = 0; ?>
					<?php if ($carro == 0) : ?>
						<p class="black-text">No Hay pedidos seleccionados!</p>
					<?php else : ?>
						<?php $a = 0;
						foreach ($carro as $fila_c) : ?>
											<h1>Pedido N°: <?php echo $fila_c->id ?></h1>
							<div class="col-12">
								<div class="card">
									<div class="card-body">
										<label><span style="font-weight: bold;"> Nombre: </span> <?php echo $fila_c->nombre ?> <?php echo $fila_c->apellido ?></label>
										<label><span style="font-weight: bold;"> Direccion: </span> <?php echo $fila_c->direccion ?></label>
										<label><span style="font-weight: bold;"> Correo: </span> <?php echo $fila_c->correo ?></label>
										<label><span style="font-weight: bold;"> Celular: </span> +569<?php echo $fila_c->celular ?></label>
									</div>
								</div>
							</div>
							<div class="col-8">
								<br>
								<div class="row">
									<?php if ($detalle == 0) : ?>
										<p class="black-text">No Hay pedidos seleccionados!</p>
									<?php else : ?>
										<?php $e = 0;
										foreach ($detalle as $fila_d) : ?>
											<?php if ($producto == 0) : ?>
												<p class="black-text">No Hay pedidos seleccionados!</p>
											<?php else : ?>
												<div class="col">
													<div class="card" style="width: 40vh;">
														<?php $i = 0;
														foreach ($producto as $fila_p) : ?>
															<?php if ($fila_d->id_producto == $fila_p->id) : ?>
																<img class="img-producto" src="uploads/<?php echo $fila_p->img ?>">
																<div class="card-body">
																	<label><span style="font-weight: bold;">cantidad: </span><?php echo $fila_d->cantidad ?></label>
																	<label><span style="font-weight: bold;"> precio: </span> <?php echo $fila_p->price ?></label>
																	<label><span style="font-weight: bold;"> Sub Total </span> <?php echo $fila_d->subtotal ?></label>
																</div>
																<?php $total += $fila_d->subtotal ?>
															<?php endif; ?>
														<?php $i++;
														endforeach; ?>
													<?php endif; ?>
													</div>
												</div>
											<?php $e++;
										endforeach; ?>
										<?php endif; ?>
								</div>
							</div>

							<div class="col-4">
							<br>
								<?php if ($estado == 0) : ?>
									<p class="black-text">No Hay pedidos seleccionados!</p>
								<?php else : ?>
									<?php $o = 0;
									foreach ($estado as $fila_e) : ?>
										<?php if ($fila_e->id == $fila_c->id_estado) : ?>
											<div class="card">
												<div class="card-body">
													<label style="font-weight: bold;">Estado del pedido: </label>
													<button class="btn btn-success" type="button" disabled><?php echo $fila_e->nombre ?></button>
												</div>
											</div>
										<?php endif; ?>
									<?php $o++;
									endforeach; ?>
								<?php endif; ?>
								<div class="card">
									<div class="card-body">
										<label style="font-weight: bold;">Total Pedido</label>
										<p>$ <?php echo number_format($total) ?></p>
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
</div>
<!-- Modal -->
<div class="modal fade" id="InModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<img class="" style="width: 20rem;" src="img/logo.png">
			</div>
			<div class="modal-body">
				<h4>ADMINISTRACION</h4>
				<form>
					<div class="mb-3">
						<label for="n_Loggin">Usuario</label>
						<input type="text" pattern="[A-Za-z0-9_-]{1,15}" required maxlength="20" class="form-control" id="n__Loggin">
					</div>

					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Contraseña</label>
						<input type="password" pattern="[A-Za-z0-9_-]{1,15}" maxlength="30" required class="form-control" id="c__Loggin">
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
				<a class="btn btn-primary" onclick="load_user()"> Ingresar</a>
			</div>
		</div>
	</div>
</div>
