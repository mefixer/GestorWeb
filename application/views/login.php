<div class="container blue-grey lighten-3 z-depth-5">
  <br>
  <div class="row">
    <div class="col s1">

    </div>
    <div class="col s10">
      <div class="panel panel-default card-panel">
        <div class="center panel panel-heading">
          <a><img class="img" style="width: 10%;" src="img/Escudo.png"></a>
          <h4 class="panel-title">
            <strong>INGRESO API - ORDEN DE COMPRA</strong>
          </h4>
        </div>
        <div class="panel panel-body">
          <form>
            <div class="input-field col s6">
              <span class="input-group-addon"><strong>Usuario</strong></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
              <input type="text" pattern="[A-Za-z0-9_-]{1,15}" required maxlength="20" class="form-control" placeholder="Nombre de Usuario" id="n__Loggin">
            </div>
            <div class="input-field col s6">
              <span class="input-group-addon"><strong>Contraseña</strong></span>
              <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              <input type="password" pattern="[A-Za-z0-9_-]{1,15}" maxlength="30" required class="form-control" id="c__Loggin" placeholder="Contraseña">
            </div>
          </form>
        </div>
        <div class="panel-footer">
          <a type="submit" class="waves-effect waves-ligh btn light-green lighten-4 black-text" onclick="load_user()"><i class="material-icons right">lock_open</i> Ingresar</a>
        </div>
        <br>
      </div>
    </div>
    <div class="col s1">

    </div>
  </div>

</div>