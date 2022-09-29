<?php $cantidad = 0 ?>
<?php $data = $this->cart->contents(); ?>
<?php $t = 0; ?>
<?php foreach ($data as $fil4) : ?>
  <?php $cantidad += $fil4['qty'] ?>
<?php $t++;
endforeach; ?>
<nav class="navbar">
    <div class="content-fluid">
      <div class="nav">
        <ul>
          <li><a class="btn" href="<?php echo base_url() ?>">Inicio</a></li>
          <li><a class="btn" onclick="catalogo()">Tienda</a></li>
          <li><a class="btn"><img class="" src="img/logo.png" style="width: 20vh;"></a></li>
          <li><a class="btn" onclick="verCarrito()">Carrito <?php echo $cantidad ?></span></a><span></li>
          <li><a class="btn" onclick="revisar_pedido()">Mi pedido</a></li>
          <li><a class="btn" data-bs-toggle="modal" data-bs-target="#InModal">IN</a></li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="col">
          <h5>INGRESA EL CODIGO DE PEDIDO</h5>
      </div>

      <div class="card">
        <div class="card-body">
          <form action="">
            <label for="codigo_pedido">Codigo:</label>
            <input type="text" value="" id="codigo_pedido">
            <a class="btn btn-outline-success" id="btn_verificar" onclick="verificar()">Verificar</a>
          </form>
        </div>
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