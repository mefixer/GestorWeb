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
          <li><a class="btn" href="<?php echo base_url() ?>"> Inicio</a></li>
          <li><a class="btn" onclick="catalogo()"> Tienda</a></li>
          <li><a class="btn"><img class="" src="img/logo.png" style="width: 20vh;"></a></li>
          <li><a class="btn" onclick="verCarrito()"> Carrito <?php echo $cantidad ?></span></a><span></li>
          <li><a class="btn" onclick="revisar_pedido()">Mi pedido</a></li>
          <li><a class="btn" data-bs-toggle="modal" data-bs-target="#InModal">IN</a></li>
        </ul>
      </div>
    </div>
  </nav>


<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-content">
                <h2><?php echo $nombre ?> <?php echo $apellido ?></h2>
            </div>
            <div class="card-content">
                <h4>Tu Codigo de Pedido es:</h4>
                <h2><?php echo $codigo ?></h2>
            </div>
            <div class="card-content">
                <p>A este correo -> <a><?php echo $correo ?></a> sera enviado!</p>
            </div>
        </div>
<a class="btn waves-effect wave-ligh" href="<?php echo base_url() ?>">Volver</a>
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
</script>