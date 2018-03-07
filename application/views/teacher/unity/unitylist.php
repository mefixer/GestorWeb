<div class="card-panel">
        <a class="btn modal-trigger grey darken-1" href="#NewUnity"><i class="material-icons right">add_box</i><strong> New Unity</strong></a>
        <div id="NewUnity" class="modal">
              <div class="modal-content">
                    <div class="panel">
                        <div class="panel panel-heading">
                            <h4 class="panel-title" align="center"><i class="material-icons left">person_add</i><strong>NEW UNITY</strong></h4>
                        </div>
                        <div class="panel panel-body">
                            <div class="row">
                                <div class="col s12 m3">
                                    <div class="input-field">
                                        <input type="text" class="validate" data-length="45" maxlength="45" required id="unityname" value="">
                                        <label for="unityname">UNITY NAME</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m4">
                                    <div class="input-field">
                                        <textarea id="descriptionunitycenter" class="materialize-textarea validate" required data-length="200" maxlength="200" ></textarea>
                                        <label for="descriptionunitycenter">DESCRIPTION UNITY CENTER</label>
                                    </div>
                                </div>
                                <div class="col s12 m4">
                                    <div class="input-field">
                                        <textarea id="descriptionunityleft"  class="materialize-textarea" required data-length="200" maxlength="200" ></textarea>
                                        <label for="descriptionunityleft">DESCRIPTION UNITY LEFT</label>
                                    </div>
                                </div>
                                <div class="col s12 m4">
                                    <div class="input-field">
                                        <textarea id="descriptionunityright" class="materialize-textarea" required data-length="200" maxlength="200" ></textarea>
                                        <label for="descriptionunityright">DESCRIPTION UNITY RIGHT</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s12 m3">
                                    <div class="input-field">
                                        <select disabled id="selectteacher">
                                            <option id="<?php echo $idteacher ?>"><?php echo $name ?> <?php echo $lastname ?></option>
                                        </select>
                                        <label>teacher</label>
                                    </div>

                                    <?php if ($class == 0): ?><p>Don't class save!</p><?php else: ?>
                                        <div class="input-field">
                                            <select id="selectclassunity">
                                                <?php
                                                $i = 0;
                                                foreach ($class as $filclass):
                                                    ?>
                                                <option id="<?php echo $i ?>" value="<?php echo $filclass->idclass ?>"><?php echo $filclass->classname ?></option>
                                                    <?php
                                                    $i++;
                                                endforeach;
                                                ?>
                                            </select>
                                            <label>Select Class</label>
                                        </div>
                                    <?php endif; ?>
                                </div>  
                            </div>

                            <div class="panel-footer">
                                <button class="btn" type="button" id="btnsaveunity" onclick="saveunity()"><i class="material-icons right">save</i> Save Unity</button>
                                <br>
                                <div class="progress">
                                    <div class="determinate" id="progress_login" style="<?php echo base_url() ?>"></div>
                                </div>
                            </div>

                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red">CANCEL</a>
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="savestudent()">SAVE</a>
              </div>
        </div>


<table class="responsive-table">
        <thead>
          <tr>
              <th>Unity Name</th>
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
                                            <span class="card-title grey-text modal-trigger" style="cursor: pointer;" onclick="updateclass()" id="editclass<?php echo $i ?>"><i class="material-icons right">edit</i></span>
                                        </td>
                                        <td>
                                            <span id="delete<?php echo $i ?>" style="cursor: pointer;" href="#Modal_delete_teacher"  class="card-title red-text modal-trigger"><i class="material-icons right">delete</i></span>
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

