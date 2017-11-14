  <div class="row ">
    <div class="col s3">
      <div id="menu-active-coodinator">

        <ul id="collapsible" class="collapsible popout" data-collapsible="expandable">
          <li>
            <div class="collapsible-header grey lighten-4 black-text"><i class="material-icons left">view_list</i> <strong>Teacher menu</strong></div>
            <div class='collapsible-body red darken-4 black-text'>
              <button class="waves-effect waves-light btn btn-large grey lighten-5 black-text" onclick='new_teacher()'><i class="material-icons left">plus_one</i> New Teacher</button>
            </div>
            <div class='collapsible-body grey lighten-4 black-text'><button class="waves-effect waves-light btn btn-large  grey darken-4" onclick='teacher_list()'><i class="material-icons left">list</i> Teacher List</button>
            </div>
            <div class='collapsible-body red darken-4 black-text'>
              <button class="waves-effect waves-light btn btn-large grey lighten-5 black-text" onclick='progress_teacher()'><i class="material-icons left">trending_up</i> Progress Teacher</button>
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
        <div id="info-activity-coordinator">

        </div>
      </div>
    </div>
  </div>





                