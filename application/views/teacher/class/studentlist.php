<br>
<?php $checkcount = 0?>
<div class="card-panel z-depth-3">
      <button class="modal-trigger btn waves-effect waves-green grey darken-3" href="#NewStudent"><i class="material-icons left">add_box</i><strong> New Student</strong></button>
      <button class="btn modal-trigger" href="#StudentHasClass"><i class="material-icons right">playlist_add_check</i> Add Student To Class</button>

<br>
          <div id="NewStudent" class="modal modal-fixed-footer">
            <div class="modal-content">
              <h4><strong>New Student</strong></h4>
              <div class="col s3">
                <div class="input-field">
                  <input type="text" class="validate" maxlength="10" required onkeypress="checkRut(this)" id="studentidnumber">
                  <label for="studentidnumber">ID Number</label>
                </div>
              </div>
              <div class="col s8">
                <div class="input-field">
                  <input type="text" class="validate" required maxlength="45" onkeypress="return soloLetras(event)" id="studentname">
                  <label for="studentname">Name</label>
                </div>
              </div>
              <div class="col s6">
                <div class="input-field">
                  <input type="text" class="validate" required maxlength="45" onkeypress="return soloLetras(event)"  id="studentlastname">
                  <label for="studentlastname">Lastname</label>
                </div>
              </div>
              <div class="col s6">
                <div class="input-field">
                  <input type="text" class="validate" required maxlength="45" onkeypress="return soloLetras(event)"  id="studentusername">
                  <label for="studentusername">User Name</label>
                </div>
              </div>
              <div class="col s6">
                <div class="input-field">
                  <input type="Password" maxlength="45" class="validate" required  id="studentpassword">
                  <label for="studentpassword">Password</label>
                </div>
              </div>
              <div class="col s6">
                <div class="input-field">
                  <input type="Password" maxlength="45" class="validate" required id="studentpasswordconfirm">
                  <label for="studentpasswordconfirm">Password Comfirm</label>
                </div>
              </div>
              <div class="col s12">
                <div class="input-field">
                  <input type="text" class="validate" maxlength="45" required   id="studentemail">
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
                    <select id="idselectgenderstudent">
                      <?php $i = 0; foreach ($gender as $f_g):?>
                      <option value="<?php echo $f_g->idgender?>"><?php echo $f_g->name?></option>
                      <?php $i++; endforeach; ?>
                    </select>
                    <label>Gender</label>
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="modal-footer">
              <a href="#!" class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
              <a href="#!" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="savestudentadmin()"><i class="material-icons right">save</i><strong> Save</strong></a>
            </div>
          </div>
</div>
  <p class=""><input type="checkbox" class="filled-in" id="studentcheckedall"/>
    <label for="studentcheckedall">Check all</label></p>
<div class="card-panel z-depth-3">
      <div id="check">
            <?php if ($student == 0): ?><p>Don't Student!</p><?php else: ?>
              <?php $i = 0; foreach ($student as $fila):?>
              <?php $checkcount = $i?>
                  <div class="row">
                    <div class="col s12 m12">
                      <div class="card blue-grey lighten-5 z-depth-5">
                        <div class="card-content">
                          <p>
                        <input type="checkbox" id="selectstudent<?php echo $i?>"/>
                        <label for="selectstudent<?php echo $i?>">Select </label></p>
                        <br>
                          <span class="card-title"> 
                              <strong><?php echo $fila->name ?> <?php echo $fila->lastname?></strong>
                          </span>

                          <blockquote><strong>Id Number :</strong> <?php echo $fila->idnumber ?></blockquote>
                          
                          <blockquote><strong>User Name :</strong> <?php echo $fila->username?></blockquote>
                          <blockquote><strong>Email:</strong> <?php echo $fila->email?></blockquote>
                          <h5><strong>section :</strong></h5>
                            <?php $o = 0; foreach ($student_has_section as $filshs):?>
                              <?php $os = 0; foreach ($section as $fil_section): ?>
                                  <?php if($fila->idstudent === $filshs->student_idstudent && $filshs->section_idsection === $fil_section->idsection): ?>
                                        <div class="chip" >
                                          <img src="img/section.png" alt="Contact Person">
                                          <span >
                                            <?php $idstudent = $filshs->student_idstudent?>
                                            <?php $idsection = $filshs->section_idsection ?>
                                            <?php $student_role_idrole = $filshs->student_role_idrole ?>
                                            <?php $student_gender_idgender = $filshs->student_gender_idgender ?>
                                            <?php echo $fil_section->sectionname ?>
                                            <i id="idsp<?php echo $i?>" onclick="deleterelstudentclass(<?php echo $idstudent?>,<?php echo $idclass?>,<?php echo $idteacher?>)" class="close material-icons" >close</i>
                                          </span>
                                        </div>
                                  <?php endif; ?>
                                <?php $os++; endforeach; ?>
                            <?php $o++; endforeach;?>
                        </div>
                        <div class="card-action">
                          <button class="btn modal-trigger grey lighten-3 black-text" id="btneditstudentmodal<?php echo $i ?>" style="cursor: pointer;" href="#Modal_edit_student<?php echo $i ?>" data-tooltip="Edit Student"><i class="material-icons right">edit</i>Edit</button>
                          <button  class="modal-trigger btn red darken-3" id="btndeletestudent<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_student<?php echo $i?>"  data-tooltip="Delete Student"><i class="material-icons right">delete</i>Delete</button>

                        </div>
                      </div>
                    </div>
                    </div>
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
                      <div class="input-field col s6" hidden="true">
                        <input id="id_role_edit_student<?php echo $i?>" type="text" value="<?php echo $fila->role_idrole?>">
                        <label for="id_role_edit_student<?php echo $i?>" class="active">Id student</label>
                      </div>
                      <div class="input-field col s6">
                        <select id="idselectgenderstudent<?php echo $i?>">
                          <?php $e = 0; foreach ($gender as $fil_gender):?>
                          <option id="gender_option_edit<?php echo $e?>" value="<?php echo $fil_gender->idgender?>" <?php if($fila->gender_idgender === $fil_gender->idgender) echo "selected"?>> <?php echo $fil_gender->name?> </option>
                          <?php $e++; endforeach; ?>
                        </select>
                        <label>Role</label>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                      <button type="button" class="btn modal-trigger modal-close green darken-1" id="btneditstudent<?php echo $i ?>" onclick="updatestudent(<?php echo $i?>)"><i class="material-icons right">save</i><strong> Save</strong></button>
                    </div>
                    </div>
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
                      <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                      <button type="button" class="btn modal-trigger modal-close  red darken-3" onclick="deleteStudent(<?php echo $i ?>)"><i class="material-icons right">save</i> Delete</button>
                    </div>
                  </div>
              <?php $i++; endforeach; ?>
            <?php endif; ?>
      </div>
    <!-- MODALs News-->
    <div id="StudentHasSection" class="modal modal-fixed-footer">
        <div class="modal-content">
         <h4><strong>Student has Section</strong></h4>
         <div class="input-field col s6">
          <select id="idselectsectionstudent">
            <?php $e = 0; foreach ($section as $fil_section):?>
            <option value="<?php echo $fil_section->idsection?>"> <?php echo $fil_section->sectionname?> </option>
            <?php $e++; endforeach; ?>
          </select>
          <label>Section</label>
        </div>
        </div>
        <div class="modal-footer">
          <a class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
          <a id="btnstudentclass" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="studentsavesection(<?php echo $checkcount?>)"><i class="material-icons right">save</i><strong> Save</strong></a>
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