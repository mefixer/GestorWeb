
<div class="row">
    <a class="modal-trigger btn waves-effect waves-green grey darken-3" href="#NewQuestion"><i class="material-icons right">add_box</i><strong> New Question</strong></a>
    <button class="btn modal-trigger" href="#Questionhasactivity"><i class="material-icons right">playlist_add_check</i> Add question to Activity</button>
    <button class="btn modal-trigger" href="#Questionhasexam"><i class="material-icons right">playlist_add_check</i> Add question to Exam</button>
    <div id="NewQuestion" class="modal modal-fixed-footer">
      <div class="modal-content">
        <div class="input-field">
            <textarea id="questionname" class="materialize-textarea validate" required maxlength="200"></textarea>
            <label for="questionname">Question</label>
        </div>
        <div class="input-field">
            <textarea id="questiondescription" class="materialize-textarea" maxlength="200"></textarea>
            <label for="questiondescription">Question Description</label>
        </div>
        <div class="input-field">
            <select id="idselectquestiontype">
                <?php $i = 0; foreach ($questiontype as $fil_qt):?>
                <option id="idquestiontype<?php echo $i?>" value="<?php echo $fil_qt->idquestiontype?>"><?php echo $fil_qt->typename ?></option>
                <?php $i++; endforeach;?>
            </select>
            <label>Select Question type</label>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey lighten-3 black-text"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
      <button class="modal-trigger modal-close btn waves-effect waves-green green darken-1" id="savequestion" onclick="savequestion()"><i class="material-icons right">add_box</i><strong>Save question</strong></button>
  </div>
</div>
</div>
<div class="row">

    <p class=""><input type="checkbox" class="filled-in" id="questioncheckedall"/>
        <label for="questioncheckedall">Check all</label></p>

        <div class="col s12 m6">
            <div id="check">
                <?php $e = 0; foreach ($question as $fil_question):?>
                <?php $checkcount = $i?>
                <div class="card blue-grey lighten-5 z-depth-5">
                    <div class="card-content">
                        <p>
                            <input type="checkbox" id="selectquestion<?php echo $e?>"/>
                            <label for="selectquestion<?php echo $e?>">Select </label></p>
                            <span class="card-title"><strong> <?php echo $fil_question->questionname ?></strong><i class="material-icons right modal-trigger" style="cursor:pointer;" onclick="">delete</i><i class="material-icons right modal-trigger" style="cursor:pointer;" href="#EditQuestion<?php echo $e?>">edit</i></span>
                            <p><?php echo $fil_question->description ?></p>

                            <div id="EditQuestion<?php echo $e?>" class="modal modal-fixed-footer">
                              <div class="modal-content">
                                <h4><strong>EDIT QUESTION</strong></h4>
                                <div class="input-field col s6" hidden="true">
                                    <input type="text" id="idEditQuestion<?php echo $e?>" value="<?php echo $fil_question->idquestion ?>">
                                </div>

                                <div class="input-field">
                                    <input id="editquestionname<?php echo $e?>" type="text" value="<?php echo $fil_question->questionname ?>">
                                    <label class="active" for="editquestionname<?php echo $e?>">question</label>
                                </div>
                                <div class="input-field">
                                    <textarea id="addanswerdescription<?php echo $e?>" class="materialize-textarea" maxlength="200"><?php echo $fil_question->description ?></textarea>
                                    <label class="active" for="addanswerdescription<?php echo $e?>">Description</label>
                                </div>

                                <div class="input-field">
                                    <select id="idselectquestiontype<?php echo $e?>">
                                        <?php $i = 0; foreach ($questiontype as $fil_qt):?>
                                        <option value="<?php echo $fil_qt->idquestiontype?>" <?php if($fil_qt->idquestiontype === $fil_question->questiontype_idquestiontype) echo "selected"?>><?php echo $fil_qt->typename ?></option>
                                        <?php $i++; endforeach;?>
                                    </select>
                                    <label>Select Question type</label>
                                </div>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey lighten-3 black-text"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                              <button class="modal-trigger modal-close  btn waves-effect waves-green green darken-1" id="btnupdatequestion<?php echo $e?>" onclick="updatequestion(<?php echo $e?>)"><i class="material-icons right">add_box</i><strong>Save Question</strong></button>
                          </div>
                      </div>



                      <?php $a = 0; foreach ($answer as $fil_answer):?>
                      <?php if($fil_answer->question_idquestion === $fil_question->idquestion): ?>
                        <blockquote class="" id="idanswer<?php echo $a?>"><?php echo $fil_answer->answername ?>
                            <i class="material-icons right modal-trigger" style="cursor:pointer;" href="#DeleteAnswer<?php echo $a?>" >delete</i>
                            <i class="material-icons right modal-trigger" style="cursor:pointer;" href="#EditAnswer<?php echo $a?>" >edit</i>

                        <?php endif; ?>
                        <?php $o = 0; foreach ($value as $fil_value):?>
                        <?php if($fil_value->idvalue === $fil_answer->value_idvalue && $fil_answer->question_idquestion === $fil_question->idquestion): ?>
                            <div class="chip 
                            <?php if($fil_value->valuename === 'Good'):?>
                                <?php echo 'green'?>
                            <?php elseif ($fil_value->valuename === 'Bad'):?>
                                <?php echo 'red'?>
                            <?php elseif ($fil_value->valuename === 'Regular'):?>
                                <?php echo 'yellow'?>
                            <?php endif;?>
                            right"><?echo $fil_value->valuename ?>
                        </div>
                    <?php endif; ?>
                    <?php $o++; endforeach;?>
                </blockquote>

                <div id="EditAnswer<?php echo $a?>" class="modal modal-fixed-footer">
                  <div class="modal-content">
                    <h4><strong>EDIT ANSWER</strong></h4>

                    <div class="input-field col s6" hidden="true">
                        <input type="text" id="idEditAnswer<?php echo $a?>"  value="<?php echo $fil_answer->idanswer ?>">
                    </div>

                    <div class="input-field col s4">
                        <input type="text" id="editanswername<?php echo $a?>"  value="<?php echo $fil_answer->answername ?>">
                        <label class="active" for="editanswername<?php echo $a?>">Answer</label>
                    </div>

                    <div class="input-field col s6">
                        <input id="editanswerdescription<?php echo $a?>" type="text" class="active" value="<?php echo $fil_answer->description ?>">
                        <label class="active" for="editanswerdescription<?php echo $a?>">Answer Description</label>
                    </div>

                    <div class="input-field col s4">
                        <select id="editselectvalueanswer<?php echo $a?>">
                            <?php $it = 0; foreach ($value as $fil_valueedit):?>
                            <option value="<?php echo $fil_valueedit->idvalue?>" <?php if($fil_valueedit->idvalue === $fil_answer->value_idvalue) echo "selected"?> ><?php echo $fil_valueedit->valuename ?></option>
                            <?php $it++; endforeach;?>
                        </select>
                        <label>Select value</label>
                    </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey lighten-3 black-text"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
                  <button class="modal-trigger modal-close  btn waves-effect waves-green green darken-1" id="btnupdateanswer<?php echo $a?>" onclick="updateanswer(<?php echo $a?>)"><i class="material-icons right">add_box</i><strong>Save Question</strong></button>
              </div>
          </div>

          <?php $a++; endforeach;?>
          <a id="btnmodal<?php echo $e?>" class="modal-trigger btn waves-effect waves-green grey darken-3" href="#NewAnswer<?php echo $e?>"><i class="material-icons right">add_box</i><strong>Answer</strong></a>
      </div>
  </div>

  <div id="NewAnswer<?php echo $e?>" class="modal modal-fixed-footer">
      <div class="modal-content">
        <h4><strong>NEW ANSWER</strong></h4>
        <div class="input-field col s6" hidden="true">
            <input type="text" id="addidquestionanswer<?php echo $e?>" value="<?php echo $fil_question->idquestion ?>">
        </div>

        <div class="input-field">
            <textarea id="addanswername<?php echo $e?>" class="materialize-textarea validate" required maxlength="200"></textarea>
            <label for="addanswername">Answer</label>
        </div>
        <div class="input-field">
            <textarea id="addanswerdescription<?php echo $e?>" class="materialize-textarea" maxlength="200"></textarea>
            <label for="addanswerdescription">Answer Description</label>
        </div>
        <div class="input-field">
            <select id="addselectanswervalue<?php echo $e?>">
                <?php $ie = 0; foreach ($value as $fil_value):?>
                <option value="<?php echo $fil_value->idvalue?>"><?php echo $fil_value->valuename ?></option>
                <?php $ie++; endforeach;?>
            </select>
            <label>Select Value</label>
        </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="modal-trigger modal-close btn waves-effect waves-green grey lighten-3 black-text"><i class="material-icons right">expand_more</i><strong> Done</strong></button>
      <button class="modal-trigger modal-close  btn waves-effect waves-green green darken-1" id="btnsaveanswer<?php echo $e?>" onclick="saveanswer(<?php echo $e?>)"><i class="material-icons right">add_box</i><strong>Save answer</strong></button>
  </div>
