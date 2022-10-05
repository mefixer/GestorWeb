<?php $cantidad = 0 ?>
<?php $data = $this->cart->contents(); ?>
<?php $t = 0; ?>
<?php foreach ($data as $fil4) : ?>
	<?php $cantidad += $fil4['qty'] ?>
<?php $t++;
endforeach; ?>
<div class="carrucel">
	<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
		<div class="carousel-inner">
			<?php if ($principal == 0) : ?>
				<p class="black-text">No Hay Portada Principal almacenada!</p>
			<?php else : ?>
				<?php $a = 0;
				foreach ($principal as $fila) : ?>
					<div class="carousel-item active" data-bs-interval="10000">
						<img src="img/<?php echo $fila->imagen ?>" class="d-block w-100" alt="...">
						<div class="carousel-caption">
							<h1 class="h1-portada"><?php echo $fila->titulo ?></h1>
							<h5 class="h5-portada"><?php echo $fila->columna ?></h5>
						</div>
					</div>
				<?php $a++;
				endforeach; ?>
			<?php endif; ?>
		</div>
		<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Previous</span>
		</button>
		<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="visually-hidden">Next</span>
		</button>
	</div>
</div>
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

<div class="container">
	<div class="galeria">
		<div class="container text-center">
			<div class="row">
				<?php if ($galeria == 0) : ?>
					<p class="black-text">No Hay Galeria almacenada!</p>
				<?php else : ?>
					<?php $a = 0;
					foreach ($galeria as $fila) : ?>
						<div class="col">
							<div class="div-left-galeria">
								<img class="img-galeria" src="img/<?php echo $fila->imagen ?>">
							</div>
						</div>
						<div class="col">
							<div class="div-right-galeria">
								<h1 class="h1-galeria"><?php echo $fila->titulo ?></h1>
								<h5 class="h5-galeria"><?php echo $fila->columna ?></h5>
								<a class="btn btn-tienda" onclick="catalogo()">Tienda</a>
							</div>
						</div>
					<?php $a++;
					endforeach; ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col">
			<div class="container">
				<h1 class="h1-portada" style="text-align: center;">Disfruta la magia del té, Conoce nuestros exclusivos sabores</h1>
				<br>
			</div>
		</div>
	</div>
	<br>
	<div class="" id="destacados">
		<div class="row">
			<div class="slider">
				<div class="slide-track">
					<?php if ($productos == 0) : ?>
						<p class="black-text">No Hay Destacados almacenadados!</p>
					<?php else : ?>
						<?php $a = 0;
						foreach ($productos as $fila) : ?>
							<div class="slide">
								<div class="col">
									<div class="card producto-card">
										<img class="img-producto" src="img/<?php echo $fila->img ?>" />
										<div class="card-body">
											<h3 class="h3-producto"><?php echo $fila->name ?></h3>
											<p class="p-producto"><?php echo $fila->description ?></p>
											<p class="p-producto">$ <?php echo number_format($fila->price) ?></p>
												<button class="btn btn-tienda">Agregar</button>
										</div>
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
	<br>
	<br>
	<div class="" id="medio">
		<div class="row">
			<div class="col">
				<div class="">
					<img class="img-medio" src="img/medio-1.jpg" alt="...">
				</div>
			</div>
			<div class="col">
				<div class="">
					<img class="img-medio" src="img/medio-2.jpg" alt="...">
				</div>
			</div>
			<div class="col">
				<div class="center">
					<div class="medio-texto">
						<div class="">
							<h3 class="h3-medio">100% Organic </h3>
							<p class="p-medio">Et malesuada fames ac turpis egestas maecenas pharetra convallis met nisl purus.</p>
							<h3 class="h3-medio">High Quality</h3>
							<p class="p-medio">Et malesuada fames ac turpis egestas maecenas pharetra convallis met nisl purus.</p>
							<h3 class="h3-medio">Always Fresh</h3>
							<p class="p-medio">Et malesuada fames ac turpis egestas maecenas pharetra convallis met nisl purus.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<br>
	<div class="" id="posteos">
		<div class="row">
			<h4 class="h1-portada">Posteos Instagram: </h4>
			<div class="card">
				<?php if ($posteos == 0) : ?>
					<p class="black-text">No Hay Posteos almacenadados!</p>
				<?php else : ?>
					<?php $a = 0;
					foreach ($posteos as $fila) : ?>
						<div class="col">
							<div class="card">
								<img src="img/<?php echo $fila->imagen ?>">
								<div class="card-body">
									<h4><?php echo $fila->titulo ?></h4>
									<p><?php echo $fila->columna ?></p>
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
<br>
<br>

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
						<label for="exampleInputPassword1" class="form-label">Password</label>
						<input type="password" pattern="[A-Za-z0-9_-]{1,15}" maxlength="30" required class="form-control" id="c__Loggin">
						<div id="emailHelp" class="form-text">No le des tu contraseña a nadie!.</div>
					</div>
				</form>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
				<a type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="load_user()"> Ingresar</a>
			</div>
		</div>
	</div>
</div>
<div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
	<div class="d-flex">
		<div class="toast-body">
			<p>kahjsgdagfshdgfaghfdsualfw;enwhb</p>
		</div>
		<button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
	</div>
</div>
<div id="page-body"></div>
