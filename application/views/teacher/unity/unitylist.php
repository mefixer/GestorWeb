<div class="card-panel">
    <a class="btn modal-trigger grey darken-1" href="#NewUnity"><i class="material-icons right">add_box</i><strong> New Unit</strong></a>
    <div id="NewUnity" class="modal modal-fixed-footer">
      <div class="modal-content">
                <h4><strong>NEW UNIT</strong></h4>
                                <div class="input-field col s6">
                        <select disabled id="selectteacher">
                            <option id="<?php echo $idteacher ?>"><?php echo $name ?> <?php echo $lastname ?></option>
                        </select>
                        <label>teacher</label>
                </div>
                <div class="input-field col s6">
                    <select id="selectclassunity">
                        <?php $i = 0; foreach ($class as $filclass): ?>
                            <option id="<?php echo $i ?>" value="<?php echo $filclass->idclass ?>"><?php echo $filclass->classname ?></option>
                            <?php $i++; endforeach;?>
                    </select>
                    <label>Select Class</label>
                </div>
                <div class="input-field col s6">
                    <input type="text" class="validate" data-length="45" maxlength="45" required id="unityname" value="">
                    <label for="unityname">UNITY NAME</label>
                </div>
                <div class="input-field col s6">
                    <textarea id="descriptionunitycenter" class="materialize-textarea validate" required data-length="200" maxlength="200" ></textarea>
                    <label for="descriptionunitycenter">DESCRIPTION UNITY CENTER</label>
                </div>
                <div class="input-field col s6">
                    <textarea id="descriptionunityleft"  class="materialize-textarea" required data-length="200" maxlength="200" ></textarea>
                    <label for="descriptionunityleft">DESCRIPTION UNITY LEFT</label>
                </div>

                <div class="input-field col s6">
                    <textarea id="descriptionunityright" class="materialize-textarea" required data-length="200" maxlength="200" ></textarea>
                    <label for="descriptionunityright">DESCRIPTION UNITY RIGHT</label>
                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn modal-trigger modal-close grey darken-1"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
          <button type="button" class="btn modal-trigger modal-close green darken-1" id="btneditstudent<?php echo $i ?>" onclick="saveunity()"><i class="material-icons right">save</i><strong> Save</strong></button>
        </div>
</div>


<table class="responsive-table">
    <thead>
      <tr>
          <th>Unit Name</th>
          <th>Description Center</th>
          <th>Desccription Left</th>
          <th>Description Right</th>
          <th>Teacher</th>
      </tr>
  </thead>
  <tbody>
    <?php if ($unity == 0): ?><p>Don't unity save!</p><?php else: ?>
        <?php $i = 0; foreach ($unity as $filunity):?>
        <tr>
            <td>
                <?php echo $filunity->unityname ?>
            </td>
            <td>
                <?php echo $filunity->descriptioncenter ?>
            </td>
            <td>
                <?php echo $filunity->descriptionleft ?>
            </td>
            <td>
                <?php echo $filunity->descriptionright ?>
            </td>
            <td>
                <?php echo $name ?> <?php echo $lastname ?>
            </td>
            <td>
                <span class="card-title modal-trigger blue-grey darken-1" id="btneditunittable<?php echo $i ?>" style="cursor: pointer;" href="#ModalEditunit<?php echo $i ?>" data-tooltip="Edit Unit"><i class="material-icons right">edit</i></span>
            </td>
            <div id="ModalEditunit<?php echo $i ?>" class="modal modal-fixed-footer">
              <div class="modal-content">
                  <h4>Edit Unit</h4>
                    <div class="input-field col s6" hidden="true">
                        <input type="text" id="editunitid<?php echo $i?>" class="validate" value="<?php echo $filunity->idunity ?>">
                        <label for="editunitid<?php $i?>" class="active">Unit Name</label>
                    </div>
                                    <div class="input-field col s6">
                    <select disabled id="selectteacher">
                        <option id="<?php echo $idteacher ?>"><?php echo $name ?> <?php echo $lastname ?></option>
                    </select>
                    <label>teacher</label>
                </div>
                    <div class="input-field col s6">
                        <select id="selectclassunit<?php echo $i?>">
                            <?php $e = 0; foreach ($class as $filclass): ?>
                            <option id="<?php echo $e ?>" value="<?php echo $filclass->idclass ?>" <?php if($filunity->class_idclass === $filclass->idclass) echo "selected"?>><?php echo $filclass->classname ?></option>
                            <?php $e++; endforeach;?>
                        </select>
                        <label>Select Class</label>
                    </div>
                    <div class="input-field col s6">
                        <input type="text" id="editunitname<?php echo $i?>" class="validate" value="<?php echo $filunity->unityname ?>">
                        <label for="editunitname<?php $i?>" class="active">Unit Name</label>
                    </div>
                    <div class="input-field col s6">
                        <textarea id="editunitdescriptioncenter<?php echo $i?>" class="materialize-textarea validate" required data-length="200" maxlength="200" ><?php echo $filunity->descriptioncenter ?></textarea>
                        <label for="editunitdescriptioncenter<?php echo $i?>" class="active">Description unit Center</label>
                    </div>
                    <div class="input-field col s6">
                        <textarea id="editunitdescriptionleft<?php echo $i?>" class="materialize-textarea" required data-length="200" maxlength="200" ><?php echo $filunity->descriptionleft ?></textarea>
                        <label for="editunitdescriptionleft<?php echo $i?>" class="active">Description unit left</label>
                    </div>
                    <div class="input-field col s6">
                        <textarea id="editunitdescriptionright<?php echo $i?>" class="materialize-textarea" required data-length="200" maxlength="200" ><?php echo $filunity->descriptionright ?></textarea>
                        <label for="editunitdescriptionright<?php echo $i?>" class="active">Description unit right</label>
                    </div>

            </div>

            <div class="modal-footer">
                <a class="modal-action modal-close btn waves-effect waves-green red darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
                <a id="btneditunit<?php echo $i?>" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="updateunit(<?php echo $i?>)"><i class="material-icons right">save</i><strong> Save</strong></a>
            </div>

        </div>
        <td>
            <span class="card-title red-text modal-trigger" id="btnunitydeletemodal<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_unity<?php echo $i ?>" data-tooltip="Delete Class"><i class="material-icons right">delete</i></span>
        </td>
        <div class="modal modal-fixed-footer" tabindex="-2" role="dialog" id="Modal_delete_unity<?php echo $i ?>">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="card-panel">
                <h3><strong>Are you sure?</strong></h3>
              <p>Please insert your password and delete.</p>
            </div>
            <div class="input-field col s4">
                <input type="password" class="form-control" id="deleteclassValidate<?php echo $i ?>">
                <label for="deleteclassValidate<?php echo $i ?>" >Password</label>
              </div>
          </div>
            <div class="modal-footer">
              <button type="button" class="btn modal-trigger modal-close grey darken-1" ><i class="material-icons right">expand_more</i><strong> Done</strong></button>
              <button type="button" class="btn modal-trigger modal-close  red darken-3" id="btndeleteunity<?php echo $i ?>" onclick="deleteunity(<?php echo $i ?>)"><i class="material-icons right">delete_forever</i><strong> Delete</strong></button>
            </div>
          </div>
        </div>
    </tr>
    <?php $i++; endforeach;?>
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

