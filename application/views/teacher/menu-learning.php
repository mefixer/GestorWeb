<div class="row ">
    <div class="col s3">
      <div id="menu-active-coodinator">

        <ul id="collapsible" class="collapsible popout" data-collapsible="expandable">
          <li>
            <div class="collapsible-header grey lighten-4 black-text"><i class="material-icons left">view_list</i> <strong>Learning menu</strong></div>
            <div class='collapsible-body red darken-4 black-text'>
              <button class="waves-effect waves-light btn btn-small grey lighten-5 black-text" onclick='new_class()'><i class="material-icons left">exposure_plus_1</i> <i class="material-icons left">class</i>New Class</button>
            </div>
            <div class='collapsible-body grey lighten-4 black-text'><button class="waves-effect waves-light btn btn-small  grey darken-4" onclick='new_activity()'><i class="material-icons left">exposure_plus_1</i> <i class="material-icons left">extension</i> New Activity</button>
            </div>
            <div class='collapsible-body red darken-4 black-text'>
              <button class="waves-effect waves-light btn btn-small grey lighten-5 black-text" onclick='progress_teacher()'><i class="material-icons left">exposure_plus_1</i><i class="material-icons left">free_breakfast</i>New Test</button>
            </div>
          </li>
          
        </ul>
      </div>

    </div>
    <script type="text/javascript">
            $(function () {$('.collapsible').collapsible();});
        </script>
    <div class="col s9">
      <div class="">
        <div id="info-activity-teacher">

        </div>
      </div>
    </div>
  </div>