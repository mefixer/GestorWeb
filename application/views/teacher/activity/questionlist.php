<!--<div class="container">-->
<div class="col s12 m3">
    <div class="card-panel">
        <h5>NEW QUESTION</h5>
        <br>
        <div class="input-field">
            <textarea id="questionname" class="materialize-textarea validate" required maxlength="200"></textarea>
            <label for="questionname">QUESTION</label>
        </div>
        <div class="input-field">
            <textarea id="questiondescription" class="materialize-textarea validate" required maxlength="200"></textarea>
            <label for="questiondescription">QUESTION DECRIPTION</label>
        </div>
        <div class="input-field">
            <?php if ($activity == 0): ?><p>Don't activity!</p><?php else: ?>
                <div class="input-field">
                    <select id="selectquestionactivity">
                        <?php
                        $i = 0;
                        foreach ($activity as $filactivity):
                            ?>
                            <option value="<?php echo $filactivity->idactivity ?>"><?php echo $filactivity->activityname ?></option>
                            <?php
                            $i++;
                        endforeach;
                        ?>
                    </select>
                    <label>Activity</label>
                </div>
            <?php endif; ?>
        </div>
        <br>
        <button class="btn" id="savequestion" onclick="savequestion()">SAVE QUESTION</button>
        <br>
    </div>
    <br>
    <br>

</div>

<div class="col s12 m3">
    <div class="card-panel">
        <h5>ANSWERE</h5>
        <br>
        <div class="input-field">
            <?php if ($question == 0): ?><p>Don't question!</p><?php else: ?>
                <div class="input-field">
                    <select id="selectquestionanswere">
                        <?php
                        $i = 0;
                        foreach ($question as $filquestion):
                            ?>
                            <option value="<?php echo $filquestion->idquestion ?>"><?php echo $filquestion->questionname ?></option>
                            <?php
                            $i++;
                        endforeach;
                        ?>
                    </select>
                    <label>QUESTION</label>
                </div>
            <?php endif; ?>
        </div>
        <br>
        <div class="input-field">
            <textarea id="answerename" class="materialize-textarea validate" required maxlength="200"></textarea>
            <label for="answerename">ANSWERE</label>
        </div>
        <div class="input-field">
            <textarea id="answeredescription" class="materialize-textarea validate" maxlength="200"></textarea>
            <label for="answeredescription">ANSWERE DESCRIPTION</label>
        </div>
        <div class="input-field">
            <?php if ($value == 0): ?><p>Don't value!</p><?php else: ?>
                <div class="input-field">
                    <select id="selectvalueanswere">
                        <?php
                        $i = 0;
                        foreach ($value as $filvalue):
                            ?>
                            <option value="<?php echo $filvalue->idvalue ?>"><?php echo $filvalue->valuename ?></option>
                            <?php
                            $i++;
                        endforeach;
                        ?>
                    </select>
                    <label>VALUE</label>
                </div>
            <?php endif; ?>
        </div>
        <br>
        <button class="btn" id="saveanswere" onclick="saveanswere()">SAVE ANSWERE</button>
        <br>
    </div>
</div>
<div class="col s12 m6">
<?php $i = 0; foreach ($question as $filquestion):?>
    <div class="card">
        <div class="card-content">
            
                        
            
                            
            <?php $i = 0; foreach ($activity as $filactivity): ?>
                <?php if ($filactivity->idactivity == $filquestion->activity_idactivity): ?><span class="card-title activator grey-text text-darken-4">QUESTION ON ACTIVITY: <?php echo $filactivity->activityname?><i class="material-icons right">more_vert</i></span><?php endif; ?>
                <?php $i++; endforeach;?>
                <div class="input-field">
                    <textarea id="questionnamelist<?php echo $i ?>" class="materialize-textarea validate" required maxlength="200"><?php echo $filquestion->questionname ?></textarea>
                </div>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                <?php $i = 0; foreach ($answer as $filanswer): ?>
                    <?php if ($filquestion->idquestion == $filanswer->question_idquestion): ?>
                        <div class="input-field">
                            <textarea id="answernamelist<?php echo $i ?>" class="materialize-textarea validate" required maxlength="200"><?php echo $filanswer->answername ?></textarea>
                            <label for="answernamelist<?php echo $i ?>" class="active">ANSWERE</label>
                        </div>
                    <?php endif; ?>
                <?php $i++; endforeach;?>
            </div>
            
    </div>
<?php $i++; endforeach;?>




</div>

<!--</div>-->



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
                $('#check input[type = checkbox]').prop('checked', true); //solo los del objeto #Habilitados
            } else {
                //$("input[type=checkbox]").prop('checked', false);//todos los check
                $('#check input[type = checkbox]').prop('checked', false);//solo los del objeto #Habilitados
            }
        });
    });
</script>
