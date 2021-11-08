<div class="container blue lighten-2 hoverable z-depth-5">
  <br>
  <div class="row">
    <div class="col s12 m4">
      <!-- I am full-width on mobile (col s12 m6)-->
      <div class="panel panel-default card-panel hoverable z-depth-5">
        <div class="panel panel-heading">                                               
          <h4 class="panel-title">

            <i class="bi bi-person-circle"></i>
            <strong>API GESTOR </strong>
          </h4>
        </div>
        <div class="panel panel-body">
          <form>
            <div class="input-field col s12">
              <span class="input-group-addon"><strong>Usuario</strong></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" pattern="[A-Za-z0-9_-]{1,15}" required maxlength="20" class="form-control" placeholder="Nombre de Usuario" id="n__Loggin">
            </div>
            <div class="input-field col s12">
              <span class="input-group-addon"><strong>Contraseña</strong></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" pattern="[A-Za-z0-9_-]{1,15}" maxlength="30" required class="form-control" id="c__Loggin" placeholder="Contraseña">
            </div>
          </form>
        </div>
        <div class="panel-footer">
          <a type="submit" class="btn waves-effect waves-green white darken-4 btn-large black-text" onclick="load_user()"><i class="material-icons right">lock_open</i> Ingresar</a>
        </div>
        <br>
      </div>
    </div>
    <div class="grid-example col s6">
      <a ><img class="brand-logo center" style="width: 100%;" src="img/Chile.png"></a>
    </div>
  </div>

</div>