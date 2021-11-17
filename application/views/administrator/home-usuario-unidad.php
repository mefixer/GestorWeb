<nav class="nav-extended blue lighten-2">
  <div class="nav-wrapper">
    <a href="<?php echo base_url() ?>" class="logo"><img src="img/Chile.png" style="width: 5%; padding-left: 1%;"></a>
    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a><strong>Administrador</strong> :</a></li>
      <li>
        <div class="chip"><img alt="Contact Person" src="img/teacher<?php echo $gender_name ?>.png"> <?php echo $name ?> <?php echo $lastname ?></div>
      </li>
      <li></li>
      <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Cerrar</a></li>
    </ul>
    <ul class="side-nav" id="mobile-demo">
      <li><a><strong>Administrador</strong> :</a></li>
      <li>
        <div class="chip"><img alt="Contact Person" src="img/teacher<?php echo $gender_name ?>.png"> <?php echo $name ?> <?php echo $lastname ?></div>
      </li>
      <li></li>
      <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
    </ul>
  </div>
  <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#Usuarios">Usuarios</a></li>
        <li class="tab"><a href="#Documentos">Documentos</a></li>
        <li class="tab"><a href="#Pendientes">Pendientes</a></li>
        <li class="tab"><a href="#Archivos">Archivos</a></li>
        <li class="tab"><a href="#Configuracion">Configuracion</a></li>
      </ul>
    </div>

</nav>
<br>
<!-- BODY PAGE AND BUTTON LIST-->
<div class="row">
  <div class="col s12 m3">
  <div id="Usuarios" class="col s12">
  <div class="row">
    <form class="col s12">
      <div class="row">
        <div class="input-field col s6">
          <input placeholder="" id="first_name" type="text" class="validate">
          <label for="first_name">Nombre</label>
        </div>
        <div class="input-field col s6">

          <input id="last_name" type="text" class="validate">
          <label for="last_name">Apellido</label>
        </div>
      </div>

      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
          <label for="password">Password</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
        <i class="material-icons prefix">mail</i>
          <input id="email" type="email" class="validate">
          <label for="email">Email</label>
        </div>
      </div>

    </form>
  </div>
  </div>
  <div id="Documentos" class="col s12">Documentos</div>
  <div id="Pendientes" class="col s12">Pendientes</div>
  <div id="Archivos" class="col s12">Archivos</div>
  <div id="Configuracion" class="col s12">Configuracion</div>
  </div>
  <div class="col s12 m9 19">
    <div id="contentadministrator">

    </div>
  </div>
</div>


<script type="text/javascript">
  $(document).ready(function() {
    $('.modal').modal();
    $('#collapsible').collapsible('active');
    $('ul.tabs').tabs();
    $('select').material_select();
    $(".button-collapse").sideNav();
    //Materialize effects
    $('.tooltipped').tooltip({
      delay: 50
    });
  });
  $(document).ready(function() {
    $('.collapsible').collapsible();
  });
  $(document).ready(function(){
    $('ul.tabs').tabs();
  });
  $(document).ready(function(){
    $('ul.tabs').tabs('select_tab', 'Usuarios');
  });
</script>