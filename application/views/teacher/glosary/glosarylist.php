<div class="container">
    <div class="panel">
        <div class="panel panel-heading">
            <br>
            <h4 class="panel-title" align="center"><img src="img/search.png" style="width: 1em"> <strong>NEW WORD</strong></h4>
        </div>
        <div class="panel panel-body">
            <div class="row">
                <div class="col s12 m4">
                    <div class="input-field">
                        <input type="text" class="validate" data-length="45" maxlength="45" required id="wordname">
                        <label for="wordname">WORD NAME</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6">
                    <div class="input-field">
                        <textarea id="descriptionword" class="materialize-textarea validate" required data-length="200" maxlength="200" ></textarea>
                        <label for="descriptionword">DESCRIPTION</label>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="input-field">
                        <textarea id="aditionaldescriptionword"  class="materialize-textarea" required data-length="200" maxlength="200" ></textarea>
                        <label for="aditionaldescriptionword">ADITIONAL DESCRIPTION</label>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn" type="button" id="btnsaveunity" onclick="saveword()"><i class="material-icons right">save</i> SAVE WORD</button>
                <br>
                <div class="progress">
                    <div class="determinate" id="progress_login" style="<?php echo base_url() ?>"></div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>


<br>
<br>
<div class="container">
  <ul class="pagination">
    <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
    <li class="active" id="myPager"><a>1</a></li>
    <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
  </ul>
  <?php if ($glosary == 0): ?><p>Don't Word!</p><?php else: ?>
  <table class="highlight" id="tablestudent">
    <thead>
      <tr>
        <h3>Student List</h3>
        </tr>
      </thead>
      <?php $i = 0; foreach ($glosary as $fila):?>
      <tbody>
        <tr>
          <td>
            <div class="row">
                  <div class="card">
                    <div class="card-content">
                        <div class="row">
                          <div class="col s4" hidden="true">
                            <div class="input-field">
                              <i class="material-icons prefix">perm_identity</i>
                              <!-- <textarea id="textarea1" class="materialize-textarea" data-length="200" maxlength="200"></textarea> -->
                              <input type="text" class="validate active"  id="idglosarylist<?php echo $i?>" value="<?php echo $fila->idglosary ?>">
                              <label for="idglosarylist<?php echo $i?>" class="active">ID Number</label>
                            </div>
                          </div>
                          <div class="col s4">
                            <div class="input-field">
                              <i class="material-icons prefix">perm_identity</i>
                              <!-- <textarea id="textarea1" class="materialize-textarea" data-length="200" maxlength="200"></textarea> -->
                              <input type="text" class="validate active" data-length="45" maxlength="45" id="wordnamelist<?php echo $i?>" value="<?php echo $fila->wordname ?>">
                              <label for="wordnamelist<?php echo $i?>" class="active">Word Name</label>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col s6">
                            <div class="input-field">
                              <!-- <i class="material-icons prefix">person_pin</i> -->
                                <textarea id="descriptionlist<?php echo $i?>" class="materialize-textarea" data-length="200" maxlength="200"><?php echo $fila->description ?></textarea>
                              <label for="descriptionlist<?php echo $i?>" class="active">Description</label>
                            </div>
                          </div>
                          <div class="col s6">
                            <div class="input-field">
                              <!-- <i class="material-icons prefix">person_pin</i> -->
                                <textarea id="aditionaldescriptionlist<?php echo $i?>" class="materialize-textarea" data-length="200" maxlength="200"><?php echo $fila->aditionaldescription ?></textarea>
                              <label for="aditionaldescriptionlist<?php echo $i?>" class="active">Aditional Description</label>
                            </div>
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
            </td>
          </tr>
        </tbody>
        <?php $i++; endforeach; ?>
      </table>
    <?php endif; ?>
</div>