</div>
<?php $e++; endforeach;?>
</div>
</div>
</div>


<!-- MODALs News-->
<div id="Questionhasactivity" class="modal modal-fixed-footer">
  <div class="modal-content">
   <h4><strong>Question to Activity</strong></h4>
   <div class="input-field col s6">
    <select id="idselectactactivity">
      <?php $t = 0; foreach ($activity as $fil_activity):?>
      <option value="<?php echo $fil_activity->idactivity?>"> <?php echo $fil_activity->activityname?> </option>
      <?php $t++; endforeach; ?>
  </select>
  <label>activity</label>
</div>
</div>
<div class="modal-footer">
  <a class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
  <a id="btnstudentclass" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="activitysaveunity(<?php echo $checkcount?>)"><i class="material-icons right">save</i><strong> Save</strong></a>
</div>
</div>

<!-- MODALs News-->
<div id="Questionhasexam" class="modal modal-fixed-footer">
  <div class="modal-content">
   <h4><strong>Question to Exam</strong></h4>
   <div class="input-field col s6">
    <select id="idselectactexam">
      <?php $t = 0; foreach ($exam as $fil_exam):?>
      <option value="<?php echo $fil_exam->idexam?>"> <?php echo $fil_exam->examname?> </option>
      <?php $t++; endforeach; ?>
  </select>
  <label>Exam</label>
</div>
</div>
<div class="modal-footer">
  <a class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
  <a id="btnstudentclass" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="activitysaveunity(<?php echo $checkcount?>)"><i class="material-icons right">save</i><strong> Save</strong></a>
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
        $("#questioncheckedall").change(function () {
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
