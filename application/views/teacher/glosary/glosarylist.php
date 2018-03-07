<br>
<div class="card-panel">
    
<a class="btn modal-trigger grey darken-1" href="#NewWord"><i class="material-icons right">add_box</i><strong> New Word</strong></a>
<!-- MODALs News-->
<div id="NewWord" class="modal modal-fixed-footer">
    <div class="modal-content">
         <h4 align="center"><strong>New Word</strong></h4>
        <div class="input-field col s4">
            <input type="text" class="validate" data-length="45" maxlength="45" required id="wordname">
            <label for="wordname">WORD NAME</label>
        </div>
        <div class="input-field col s4">
            <textarea id="descriptionword" class="materialize-textarea validate" required data-length="200" maxlength="200" ></textarea>
            <label for="descriptionword">DESCRIPTION</label>
        </div>
        <div class="input-field col s4">
            <textarea id="aditionaldescriptionword"  class="materialize-textarea" required data-length="200" maxlength="200" ></textarea>
            <label for="aditionaldescriptionword">ADITIONAL DESCRIPTION</label>
        </div>
    </div>
    <div class="modal-footer">
        <button class="btn" type="button" id="btnsaveunity" onclick="saveword()"><i class="material-icons right">save</i> SAVE WORD</button>
    </div>
   <br>
</div>

<table class="responsive-table">
        <thead>
          <tr>
              <th>Word Name</th>
              <th>DESCRIPTION</th>
              <th>Aditional Description</th>
          </tr>
        </thead>
              <tbody>
  <?php if ($glosary == 0): ?><p>Don't Word!</p><?php else: ?>
      <?php $i = 0; foreach ($glosary as $fila):?>
      <tr class="tablesorter-ignoreRow">
                <td hidden="true">
                  <p><?php echo $fila->idglosary ?></p>
                </td>
                <td>
                  <p><?php echo $fila->wordname ?></p>
                </td>
                <td>
                  <p><?php echo $fila->description ?></textarea></p>
                </td>
                <td>
                  <p><?php echo $fila->aditionaldescription ?></p>
                </td>
                <td>
                  <span class="card-title modal-trigger blue-grey darken-1"  id="editstudent<?php echo $i?>" style="cursor: pointer;" href="#Modal_edit_class<?php echo $i ?>" data-tooltip="Edit Class"><i class="material-icons right">edit</i></span>
                </td>
                <td>
                  <span class="card-title red-text modal-trigger" id="btnclassdeletemodal<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_class<?php echo $i ?>" data-tooltip="Delete Class"><i class="material-icons right">delete</i></span>
                </td>

                  <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_edit_class<?php echo $i ?>">
                        <div class="modal-content">
                            <h4>EDIT WORD</h4>
                            <div class="input-field col s6" hidden="true">
                              <input  id="edit_id_class<?php echo $i?>" type="text"  value="<?php echo $fila->idglosary?>">
                              <label for="edit_id_class<?php echo $i?>" class="active">Id Class</label>
                            </div>
                            <div class="input-field col s6">
                              <input id="edit_class_name<?php echo $i?>" type="text"  value="<?php echo $fila->wordname?>">
                              <label for="edit_class_name<?php echo $i?>" class="active">Name Class</label>
                            </div>
                            <div class="input-field col s6">
                              <input id="edit_description_center<?php echo $i?>" type="text"  value="<?php echo $fila->description?>">
                              <label for="edit_description_center<?php echo $i?>" class="active">Description Center</label>
                            </div>
                            <div class="input-field col s6">
                              <input id="edit_description_left<?php echo $i?>" type="text"  value="<?php echo $fila->aditionaldescription?>">
                              <label for="edit_description_left<?php echo $i?>" class="active">Description Left</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn modal-trigger modal-close red darken-3" ><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                            <button type="button" class="btn modal-trigger modal-close green darken-1" id="btneditclass<?php echo $i ?>" onclick="updateword(<?php echo $i?>)" ><i class="material-icons right">save</i><strong> Save</strong></button>
                        </div>
                </div>


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
</div>
<!-- Llamados a Js Visuales -->
<script type="text/javascript">
  $(document).ready(function() {
    $('#collapsible').collapsible();
    $('ul.tabs').tabs();
    $('select').material_select();
    $(".button-collapse").sideNav();
    $('input#classname, textarea#descriptionclasscenter, textarea#descriptionclassleft,textarea#descriptionclassright').characterCounter();
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
