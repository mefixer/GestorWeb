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
      <div class="col s12">
        <ul class="collection">
          <li class="collection-item dismissable">
            <div>Usuario<a href="#!" class="secondary-content" onclick="useradd()"><i class="material-icons">add</i></a></div>
          </li>
          <li class="collection-item dismissable">
            <div>Bloqueados<a href="#!" class="secondary-content" onclick="bloqueados()"><i class="material-icons">block</i></a></div>
          </li>
          <li class="collection-item dismissable">
            <div>Parámetros<a href="#!" class="secondary-content" onclick="parametros()"><i class="material-icons">settings</i></a></div>
          </li>
          <li class="collection-item dismissable">
            <div>Estadísticas<a href="#!" class="secondary-content" onclick="estadisticas()"><i class="material-icons">insert_chart</i></a></div>
          </li>
        </ul>
      </div>

      <div class="col s12">

      </div>

    </div>
    <div id="Documentos" class="col s12">
      <div class="col s12">
        <ul class="collection">
          <li class="collection-item">
            <div>Documento<a href="#!" class="secondary-content"><i class="material-icons">attach_file</i></a></div>
          </li>
          <li class="collection-item ">
            <div>Fuera de Plazo<a href="#!" class="secondary-content"><i class="material-icons">block</i></a></div>
          </li>
          <li class="collection-item ">
            <div>Parámetros<a href="#!" class="secondary-content"><i class="material-icons">settings</i></a></div>
          </li>
          <li class="collection-item ">
            <div>Estadísticas<a href="#!" class="secondary-content"><i class="material-icons">insert_chart</i></a></div>
          </li>
        </ul>
      </div>
    </div>
    <div id="Pendientes" class="col s12">Pendientes</div>
    <div id="Archivos" class="col s12">Archivos</div>
    <div id="Configuracion" class="col s12">
    <div class="col s6">
        <ul class="collection">
          <li class="collection-item dismissable">
            <div>Mis Datos<a href="#!" class="secondary-content"><i class="material-icons">assignment_ind</i></a></div>
          </li>
          <li class="collection-item dismissable">
            <div>Mis Documentos<a href="#!" class="secondary-content"><i class="material-icons">attach_file</i></a></div>
          </li>
          <li class="collection-item dismissable">
            <div>Mis Parámetros<a href="#!" class="secondary-content"><i class="material-icons">settings</i></a></div>
          </li>
          <li class="collection-item dismissable">
            <div>Mis Estadísticas<a href="#!" class="secondary-content"><i class="material-icons">insert_chart</i></a></div>
          </li>
        </ul>
      </div>
    </div>
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
  $(document).ready(function() {
    $('ul.tabs').tabs();
  });
  $(document).ready(function() {
    $('ul.tabs').tabs('select_tab', 'Usuarios');
  });
</script>