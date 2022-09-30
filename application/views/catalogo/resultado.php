<?php $cantidad = 0 ?>
<?php $data = $this->cart->contents(); ?>
<?php $t = 0; ?>
<?php foreach ($data as $fil4) : ?>
  <?php $cantidad += $fil4['qty'] ?>
<?php $t++;
endforeach; ?>
<div class="navbar-fixed">
  <nav>
    <div class="nav-wrapper white">
      <img class="brand-logo button-collapse center" data-activates="slide-out" src="img/logo.png">
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a class="black-text indigo lighten-5" href="<?php echo base_url() ?>">INICIO</a></li>
        <li><a class="black-text indigo lighten-5" onclick="catalogo()">Tienda</a></li>
        <li><a class="black-text teal lighten-5" onclick="verCarrito()">Carrito <span class="badge"><?php echo $cantidad?></span></a></li>
        <li><a class="black-text teal lighten-5" onclick="revisar_pedido()"> Estado de mi pedido</a></li>
        <li><a class="btn" data-bs-toggle="modal" data-bs-target="#InModal">IN</a></li>
      </ul>
    </div>
  </nav>
</div>

<ul id="slide-out" class="side-nav">
  <li>
    <div class="user-view">
      <div class="">
        <img class="logo" style="width: 100%;" src="img/logo.png">
      </div>
    </div>
  </li>
  <li><a class="black-text indigo lighten-5" href="<?php echo base_url() ?>"><i class="material-icons right">free_breakfast</i> INICIO</a></li>
  <li><a class="black-text indigo lighten-5" onclick="catalogo()"><i class="material-icons right">favorite_border</i> Tienda</a></li>
  <li><a class="black-text teal lighten-5" onclick="verCarrito()"><i class="material-icons right">shopping_cart</i> Carrito</a></li>
  <li><a class="black-text teal lighten-5" onclick="revisar_pedido()"> Estado de mi pedido</a></li>
  <li><a class="purple lighten-5 modal-trigger black-text" href="#btn_ingresar"><i class="material-icons right">fingerprint</i> Ingresar</a></li>
</ul>

<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="row">
                <?php $total = 0; ?>
                <?php if ($carro == 0) : ?>
                    <p class="black-text">No Hay pedidos seleccionados!</p>
                <?php else : ?>
                    <?php $a = 0;
                    foreach ($carro as $fila_c) : ?>
                        <div class="col s4">
                            <div class="card">
                                <div class="card-content">
                                    <p><?php echo $fila_c->nombre ?></p>
                                    <p><?php echo $fila_c->apellido ?></p>
                                    <p><?php echo $fila_c->direccion ?></p>
                                    <p><?php echo $fila_c->correo ?></p>
                                    <p>+569<?php echo $fila_c->celular ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col s4">
                            <?php if ($detalle == 0) : ?>
                                <p class="black-text">No Hay pedidos seleccionados!</p>
                            <?php else : ?>
                                <?php $e = 0;
                                foreach ($detalle as $fila_d) : ?>
                                    <?php if ($producto == 0) : ?>
                                        <p class="black-text">No Hay pedidos seleccionados!</p>
                                    <?php else : ?>
                                        <div class="card small">
                                            <?php $i = 0;
                                            foreach ($producto as $fila_p) : ?>
                                                <?php if ($fila_d->id_producto == $fila_p->id) : ?>
                                                    <div class="card-image">
                                                        <center><img src="uploads/<?php echo $fila_p->img ?>"></center>
                                                        <span class="card-title"><?php echo $fila_p->name ?></span>
                                                    </div>
                                                    <div class="card-content">
                                                        <label for="">cantidad: </label>
                                                        <p><?php echo $fila_d->cantidad ?></p>
                                                        <label for="">precio: </label>
                                                        <p><?php echo $fila_p->price ?></p>
                                                        <label for="">Sub Total</label>
                                                        <p><?php echo $fila_d->subtotal ?></p>
                                                    </div>
                                                    <?php $total += $fila_d->subtotal ?>
                                                <?php endif; ?>
                                            <?php $i++;
                                            endforeach; ?>
                                        <?php endif; ?>
                                        </div>
                                    <?php $e++;
                                endforeach; ?>
                                <?php endif; ?>
                        </div>

                        <div class="col s4">
                            <?php if ($estado == 0) : ?>
                                <p class="black-text">No Hay pedidos seleccionados!</p>
                            <?php else : ?>
                                <?php $o = 0;
                                foreach ($estado as $fila_e) : ?>
                                    <?php if ($fila_e->id == $fila_c->id_estado) : ?>
                                        <div class="card">
                                            <div class="card-content">
                                                <label for="">Estado del pedido</label>
                                                <p><?php echo $fila_e->nombre ?></p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php $o++;
                                endforeach; ?>
                            <?php endif; ?>
                            <div class="card">
                                <div class="card-content">
                                    <label for="">Total Pedido</label>
                                    <p><?php echo number_format($total) ?></p>
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