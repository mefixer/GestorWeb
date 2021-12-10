<div class="row">
  <div class="col s12">
    <form class="form">
      <div class="">
        <h4 style="font-weight: bolder;">INGRESO DE NUEVO USUARIO</h4>
      </div>
      <BR></BR>
      <div class="row">
        <div class="input-field col s4">
          <input placeholder="" id="first_name" type="text" class="validate">
          <label for="first_name">Nombres</label>
        </div>
        <div class="input-field col s4">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Apellidos</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s2">
          <input id="password" type="password" class="validate">
          <label for="password">Contraseña</label>
        </div>
        <div class="input-field col s2">
          <input id="passwordConfirm" type="password" class="validate">
          <label for="passwordConfirm">Confirmar Contraseña</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s4">
          <input id="email" type="email" class="validate">
          <label for="email">Correo Electrónico</label>
        </div>
        <div class="input-field col s4">
          <select id="rol">
            <option value="0" disabled selected>Rol de usuario</option>
            <option value="1">Director de Area</option>
            <option value="2">Contador Municipal</option>
            <option value="3">Director de Finanzas</option>
            <option value="4">Administrador de Municipal</option>
            <option value="5">Unidad de Compra</option>
            <option value="6">Orden de Compra?</option>
          </select>
        </div>
      </div>
      <br>
      <button class="waves-effect waves-light btn light-green lighten-3 black-text" onclick="insertUser()"><i class="material-icons">check</i> LISTO</button>
    </form>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.collapsible');
    var instances = M.Collapsible.init(elems, options);
  });

  // Or with jQuery

  $(document).ready(function() {
    $('.collapsible').collapsible();
  });

  $(document).ready(function() {
    $('select').material_select();
  });
</script>