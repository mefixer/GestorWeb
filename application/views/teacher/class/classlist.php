<br>
<div class="card-panel">

  <a class="btn modal-trigger grey darken-1" href="#NewClass"><i class="material-icons right">add_box</i><strong> New Class</strong></a>
  <!-- MODALs News-->
  <div id="NewClass" class="modal modal-fixed-footer">
    <div class="modal-content">
     <h4><strong>NEW COURSES</strong></h4>
     <div class="input-field col s6">
      <input type="text" class="validate" maxlength="50" data-length="50" required id="classname">
      <label for="classname">Class Name</label>
    </div>
    <div class="input-field col s4"> 
        <input type="text" class="validate" disabled value="<?php echo $name?> <?php echo $lastname?>" id="teacherinput">
      <label for="teaherinput" class="active">Teacher</label>
    </div>
    <div class="input-field col s12">
      <textarea id="descriptionclasscenter" class="materialize-textarea validate" required maxlength="200" data-length="200" ></textarea>
      <label for="name">Description Center</label>
    </div>
    <div class="input-field col s6">
      <textarea id="descriptionclassleft"  class="materialize-textarea" required maxlength="200" data-length="200"></textarea>
      <label for="lastname">Description left</label>
    </div>
    <div class="input-field col s6">
      <textarea id="descriptionclassright" class="materialize-textarea" required maxlength="200" data-length="200"></textarea>
      <label for="username">Description Right</label>
    </div>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close btn waves-effect waves-green red darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
    <a href="#!" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="saveclass()"><i class="material-icons right">save</i><strong> Save</strong></a>
  </div>
</div>

<table class="responsive-table highlight">
  <thead>
    <tr>
      <th>Class Name</th>
      <th>Description Center</th>
      <th>Description Left</th>
      <th>Description Right</th>
    </tr>
  </thead>
  <tbody>
    <?php if ($class == 0): ?><p>Don't Class!</p><?php else: ?>
      <?php $i = 0; foreach ($class as $fila):?>
      <tr class="tablesorter-ignoreRow">
        <td>
          <p><?php echo $fila->classname ?></p>
        </td>
        <td>
          <p><?php echo $fila->descriptioncenter ?></p>
        </td>
        <td>
          <p><?php echo $fila->descriptionleft ?></p>
        </td>
        <td>
          <p><?php echo $fila->descriptionright ?></p>
        </td>
        <td>
          <span class="card-title modal-trigger blue-grey darken-1" id="btneditclasstable<?php echo $i ?>" style="cursor: pointer;" href="#Modal_edit_class<?php echo $i ?>" data-tooltip="Edit Class"><i class="material-icons right">edit</i></span>
        </td>
        <td>
          <span class="card-title red-text modal-trigger" id="btnclassdeletemodal<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_class<?php echo $i ?>" data-tooltip="Delete Class"><i class="material-icons right">delete</i></span>
        </td>
        <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_edit_class<?php echo $i ?>">
          <div class="modal-content">
            <h4>EDIT CLASS</h4>
            <div class="input-field col s6" hidden="true">
              <input  id="idclassedit<?php echo $i?>" type="text"  value="<?php echo $fila->idclass?>">
              <label for="idclassedit<?php echo $i?>" class="active">Id Class</label>
            </div>
            <div class="input-field col s6">
              <input id="edit_class_name<?php echo $i?>" type="text"  value="<?php echo $fila->classname?>">
              <label for="edit_class_name<?php echo $i?>" class="active">Name Class</label>
            </div>
            <div class="input-field col s6">
              <input id="edit_description_center<?php echo $i?>" type="text"  value="<?php echo $fila->descriptioncenter?>">
              <label for="edit_description_center<?php echo $i?>" class="active">Description Center</label>
            </div>
            <div class="input-field col s6">
              <input id="edit_description_left<?php echo $i?>" type="text"  value="<?php echo $fila->descriptionleft?>">
              <label for="edit_description_left<?php echo $i?>" class="active">Description Left</label>
            </div>
            <div class="input-field col s6">
              <input id="edit_description_right<?php echo $i?>" type="text"  value="<?php echo $fila->descriptionright?>">
              <label for="edit_description_right<?php echo $i?>" class="active">Description Right</label>
            </div>
            <div class="input-field col s6">
              <input id="edit_teacher_class<?php echo $i?>" disabled type="text"  value="<?php echo $name?> <?php echo $lastname?>">
              <label for="edit_teacher_class<?php echo $i?>" class="active">Teacher</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn modal-trigger modal-close red darken-3" ><i class="material-icons right">expand_more</i><strong> Done</strong></button>
            <button type="button" class="btn modal-trigger modal-close green darken-1" id="btneditclass<?php echo $i ?>" onclick="updateclass(<?php echo $i?>)" ><i class="material-icons right">save</i><strong> Save</strong></button>
          </div>
        </div>

        <div class="modal modal-fixed-footer" tabindex="-2" role="dialog" id="Modal_delete_class<?php echo $i ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="card-panel">
                <h3><strong>Are you shure?</strong></h3>
              <p>Pleace insert your password and delete.</p>
            </div>
            <div class="input-field col s4">
                <input type="password" class="form-control" id="deleteclassValidate<?php echo $i ?>">
                <label for="deleteclassValidate<?php echo $i ?>" >Password</label>
              </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn modal-trigger modal-close grey darken-1" ><i class="material-icons right">expand_more</i><strong> Done</strong></button>
              <button type="button" class="btn modal-trigger modal-close  red darken-3" id="btndeleteclass<?php echo $i ?>" onclick="deleteclass(<?php echo $i ?>)"><i class="material-icons right">delete_forever</i><strong> Delete</strong></button>
            </div>
          </div>
        </div>
      </tr>
      <?php $i++; endforeach; ?>
    <?php endif; ?> 
  </tbody>

</table>

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

