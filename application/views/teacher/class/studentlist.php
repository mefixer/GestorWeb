
<div class="panel"><!-- panel -->
  <div class="panel panel-heading">
    <h4 class="panel-title" align="center"><i class="material-icons left">person_add</i><strong>NEW STUDENT</strong></h4>
  </div>
  <div class="panel panel-body">
    <div class="row">

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
  </div>

  <div class="panel-footer">
    <button class="waves-effect waves-light btn waves-green btn-large white black-text" type="button" onclick="savestudent()" id="savestudent"><i class="material-icons right">save</i> Save Student</button>
    <br>
    <div class="progress">
      <div class="determinate" id="progress_login" style="<?php echo base_url()?>"></div>
    </div>
  </div>


</div><!--END  Panel-->

<br>
<br>
  <ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active" id="myPager"><a>1</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
  <?php if ($student == 0): ?><p>Don't Student!</p><?php else: ?>
  <table class="highlight" id="tablestudent">
    <thead>
      <tr>
        <h3>Student List</h3>
        <p><input type="checkbox" class="filled-in" id="studentcheckedall"/>
          <label for="studentcheckedall">Select all</label></p>
        </tr>
      </thead>
      <?php $i = 0; foreach ($student as $fila):?>
      <tbody>
        <tr>
          <td>
            <div class="row">
              <div id="check">
                  <div class="card">
                    <div class="card-content">
                      <div class="row">
                        <div class="">
                          <p><input type="checkbox" class="filled-in" id="studentchecked<?php echo $i?>" />
                            <label for="studentchecked<?php echo $i?>">Select</label></p>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s4" hidden="true">
                            <div class="input-field">
                              <i class="material-icons prefix">perm_identity</i>
                              <!-- <textarea id="textarea1" class="materialize-textarea" data-length="200" maxlength="200"></textarea> -->
                              <input type="text" class="validate active" onkeypress="checkRut(this)" data-length="45" maxlength="45" id="idstudentstudent<?php echo $i?>" value="<?php echo $fila->idnumber ?>">
                              <label for="idstudentstudent<?php echo $i?>" class="active">ID Number</label>
                            </div>
                          </div>
                          <div class="col s4">
                            <div class="input-field">
                              <i class="material-icons prefix">perm_identity</i>
                              <!-- <textarea id="textarea1" class="materialize-textarea" data-length="200" maxlength="200"></textarea> -->
                              <input type="text" class="validate active" onkeypress="checkRut(this)" data-length="45" maxlength="45" id="idnumberstudent<?php echo $i?>" value="<?php echo $fila->idnumber ?>">
                              <label for="idnumberstudent<?php echo $i?>" class="active">ID Number</label>
                            </div>
                          </div>

                          <div class="col s8">
                            <div class="input-field">
                              <!-- <i class="material-icons prefix">person_pin</i> -->
                              <!-- <textarea id="textarea1" class="materialize-textarea" data-length="200" maxlength="200"></textarea> -->
                              <input type="text" class="active" data-length="45" maxlength="45" id="namestudent<?php echo $i?>" value="<?php echo $fila->name ?>">
                              <label for="namestudent<?php echo $i?>" class="active">Name</label>
                            </div>
                          </div>
                          <div class="col s6">
                            <div class="input-field col">
                              <!-- <i class="material-icons prefix">person_pin</i> -->
                              <!-- <textarea id="textarea1" class="materialize-textarea" data-length="200" maxlength="200"></textarea> -->
                              <input type="text" class="active" data-length="45" maxlength="45" id="lastnamenamestudent<?php echo $i?>" value="<?php echo $fila->lastname?>">
                              <label for="lastnamestudent<?php echo $i?>" class="active">Last Name</label>
                            </div>
                          </div>

                          <div class="col s6">
                            <div class="input-field">
                              <i class="material-icons prefix">assignment_ind</i>
                              <!-- <textarea id="textarea1" class="materialize-textarea" data-length="200" maxlength="200"></textarea> -->
                              <input type="text" class="active" data-length="45" maxlength="45" id="usernamestudent<?php echo $i?>" value="<?php echo $fila->username?>">
                              <label for="usernamestudent<?php echo $i?>" class="active">User Name</label>
                            </div>
                          </div>
                          <div class="col s6">
                            <?php if ($role == 0): ?><p>Don't Role!</p><?php else: ?>
                              <div class="input-field">
                                <select disabled>
                                  <?php $i = 0; foreach ($role as $filrole):?>
                                  <option value="<?php echo $filrole->idrole?>"><?php echo $filrole->rolename?></option>
                                  <?php $i++; endforeach; ?>
                                </select>
                                <label>Role</label>
                              </div>
                            <?php endif; ?>
                          </div>
                          <div class="col s6">
                            <?php if ($gender == 0): ?><p>Don't Gender!</p><?php else: ?>
                              <div class="input-field">
                                <select id="selectgenderStudentedit<?php echo $i?>">
                                  <?php $i = 0; foreach ($gender as $filgender):?>
                                  <option value="<?php echo $filgender->idgender?>"><?php echo $filgender->name?></option>
                                  <?php $i++; endforeach; ?>
                                </select>
                                <label>Role</label>
                              </div>
                            <?php endif; ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s6">
                            <button class="btn white black-text" onclick="updatestudent(<?php echo $i?>)" id="editstudent<?php echo $i?>"><i class="material-icons right">edit</i> Edit</button>
                          </div>
                          <div class="col s6">
                            <button id="delete<?php echo $i ?>" href="#Modal_delete_teacher"  class="btn red darken-4 modal-trigger"><i class="material-icons right">delete</i> Delete</button>

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
                      </div>
                      <br>
                    </div>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
        <?php $i++; endforeach; ?>
      </table>
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
              $('#check input[type = checkbox]').prop('checked', true); //solo los del objeto #Habilitados
            } else {
              //$("input[type=checkbox]").prop('checked', false);//todos los check
              $('#check input[type = checkbox]').prop('checked', false);//solo los del objeto #Habilitados
            }
          });
      });
    </script>