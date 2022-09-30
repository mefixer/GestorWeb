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
  <div class="col">
    <h4>Estos son tus productos seleccionados!</h4>
    <br>
  </div>
</div>
<div class="container">
  <div class="row">
    <?php if ($this->cart->contents() == 0) : ?>
      <p class="black-text">No Hay productos seleccionados!</p>
    <?php else : ?>
      <?php $a = 0;
      foreach ($this->cart->contents() as $fila) : ?>
        <div class="col">
          <div class="card" style="width: 13rem;">
            <?php if ($producto == 0) : ?>
              <p class="black-text">No Hay Productos almacenados!</p>
            <?php else : ?>
              <?php $a = 0;
              foreach ($producto as $fila2) : ?>
                <!-- asignamos la variable para poder recorrer el arreglo y asi poder verificar si el id del producto  para mostrar su imagen -->
                <?php if ($fila2->id == $fila['id']) : ?>

                  <img src="uploads/<?php echo $fila2->img ?>" class="card-img-top" style="width: 100%;">

                <?php else : ?>
                <?php endif; ?>
              <?php $a++;
              endforeach; ?>
            <?php endif; ?>
            <div class="card-body">
              <input type="text" hidden id='rowid<?php echo $fila['rowid'] ?>'>
                <label>Cantidad</label>
                <p class="card'text"><?php echo $fila['qty'] ?></p>
                <label>Valor</label>
                <p class="card'text">$ <?php echo number_format($fila['price']) ?></p>
            </div>
          </div>
        </div>
      <?php $a++;
      endforeach; ?>
    <?php endif; ?>

    <div class="col ">
      <div class="card">
        <div class="card-body">
          <label>Total Pedido</label>
          <!-- mostramos la cantidad total en valor directamente de la clase cart -->
          <p type="number">$ <?php echo number_format($this->cart->total()); ?></p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <button class="btn btn-outline-primary" onclick="catalogo()">Seguir en la Tienda</button>
          <button class="btn btn-outline-success" onclick="realizar_pedido()">Realizar Pedido</button>
          <button class="btn btn-outline-danger" onclick="cancelar_pedido()">Cancelar Pedido</button>
        </div>
      </div>
    </div>
  </div>
  <div class="row">

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
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" pattern="[A-Za-z0-9_-]{1,15}" maxlength="30" required class="form-control" id="c__Loggin">
            <div id="emailHelp" class="form-text">No le des tu contraseña a nadie!.</div>
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