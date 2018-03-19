<br>
<?php $checkcount = 0?>
<div class="card-panel z-depth-5">
  <div>
    
    <a class="btn modal-trigger grey darken-1" href="#NewStudent"><i class="material-icons right">add_box</i><strong> New Student</strong></a>
    <button class="btn modal-trigger" href="#StudentHasClass"><i class="material-icons right">playlist_add_check</i> Add Student To Class</button>
  </div>
  <div id="NewStudent" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h4><strong>Student has Class</strong></h4>
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
              <?php $i = 0; foreach ($gender as $f_g):?>
              <option value="<?php echo $f_g->idgender?>"><?php echo $f_g->name?></option>
              <?php $i++; endforeach; ?>
            </select>
            <label>Role</label>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close btn waves-effect waves-green red darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
      <a href="#!" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="savestudent()"><i class="material-icons right">save</i><strong> Save</strong></a>
    </div>
  </div>
    
  <p><input type="checkbox" class="filled-in" id="studentcheckedall"/>
    <label for="studentcheckedall">Check all</label></p>
    <div id="check">
      <table class="responsive-table highlight">
        <thead>
          <tr>
            <th>Check</th>
            <th>Id Number</th>
            <th>Name</th>
            <th>Last Name</th>
            <th>User Name</th>
          </tr>
        </thead>
        <tbody>
          <?php if ($student == 0): ?><p>Don't Student!</p><?php else: ?>
            <?php $i = 0; foreach ($student as $fila):?>
            <?php $checkcount = $i?>
            <tr>
              <td>
                <p>
                  <input type="checkbox" id="selectstudent<?php echo $i?>"/>
                  <label for="selectstudent<?php echo $i?>"></label>
                </p>
              </td>
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
                <span class="card-title modal-trigger blue-grey darken-1" id="btneditstudentmodal<?php echo $i ?>" style="cursor: pointer;" href="#Modal_edit_student<?php echo $i ?>" data-tooltip="Edit Student"><i class="material-icons right">edit</i></span>
              </td>

              <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_edit_student<?php echo $i ?>">
                <div class="modal-content">
                  <h4>Edit Student</h4>
                  <div class="input-field col s6" hidden="true">
                    <input id="id_student_edit<?php echo $i?>" type="text" value="<?php echo $fila->idstudent?>">
                    <label for="id_student_edit<?php echo $i?>" class="active">Id student</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="id_number_edit<?php echo $i?>" type="text" value="<?php echo $fila->idnumber?>">
                    <label for="id_number_edit<?php echo $i?>" class="active">Id number</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="name_edit<?php echo $i?>" type="text"  value="<?php echo $fila->name?>">
                    <label for="name_edit<?php echo $i?>" class="active">Name</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="lastname_edit<?php echo $i?>" type="text"  value="<?php echo $fila->lastname?>">
                    <label for="lastname_edit<?php echo $i?>" class="active">Lastname</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="username_edit<?php echo $i?>" type="text" value="<?php echo $fila->username?>">
                    <label for="username_edit<?php echo $i?>" class="active">User Name</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="email_edit<?php echo $i?>" type="text" value="<?php echo $fila->email?>">
                    <label for="email_edit<?php echo $i?>" class="active">email</label>
                  </div>
                  <div class="input-field col s6">
                    <select id="idselectgender<?php echo $i?>">
                      <?php $e = 0; foreach ($gender as $fil_gender):?>
                      <option id="gender_option_edit<?php echo $e?>" value="<?php echo $fil_gender->idgender?>" <?php if($fila->gender_idgender === $fil_gender->idgender) echo "selected"?>> <?php echo $fil_gender->name?> </option>
                      <?php $e++; endforeach; ?>
                    </select>
                    <label>Role</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn modal-trigger modal-close red darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                  <button type="button" class="btn modal-trigger modal-close green darken-1" id="btneditstudent<?php echo $i ?>" onclick="updatestudent(<?php echo $i?>)"><i class="material-icons right">save</i><strong> Save</strong></button>
                </div>
              </div>

              <td>
                <span  class="card-title modal-trigger red-text" id="btndeletestudent<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_student<?php echo $i?>"  data-tooltip="Delete Student"><i class="material-icons right">delete</i></span>
              </td>

              <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_delete_student<?php echo $i?>">
                <div class="modal-content">
                  <div class="card-panel">
                    <h3><strong>Are you sure?</strong></h3>
                    <p>Please insert your password and delete.</p>
                  </div>
                  <div class="input-field col s4">
                    <input type="password" class="form-control" id="deletestudentValidate<?php echo $i ?>">
                    <label for="deletestudentValidate<?php echo $i ?>" >Password</label>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn modal-trigger modal-close grey darken-1"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                  <button type="button" class="btn modal-trigger modal-close  red darken-3" onclick="deleteStudent(<?php echo $i ?>)"><i class="material-icons right">save</i> Delete</button>
                </div>
              </div>

            </tr>
            

            <?php $i++; endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
    <!-- MODALs News-->
    <div id="StudentHasClass" class="modal modal-fixed-footer">
      <div class="modal-content">
       <h4><strong>Student has Class</strong></h4>
       <div class="input-field col s6">
        <select id="idselectclassstudent">
          <?php $e = 0; foreach ($class as $fil_class):?>
          <option id="idoptionclassStudent<?php echo $e?>" value="<?php echo $fil_class->idclass?>"> <?php echo $fil_class->classname?> </option>
          <?php $e++; endforeach; ?>
        </select>
        <label>Role</label>
      </div>
    </div>
    <div class="modal-footer">
      <a class="modal-action modal-close btn waves-effect waves-green red darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
      <a id="btnstudentclass" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="studentsaveclass(<?php echo $checkcount?>)"><i class="material-icons right">save</i><strong> Save</strong></a>
    </div>
  </div>
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