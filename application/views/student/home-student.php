  <nav class="nav-extended red darken-4">
    <div class="nav-wrapper">
      <a href="<?php echo base_url()?>">
          <img class="responsive-img" width="90em"  src="img/inacap.png">
          </a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li>
        <a class="btn grey lighten-4 black-text" onclick="student_load()">Students</a>
          <a class="btn grey lighten-4 black-text" onclick="materials_load()" href="#">Materials</a>
          <a class="btn grey lighten-4 black-text" onclick="dictionary_load()" href="#">Dictionary</a>
        </li>
          <li>
          <a><i class="material-icons">account_circle</i></a>
        </li>
        <li>
          <a><?php echo $name?> <?php echo $surname?></a>
        </li>
        <li>
          <a onclick="close_session()" class="waves-effect waves-light btn grey darken-4"><i class="material-icons right">exit_to_app</i> Log Out</a>
         </li>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a href="#test1">Test 1</a></li>
        <li class="tab"><a class="active" href="#test2">Test 2</a></li>
        <li class="tab disabled"><a href="#test3">Disabled Tab</a></li>
        <li class="tab"><a href="#test4">Test 4</a></li>
      </ul>
    </div>
  </nav>
<br>
<div class="container" id="progress-bar">
  <div class="progress">
    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><strong>25%</strong></div>
  </div>
</div><br>
<div class="row">
  <div class="col s3" id="menu-active-student">

  </div>
  <div class="col s9">
    <div id="info-activity-student">

    </div>
  </div>
</div>