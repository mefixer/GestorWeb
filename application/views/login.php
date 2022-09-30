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
            <div class="carousel-caption" style="padding-right: 35rem; padding-bottom: 10rem;">
              <h1 style="color: white;"><?php echo $fila->titulo ?></h1>
              <h5 style="color: white;"><?php echo $fila->columna ?></h5>
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
          <li><a class="nav_a" href="<?php echo base_url() ?>"><img class="" src="img/logo.png" style="width: 20vh;"></a></li>

          <li><a class="nav_a" onclick="revisar_pedido()">Mi pedido</a></li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<br>
<br>
<div class="container">
  <div class="galeria" id="">
    <div class="container text-center">
      <div class="row">
        <?php if ($galeria == 0) : ?>
          <p class="black-text">No Hay Galeria almacenada!</p>
        <?php else : ?>
          <?php $a = 0;
          foreach ($galeria as $fila) : ?>
            <div class="col">
              <div class="">
                <img style="max-width: 28rem;" src="img/<?php echo $fila->imagen ?>" class="attachment-full size-full" alt="j" loading="lazy" sizes="(max-width: 800px) 100vw, 800px">

              </div>
            </div>
            <div class="col">
              <div class="" style="padding-top: 15rem;">
                <h3><?php echo $fila->titulo ?></h3>
                <p><?php echo $fila->columna ?></p>
                <button class="btn tienda">Tienda</button>
              </div>
            </div>
          <?php $a++;
          endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col s12">
      <div class="container">
        <br>
        <br>
      </div>
    </div>
  </div>
  <div class="" id="destacados">
    <div class="row">
      <?php if ($destacados == 0) : ?>
        <p class="black-text">No Hay Destacados almacenadados!</p>
      <?php else : ?>
        <?php $a = 0;
        foreach ($destacados as $fila) : ?>
          <div class="col">
            <div class="card" style="width: 16rem;">
              <img src="img/<?php echo $fila->imagen ?>" alt="...">
              <div class="card-body">
                <h5><?php echo $fila->titulo ?></h5>
                <p class="card-text"><?php echo $fila->columna ?></p>
                <a class="btn " onclick="catalogo()">Ver</a>
              </div>
            </div>
          </div>
        <?php $a++;
        endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
  <br>
  <br>
  <div class="" id="posteos">
    <?php if ($posteos == 0) : ?>
      <p class="black-text">No Hay Posteos almacenadados!</p>
    <?php else : ?>
      <?php $a = 0;
      foreach ($posteos as $fila) : ?>
        <div class="">
          <img class="" src="img/<?php echo $fila->imagen ?>">
          <h3><?php echo $fila->titulo ?></h3>
          <p><?php echo $fila->columna ?></p>
        </div>

      <?php $a++;
      endforeach; ?>
    <?php endif; ?>
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