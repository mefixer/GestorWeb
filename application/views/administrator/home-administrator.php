<nav class="nav-extended blue-grey lighten-1">
  <div class="nav-wrapper">
    <ul id="nav-mobile" class="hide-on-med-and-down">
      <li>
        <a href="<?php echo base_url() ?>" class="logo"><img src="img/Escudo.png" style="width: 30px; padding-left:5px; padding-top:5px;"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      </li>
      <li>
        <div class="nav-mobile">
          <ul class="tabs tabs-transparent">
            <li class="tab"><a href="#Usuarios">USUARIOS</a></li>
            <li class="tab"><a href="#Documentos">DOCUMENTOS</a></li>
            <li class="tab disabled"><a href="#Pendientes">PENDIENTES</a></li>
            <li class="tab disabled"><a href="#Archivos">ARCHIVOS</a></li>
            <li class="tab disabled"><a href="#Configuracion">CONFIGURACIONES</a></li>
          </ul>
        </div>
      </li>
    </ul>
    <ul class="nav-mobile right">
      <li>
        <div class="chip"><img alt="Contact Person" src="img/teacher<?php echo $gender_name ?>.png"> <?php echo $name ?> <?php echo $lastname ?></div>
      </li>
      <li><a class="waves-effect waves-light btn  red lighten-1" onclick="close_session()"><i class="material-icons right ">exit_to_app</i> Salir</a></li>
    </ul>
    <ul class="side-nav" id="mobile-demo">
      <li><a><strong>Administrador</strong> :</a></li>
      <li>
        <div class="chip"><img alt="Contact Person" src="img/teacher<?php echo $gender_name ?>.png"> <?php echo $name ?> <?php echo $lastname ?></div>
      </li>
      <li></li>
      <li><a class="waves-effect waves-light btn  red lighten-1" onclick="close_session()"><i class="material-icons right">exit_to_app</i> Salir</a></li>
    </ul>
  </div>
</nav>
<br>
<!-- BODY PAGE AND BUTTON LIST-->
<div class="row">
  <div class="col s4 m3">
    <div id="Usuarios">
      <div class="col s9">
        <ul class="collapsible popout" data-collapsible="accordion">
          <li class="collection-item">
            <div class="collapsible-header">
              <p>
                <i class="material-icons">add</i>USUARIOS
              </p>
            </div>
            <div class="collapsible-body">
              <div class="row">
                <button class="waves-effect waves-light btn blue-grey lighten-5 black-text col s12" onclick="useradd()"><i class="material-icons">add</i> AGREGAR</button>
                <button class="waves-effect waves-light btn blue-grey lighten-5 black-text col s12" onclick="userlist()"><i class="material-icons">list</i> LISTADO</button>
              </div>
              <div class="row">
                <div class="card blue-grey darken-1">
                  <div class="card-content white-text">
                    <span class="card-title">SUGERENCIA</span>
                    <p>Al ingresar un usuario podra decidir que rol tendra y con ello que acceso a la aplicacion.</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <!-- <li class="collection-item dismissable">
            <div class="collapsible-header">
              <p>
              <i class="material-icons">block</i>
              Bloqueados
              </p>
            </div>
            <div class="collapsible-body">
              <p>Aqui se podra bloquear usuarios para que no puedan acceder mas a la aplicacion</p>
            </div>
          </li> -->
          <li class="collection-item dismissable">
            <div class="collapsible-header">
              <p>
                <i class="material-icons">settings</i>
                Parámetros
              </p>
            </div>
            <div class="collapsible-body">
              <p>Aqui podra cambiar parametros de la aplicacion y de usuarios</p>
            </div>
          </li>
          <!-- <li class="collection-item dismissable">
            <div class="collapsible-header">
              <p>
              <i class="material-icons">insert_chart</i>
              Estadísticas
              </p>
            </div>
            <div class="collapsible-body">
              <p>Aqui se puede ver la estadistica de usuarios y documentos generados.</p>
            </div>
          </li> -->
        </ul>
      </div>
    </div>
    <div id="Documentos">
      <div class="col s12">
        <ul class="collapsible popout" data-collapsible="accordion">
          <li class="collection-item">
            <div class="collapsible-header">
              <p> <i class="material-icons">attach_file</i>DOCUMENTOS</p>
            </div>
            <div class="collapsible-body">
              <div class="row">
                <button class="waves-effect waves-light btn blue-grey lighten-5 black-text col s12" onclick="solicadd()"><i class="material-icons">add</i> AGREGAR</button>
                <button class="waves-effect waves-light btn blue-grey lighten-5 black-text col s12"><i class="material-icons">list</i> LISTAR</button>
              </div>
              <div class="row">
                <div class="card blue-grey darken-1">
                  <div class="card-content white-text">
                    <span class="card-title">SUGERENCIA</span>
                    <p>Puedes ingresar solicitudes de compra para que sean validadas por los jefes de Unidad.</p>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <!-- <li class="collection-item">
            <div class="collapsible-header">
              <p><i class="material-icons">block</i>Fuera de Plazo</p>
            </div>
            <div class="collapsible-body">
              <p>Al ingresar un usuario podra decidir que rol tendra y con ello que acceso a la aplicacion.</p>
            </div>
          </li>
          <li class="collection-item ">
            <div class="collapsible-header">
              <p>
              <i class="material-icons">settings</i>
              Parámetros
              </p>
            </div>
            <div class="collapsible-body">
              <p>Al ingresar un usuario podra decidir que rol tendra y con ello que acceso a la aplicacion.</p>
            </div>
          </li>
          <li class="collection-item ">
            <div class="collapsible-header">
              <p>
              <i class="material-icons">insert_chart</i>
              Estadísticas
              </p>
            </div>
            <div class="collapsible-body">
              <p>Al ingresar un usuario podra decidir que rol tendra y con ello que acceso a la aplicacion.</p>
            </div>
          </li> -->
        </ul>
      </div>
    </div>
    <div id="Pendientes">Pendientes</div>
    <div id="Archivos">Archivos</div>
    <div id="Configuracion">
      <div class="col s12">
        <ul class="collection popout">
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
  <div class="col s8 m9">
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