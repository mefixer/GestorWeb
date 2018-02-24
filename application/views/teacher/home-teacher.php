<nav class="nav-extended red darken-1">
    <div class="nav-wrapper">
        <a href="<?php echo base_url() ?>" class="brand-logo"><img src="img/inacap.png"></a>    
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a><strong>TEACHER</strong> :</a></li>
            <li><div class="chip"><img  alt="Contact Person" src="img/teacher<?php echo $gender_name ?>.png" > <?php echo $name ?> <?php echo $lastname ?></div></li>
            <li></li>
            <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li><a><strong>TEACHER</strong> :</a></li>
            <li><div class="chip"><img  alt="Contact Person" src="img/teacher<?php echo $gender_name ?>.png" > <?php echo $name ?> <?php echo $lastname ?></div></li>
            <li></li>
            <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
        </ul>
    </div>
</nav>
<!-- MODALs News-->
<div id="NewClass" class="modal">
    <div class="modal-content">
      <div class="card-panel"><!-- panel -->
         <h4 align="center"><strong>NEW CLASS</strong></h4>
        <div class="input-field">
          <input type="text" class="validate" maxlength="45" data-length="45" required id="classname">
          <label for="classname">CLASS NAME</label>
        </div>
        <div class="input-field">
          <textarea id="descriptionclasscenter" class="materialize-textarea validate" required maxlength="200" data-length="200" ></textarea>
          <label for="name">DESCRIPTION CLASS CENTER</label>
        </div>
        <div class="input-field">
          <textarea id="descriptionclassleft"  class="materialize-textarea" required maxlength="200" data-length="200"></textarea>
          <label for="lastname">DESCRIPTION CLASS LEFT</label>
        </div>
        <div class="input-field">
          <textarea id="descriptionclassright" class="materialize-textarea" required maxlength="200" data-length="200"></textarea>
          <label for="username">DESCRIPTION CLASS RIGHT</label>
        </div>
        <div class="input-field">
          <select disabled id="idselectgender"> 
            <option value="<?php echo $idteacher?>"><?php echo $name?> <?php echo $lastname?></option>
          </select>
          <label>Role</label>
        </div>
      </div><!-- End panel -->
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat red">CANCEL</a>
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="saveclass()">SAVE</a>
    </div>
  </div>
 

<br>
<!-- BODY PAGE AND BUTTON LIST-->
      <div class="row">
          <div class="col s12 m3">
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                  <div class="collapsible-header" onclick="classlist()"><i class="material-icons">class</i>COURSES</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="studentlist()"><i class="material-icons">face</i>STUDENTS</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="unitylist()"><i class="material-icons">view_module</i>UNITYS</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="activitylist()"><i class="material-icons">extension</i>ACTIVITIES</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="questionlist()"><i class="material-icons">question_answer</i>QUESTIONS AND ANSWERS</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="materiallist()"><i class="material-icons">work</i>MATERIALS</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="glosarylist()"><i class="material-icons">g_translate</i>GLOSSARY</div>
                </li>
                <li>
                  <div class="collapsible-header" onclick="progresslist()"><i class="material-icons">trending_up</i>PROGRESS</div>
                </li>
              </ul>
          </div>
            <div class="col s12 m9 19">
                <div id="contentteacher">
                    
                </div>
            </div>
      </div>



<!--Floatting Tooltipped-->
<div class="fixed-action-btn horizontal  click-to-toggle">
    <a class="btn-floating btn-large red tooltipped" data-position="top" data-delay="50" data-tooltip="Multimedia Upload">
        <i class="material-icons">menu</i>
    </a>
    <ul>
        <li><a class="btn-floating red tooltipped modal-trigger" onclick="$('#modaluploadvideo').modal('open')" data-position="top" data-delay="50" data-tooltip="Upload Video"><i class="material-icons">insert_link</i></a></li>
        <li><a class="btn-floating yellow darken-1 tooltipped" onclick="$('#modaluploadaudio').modal('open')" data-position="top" data-delay="50" data-tooltip="Audio Listening"><i class="material-icons">headset</i></a></li>
        <li><a class="btn-floating red tooltipped" onclick="$('#modalyoutubelink').modal('open')" data-position="top" data-delay="50" data-tooltip="Youtube Link's"><i class="material-icons">subscriptions</i></a></li>
        <li><a class="btn-floating blue tooltipped" data-position="top" data-delay="50" data-tooltip="Files"><i class="material-icons">attach_file</i></a></li>
    </ul>
</div>
<!--End Floatting Tooltipped-->


<!--Modal UploadVideo Structure -->
<div id="modaluploadvideo" class="modal">
    <div class="modal-content">
        <h4>Load Archive</h4>
        <div class="card">
            <?php echo form_open_multipart('controller/upload_video'); ?>
            <input type="file" name="userfile" size="20" />
            <input type="submit" value="upload" />
        </div>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="">SAVE</a>
    </div>
</div>
<!--End Modal UploadVideo Structure -->

<!--Modal UploadAudio Structure -->
<div id="modaluploadaudio" class="modal">
    <div class="modal-content">
        <h4>Load Archive</h4>
        <div class="card">
            <?php echo form_open_multipart('controller/upload_audio'); ?>
            <input type="file" name="userfile" size="20" />
            <input type="submit" value="upload" />  
        </div>
        <div class="modal-footer">
        </div>
    </div>
</div>
<!--End Modal UploadAudio Structure -->

<!--Modal Upload Youtube Link Structure -->
<div id="modalyoutubelink" class="modal">
    <div class="modal-content">
        <h4>Load Youtube Link</h4>
        <div class="card">

        </div>
        <form action="#">
            <div class="row">
                <div class="col s3">
                    <div class="input-field">
                        <input type="text" class="validate" maxlength="45" required  id="materialname" value="">
                        <label for="materialname">NAME</label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <textarea id="descriptionleft"  class="materialize-textarea" required maxlength="200" ></textarea>
                        <label for="descriptionleft">DESCRIPTION LEFT</label>
                    </div>
                    <div class="input-field">
                        <textarea id="descriptionright" class="materialize-textarea" maxlength="200" ></textarea>
                        <label for="descriptionclassright">DESCRIPTION RIGHT</label>
                    </div>
                </div>
                <div class="col s12">
                    <div class="input-field">
                        <input class="input" type="text" id="uploadyoutubelink">
                        <label for="uploadyoutubelink">Youtube Link</label>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat" onclick="saveyoutubelink()">SAVE</a>
    </div>
</div>
<!--End Modal Upload Youtube Link Structure -->







<script type="text/javascript">
    $(document).ready(function () {
        $('.modal').modal();
        $('#collapsible').collapsible('active');
        $('ul.tabs').tabs();
        $('select').material_select();
        $(".button-collapse").sideNav();
        //Materialize effects
        $('.tooltipped').tooltip({delay: 50});
    });
     $(document).ready(function(){
    $('.collapsible').collapsible();
  });
</script>