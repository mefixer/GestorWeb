<br>
<div class="card-panel">
  
<a class="btn modal-trigger grey darken-1" href="#NewStudent"><i class="material-icons right">add_box</i><strong> New Student</strong></a>

<div id="NewStudent" class="modal">
      <div class="modal-content">
        <div class="panel"><!-- panel -->
              <div class="panel panel-heading">
                <h4 class="panel-title" align="center"><i class="material-icons left">person_add</i><strong>NEW STUDENT</strong></h4>
              </div>
              <div class="panel panel-body">
                    <div class="col s3">
                      <div class="input-field">
                        <input type="text" class="validate" maxlength="10" required onkeypress="checkRut(this)" id="studentidnumber">
                        <label for="studentidnumber">ID Number</label>
                      </div>
                    </div>
                    <div class="col s8">
                      <div class="input-field">
                        <input type="text" class="validate" required maxlength="20" onkeypress="return soloLetras(event)" id="studentname">
                        <label for="studentname">Name</label>
                      </div>
                    </div>

                    <div class="col s6">
                      <div class="input-field">
                        <input type="text" class="validate" required maxlength="20" onkeypress="return soloLetras(event)"  id="studentlastname">
                        <label for="studentlastname">Lastname</label>
                      </div>
                    </div>
                    <div class="col s6">
                      <div class="input-field">
                        <input type="text" class="validate" required maxlength="20" onkeypress="return soloLetras(event)"  id="studentusername">
                        <label for="studentusername">User Name</label>
                      </div>
                    </div>
                    <div class="col s6">
                      <div class="input-field">
                        <input type="Password" maxlength="30" class="validate" required  id="studentpassword">
                        <label for="studentpassword">Password</label>
                      </div>
                    </div>
                    <div class="col s6">
                      <div class="input-field">
                        <input type="Password" maxlength="30" class="validate" required id="studentpasswordconfirm">
                        <label for="studentpasswordconfirm">Password Comfirm</label>
                      </div>
                    </div>
                    <div class="col s12">
                      <div class="input-field">
                        <input type="text" class="validate" maxlength="20" required   id="studentemail">
                        <label for="studentemail">Email</label>
                      </div>
                    </div>
                    <div class="col s6">
                      <div class="input-field">
                        <select disabled="true" id="idselectgender">
                          <option value="1" disabled selected>Student</option>
                        </select>
                        <label>Rol Select</label>
                      </div>
                    </div>
                    <div class="col s6">
                      <?php if ($gender == 0): ?><p>Don't Gender!</p><?php else: ?>
                        <div class="input-field">
                          <select id="idselectgender">
                            <?php $i = 0; foreach ($gender as $fila):?>
                            <option value="<?php echo $fila->idgender?>"><?php echo $fila->name?></option>
                            <?php $i++; endforeach; ?>
                          </select>
                          <label>Role</label>
                        </div>
                      <?php endif; ?>
                    </div>
              </div>
        </div><!--END  Panel-->
      </div>
      <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red">CANCEL</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="savestudent()">SAVE</a>
      </div>
</div>

<table class="responsive-table">
        <thead>
          <tr>
              <th>Id Number</th>
              <th>Name</th>
              <th>Last Name</th>
              <th>User Name</th>
          </tr>
        </thead>
              <tbody>
                  <?php if ($student == 0): ?><p>Don't Student!</p><?php else: ?>
                      <?php $i = 0; foreach ($student as $fila):?>
                        <tr>
                          <td>
                            <p><?php echo $fila->idnumber ?></p>
                          </td>
                          <td>
                            <p><?php echo $fila->name ?></p>
                          </td>
                          <td>
                            <p><?php echo $fila->lastname?></p>
                          </td>
                          <td>
                            <p><?php echo $fila->username?></p>
                          </td>
                          
                          <td>
                            <span class="card-title grey-text" style="cursor: pointer;" onclick="updatestudent(<?php echo $i?>)" id="editstudent<?php echo $i?>"><i class="material-icons right">edit</i></span>
                          </td>
                          <td>
                            <span id="delete<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_teacher"  class="card-title red-text"><i class="material-icons right">delete</i></span>
                          </td>
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
                        </tr>
                        <?php $i++; endforeach; ?>
                  <?php endif; ?>
        </tbody>
      
</table>
</div>


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
              $('#check input[type = checkbox]').prop('checked', true); //solo los del objeto #Habilitados
            } else {
              //$("input[type=checkbox]").prop('checked', false);//todos los check
              $('#check input[type = checkbox]').prop('checked', false);//solo los del objeto #Habilitados
            }
          });
      });
    </script>