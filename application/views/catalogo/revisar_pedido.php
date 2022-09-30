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
          <li><a class="nav_a" href="<?php echo base_url() ?>"><img class="" src="img/logo.png" style="width: 20vh;"></a></li>

          <li><a class="nav_a" onclick="revisar_pedido()">Mi pedido</a></li>
        </ul>
      </div>
    </div>
  </nav>
</div>

<div class="container">
  <div class="row">
    <div class="col">
      <div class="col-4">
          <h5>INGRESA EL CODIGO DE PEDIDO</h5>
      </div>
<br>
      <div class="card" style="width: 30rem;">
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