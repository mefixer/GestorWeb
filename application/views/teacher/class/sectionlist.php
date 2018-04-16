<br>
<div class="card-panel z-depth-5">
  <a class="modal-trigger btn waves-effect waves-green grey darken-3" href="#NewSection"><i class="material-icons right">add_box</i><strong> New Section</strong></a>
  <!-- MODALs News-->
  <div id="NewSection" class="modal modal-fixed-footer">
      <div class="modal-content">
           <h5><strong>New Course</strong></h5>
           <div class="input-field col s6">
            <input type="text" class="validate" maxlength="50" data-length="50" required id="classname">
            <label for="classname">Class Name</label>
           </div>
          <div class="input-field col s6">
            <textarea id="descriptionclasscenter" class="materialize-textarea validate" required maxlength="200" data-length="200" ></textarea>
            <label for="name">Description Center</label>
          </div>
          <div class="input-field col s6">
            <textarea id="descriptionclassleft"  class="materialize-textarea" required maxlength="200" data-length="200"></textarea>
            <label for="lastname">Description left</label>
          </div>
          <div class="input-field col s6">
            <textarea id="descriptionclassright" class="materialize-textarea" required maxlength="200" data-length="200"></textarea>
            <label for="username">Description Right</label>
          </div>
           <div class="input-field col s6"> 
              <input type="text" class="validate" disabled value="<?php echo $name?> <?php echo $lastname?>" id="teacherinput">
            <label for="teaherinput" class="active">Teacher</label>
          </div>
      </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close btn waves-effect waves-green grey darken-3"><i class="material-icons right">expand_more</i><strong> Done</strong></a>
      <a href="#!" class="modal-action modal-close btn waves-effect waves-green green darken-1" onclick="saveclass()"><i class="material-icons right">save</i><strong> Save</strong></a>
    </div>
  </div>
</div>