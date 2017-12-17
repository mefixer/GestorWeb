<div class="container white">
    <br>
    <div class="col s12">
    <h2 class="header">NEW ACTIVITY</h2>
    <div class="card horizontal">
      <div class="card-image">
        <img src="img/quiz.png" style="width: 10em">
      </div>
      <div class="card-stacked">
        <div class="card-content">
          <table class="table">
                <thead>
                </thead>
                <tbody class="">
                    <tr>
                        <td>    
                            <div class="input-field">
                                <input type="text" class="validate" maxlength="45" required onkeypress="return soloLetras(event)" id="unityname" value="">
                                <label for="unityname">ACTIVITY NAME</label>
                            </div>
                            <div class="input-field">
                                <textarea id="descriptionunityleft" class="materialize-textarea validate" required maxlength="200" onkeypress="return soloLetras(event)"></textarea>
                                <label for="descriptionunityleft">DESCRIPTION ACTIVITY LEFT</label>
                            </div>
                            <div class="input-field">
                                <textarea id="descriptionunityright" class="materialize-textarea validate" required maxlength="200" onkeypress="return soloLetras(event)"></textarea>
                                <label for="descriptionunityright">DESCRIPTION ACTIVITY RIGHT</label>
                            </div>
                            <div class="input-field">
                                <?php if ($unity == 0): ?><p>Don't unity!</p><?php else: ?>
                                    <div class="input-field">
                                        <select id="selectunityactivity<?php echo $i ?>">
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
                            <br>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-action">
          <button class="btn" id="saveactivity" onclick="saveActivity()">Save Activity</button>
        </div>
      </div>
    </div>
  </div>

    <br>
    <div class="row">


        <div class="container">
            <ul class="pagination">
                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                <li class="active" id="myPager"><a>1</a></li>
                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
            </ul>
<?php if ($activity == 0): ?><p>Don't Student!</p><?php else: ?>
                <table class="table">
                    <thead>
                    <h5>Activity List</h5>
                    <p>Asociation unity and class</p>
                    <p><input type="checkbox" class="filled-in" id="activitycheckedall"/>
                        <label for="activitycheckedall">Select all</label></p>
                    </thead>
    <?php $i = 0;
    foreach ($activity as $fila): ?>
                        <tbody class="">
                            <tr>
                        <div class="">
                            <p><input type="checkbox" class="filled-in" id="activitychecked<?php echo $i ?>" />
                                <label for="activitychecked<?php echo $i ?>">Select</label></p>
                        </div>
                        <td>
                            <div class="input-field">
                                <input type="text" class="validate" maxlength="45" required onkeypress="return soloLetras(event)" id="unityname<?php echo $i ?>" value="">
                                <label for="unityname<?php echo $i ?><?php echo $i ?>">ACTIVITY NAME</label>
                            </div>
                            <div class="input-field">
                                <textarea id="descriptionunitycenter<?php echo $i ?>" class="materialize-textarea validate" required maxlength="200" onkeypress="return soloLetras(event)"></textarea>
                                <label for="descriptionunitycenter<?php echo $i ?>">DESCRIPTION ACTIVITY LEFT</label>
                            </div>
                            <div class="input-field">
                                <textarea id="descriptionunitycenter<?php echo $i ?>" class="materialize-textarea validate" required maxlength="200" onkeypress="return soloLetras(event)"></textarea>
                                <label for="descriptionunitycenter<?php echo $i ?>">DESCRIPTION ACTIVITY RIGHT</label>
                            </div>
                        </td>
                        <td>    
                            <div class="input-field">
                                        <?php if ($class == 0): ?><p>Don't Gender!</p><?php else: ?>
                                    <div class="input-field">
                                        <select id="selectgenderStudentedit<?php echo $i ?>">
            <?php $i = 0;
            foreach ($class as $filclass): ?>
                                                <option value="<?php echo $filclass->idclass ?>"><?php echo $filclass->classname ?></option>
                                        <?php $i++;
                                    endforeach; ?>
                                        </select>
                                        <label>Class</label>
                                    </div>
        <?php endif; ?>
                            </div>
                            <div class="input-field">
                                <select id="selectclass">
                                    <option id="">CLASS</option>
                                </select>
                                <label>SELECT CLASS</label>
                            </div>
                            <br>
                            <button class="btn">SAVE CHANGE</button>
                        </td>
                        </tr>
                        </tbody>
        <?php $i++;
    endforeach; ?>
                </table>
<?php endif; ?>
        </div>
    </div>
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