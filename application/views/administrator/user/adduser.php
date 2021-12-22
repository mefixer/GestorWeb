<div class="row">
  <div class="col s12">
    <form class="form">
      <div class="">
        <h4 style="font-weight: bolder;">INGRESO DE NUEVO USUARIO</h4>
      </div>
      <BR></BR>
      <div class="row">
        <div class="input-field col s2">
          <input id="rut" type="text" class="validate" maxlength="10" required onkeypress="checkRut(this)">
          <label for="rut">Rut</label>
        </div>
        <div class="input-field col s5">
          <input id="first_name" type="text" class="validate">
          <label for="first_name">Nombres</label>
        </div>
        <div class="input-field col s5">
          <input id="last_name" type="text" class="validate">
          <label for="last_name">Apellidos</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s2">
          <input id="username" type="text" class="validate">
          <label for="username">Nombre de usuario</label>
        </div>
        <div class="input-field col s5">
          <input id="password" type="password" class="validate">
          <label for="password">Contraseña</label>
        </div>
        <div class="input-field col s5">
          <input id="passwordConfirm" type="password" class="validate">
          <label for="passwordConfirm">Confirmar</label>
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
            <?php $e = 0;
            foreach ($rol as $fil) : ?>
              <option value="<?php echo $fil->idrole ?>"> <?php echo $fil->rolename ?> </option>
            <?php $e++;
            endforeach; ?>
          </select>
        </div>
        <div class="input-field col s4">
          <select id="gender">
            <option value="0" disabled selected>Genero del usuario</option>
            <?php $e = 0;
            foreach ($gender as $fil) : ?>
              <option value="<?php echo $fil->idgender ?>"> <?php echo $fil->name ?> </option>
            <?php $e++;
            endforeach; ?>
          </select>
        </div>
      </div>
  </div>
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