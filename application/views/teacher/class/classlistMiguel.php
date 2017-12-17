
<div class="panel"> <!-- panel -->
  <div class="panel panel-heading">
    <h4 class="panel-title" align="center"><i class="material-icons left">person_add</i><strong>NEW CLASS</strong></h4>
  </div>
  <div class="panel panel-body">
    <div class="row">
      <div class="col s12 m3">
        <div class="input-field">
          <input type="text" class="validate" maxlength="20" required onkeypress="return soloLetras(event)" id="classname" value="">
          <label for="classname">CLASS NAME</label>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col s12 m4">
        <div class="input-field">
          <textarea id="descriptionclasscenter" class="materialize-textarea validate" required maxlength="200" onkeypress="return soloLetras(event)"></textarea>
          <label for="name">DESCRIPTION CLASS CENTER</label>
        </div>
    </div>
    <div class="col s12 m4">
        <div class="input-field">
          <textarea id="descriptionclassleft"  class="materialize-textarea" required maxlength="200" onkeypress="return soloLetras(event)"></textarea>
          <label for="lastname">DESCRIPTION CLASS LEFT</label>
        </div>
    </div>
    <div class="col s12 m4">
        <div class="input-field">
          <textarea id="descriptionclassright" class="materialize-textarea" required maxlength="200" onkeypress="return soloLetras(event)"></textarea>
          <label for="username">DESCRIPTION CLASS RIGHT</label>
        </div>
      </div>
  </div>
  <div class="row">
    <div class="col s12 m3">
        <?php if ($teacher == 0): ?><p>Don't teacher!</p><?php else: ?>
          <div class="input-field">
            <select id="idselectgender">
              <?php $i = 0; foreach ($teacher as $filteacher):?>
              <option value="<?php echo $filteacher->idnumber?>"><?php echo $filteacher->name?> <?php echo $filteacher->lastname?></option>
              <?php $i++; endforeach; ?>
            </select>
            <label>Role</label>
          </div>
        <?php endif; ?>
      </div>  
  </div>

  <div class="panel-footer">
    <button class="waves-effect waves-light btn waves-green btn-large white black-text" type="button" onclick="saveclass()"><i class="material-icons right">save</i> Save Class</button>
    <br>
    <div class="progress">
      <div class="determinate" id="progress_login" style="<?php echo base_url()?>"></div>
    </div>
  </div>


</div><!--END  Panel-->

<h3><strong>CLASS LIST<strong></h3>
<p><input type="checkbox" class="filled-in" id="studentcheckedall"/>
  <label for="studentcheckedall">Select all</label></p>
  <?php if ($class == 0): ?><p>Don't Class!</p><?php else: ?>
    <div class="row">
      <div id="check">
        <form >
          <?php $i = 0; foreach ($class as $fila):?>
          <h1><?php echo $i; ?></h1>
          <div class="card">
            <div class="card-content">
              <div class="row">
                <div class="">
                  <p><input type="checkbox" class="filled-in" id="studentchecked<?php echo $i?>" />
                    <label for="studentchecked<?php echo $i?>">Select</label></p>
                  </div>
                </div>
                <div class="row">

                  <div class="col s12 m3">
                    <div class="input-field">
                      <i class="material-icons prefix">perm_identity</i>
                      <input type="text" class="validate active" onkeypress="checkRut(this)" data-length="45" maxlength="45" id="idnumber<?php echo $i?>" value="<?php echo $fila->idclass ?>">
                      <label for="idnumber<?php echo $i?>" class="active">ID Class</label>
                    </div>
                    <div class="input-field">
                      <input type="text" class="active" data-length="45" maxlength="45" id="name<?php echo $i?>" value="<?php echo $fila->classname ?>">
                      <label for="name<?php echo $i?>" class="active">Class Name</label>
                    </div>
                  </div>

                <div class="col s12 m6">
                  <div class="input-field">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input type="text" class="active" data-length="45" maxlength="45" id="descriptioncenter<?php echo $i?>" value="<?php echo $fila->descriptioncenter?>">
                    <label for="descriptioncenter<?php echo $i?>" class="active">Center Description</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input type="text" class="active" data-length="45" maxlength="45" id="descriptionleft<?php echo $i?>" value="<?php echo $fila->descriptionleft?>">
                    <label for="descriptionleft<?php echo $i?>" class="active">Left Description</label>
                  </div>
                  <div class="input-field">
                    <i class="material-icons prefix">assignment_ind</i>
                    <input type="text" class="active" data-length="45" maxlength="45" id="descriptionright<?php echo $i?>" value="<?php echo $fila->descriptionright?>">
                    <label for="descriptionright<?php echo $i?>" class="active">Right Description</label>
                  </div>
                  <div class="input-field">
                    <?php if ($teacher == 0): ?><p>Don't teacher!</p><?php else: ?>
                    <select disabled="true" id="idselecteacher">
                      <?php $i = 0; foreach ($teacher as $filteacher):?>
                      <option value="<?php echo $filteacher->idnumber?>" disabled selected><?php echo $filteacher->name?> <?php echo $filteacher->lastname?></option>
                      <?php $i++; endforeach; ?>
                    </select>
                    <?php endif; ?>
                    <label>Teacher Select</label>
                  </div>
                </div>

                  <div class="col s12">
                    <button class="btn white black-text" onclick="updateclass()" id="editclass<?php echo $i?>"><i class="material-icons right">edit</i> Edit</button>
                    <button id="delete<?php echo $i ?>" href="#Modal_delete_teacher"  class="btn red darken-4 modal-trigger">
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
                  </div>
              </div>
              <br>
            </div>
            <?php $i++; endforeach; ?>
          </form>
        </div>
      </div>
    <?php endif; ?>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#collapsible').collapsible();
      $('ul.tabs').tabs();
      $('select').material_select();
      $(".button-collapse").sideNav();
      $('input#input_text, textarea#textarea1').characterCounter();
      $('.modal').modal();
      $("#studentcheckedall").change(function () {
        if ($(this).is(':checked')) {
              //$("input[type=checkbox]").prop('checked', true); //todos los check
              $('#check input[type = checkbox]').prop('checked', true); //solo los del objeto #diasHabilitados
            } else {
              //$("input[type=checkbox]").prop('checked', false);//todos los check
              $('#check input[type = checkbox]').prop('checked', false);//solo los del objeto #diasHabilitados
            }
          });

    });
    
  </script>

