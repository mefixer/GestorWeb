<nav class="navbar">
  <div class="content-fluid">
    <div class="nav">
      <ul>
        <li><a class="btn"><img class="" src="img/logo.png" style="width: 20vh;"></a></li>
        <li><a class="btn" href="<?php echo base_url() ?>"> Inicio</a></li>
        <li><img alt="Contact Person" src="img/user.png" style="width: 2rem;"> <?php echo $primer_nombre ?> <?php echo $primer_apellido ?> </li>
        <li><a type="submit" class="btn" onclick="close_session()">Salir</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class="">
  <div class="row">
    <div class="col-2">
      <div class="col">
        <div class="d-grid gap-2">
          <label for="">Grupo: Usuarios</label>
          <a class="btn btn-outline-secondary" onclick="useradd()">Agregar</a>
        </div>
      </div>
      <div class="col">
        <div class="d-grid gap-2">
          <label for="">Grupo: Productos</label>
          <a class="btn btn-outline-secondary" onclick="productadd()">Agregar</a>
        </div>
      </div>
      <div class="col">
        <div class="d-grid gap-2">
          <label for="">Grupo: WEB</label>
          <a class="btn btn-outline-secondary" onclick="principaladd()">Principal</a>
          <a class="btn btn-outline-secondary" onclick="galeryadd()">Galeria</a>
          <a class="btn btn-outline-secondary" onclick="destacadosadd()">Productos destacados</a>
          <a class="btn btn-outline-secondary" onclick="postadd()">Post Instagram</a>
        </div>
      </div>
      <div class="col">
        <div class="d-grid gap-2">
          <label>Grupo: Pedido</label>
          <a class="btn btn-outline-secondary" onclick="pedidos()">Nuevos Pedidos</a>
          <a class="btn btn-outline-secondary" onclick="">Pedidos Confirmados</a>
          <a class="btn btn-outline-secondary" onclick="">Pedidos Enviados</a>
          <a class="btn btn-outline-secondary" onclick="">Pedidos en camino</a>
          <a class="btn btn-outline-secondary" onclick="">Pedidos Entregados</a>
        </div>
      </div>

    </div>
    <div class="col-10">
      <div class="container">
      <div id="contentadministrator" class="row">
      </div>
    </div>
  </div>
</div>
</div>