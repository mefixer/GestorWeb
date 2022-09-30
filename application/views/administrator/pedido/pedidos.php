<div class="container">
  <div class="row">
    <div class="col-12">
      <div class="row">
        <?php if ($carro == 0) : ?>
          <p class="black-text">No Hay pedidos seleccionados!</p>
        <?php else : ?>
          <?php $a = 0;
          foreach ($carro as $fila_c) : ?>
            <?php $total = 0; ?>
            <div class="col-3">
              <div class="card">
                <div class="card-body">
                  <label for="">Código:</label>
                  <p><?php echo $fila_c->id ?></p>
                  <label for="">Nombre:</label>
                  <p><?php echo $fila_c->nombre ?> <?php echo $fila_c->apellido ?></p>
                  <label for="">Direccion:</label>
                  <p><?php echo $fila_c->direccion ?></p>
                  <label for="">Correo:</label>
                  <p><?php echo $fila_c->correo ?></p>
                  <label for="">Celular:</label>
                  <p>+569<?php echo $fila_c->celular ?></p>
                </div>


                <ul class="collapsible" data-collapsible="accordion">
                  <li>
                    <div class="collapsible-header" style="font-size: 12px;">
                      <strong> PRODUCTOS:</strong> 
                    </div>
                    <div class="collapsible-body" style="font-size: 12px;">
                      <?php if ($detalle == 0) : ?>
                        <p class="black-text">No Hay pedidos seleccionados!</p>
                      <?php else : ?>
                        <?php $e = 0;
                        foreach ($detalle as $fila_d) : ?>
                          <?php if ($producto == 0) : ?>
                            <p class="black-text">No Hay pedidos seleccionados!</p>
                          <?php else : ?>
                            <?php if ($fila_c->id == $fila_d->id_carro) : ?>
                              <?php $i = 0;
                              foreach ($producto as $fila_p) : ?>
                                <?php if ($fila_d->id_producto == $fila_p->id) : ?>

                                  <div class="card horizontal">
                                    <div class="card-image">
                                      <img src="uploads/<?php echo $fila_p->img ?>" style="width: 5rem;">
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
                                  </div>

                                <?php endif; ?>
                              <?php $i++;
                              endforeach; ?>
                            <?php endif; ?>
                          <?php endif; ?>
                        <?php $e++;
                        endforeach; ?>
                      <?php endif; ?>
                    </div>
                  </li>
                </ul>

                <div class="card-content">
                  <label for="">Total Pedido</label>
                  <p class="btn white"><?php echo number_format($total) ?></p>
                </div>

                <?php if ($estado == 0) : ?>
                  <p class="black-text">No Hay pedidos seleccionados!</p>
                <?php else : ?>
                  <?php $o = 0;
                  foreach ($estado as $fila_e) : ?>
                    <?php if ($fila_e->id == $fila_c->id_estado) : ?>
                      <div class="card-content">
                        <label for="">Estado del pedido</label>
                        <?php if ($fila_e->nombre = 'ingresado') : ?>
                          <p class="btn green lighten-1 white-text"><?php echo $fila_e->nombre ?></p>
                        <?php elseif ($fila_e->nombre = 'Pagado') : ?>
                          <p class="btn yellow"><?php echo $fila_e->nombre ?></p>
                        <?php elseif ($fila_e->nombre = 'Enviado') : ?>
                          <p class="btn yellow"><?php echo $fila_e->nombre ?></p>
                        <?php endif; ?>
                      </div>
                    <?php endif; ?>
                  <?php $o++;
                  endforeach; ?>
                <?php endif; ?>
                <div class="card-content">
                  <a class="btn yellow black-text">Confirmar Pago</a>
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
<script>
  $('#btn_ingresar').modal();
  $(".button-collapse").sideNav({
    menuWidth: 300, // Default is 300
    edge: 'left', // Choose the horizontal origin
    closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
    draggable: true, // Choose whether you can drag to open on touch screens,
    onOpen: function(el) {
      /* Do Stuff */
    }, // A function to be called when sideNav is opened
    onClose: function(el) {
      /* Do Stuff */
    }, // A function to be called when sideNav is closed
  });
  $(document).ready(function() {
    $('.collapsible').collapsible();
  });
</script>