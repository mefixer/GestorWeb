<h5>Usuarios</h5>
<ul class="collection">
    <?php $e = 0;
    foreach ($users as $fil) : ?>
        <li class="collection-item">
        <div class="row">
        <div class="input-field col s2">
          <input id="rut" type="text" disabled  class="validate" maxlength="10" required onkeypress="checkRut(this)" value="<?php echo $fil->idnumber ?>">
          <label class="active" for="rut">Rut</label>
        </div>
        <div class="input-field col s4">
          <input id="name" type="text" disabled  class="validate" maxlength="10" value="<?php echo $fil->name ?>">
          <label class="active" for="name">Nombre</label>
        </div>
        <div class="input-field col s4">
          <input id="lastname" type="text" disabled  class="validate" maxlength="10" value="<?php echo $fil->lastname ?>">
          <label class="active" for="lastname">Apellido</label>
        </div>
        </div>
        </li>
    <?php $e++;
    endforeach; ?>

</ul>