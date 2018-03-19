<div class="card-panel z-depth-5">
    <a class="btn modal-trigger" href="#NewQuestion"><i class="material-icons right">add_box</i><strong> New Question</strong></a>
    <a class="btn modal-trigger" href="#NewAnswer"><i class="material-icons right">add_box</i><strong> New Answer</strong></a>

<!-- Modal Structure -->
    <div id="NewQuestion" class="modal modal-fixed-footer">
        <div class="modal-content">
            <div class="input-field col s12">
                <select id="selectquestionactivity">
                    <?php $i = 0; foreach ($activity as $filactivity):?>
                    <option value="<?php echo $filactivity->idactivity ?>"><?php echo $filactivity->activityname ?></option>
                    <?php $i++; endforeach; ?>
                </select>
                <label>Activity</label>
            </div>
            <div class="input-field col s6">
                <textarea id="questionname" class="materialize-textarea validate" required maxlength="200"></textarea>
                <label for="questionname">Question</label>
            </div>
            <div class="input-field col s6">
                <textarea id="questiondescription" class="materialize-textarea validate" required maxlength="200"></textarea>
                <label for="questiondescription">Question Description</label>
            </div>
        </div>
        <div class="modal-footer">
          <a href="#!" class="modal-action modal-close btn waves-effect waves-green red darken-3">Done</a>
          <button class="modal-action modal-close btn waves-effect waves-green green darken-1" id="savequestion" onclick="savequestion()"><i class="material-icons right">add_box</i><strong>Save</strong></button>
      </div>
    </div>
<!-- Modal Structure -->
    <div id="NewAnswer" class="modal modal-fixed-footer">
        <div class="modal-content">
            <div class="input-field col s12">
                <select id="selectquestionanswere">
                    <?php $i = 0; foreach ($question as $filquestion): ?>
                        <option value="<?php echo $filquestion->idquestion ?>"><?php echo $filquestion->questionname ?></option>
                    <?php $i++; endforeach;?>
                </select>
                <label>Question</label>
            </div>
            <div class="input-field col s6">
                <textarea id="answerename" class="materialize-textarea validate" required maxlength="200"></textarea>
                <label for="answerename">Answer</label>
            </div>
            <div class="input-field col s6">
                <textarea id="answeredescription" class="materialize-textarea validate" maxlength="200"></textarea>
                <label for="answeredescription">Answer Description</label>
            </div>
            <div class="input-field col s4">
                <select id="selectvalueanswere" class="">
                    <?php $i = 0; foreach ($value as $filvalue):?>
                        <option value="<?php echo $filvalue->idvalue ?>"><?php echo $filvalue->valuename?></option>
                    <?php $i++; endforeach;?>
                </select>
                <label>Value</label>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close btn waves-effect waves-green red darken-3">Agree</a>
            <button class="modal-action modal-close btn waves-effect waves-green green darken-1" id="saveanswere" onclick="saveanswere()"><i class="material-icons right">add_box</i><strong> Save</strong></button>
        </div>
    </div>

    <br>
    <br>
<?php $i = 0; foreach ($question as $filquestion):?>
    <div class="card grey lighten-3">
        <div class="card-content">
            <?php $e = 0; foreach ($activity as $filactivity): ?>
                    <?php if ($filactivity->idactivity == $filquestion->activity_idactivity): ?>
                        <span class="card-title activator"><strong>Activity: </strong><?php echo $filactivity->activityname?><i class="material-icons right">visibility</i></span>
                        <span><i class="material-icons right">edit</i></span><span><i class="material-icons right">delete</i></span>
                    <?php endif; ?>
                <?php $e++; endforeach;?>
                <br>
            <p><strong>Question: </strong><?php echo $filquestion->questionname?></p>
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i></span>
            <?php $a = 0; foreach ($answer as $filanswer): ?>
                <?php if ($filquestion->idquestion == $filanswer->question_idquestion): ?>
                    <div class="input-field">
                        <br>
                        <label for="answernamelist<?php echo $a ?>" class="active">Answer <?php echo $a+1?>:</label>
                        <?php if ($filanswer->value_idvalue === 3): ?>
                            <p class="Bad">
                        <?php elseif($filanswer->value_idvalue === 1): ?>
                            <p class="Good">
                        <?php elseif($filanswer->value_idvalue === 2): ?>
                            <p class="Regular">
                        <?php endif; ?>
                            <strong><?php echo $filanswer->answername ?></strong>
                        </p>
                    </div>
                <?php endif; ?>
            <?php $a++; endforeach;?>
        </div>
        <br>
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
