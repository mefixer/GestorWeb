<div class="container white">
    <br>
    <div class="col s12">
    <h2 class="header">NEW ACTIVITY</h2>
    <div class="card">
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
                            <br>
                            
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-action">
          <button class="btn" onclick="saveactivity()" id="savenewactivity">Save Activity</button>
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
<?php if ($activity == 0): ?><p>Don't Activity!</p><?php else: ?>
                <table class="table">
                    <thead>
                    <h5>Activity List</h5>
                    <p>Asociation unity and class</p>
                    </thead>
    <?php $i = 0;
    foreach ($activity as $filactivity): ?>
                        <tbody class="">
                            <tr>
                        <td>
                            <div class="input-field">
                                <input type="text" class="validate active" maxlength="45" required  id="activitynamelist<?php echo $i ?>" value="<?php echo $filactivity->activityname?>">
                                <label for="activitynamelist<?php echo $i ?>" class="active">ACTIVITY NAME</label>
                            </div>
                            <div class="input-field">
                                <textarea id="activitydescriptionleft<?php echo $i ?>" class="materialize-textarea validate" required maxlength="200"></textarea>
                                <label for="activitydescriptioleft<?php echo $i ?>">DESCRIPTION ACTIVITY LEFT</label>
                            </div>
                            <div class="input-field">
                                <textarea id="activitydescriptionright<?php echo $i ?>" class="materialize-textarea validate" required maxlength="200" ></textarea>
                                <label for="activitydescriptionright<?php echo $i ?>">DESCRIPTION ACTIVITY RIGHT</label>
                            </div>
                        </td>
                        <td>    
                            <div class="input-field">
                                        <?php if ($unity == 0): ?><p>Don't class!</p><?php else: ?>
                                            <div class="input-field">
                                                <select id="selectgenderStudentedit<?php echo $i ?>">
                                                    <?php $i = 0;
                                                    foreach ($unity as $filunity):
                                                        ?>
                                                    <option value="<?php echo $filunity->idunity ?>" selected="<?php echo $filactivity->unity_idunity?>"><?php echo $filunity->unityname ?></option>
                                                        <?php $i++;
                                                    endforeach;
                                                    ?>
                                                </select>
                                                <label>Unity</label>
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
                                            <option value="<?php echo $filmaterial->idmaterial ?>" selected="<?php echo $filactivity->material_idmaterial?>"><?php echo $filmaterial->materialname ?></option>
                                                <?php $i++;
                                            endforeach;
                                            ?>
                                        </select>
                                        <label>MATERIAL </label>
                                    </div>
                            <?php endif; ?>
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