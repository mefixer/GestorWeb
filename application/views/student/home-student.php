  <nav class="nav-extended red darken-4">
    <div class="nav-wrapper">
      <a href="<?php echo base_url()?>">
          <img class="responsive-img" width="90em"  src="img/inacap.png">
          </a>
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
          <li><a><strong>TEACHER</strong> :</a></li>
          <li><div class="chip"><img  alt="Contact Person" src="img/student<?php echo $gender_name?>.png"> <?php echo $name?> <?php echo $lastname?></div></li>
          <li></li>
          <li><a class="btn waves-effect waves-light black" onclick="close_session()"><i class="material-icons right white-text">exit_to_app</i> Log Out</a></li>
      </ul>
    </div>
    <div class="nav-content">
      <ul class="tabs tabs-transparent">
        <li class="tab"><a class="">UNITY</a></li>
        <li class="tab"><a class="" href="#test2">ACTIVITIES</a></li>
        <li class="tab disabled"><a href="#test3">PROGRESS</a></li>
        <li class="tab disabled"><a href="#test4">TEST</a></li>
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