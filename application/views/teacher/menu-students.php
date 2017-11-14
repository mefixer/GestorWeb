<div class="row ">
    <div class="col s3">
      <div id="menu-active-coodinator">

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



<!-- <h5 align="center" style="color: #B71C1C">OPTIONS</h5>

<div class="panel-group" id="accordion" role="tablist" >

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <button class="list-group-item btn-block btn-outline-light" style="color:#000" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Class
        </button>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <button class="list-group-item btn-block btn-outline-danger">New Class</button>
        <button class="list-group-item btn-block btn-outline-danger">Class List</button>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <button class="list-group-item btn-block btn-outline-light" style="color:#000" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-controls="collapseThree">
          Learning
        </button>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        <button class="list-group-item btn-block btn-outline-danger">New Learning</button>
        <button class="list-group-item btn-block btn-outline-danger">Learning List</button>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingFor">
      <h4 class="panel-title">
        <button class="list-group-item btn-block btn-outline-light" style="color:#000" data-toggle="collapse" data-parent="#accordion" href="#collapseFor" aria-controls="collapseFor">
          Test
        </button>
      </h4>
    </div>
    <div id="collapseFor" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFor">
      <div class="panel-body">
        <button class="list-group-item btn-block btn-outline-danger">New Test</button>
        <button class="list-group-item btn-block btn-outline-danger">Test List</button>
      </div>
    </div>
  </div>

  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <button class="btn-block list-group-item btn-outline-light" style="color:#000" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-controls="collapseOne">
          Student
        </button>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
        <button class="list-group-item btn-block btn-outline-danger">New Student</button>
        <button class="list-group-item btn-block btn-outline-danger">Student List</button>
        <button class="list-group-item btn-block btn-outline-danger">Add Student to Class</button>
      </div>
    </div>
  </div>


</div> -->