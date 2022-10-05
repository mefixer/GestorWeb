
<div class="cover">
	<nav class="navbar">
		<div class="content-fluid">
			<div class="nav">
				<ul>
					<li><a class="nav_a" onclick="catalogo()"> Tienda</a></li>
					<li><a class="nav_a" onclick="verCarrito()"><i class="bi bi-cart"></i>0</a></li>
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

<div class="container">
  <div class="row">
    <div class="card">
      <div class="card-body">
        <h2><?php echo $nombre ?> <?php echo $apellido ?></h2>
        <h4>Tu Codigo de Pedido es:</h4>
        <h2><?php echo $codigo ?></h2>
        <p>A este correo -> <a><?php echo $correo ?></a> sera enviado!</p>
      </div>
    </div>
    <a class="btn btn-outline-primary" href="<?php echo base_url() ?>">Volver</a>
  </div>
</div>
