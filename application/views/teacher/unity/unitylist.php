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



    <h3><strong>UNITY LIST<strong></h3>
                <p><input type="checkbox" class="filled-in" id="studentcheckedall"/>
                    <label for="studentcheckedall">Select all</label></p>
                <?php if ($unity == 0): ?><p>Don't unity save!</p><?php else: ?>
                    <div class="row">
                        <div id="check">
                            <form >
                                <?php $i = 0;
                                foreach ($unity as $filunity):
                                    ?>
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="row">
                                                <div class="">
                                                    <p><input type="checkbox" class="filled-in" id="studentchecked<?php echo $i ?>" />
                                                        <label for="studentchecked<?php echo $i ?>">Select</label></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12 m3">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">perm_identity</i>
                                                        <input type="text" disabled class="active"  id="idunity<?php echo $i ?>" value="<?php echo $filunity->idunity ?>">
                                                        <label for="idunity<?php echo $i ?>" class="active">ID Class</label>
                                                    </div>
                                                    <div class="input-field">
                                                        <input type="text" class="active" data-length="45" maxlength="45" id="unityname<?php echo $i ?>" value="<?php echo $filunity->unityname ?>">
                                                        <label for="unityname<?php echo $i ?>" class="active">Class Name</label>
                                                    </div>
                                                </div>

                                                <div class="col s12 m6">
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">assignment_ind</i>
                                                        <input type="text" class="active" data-length="200" maxlength="200" id="descriptioncenterunity<?php echo $i ?>" value="<?php echo $filunity->descriptioncenter ?>">
                                                        <label for="descriptioncenterunity<?php echo $i ?>" class="active">Center Description</label>
                                                    </div>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">assignment_ind</i>
                                                        <input type="text" class="active" data-length="200" maxlength="200" id="descriptionleftunity<?php echo $i ?>" value="<?php echo $filunity->descriptionleft ?>">
                                                        <label for="descriptionleftunity<?php echo $i ?>" class="active">Left Description</label>
                                                    </div>
                                                    <div class="input-field">
                                                        <i class="material-icons prefix">assignment_ind</i>
                                                        <input type="text" class="active" data-length="200" maxlength="200" id="descriptionrightunity<?php echo $i ?>" value="<?php echo $filunity->descriptionright ?>">
                                                        <label for="descriptionrightunity<?php echo $i ?>" class="active">Right Description</label>
                                                    </div>
                                                    <div class="input-field">
                                                        <select disabled="true" id="idselecteacher">
                                                            <option value="<?php echo $idteacher ?>" disabled selected><?php echo $name ?> <?php echo $lastname ?></option>
                                                        </select>
                                                        <label>Teacher Select</label>
                                                    </div>
                                                </div>

                                                <div class="col s12">
                                                    <button class="btn white black-text" onclick="updateclass()" id="editclass<?php echo $i ?>"><i class="material-icons right">edit</i> Edit</button>
                                                    <button id="delete<?php echo $i ?>" href="#Modal_delete_teacher"  class="btn red darken-4 modal-trigger">
                                                        <i class="material-icons right">delete</i>Delete</button>

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
                                            <br>
                                        </div>
                                        <?php $i++;
                                    endforeach;
                                    ?>
                            </form>
                        </div>
                    </div>

                <?php endif; ?>







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

