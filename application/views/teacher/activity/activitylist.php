<div class="card-panel z-depth-5">
  <a class="btn modal-trigger grey darken-1" href="#NewActivity"><i class="material-icons right">add_box</i><strong> New Activity</strong></a>

  <div id="NewActivity" class="modal modal-fixed-footer">
    <div class="modal-content">
      <div class="input-field col s6">
        <input type="text" class="validate" maxlength="45" required  id="activityname">
        <label for="activityname">Activity Name</label>
      </div>
      <div class="input-field col s6">
        <textarea id="descriptionleftactivity" class="materialize-textarea validate" required maxlength="200"></textarea>
        <label for="descriptionleftactivity">DESCRIPTION ACTIVITY LEFT</label>
      </div>
      <div class="input-field col s6">
        <textarea id="descriptionrightactivity" class="materialize-textarea validate" required maxlength="200"></textarea>
        <label for="descriptionrightactivity">DESCRIPTION ACTIVITY RIGHT</label>
      </div>
      <div class="input-field col s6">
        <select id="selectunityactivity">
          <?php $io = 0; foreach ($unity as $filunity):?>
          <option value="<?php echo $filunity->idunity ?>"><?php echo $filunity->unityname ?></option>
          <?php $io++;  endforeach; ?>
        </select>
        <label>UNITY</label>
      </div>
      <div class="input-field col s6">
        <select id="selectmaterialactivity">
          <?php $ie = 0;foreach ($material as $filmaterial): ?>
          <option value="<?php echo $filmaterial->idmaterial ?>"><?php echo $filmaterial->materialname ?></option>
          <?php $ie++; endforeach;?>
        </select>
        <label>MATERIAL</label>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn modal-trigger modal-close red darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
      <button type="button" class="btn modal-trigger modal-close green darken-1" id="btnsaveactivity" onclick="saveactivity()"><i class="material-icons right">save</i><strong> Save</strong></button>
    </div>
  </div>

  <table class="responsive-table">
    <thead>
      <tr>
        <th>Activity Name</th>
        <th>Description Left</th>
        <th>Description Right</th>
        <th>Unity</th>
        <th>Teacher</th>
        <th>Material</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($activity == 0): ?><h3>Don't Activity!</h3><?php else: ?>
        <?php $i = 0; foreach ($activity as $filactivity): ?>
        <tr>
          <td>
            <p><?php echo $filactivity->activityname?></p>
          </td>
          <td>
            <?php echo $filactivity->descriptionleft?>
          </td>
          <td>
            <?php echo $filactivity->descriptionright?>
          </td>
          <td>
            <?php $o = 0; foreach ($unity as $filunity):?>
              <?php if($filactivity->unity_idunity === $filunity->idunity) echo $filunity->unityname ?>
            <?php $o++; endforeach;?>
          </td>
          <td>
            <?php echo $name ?> <?php echo $lastname ?>
          </td>
          <td>
            <?php $ia = 0; foreach ($material as $filmaterial):?>
            <?php if($filmaterial->idmaterial === $filactivity->material_idmaterial) echo $filmaterial->materialname?>
            <?php $ia++; endforeach; ?>
          </td>
          <td>
            <span class="card-title modal-trigger blue-grey darken-1" id="btneditactivitymodal<?php echo $i ?>" style="cursor: pointer;" href="#Modal_edit_activity<?php echo $i ?>" data-tooltip="Edit Activity"><i class="material-icons right">edit</i></span>
          </td>
          <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_edit_activity<?php echo $i ?>">
            <div class="modal-content">
              <h4>Edit Activity</h4>
              <div class="input-field col s6" hidden="true">
                <input id="id_activity_edit<?php echo $i?>" type="text" value="<?php echo $filactivity->idactivity?>">
                <label for="id_activity_edit<?php echo $i?>" class="active">Id Activity</label>
              </div>
              <div class="input-field col s6">
                <select id="idselectunity<?php echo $i?>">
                  <?php $a = 0; foreach ($unity as $fil_unity):?>
                  <option id="activity_unity_edit<?php echo $a?>" value="<?php echo $fil_unity->idunity?>" <?php if($filactivity->unity_idunity === $fil_unity->idunity) echo "selected"?>> <?php echo $fil_unity->unityname?> </option>
                  <?php $a++; endforeach; ?>
                </select>
                <label>Select Unity</label>
              </div>
              <div class="input-field col s6">
                <select id="idselectmaterial<?php echo $i?>">
                  <?php $e = 0; foreach ($material as $fil_material):?>
                  <option id="activity_material_edit<?php echo $e?>" value="<?php echo $fil_material->idmaterial?>" <?php if($filactivity->material_idmaterial === $fil_material->idmaterial) echo "selected"?>> <?php echo $fil_material->materialname?> </option>
                  <?php $e++; endforeach; ?>
                </select>
                <label>Select Material</label>
              </div>
              <div class="input-field col s6">
                <input id="name_activity_edit<?php echo $i?>" type="text" value="<?php echo $filactivity->activityname?>">
                <label for="name_activity_edit<?php echo $i?>" class="active">Name</label>
              </div>
              <div class="input-field col s6">
                <input id="descriptionleft_activity_edit<?php echo $i?>" type="text" value="<?php echo $filactivity->descriptionleft?>">
                <label for="descriptionleft_activity_edit<?php echo $i?>" class="active">Description Left</label>
              </div>
              <div class="input-field col s6">
                <input id="descriptionright_activity_edit<?php echo $i?>" type="text" value="<?php echo $filactivity->descriptionright?>">
                <label for="descriptionright_activity_edit<?php echo $i?>" class="active">Description Right</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn modal-trigger modal-close red darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
              <button type="button" class="btn modal-trigger modal-close green darken-1" id="btneditactivity<?php echo $i ?>" onclick="updateactivity(<?php echo $i?>)"><i class="material-icons right">save</i><strong> Save</strong></button>
            </div>
          </div>
          <td>
            <span id="btnactivitydeletemodal<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_activity<?php echo $i ?>" data-tooltip="Delete Class" class="card-title activator red-text modal-trigger"><i class="material-icons right">delete</i></span>
          </td>
          <div class="modal modal-fixed-footer" tabindex="-1" role="dialog" id="Modal_delete_activity<?php echo $i?>">
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
              <button type="button" class="btn modal-trigger modal-close  red darken-3" onclick="deleteactivity(<?php echo $i ?>)"><i class="material-icons right">save</i> Delete</button>
            </div>
          </div>
        </tr>
        <?php $i++; endforeach; ?>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<script type="text/javascript">
  $(document).ready(function () {
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