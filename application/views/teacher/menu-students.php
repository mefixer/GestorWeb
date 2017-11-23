<!-- Navbar goes here -->

<!-- Page Layout here -->
<div class="row">

  <div class="col s12 m4 l3">
    <div class="col 4">
      <ul id="collapsible" class="collapsible popout" data-collapsible="expandable">
        <li>
          <div class="collapsible-header grey lighten-4 black-text"><i class="material-icons left">view_list</i> <strong>Teacher menu</strong></div>
          <div class='collapsible-body red darken-4 black-text'>
            <button class="waves-effect waves-light btn btn-small grey lighten-5 black-text" onclick='new_student()'><i class="material-icons left"><i class="material-icons left">person_add</i></i> New Student</button>
          </div>
          <div class='collapsible-body grey lighten-4 black-text'><button class="waves-effect waves-light btn btn-small  grey darken-4" onclick='student_list()'><i class="material-icons left">list</i> Student List</button>
          </div>
          <div class='collapsible-body red darken-4 black-text'>
            <button class="waves-effect waves-light btn btn-small grey lighten-5 black-text" onclick='progress_teacher()'><i class="material-icons left">trending_up</i> Progress Students</button>
          </div>
        </li>
      </ul>
    </div>
  </div>

    <div class="col s12 m8 l9">
      <div id="info-activity-teacher">
        
      </div>
    </div>

</div>
<script type="text/javascript">$(function () {$('.collapsible').collapsible();});</script>