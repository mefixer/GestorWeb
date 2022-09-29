  <form class="form">
    <div class="row">
      <div class="col-4">
        <div class="row">
          <h4>INGRESO DE USUARIO</h4>
          <div class="mb-3">
            <input id="rut" type="text" class="validate" maxlength="9" required onblur="checkRut(this)">
            <label for="rut">Rut</label>
          </div>
          <div class="mb-3">
            <input id="primer_nombre" type="text" class="validate">
            <label for="primer_nombre">Primer Nombre</label>
          </div>
          <div class="mb-3">
            <input id="segundo_nombre" type="text" class="validate">
            <label for="segundo_nombre">Segundo Nombre</label>
          </div>
          <div class="mb-3">
            <input id="primer_apellido" type="text" class="validate">
            <label for="primer_apellido">Primer Apellido</label>
          </div>
          <div class="mb-3">
            <input id="segundo_apellido" type="text" class="validate">
            <label for="segundo_apellido">Segundo apellido</label>
          </div>
        </div>
        <div class="mb-3">
          <input id="nombre_usuario" type="text" class="validate">
          <label for="nombre_usuario">Nombre de usuario</label>
        </div>
        <div class="mb-3">
          <input id="password" type="password" class="validate">
          <label for="password">Contraseña</label>
        </div>
        <div class="mb-3">
          <input id="passwordConfirm" type="password" class="validate">
          <label for="passwordConfirm">Confirmar</label>
        </div>
        <div class="mb-3">
          <input id="email" type="email" class="validate">
          <label for="email">Correo Electrónico</label>
        </div>
        <div class="mb-3">
          <select id="rol">
            <option value="0" disabled selected>Rol de usuario</option>
            <?php $e = 0;
            foreach ($rol as $fil) : ?>
              <option value="<?php echo $fil->id_rol ?>"> <?php echo $fil->nombre_rol ?> </option>
            <?php $e++;
            endforeach; ?>
          </select>
          <label for="rol">Rol Usuario</label>
        </div>
        <div class="mb-3">
          <select id="genero">
            <option value="0" disabled selected class="black-text">Genero del usuario</option>
            <?php $e = 0;
            foreach ($gender as $fil) : ?>
              <option value="<?php echo $fil->id_genero ?>"> <?php echo $fil->descripcion ?> </option>
            <?php $e++;
            endforeach; ?>
          </select>
          <label for="genero">Genero Usuario</label>
        </div>
        <div class="card-action">
          <a class="btn btn-success" onclick="agregar_usuario()">Agregar Usuario</a>
        </div>
      </div>
      <div class="col s6">
        <div class="row">
          <div class="card">
            <div class="card-body">
              <h4 style="font-weight: bolder;" class="black-text">LISTA DE USUARIOS</h4>
              <div class="row">
                <?php if ($usuario == 0) : ?>
                  <p>No Hay Usuarios almacenados!</p>
                <?php else : ?>
                  <?php $e = 0;
                  foreach ($usuario as $fil) : ?>
                    <div class="col">
                      <div class="card">
                        <div class="card-body">
                          <span class="card-title">
                            <div><img alt="Contact Person" src="img/user.png" style="width: 2rem;"><?php echo $fil->primer_nombre ?> <?php echo $fil->primer_apellido ?></div>
                          </span>
                          <div class="">
                            <p class="black-text" for="rut">Rut: <?php echo $fil->rut ?></p>
                          </div>
                        </div>
                        <div class="card-action">
                          <a class="btn" id="edituser<?php echo $e ?>" onclick="editUser(<?php echo $fil->id_usuario ?>)">Editar</a>
                          <a class="btn" id="deleteuser<?php echo $e ?>" onclick="deleteUser(<?php echo $fil->id_usuario ?>)">Eliminar</a>
                        </div>
                      </div>
                    </div>
                  <?php $e++;
                  endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </form>
