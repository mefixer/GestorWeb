<div class="card-panel">
    <a class="btn modal-trigger black" href="#NewActivity">New Activity</a>

    <div id="NewActivity" class="modal">
          <div class="modal-content">
                <div class="panel">
                    <div class="panel panel-heading">
                            <h4 class="panel-title" align="center"><i class="material-icons left">person_add</i><strong>NEW Activity</strong></h4>
                    </div>
                    <div class="panel panel-body">
                        <div class="input-field">
                            <input type="text" class="validate" maxlength="45" required  id="activityname">
                            <label for="activityname">ACTIVITY NAME</label>
                        </div>
                        <div class="input-field">
                            <textarea id="descriptionleftactivity" class="materialize-textarea validate" required maxlength="200"></textarea>
                            <label for="descriptionleftactivity">DESCRIPTION ACTIVITY LEFT</label>
                        </div>
                        <div class="input-field">
                            <textarea id="descriptionrightactivity" class="materialize-textarea validate" required maxlength="200"></textarea>
                            <label for="descriptionrightactivity">DESCRIPTION ACTIVITY RIGHT</label>
                        </div>
                        <div class="input-field">
                            <?php if ($unity == 0): ?><p>Don't unity!</p><?php else: ?>
                                <div class="input-field">
                                    <select id="selectunityactivity">
                                        <?php $i = 0;
                                        foreach ($unity as $filunity):
                                            ?>
                                            <option value="<?php echo $filunity->idunity ?>"><?php echo $filunity->unityname ?></option>
                                            <?php $i++;
                                        endforeach;
                                        ?>
                                    </select>
                                    <label>UNITY</label>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="input-field">
                            <?php if ($material == 0): ?><p>Don't material!</p><?php else: ?>
                                <div class="input-field">
                                    <select id="selectmaterialactivity">
                                        <?php $i = 0;
                                        foreach ($material as $filmaterial):
                                            ?>
                                            <option value="<?php echo $filmaterial->idmaterial ?>"><?php echo $filmaterial->materialname ?></option>
                                            <?php $i++;
                                        endforeach;
                                        ?>
                                    </select>
                                    <label>MATERIAL </label>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
          <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red">CANCEL</a>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="saveactivity()">SAVE</a>
          </div>
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
                        <?php if ($activity == 0): ?><p>Don't Activity!</p><?php else: ?>
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
                                    <select id="selectgenderStudentedit<?php echo $i ?>" disabled>
                                        <?php $i = 0; foreach ($unity as $filunity):?>
                                        <option value="<?php echo $filunity->idunity ?>" selected="<?php echo $filactivity->unity_idunity?>"><?php echo $filunity->unityname ?></option>
                                            <?php $i++; endforeach;?>
                                    </select>
                                </td>
                                <td>
                                    <?php echo $name ?> <?php echo $lastname ?>
                                </td>
                                <td>
                                    <select id="selectmaterialactivity" disabled>
                                        <?php $i = 0;
                                        foreach ($material as $filmaterial):
                                            ?>
                                        <option value="<?php echo $filmaterial->idmaterial ?>" selected="<?php echo $filactivity->material_idmaterial?>"><?php echo $filmaterial->materialname ?></option>
                                            <?php $i++;
                                        endforeach;
                                        ?>
                                    </select>
                                </td>
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