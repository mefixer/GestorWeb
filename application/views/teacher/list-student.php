<?php if ($datos == 0): ?><p>Don't Student!</p><?php else: ?>
<table class="responsive-table">
    <h2>Student List</h2>
  <thead>
    <tr>
      <th>Rut</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>First Surname</th>
      <th>Second Surname</th>
      <th>Name User</th>
      <th>Type</th>
    </tr>
    
    </thead>
    
    <tbody>
      <?php $i = 0; foreach ($datos as $fila):?>
      <tr>
       <td><?php echo $fila->rut ?></td>
       <td><?php echo $fila->first_name ?></td>
       <td><?php echo $fila->middle_name ?></td>
       <td><?php echo $fila->first_surname ?></td>
       <td><?php echo $fila->second_surname ?></td>
       <td><?php echo $fila->name_user ?></td>
       <td><?php echo $fila->type ?></td>
       <td>
         <button id="editar<?php echo $i ?>" href="#modal_edit_teacher" class="btn waves-effect white black-text modal-trigger">
          <i class="material-icons right">edit</i> Edit</button>
          <!-- Modal Structure -->
          <div class="container">
          <div id="modal_edit_teacher" class="modal">
            <div class="modal-content">
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">RUT</span>
                <input  id="inRutWorker<?php echo $i ?>" class="form-control" value="<?php echo $fila->rut ?>" disabled/>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">First Name</span>
                <input  id="inNameWorker<?php echo $i ?>" requiered maxlength="15" class="form-control" value="<?php echo $fila->first_name ?>" onkeypress="return soloLetras(event)" autofocus/>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">Middle Name</span>
                <input  id="inNameWorker<?php echo $i ?>" requiered maxlength="15" class="form-control" value="<?php echo $fila->middle_name ?>" onkeypress="return soloLetras(event)" autofocus/>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">First Surname</span>
                <input  id="inNameWorker<?php echo $i ?>" requiered maxlength="15" class="form-control" value="<?php echo $fila->first_surname ?>" onkeypress="return soloLetras(event)" autofocus/>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">Second Surname</span>
                <input  id="inNameWorker<?php echo $i ?>" maxlength="15" class="form-control" value="<?php echo $fila->second_surname ?>" onkeypress="return soloLetras(event)" autofocus/>
              </div>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">Name User</span>
                <input  id="inNameWorker<?php echo $i ?>" maxlength="15" class="form-control" value="<?php echo $fila->name_user ?>" onkeypress="return soloLetras(event)" autofocus/>
              </div>
              <br>
              <div class="card z-depth-5">Si quieres editar el Rut, debes eliminar al trabajador y crearlo nuevamente!</div>
            </div>
            <div class="modal-footer">
              <button class="waves-effect white darken-4 btn-large black-text" onclick="editWorkerUpdate(<?php echo $i ?>)"><i class="material-icons right">save</i> Edit</button>
            </div>
          </div>
          </div>
        </td>
        <td>
         <button id="delete<?php echo $i ?>" href="#Modal_delete_teacher" onclick="showDWorker('<?php echo $fila->rut ?>')" class="btn red darken-4 modal-trigger">
           <i class="material-icons right">delete</i>Delete</button>

           <div class="modal" tabindex="-1" role="dialog" id="Modal_delete_teacher">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <p class="passTl">Para confirmar Ingrese su contraseña!</p>
                <div class="form-group" id="passCont">
                  <label class="col-sm-4 control-label">Contraseña</label>
                  <div class="col-sm-8" id="ecErrorP2">
                    <input type="password" class="form-control" id="mepPass2" onblur="passVer2(this.value)">
                    <input type="hidden" id="ecpass2" value="" disabled="true">
                  </div>
                </div>
                <input type="hidden" id="wid" value="" disabled="true">
              </div>
              <div class="modal-footer">
                <button type="button" href+"#modal_delete_teacher" class="btn modal-trigger" >Cancelar</button>
                <button type="button" class="btn " onclick="deleteWorker()">Eliminar</button>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <?php $i++; endforeach; ?>
    </tbody>
    
  </table>
<?php endif; ?>
<input type="hidden" id="oculto" value="<php echo $i ?>"/>

  <script type="text/javascript">
    $('.modal').modal();
  </script>



<!-- <div class="z-depth-5 responsive-table">
<table class="highlight bordered responsive-table">
    <thead>
        <th>Rut</th>
        <th>First Name</th>
        <th>Middle Name</th>
        <th>First Surname</th>
        <th>Second Surname</th>
        <th>Name User</th>
        <th>Type</th>
    </thead>
    <tbody id="tb_teacher">

    </tbody>
</table>
</div> -->