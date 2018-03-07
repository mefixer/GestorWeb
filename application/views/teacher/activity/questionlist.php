<div class="col s12 m6">
        <div class="card-panel">
            <div class="input-field">
                <textarea id="questionname" class="materialize-textarea validate" required maxlength="200"></textarea>
                <label for="questionname">Question</label>
            </div>
            <div class="input-field">
                <textarea id="questiondescription" class="materialize-textarea validate" required maxlength="200"></textarea>
                <label for="questiondescription">Question Description</label>
            </div>
                <?php if ($activity == 0): ?><p>Don't activity!</p><?php else: ?>
                    <div class="input-field">
                        <select id="selectquestionactivity">
                            <?php $i = 0; foreach ($activity as $filactivity):?>
                                <option value="<?php echo $filactivity->idactivity ?>"><?php echo $filactivity->activityname ?></option>
                                <?php $i++; endforeach; ?>
                        </select>
                        <label>Activity</label>
                    </div>
                <?php endif; ?>
            <br>
            <button class="btn grey darken-1" id="savequestion" onclick="savequestion()"><i class="material-icons right">add_box</i><strong> New Question</strong></button>
            <br>
        </div>
        <div class="card-panel">
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
                <label for="answeredescription">Answer Description</label>
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
            <button class="btn grey darken-1" id="saveanswere" onclick="saveanswere()"><i class="material-icons right">add_box</i><strong> New Anwere</strong></button>
            <br>
        </div>
</div>

<div class="col s12 m6">
    <?php $i = 0; foreach ($question as $filquestion):?>
        <div class="card">
            <div class="card-title">
                <span class="card-title red-text" style="cursor: pointer;"><i class="material-icons left">delete</i></span>
                <span class="card-title grey-text" style="cursor: pointer;"><i class="material-icons left">edit</i></span>
            </div>
            <div class="card-content">
                <?php $i = 0; foreach ($activity as $filactivity): ?>
                    <?php if ($filactivity->idactivity == $filquestion->activity_idactivity): ?>
                        <span class="card-title activator"><strong>Answer Activity: </strong><?php echo $filactivity->activityname?><i class="material-icons right">visibility</i></span>
                    <?php endif; ?>
                <?php $i++; endforeach;?>
                    <div class="input-field">
                        <p><?php echo $filquestion->questionname ?></p>
                    </div>
            </div>
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
                <?php $i = 0; foreach ($answer as $filanswer): ?>
                    <?php if ($filquestion->idquestion == $filanswer->question_idquestion): ?>
                        <div class="input-field">
                            <label for="answernamelist<?php echo $i ?>" class="active">ANSWERE</label>
                            <p><?php echo $filanswer->answername ?></p>
                        </div>
                    <?php endif; ?>
                <?php $i++; endforeach;?>
            </div>
        </div>
        
    <?php $i++; endforeach;?>
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
                $('#check input[type = checkbox]').prop('checked', true); //solo los del objeto #Habilitados
            } else {
                //$("input[type=checkbox]").prop('checked', false);//todos los check
                $('#check input[type = checkbox]').prop('checked', false);//solo los del objeto #Habilitados
            }
        });
    });
</script>
